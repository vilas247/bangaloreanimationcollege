<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends CI_Model{

	function single_table_records($table, $cols='*', $condition=array(), $offset=0, $limit=100000000, $order_by=array())
	{
		$data = '';
		if (empty($table) == false and is_string($table) == true) {
			if (valid_array($order_by)) {
				foreach ($order_by as $k => $v) {
					$this->db->order_by($k, $v);
				}
			}
			if (valid_array($condition) == false) {
				$condition = array();
			}
			$tmp_data = $this->db->select($cols)->get_where($table, $condition, $limit, $offset);
			if($tmp_data->num_rows()>0) {
				$tmp_data=$tmp_data->result_array();
				$data = array('status' => QUERY_SUCCESS, 'data' => $tmp_data);
			} else {
				$data = array('status' => QUERY_FAILURE);
			}
		} else {
			redirect('general/redirect_login?op=R');
		}
		//echo $this->db->last_query();exit;
		return $data;
	}

	function multiple_table_cross_records($tables=array(), $cols='*', $joincondition=array(), $condition=array(), $offset=0, $limit=1000, $order_by=array()){
		$data = '';
		if (valid_array($tables) && valid_array($joincondition)) {
			if (valid_array($order_by)) {
				foreach ($order_by as $k => $v) {
					$this->db->order_by($k, $v);
				}
			}
			for($i=1;$i<count($tables);$i++){
				foreach ($joincondition as $ck => $cv) {
					$this->db->join($tables[$i], $ck."=".$cv);
				}
			}
			$tmp_data = $this->db->select($cols)->get_where($tables[0], $condition, $limit, $offset)->result_array();
			//echo $this->db->last_query(); exit;
			$data = array('status' => QUERY_SUCCESS, 'data' => $tmp_data);
		} else {
			redirect('general/redirect_login?op=R');
		}
		return $data;
	}

	function insert_record ($table_name, $data)
	{
		$this->db->insert($table_name, $data);
		$num_inserts = $this->db->affected_rows();
		if (intval($num_inserts) > 0) {
			$data = array('status' => QUERY_SUCCESS, 'insert_id' => $this->db->insert_id());
		} else {
			redirect('general/redirect_login?op=C');
		}
		return $data;
	}

	function update_record ($table_name='', $data='', $condition='')
	{
		$status = '';
		if (valid_array($data) == true and valid_array($condition)) {
			$this->db->update($table_name, $data, $condition);
			if($this->db->affected_rows()>0) {
				$status = QUERY_SUCCESS;
			} else {
				$status = QUERY_FAILURE;
			}

			//echo $this->db->last_query();exit;
		} else {
			redirect('general/redirect_login?op=U');
		}
		return $status;
	}

	function delete_record($table_name='',  $condition='')
	{
		$status = '';
		if (valid_array($condition)) {
			$this->db->delete($table_name, $condition);
			$status = QUERY_SUCCESS;
		} else {
			redirect('general/redirect_login?op=D');
		}
		return $status;
	}

	function generate_static_response($data)
	{
		$insert_id = $this->custom_db->insert_record('test', array('test' => $data));
		return $insert_id['insert_id'];
	}

	/**
	 * form sql condition for the ip array
	 * @param $cond Condition is array of array with each array having 3 params('col', 'comparision', 'value')
	 */
	function get_custom_condition($cond)
	{
		$sql = ' AND ';
		if (valid_array($cond) == true) {
			foreach ($cond as $k => $v) {
				$sql .= $v[0].' '.$v[1].' '.$v[2].' AND ';
			}
		}
		$sql = rtrim($sql, ' AND ');
		return $sql;
	}
}