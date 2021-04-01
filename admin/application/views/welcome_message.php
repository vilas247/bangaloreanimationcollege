<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>

            

            
            

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Enquiry Forms
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Course</th>
									<th>Subject</th>
									<th>Date</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Course</th>
									<th>Subject</th>
									<th>Date</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
									$enquiry_form = $this->Custom_model->single_table_records ( 'enquiry_form','','','','',array('id'=>'desc'));
									$data ['enquiry_form'] = array();
									if($enquiry_form['status']){
										$data ['enquiry_form'] = $enquiry_form['data'];
									}
									foreach ($data ['enquiry_form'] as $v) { ?>
									<tr>
										<td><?=$v["name"]?></td>
										<td><?=$v["email"]?></td>
										<td><?=$v["phone"]?></td>
										<td><?=$v["course"]?></td>
										<td><?=$v["subject"]?></td>
										<td><?=$v["createdAt"]?></td>
									</tr>
								<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated yesterday at 11:59 PM
                </div>
            </div>