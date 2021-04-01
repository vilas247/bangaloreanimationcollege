<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">CMS</li>
                <li class="breadcrumb-item active">Banner Videos</li>
            </ol>
 

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.No</th>
									<th>Banner Video</th>
									<th>Status</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
									<th>Banner Video</th>
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
										  <source src="<?= str_replace("admin","",base_url())?>assets/custom/banner_videos/<?= $v['video_url'] ?>">
										  Your browser does not support the video tag.
										  </video>
									</td>
									<td><?=$v["status"]?></td>
                                    <td>
										<a href="<?=base_url()?>index.php/general/banner_videos/edit/<?=$v["origin"]?>"><button class="btn btn-primary">Edit</button></a>
									</td>
                                </tr>
                            <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>