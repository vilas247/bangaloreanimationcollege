<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Showcase</li>
                <li class="breadcrumb-item active">Student Art Gallery</li>
            </ol>
 

            <!-- Example Tables Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Art Gallery <a href="<?=base_url()?>index.php/general/art_gallery/add"><button class="btn btn-primary">+</button></a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.No</th>
									<th>Art Image</th>
									<th>Status</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
									<th>Art Image</th>
									<th>Status</th>
									<th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($art_gallery as $v) { ?>
                                <tr>
                                    <td><?=$v["origin"]?></td>
									<td>
										<img height="120" width="200" src="<?= str_replace("admin","",base_url())?>assets/custom/art_gallery/<?= $v['art_icon_url'] ?>">
									</td>
									<td><?=$v["status"]?></td>
                                    <td>
										<form method="POST" action="<?= base_url() ?>index.php/general/art_gallery/delete" style="display:inline;">
											<input type="hidden" name="action" value="delete">
											<input type="hidden" name="origin" value="<?=$v["origin"]?>">
											<input type="hidden" name="art_icon_url" value="<?=$v["art_icon_url"]?>">
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