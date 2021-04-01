<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Showcase</li>
                <li class="breadcrumb-item active">Animation Videos</li>
            </ol>
 

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Animation Videos <a href="<?=base_url()?>index.php/general/animation_videos/add"><button class="btn btn-primary">+</button></a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.No</th>
									<th>Animation Video</th>
									<th>Status</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
									<th>Animation Video</th>
									<th>Status</th>
									<th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($videos as $v) { ?>
                                <tr>
                                    <td><?=$v["origin"]?></td>
									<td>
										<video width="220" height="140" controls>
										  <source src="<?= str_replace("admin","",base_url())?>assets/custom/animation_videos/<?= $v['video_url'] ?>">
										  Your browser does not support the video tag.
										  </video>
									</td>
									<td><?=$v["status"]?></td>
                                    <td>
										<form method="POST" action="<?= base_url() ?>index.php/general/animation_videos/delete" style="display:inline;">
											<input type="hidden" name="action" value="delete">
											<input type="hidden" name="origin" value="<?=$v["origin"]?>">
											<input type="hidden" name="video_url" value="<?=$v["video_url"]?>">
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