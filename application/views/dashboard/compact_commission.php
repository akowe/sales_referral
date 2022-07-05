<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h4 class=" mb-2 text-gray-800 text-uppercase">Commission for all Compact Sales</h4>
	<p class="mb-4"></p>

	<!-- Content Row -->
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Compact Commission as at <?php echo date("D d M, Y") ;?></div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $this->users_model->compactCommission(); ?></div>
							<p></p>
						</div>
						<div class="col-auto">
							<i class="fas fa-coins fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12 tab-content">
			<h5 class="mb-2 text-gray-800">Compact Sales Transactions For <?php echo date(" M, Y") ;?></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 tab-content dataTables_paginate">
			<table  class="table table-bordered" id="dataTable">
				<thead><tr>
					<th>Date</th>
					<th>Buyer's Name</th>
					<th>Package</th>
					<th>Your Commission</th>

				</tr></thead>

				<?php
				//foreach ($h->result() as $row)
				{

				?>
				<tbody>
				<?php
				foreach ($h->result() as $row) {

					?>

					<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $row->cname;?></td>
						<td><?php echo $row->plan;?></td>
						<td><?php
							echo round($row->agent_commission, 1);
							?></td>

					</tr>
				<?php }
				?>
				</tbody>
			</table>
		</div><!-- col-12-->
	</div><!-- End Content Row -->
</div>
<?php }?>
