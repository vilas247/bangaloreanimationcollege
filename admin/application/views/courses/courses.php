<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Academics</li>
                <li class="breadcrumb-item active">Courses</li>
            </ol>
 

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Add Course <a href="<?=base_url()?>index.php/general/courses/add"><button class="btn btn-primary">+</button></a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Course Name</th>
                                    <th>Course Description</th>
                                    <th>Course Years</th>
                                    <th>Course Seasons</th>
                                    <th>Image</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Course Name</th>
                                    <th>Course Description</th>
                                    <th>Course Years</th>
                                    <th>Course Seasons</th>
									<th>Image</th>
                                    <th>Action</th> 
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($courses as $v) { ?>
                                <tr>
                                    <td><?=$v["course_id"]?></td>
                                    <td><?=$v["course_name"]?></td>
                                    <td><?=$v["course_desc"]?></td>
                                    <td><?=$v["course_years"]?></td>
                                    <td><?=$v["course_seasons"]?></td>
                                    <td><img height="120" width="200" src="<?= str_replace("admin","",base_url())?>assets/custom/courses/<?= $v['course_image'] ?>"></td>
                                    <td>
										<a href="<?=base_url()?>index.php/general/courses/edit/<?=$v["course_id"]?>"><button class="btn btn-primary">Edit</button></a>
										<form method="POST" action="<?= base_url() ?>index.php/general/courses/delete" style="display:inline;">
											<input type="hidden" name="action" value="delete">
											<input type="hidden" name="course_id" value="<?=$v["course_id"]?>">
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