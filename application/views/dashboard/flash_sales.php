<div id="layoutSidenav_content">
	<main>
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<h6 class="text-uppercase">Flash Sales Bundles (Tuesday Only Discounted Sales)</h6>
			<p>No Agent Commission, No Customer's Discount</p>
			<!-- Content Row -->
			<div class="row">
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-lg-6">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All Total Flash Sales Payments for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">

										<?php echo $this->Main_model->allFlash();
										;?>
									</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-coins fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Flash Sales for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">

										<?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('paystack_status', 'Success');
										$this->db->like('plan', 'Flash_sales');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();
										?>
									</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-sort-numeric-asc fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div><!-- row-->

		</div><!-- container-->

<br>
		<div class="container-fluid">
			<div class="row">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Transaction Details</h6>
						<button class=" float-right btn btn-outline-primary" onclick="javascript:window.print();"> print</button>

<!--						<a class="btn btn-primary float-right" style="margin-right:40px" href="--><?php //echo site_url(); ?><!--admin/salesExcel"><i class="fa fa-file-excel"></i> Export to Excel</a>-->

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
										<td><?php echo $row->delivery_address;?></td>
										<td><?php echo $row->plan;?></td>
										<td><?php echo round($row->amount, 1)?></td>

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



	</main>

</div>
