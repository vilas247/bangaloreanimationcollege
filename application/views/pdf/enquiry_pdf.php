<style type="text/css">
th, td {
	padding: 0px
}
.showing{
    border: 1px solid black;
    border-collapse: separate;
    border-spacing: 20px; 
}
html{
font-size : 10px;	
}
</style>
<div class="table-responsive" id="tickect_bus" style="background:#ccc; width:100%; position:relative">
<table
	style="border-collapse: collapse; background: #ffffff; font-size: 10px; margin: 0 auto; font-family: arial;"
	 cellpadding="0" cellspacing="0" border="1">
	<tbody>
		<tr>
			<td style="border-collapse: collapse; padding: 10px 20px 20px">
				<table style="border-collapse: collapse; margin: 0px auto; color: #766757;"
					cellpadding="0" cellspacing="0" border="0">
					<tbody class="showing">
					<tr>
						<td style="padding: 15px;">
							<table cellpadding="5" cellspacing="0" border="0" width="100%"
								style="border-collapse: collapse;">
								<tr>
									<td style="padding:0px;">
										<table width="100%" style="border-collapse: collapse;border-bottom: 1px solid black;"
											cellpadding="0" cellspacing="0" border="0">
											<tr>
												<td style="padding: 10px; width: 35%;"><img
													style="max-height: 56px;"
													src="<?= base_url().'assets/images/logo.png' ?>"></td>
												<td style="padding: 10px; width: 65%;">
													<table width="100%"
														style="border-collapse: collapse; text-align: right; line-height: 15px;"
														cellpadding="0" cellspacing="0" border="0">

														<tr>
															<td style="font-size: 10px;"><span
																style="width: 100%; float: left; line-height: 35px; color: #2d3e52;">Enquiry Form</span></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">First Name : <?= @$request['first_name'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Middle Name : <?= @$request['middle_name'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Last Name : <?= @$request['last_name'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Email : <?= @$request['email'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Date Of Birth : <?= @$request['date_of_birth'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Citizenship : <?= @$request['country_of_citizenship'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Residence : <?= @$request['residence'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Primary Contact : <?= @$request['primary_contact'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Secondary Contact : <?= @$request['secondary_contact'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Street Address : <?= @$request['street_address'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Address Line1 : <?= @$request['address_line1'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Address Line2 : <?= @$request['address_line2'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">City : <?= @$request['city'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Country : <?= @$request['country'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">State : <?= @$request['state'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Postal Code : <?= @$request['postal_code'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Course Looking For : <?= @$request['looking_course'] ?></td>
								</tr>
								<tr>
									<td style="padding: 10px 5px;  font-size: 10px; font-weight: bold;">Qualification : <?= @$request['qualification'] ?></td>
								</tr>
							</table>
						</td>
					</tr>
					<tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</div>