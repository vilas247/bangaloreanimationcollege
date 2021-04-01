<?php
if (form_visible_operation()) {
    $tab1 = " active ";
    $tab2 = "";
} else {
    $tab2 = " active ";
    $tab1 = "";
}
?>
<?php $this->load->view('header'); ?>
<!-- HTML BEGIN -->
<div id="general_user" class="bodyContent">
    <div class="panel panel-default"><!-- PANEL WRAP START -->
        <div class="panel-heading"><!-- PANEL HEAD START -->
            <div class="panel-title">
                <ul class="nav nav-tabs" role="tablist" id="myTab">
                    <!-- INCLUDE TAB FOR ALL THE DETAILS ON THE PAGE START-->
                    <li role="presentation" class="<?php echo $tab1; ?>"><a
                            id="fromListHead" href="#fromList" aria-controls="home" role="tab"
                            data-toggle="tab"> <i class="fa fa-edit"></i> <?php echo 'Create/Update Video'; ?>
                        </a></li>

                    <li role="presentation" class="<?php echo $tab2; ?>"><a
                            href="#tableList" aria-controls="profile" role="tab" data-toggle="tab">
                            <i class="fa fa-picture-o"></i> <?php echo 'Video List'; ?> </a>
                    </li>
                    <!-- INCLUDE TAB FOR ALL THE DETAILS ON THE PAGE END -->
                </ul>
            </div>
        </div>
        <!-- PANEL HEAD START -->
        <div class="panel-body"><!-- PANEL BODY START -->
            <div class="tab-content">
                    <div role="tabpanel" class="clearfix tab-pane <?php echo $tab1; ?>" id="fromList">
                        <div class="panel-body"><?php
                            /*  * ********************** GENERATE CURRENT PAGE FORM *********************** */
                            if (isset($eid) == false || empty($eid) == true) { ?>
                                <!--   * * GENERATE ADD PAGE FORM -->
                                <form name="general" autocomplete="off" action="/management/index.php/user/banner_videos_top" method="POST" enctype="multipart/form-data" id="general" role="form" class="form-horizontal">
									<fieldset form="general">
										<legend class="form_legend"></legend>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="banner_video" form="general">banner_video<span class="text-danger">*</span></label>
											<div class="col-sm-6">
												<input value="" name="banner_video" accept="image/*" required="" type="file" placeholder="banner_video" class=" banner_video banner_video" id="banner_video" data-original-title="" title="">
											</div>
										</div>
									</fieldset>
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-4">
											<button type="submit" id="general_submit" class=" btn btn-success ">Save</button>
											<button type="reset" id="general_reset" class=" btn btn-warning ">Reset</button>
										</div>
									</div>
								</form>
                            <?php } else {
                                $form_data['template_id'] = 1;
                                //echo $banner_page_obj->generate_form('edit_banner_videos', $form_data);
                            }
                            /*                             * ********************** GENERATE UPDATE PAGE FORM *********************** */
                            ?></div>
                    </div>
                
                <div role="tabpanel" class="clearfix tab-pane <?php echo $tab2; ?>"
                     id="tableList">
                    <div class="panel-body"><?php
                        /*                         * ********************** GENERATE CURRENT PAGE TABLE *********************** */
                        echo get_table($videos);
                        /*                         * ********************** GENERATE CURRENT PAGE TABLE *********************** */
                        ?></div>
                </div>
            </div>
        </div>
        <!-- PANEL BODY END --></div>
    <!-- PANEL WRAP END --></div>
<!-- HTML END -->
<?php
$this->load->view('footer');
function get_table($videos = '') {
    $table = '';
    $table .= '
   <div class="table-responsive">
   <table class="table table-bordered datatable" id="b2c_users123">';
    $table .= '<thead>
    <tr>
        <th>S.No</th>
        <th>Banner Video</th>
        <th>Status</th>
        <th>Action</th>
                            
   </tr></thead>';
    $table .= '<tfoot><tr>
        <th>S.No</th>
        <th>Banner Video</th>
       
        <th>Action</th>
   </tr>'; 
            $table .= '</tfoot><tbody>';

    if (valid_array($videos) == true) {
        $segment_3 = $GLOBALS['CI']->uri->segment(3);
        $current_record = (empty($segment_3) ? 0 : $segment_3);
        foreach ($videos as $k => $v) {
            $table .= '<tr>
            <td>' . ( ++$current_record) . '</td>
            <td><img src="../assets/custom/banner_videos/'.$v['image_url']. '" height="80px" width="180px" class="img-thumbnail"></td>
           <td> <a role="button" href="' . base_url() . 'index.php/general/delete_banner_video/'.$v['origin'].'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>
                        
        Delete</a></td>
            
</tr>';
        }
    } else {
        $table .= '<tr><td colspan="8">No Data Found</td></tr>';
    }
    $table .= '</tbody>';
        //footer Search Section        
        
        $table .='</table></div>';
    return $table;
}

function get_edit_button($id) {
    return '<a role="button" href="' . base_url() . 'index.php/cms/slider_images?' . $_SERVER['QUERY_STRING'] . '&  eid=' . $id . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>
        ' . get_app_message('AL0022') . '</a>
        ';
    /* <a role="button" href="'.base_url().'general/account?uid='.$id.'" class="btn btn-sm">
      <span class="glyphicon glyphicon-zoom-in"></span>'.get_app_message('AL0023').'</a> */
}
?>
<script>
$(document).ready(function() {
    $('.toggle-template-status').on('change', function(e) {
        e.preventDefault();
        var _user_status = this.value;
        var _opp_url = app_base_url+'index.php/general/update_banner_status/';
        if (parseInt(_user_status) == 1) {
            var status = 1;
        } else {
            var status = 0;
        }
        _opp_url = _opp_url+$(this).data('user-id')+'/'+status;
        toastr.info('Please Wait!!!');
        $.get(_opp_url, function() {
            toastr.info('Updated Successfully!!!');
        });
    });

    $('.delete_image').on('click', function(e) {
        e.preventDefault();
        var _user_status = this.value;
        var _opp_url = app_base_url+'index.php/general/delete_banner_videos/';
        _opp_url = _opp_url+$(this).data('origin-id');
        toastr.info('Please Wait!!!');
        $.get(_opp_url, function() {
            toastr.info('Updated Successfully!!!');
            window.location.reload();
        });
    });
});
</script>
