<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Events</li>
                <li class="breadcrumb-item active">Upcoming Events</li>
            </ol>
 

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Add Upcoming Event <a href="<?=base_url()?>index.php/general/upcoming_events/add"><button class="btn btn-primary">+</button></a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.No</th>
									<th>Upcoming Event Name</th>
									<th>Upcoming Event Description</th>
									<th>Picture</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
									<th>Upcoming Event Name</th>
									<th>Upcoming Event Description</th>
									<th>Picture</th>
									<th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($upcoming_events as $v) { ?>
                                <tr>
                                    <td><?=$v["e_id"]?></td>
									<td><?=$v["e_name"]?></td>
									<td><?=$v["e_desc"]?></td>
									<td>
										<img height="120" width="200" src="<?= str_replace("admin","",base_url())?>assets/custom/upcoming_events/<?= $v['e_image_url'] ?>">
									</td>
                                    <td>
										<a href="<?=base_url()?>index.php/general/upcoming_events/edit/<?=$v["e_id"]?>"><button class="btn btn-primary">Edit</button></a>
										<form method="POST" action="<?= base_url() ?>index.php/general/upcoming_events/delete" style="display:inline;">
											<input type="hidden" name="action" value="delete">
											<input type="hidden" name="e_id" value="<?=$v["e_id"]?>">
											<input type="hidden" name="e_image_url" value="<?=$v["e_image_url"]?>">
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