<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Showcase</li>
                <li class="breadcrumb-item active">Digital Paitings</li>
            </ol>
 

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Add Digital Painting <a href="<?=base_url()?>index.php/general/digital_paintings/add"><button class="btn btn-primary">+</button></a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.No</th>
									<th>Student Name</th>
									<th>Course Name</th>
									<th>Picture</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
									<th>Student Name</th>
									<th>Course Name</th>
									<th>Picture</th>
									<th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($digital_paintings as $v) { ?>
                                <tr>
                                    <td><?=$v["dp_id"]?></td>
									<td><?=$v["dp_student_name"]?></td>
									<td><?=$v["dp_course_name"]?></td>
									<td>
										<img height="120" width="200" src="<?= str_replace("admin","",base_url())?>assets/custom/digital_paintings/<?= $v['dp_image_url'] ?>">
									</td>
                                    <td>
										<a href="<?=base_url()?>index.php/general/digital_paintings/edit/<?=$v["dp_id"]?>"><button class="btn btn-primary">Edit</button></a>
										<form method="POST" action="<?= base_url() ?>index.php/general/digital_paintings/delete" style="display:inline;">
											<input type="hidden" name="action" value="delete">
											<input type="hidden" name="dp_id" value="<?=$v["dp_id"]?>">
											<input type="hidden" name="dp_image_url" value="<?=$v["dp_image_url"]?>">
											<input type="submit" class="btn btn-primary" value="Delete">
										</form>
									</td>
                                </tr>
                            <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>