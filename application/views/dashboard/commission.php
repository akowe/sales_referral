<div id="layoutSidenav_content">
	<main>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h4 class=" mb-2 text-gray-800 text-uppercase">All Agents Commission  </h4>
	<p class="mb-4"></p>

	<!-- Content Row -->
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-lg-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Commission Payout for the Month of <?php echo date("M, Y") ;?></div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $this->Main_model->commission(); ?></div>
							<p></p>
						</div>
						<div class="col-auto">
							<i class="fas fa-coins fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<?php  echo $this->Main_model->dateCommission();
							?>
							<label class=" btn btn-outline-primary btn-block" onclick="Commission()">Search Total Commission Previous Month</label>

							<form method="get" action="" id="commission">
								<label>from</label>
								<input type="date" name="comm_from" class="small form-control">

								<label>to</label>
								<input type="date" name="comm_to" class="small form-control">
								<br>
								<input type="submit" value="Search" class="btn btn-outline-primary btn-block">
							</form>
						</div>
						<div class="col-auto">
							<i class="fas fa-coins fa-2x text-gray-300"></i>
						</div>

					</div>
				</div>
			</div>
		</div>



		<div class="col-lg-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<?php  echo $this->Main_model->agentCommission();
							?>
							<label class=" btn btn-outline-primary btn-block" onclick="commFunction()">Search Individual Total Monthly Commission</label>

							<form method="get" action="" id="comm">
								<label>from</label>
								<input type="date" name="agent_from" class="small form-control">

								<label>to</label>
								<input type="date" name="agent_to" class="small form-control">
								<br>

								<input type="text" name="referral" placeholder="Enter Agent Phone" class="small form-control">
								<br>
								<input type="submit" value="Search" class="btn btn-outline-primary btn-block">
							</form>
						</div>

						<div class="col-auto">
							<i class="fas fa-coins fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div><!-- end Row -->
</div>


	<!-- Content Row -->

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h5 class="mb-2 text-gray-800">Commission breakdown for all agents</h5>
				<button class=" float-right btn btn-outline-primary small" onclick="javascript:window.print();"> print</button>

			</div>
			<!-- Area Table -->

			<div class="card-body">
				<div class="table-responsive" >
					<table  class="table table-striped" id="dataTable" width="100%" >
				<thead><tr>
					<th class="small font-weight-bold">Sales Date</th>
					<th class="small font-weight-bold">Agent Name</th>
					<th class="small font-weight-bold">Bank</th>
					<th class="small font-weight-bold">Acct Name</th>
					<th class="small font-weight-bold">Acct No.</th>
					<th class="small font-weight-bold">Phone</th>
					<th class="small font-weight-bold">Package</th>
					<th class="small font-weight-bold">Commission</th>
<!--					<th class="small font-weight-bold">Paid Agent</th>-->
				</tr></thead>

				<?php
				//foreach ($h->result() as $row)
				{

				?>
				<tbody>
				<?php
				foreach ($b->result() as $row) {

					?>

					<tr>
						<td class="small"><?php echo $row->date;?></td>
						<td class="small"><?php echo $row->fname;?> <?php echo $row->lname;?></td>
						<td class="small"><?php echo $row->bank;?></td>
						<td class="small"><?php echo $row->account_name;?></td>
						<td class="small"><?php echo $row->account_number;?></td>
						<td class="small"><?php echo $row->referral;?></td>
						<td class="small"><?php echo $row->plan;?></td>
						<td class="small"><?php echo round($row->agent_commission, 1);
						?> </td>
<!--						<td class="small">--><?php //echo $row->agent_payment_status;?><!--</td>-->
<!--						<td class="small">--><?php //echo "<a class=' btn-sm' href= approve_user?id=".$row->id.">Paid</a>";?><!--</td>-->

					</tr>
				<?php }
				?>

				</tbody>
			</table>

		</div><!-- col-12-->
		<?php }?>


	</div><!-- End Content Row -->
</div>
	</div>
</div>
	</main>
</div>

