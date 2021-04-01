<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>



            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">App Forms</li>
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
									<th>DOB</th>
									<th>Proof</th>
									<th>Citizenship</th>
									<th>Residence</th>
									<th>Primary Contact</th>
									<th>Secondary Contact</th>
									<th>Street Address</th>
									<th>Address Line 1</th>
									<th>Address Line 2</th>
									<th>City</th>
									<th>Country</th>
									<th>State</th>
									<th>Postal Code</th>
									<th>Course Looking for</th>
									<th>Qualification</th>
									<th>Date</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
									<th>Name</th>
									<th>Email</th>
									<th>DOB</th>
									<th>Proof</th>
									<th>Citizenship</th>
									<th>Residence</th>
									<th>Primary Contact</th>
									<th>Secondary Contact</th>
									<th>Street Address</th>
									<th>Address Line 1</th>
									<th>Address Line 2</th>
									<th>City</th>
									<th>Country</th>
									<th>State</th>
									<th>Postal Code</th>
									<th>Course Looking for</th>
									<th>Qualification</th>
									<th>Date</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($app_form as $v) { ?>
                                <tr>
                                    <td><?= $v["first_name"].' '.$v["middle_name"].' '.$v["last_name"] ?></td>
                                    <td><?=$v["email"]?></td>
                                    <td><?=$v["date_of_birth"]?></td>
                                    <td><?=$v["proofofid"]?></td>
                                    <td><?=$v["country_of_citizenship"]?></td>
                                    <td><?=$v["residence"]?></td>
                                    <td><?=$v["primary_contact"]?></td>
                                    <td><?=$v["secondary_contact"]?></td>
                                    <td><?=$v["street_address"]?></td>
                                    <td><?=$v["address_line1"]?></td>
                                    <td><?=$v["address_line2"]?></td>
                                    <td><?=$v["city"]?></td>
                                    <td><?=$v["country"]?></td>
                                    <td><?=$v["state"]?></td>
                                    <td><?=$v["postal_code"]?></td>
                                    <td><?=$v["looking_course"]?></td>
                                    <td><?=$v["qualification"]?></td>
                                    <td><?=$v["created_at"]?></td>
                                </tr>
                            <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>