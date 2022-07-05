<div id="layoutSidenav_content">
	<main>
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- Content Row -->
			<!-- Content Row -->
			<div class="row">
				<div class="col-lg-12 tab-content">
					<h6 class="text-uppercase">Meat247 Specta Transactions</h6>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Specta Payments Details</h6>
					</div>

					<div class="card-body">
						<div class="table-responsive" >
							<table  class="table table-striped" id="dataTable" >
								<thead>
								<tr>
									<th>Date</th>
									<th>Buyer's Name</th>
									<th>Buyer's Email</th>
									<th>Buyer's Phone</th>
									<th>Delivery Address</th>
									<th>Package</th>
									<th>Sales</th>
									<th>Referral</th>
									<!-- Admin view only -->
									<?php if($this->session->userdata('user_type')==='admin, finance'):?>
										<th>Discount</th>
										<th>Commission</th>
									<?php endif;?>
									<th>Payment Ref.</th>
									<!-- Admin view only -->
									<?php if($this->session->userdata('user_type')==='admin, finance'):?>
										<th>Paystack Ref.</th>
									<?php endif;?>



								</tr></thead>

								<?php
								//foreach ($h->result() as $row)
								{

								?>
								<tbody>
								<?php foreach ($h->result() as $row) {

									?>

									<tr>
										<td><?php echo $row->date;?></td>
										<td><?php echo $row->cname;?></td>
										<td><?php echo $row->email;?></td>
										<td><?php echo $row->phone_number;?></td>
										<td><?php echo $row->delivery_address;?><br> <?php echo $row->location;?></td>
										<td><?php echo $row->plan;?></td>
										<td><?php echo round($row->amount, 1)?></td>
										<td><?php echo $row->referral;?></td>
										<!-- Admin view only -->
										<?php if($this->session->userdata('user_type')==='admin, finance'):?>
											<td><?php echo $row->customer_discount;?></td>
											<td><?php
												echo round($row->agent_commission, 1);?></td>
										<?php endif;?>
										<td><?php echo $row->reference;?></td>
										<!-- Admin view only -->
										<?php if($this->session->userdata('user_type')==='admin, finance'):?>
											<td><?php echo $row->paystack_reference;?></td>
										<?php endif;?>

									</tr>
								<?php }
								?>
								</tbody>
							</table>
							<?php }?>
						</div><!-- col-12-->
					</div><!-- End Content Row -->

				</div>
			</div>
		</div>
</div>
</div>
</main>
