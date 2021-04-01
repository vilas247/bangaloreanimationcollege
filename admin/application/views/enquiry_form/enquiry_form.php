<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Enquiry Forms</li>
            </ol>
 

            <!-- Example Tables Card -->
            <div class="card mb-3">
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
                            <?php foreach ($enquiry_form as $v) { ?>
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
            </div>