<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function validate_user_login()
{
	if (is_logged_in_user() == false) {
		redirect(base_url());
	}
}
function unserialized_data($data, $data_key=false)
{
	if (empty($data_key) == true || md5($data) == $data_key) {
		/*$data = base64_decode($data);
		if (empty($data) === false && is_string($data) == true) {
			$json_data = json_decode($data, true);
			if (valid_array($json_data) == true) {
				$data = $json_data;
			}
		}*/
		$data = base64_decode($data);
		if ($data !== false) {
			$data = @unserialize($data);
		} 
	} else {
		$data = false;
	}
	return $data;
}

function serialized_data($data)
{
	return base64_encode(serialize($data));
	/*if (is_array($data)) {
	$data = json_encode($data);
	}
	return base64_encode($data);*/
}

function force_multple_data_format($data)
{
	$mul_data = '';
	if (is_object($data) == true) {
		if (isset($data->{0}) == false) {
			$mul_data->{0} = $data;
		} else {
			$mul_data = $data;
		}
	} elseif (is_array($data) == true) {
		if (isset($data[0]) == false) {
			$mul_data[0] = $data;
		} else {
			$mul_data = $data;
		}
	}
	return $mul_data;
}

function is_logged_in_user()
{
	if (isset($GLOBALS['CI']->admin_id) == true and intval($GLOBALS['CI']->admin_id) > 0) {
		return true;
	} else {
		return false;
	}
}

function json_validate($json, $assoc = TRUE)
{
	//decode the JSON data
	$result = json_decode($json, $assoc);

	// switch and check possible JSON errors
	switch (json_last_error()) {
		case JSON_ERROR_NONE:
			$error = ''; // JSON is valid
			break;
		case JSON_ERROR_DEPTH:
			$error = 'Maximum stack depth exceeded.';
			break;
		case JSON_ERROR_STATE_MISMATCH:
			$error = 'Underflow or the modes mismatch.';
			break;
		case JSON_ERROR_CTRL_CHAR:
			$error = 'Unexpected control character found.';
			break;
		case JSON_ERROR_SYNTAX:
			$error = 'Syntax error, malformed JSON.';
			break;
			// only PHP 5.3+
		case JSON_ERROR_UTF8:
			$error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
			break;
		default:
			$error = 'Unknown JSON error occured.';
			break;
	}

	if($error !== '') {
		// throw the Exception or exit
		$status = false;
		$message = $error;
		$data = '';
		//redirect('general/index');
	} else {
		$status = true;
		$message = '';
		$data = $result;
	}

	return array('status' => $status, 'message' => $message, 'data' => $data);
}

function debug($ele=array()) {
	echo '<pre>';
	print_r($ele);
}

/**
 * default form should be visible if data is posted or if eid is present or if op is defined as add
 */
function form_visible_operation()
{
	if (valid_array($_POST) == true || isset($_GET['eid']) == true || isset($_GET['origin_id']) == true || (isset($_GET['op']) == true && $_GET['op'] == 'add') ) {
		return true;
	} else {
		return false;
	}

}

function get_host() {
    if (isset($_SERVER['HTTP_X_FORWARDED_HOST']))
    {
    	$host = $_SERVER['HTTP_X_FORWARDED_HOST'];
        $elements = explode(',', $host);
        $host = trim(end($elements));
    }
    else
    {
        if (!$host = $_SERVER['HTTP_HOST'])
        {
            if (!$host = $_SERVER['SERVER_NAME'])
            {
                $host = !empty($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '';
            }
        }
    }
    // Remove port number from host
    $host = preg_replace('/:\d+$/', '', $host);    
    // $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
    $protocol = (empty($_SERVER['HTTPS']))?'http://':'https://';
    // $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
    // return: http://localhost/myproject/
    return trim($protocol.$host);
}
