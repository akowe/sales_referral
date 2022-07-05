<!-- Begin Page Content -->
			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="d-sm-flex align-items-center justify-content-between mb-4">
					<h1 class="h3 mb-0 text-gray-800"> <?php if($this->session->userdata('user_type')==='user'):?>Dashboard <span class="text-primary">>>></span>Welcome <span class="text-primary"><?php echo $this->session->userdata('fname');?></span> <?php endif;?> </h1>

					<butto class="btn btn-sm btn-primary shadow-sm"> Your Discount Code is <?php echo $this->session->userdata('referral');?></butto>

				</div>

<!--				<small>-->
<!--					Share Referral Link:-->
<!--					--><?php
//					$link =  site_url().$this->session->userdata('referral');
//					$dicount_code = $this->session->userdata('referral');
//					$meat =''; //https://meat247/'$this->session->userdata('referral');
//					?>
<!---->
<!--					<a href="http://localhost/~esther/meat247/--><?php //$this->db->get('users', array('referral' =>$dicount_code));?><!--">-->
<!--						--><?php // echo $link;?>
<!--					</a>-->
<!---->
<!--					<br>-->
<!--					<a href="http://localhost/~esther/meat247/--><?php //$this->session->userdata('referral');?><!--">-->
<!--					</a>-->
<!--				</small>-->



				<!-- Content Row -->
				<div class="row">
					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-6 col-md-8 mb-4">
						<div class="card border-left-primary shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number Of Sales As At <?php echo date("D d M, Y") ;?> </div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $this->users_model->countSales(); ?></div>

									</div>
									<div class="col-auto">
										<i class="fas fa-shopping-basket fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-6 col-md-8 mb-4">
						<div class="card border-left-success shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Commission Earned as at <?php echo date("D d M, Y") ;?></div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $this->users_model->commission(); ?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-coins fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- End Content Row -->
			</div>

				<br>
				<br>
				<!-- Sales Biggie Overview -->
					<!-- Content Row -->
					<div class="row">
						<div class="col-lg-6 tab-content">
							<h6 class="mb-2 text-gray-800"> Cow Biggie Sales Overview For <?php echo date(" M, Y") ;?></h6>
						</div>

						<div class="col-lg-6 tab-content">
							<div class="float-right">
							<h6 class="mb-2 text-gray-800"><a href="biggie_commission">Sell all transactions</a></h6>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 tab-content">
							<table  class="table table-bordered">
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
										<td>
											<?php echo "₦ ";?>
											<?php
											echo round($row->agent_commission, 1);
											?></td>

									</tr>
								<?php }
								?>
								</tbody>
							</table>
						</div><!-- col-12-->
					</div><!-- End Content Row -->

				<?php }?>


		<!-- end sale overview -->

<br><br>

<!-- Sales Midi Overview -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6 tab-content">
			<h6 class="mb-2 text-gray-800">Cow Midi Sales Overview For <?php echo date(" M, Y") ;?></h6>
		</div>


		<div class="col-lg-6 tab-content">
			<div class="float-right">
				<h6 class="mb-2 text-gray-800"><a href="midi_commission">Sell all transactions</a></h6>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 tab-content">
			<table  class="table table-bordered">
				<thead><tr>
					<th>Date</th>
					<th>Buyer's Name</th>
					<th>Package</th>
					<th>Your Commission</th>

				</tr></thead>

				<?php
				//foreach ($m->result() as $row)
				{

				?>
				<tbody>
				<?php
				foreach ($m->result() as $row) {

					?>

					<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $row->cname;?></td>
						<td><?php echo $row->plan;?></td>
						<td><?php echo "₦ ";?>
							<?php
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

<!-- end sale overview -->


<br><br>

<!-- Sales Mini Overview -->
<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6 tab-content">
			<h6 class="mb-2 text-gray-800">Cow Mini Sales Overview For <?php echo date(" M, Y") ;?></h6>
		</div>


		<div class="col-lg-6 tab-content">
			<div class="float-right">
				<h6 class="mb-2 text-gray-800"><a href="mini_commission">Sell all transactions</a></h6>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 tab-content">
			<table  class="table table-bordered">
				<thead><tr>
					<th>Date</th>
					<th>Buyer's Name</th>
					<th>Package</th>
					<th>Your Commission</th>

				</tr></thead>

				<?php
				//foreach ($m->result() as $row)
				{

				?>
				<tbody>
				<?php
				foreach ($n->result() as $row) {

					?>

					<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $row->cname;?></td>
						<td><?php echo $row->plan;?></td>
						<td><?php echo "₦ ";?>
							<?php
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





<br><br>

<!-- Sales Large Overview -->
<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6 tab-content">
			<h6 class="mb-2 text-gray-800">Goat Large Sales Overview For <?php echo date(" M, Y") ;?></h6>
		</div>


		<div class="col-lg-6 tab-content">
			<div class="float-right">
				<h6 class="mb-2 text-gray-800"><a href="large_commission">Sell all transactions</a></h6>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 tab-content">
			<table  class="table table-bordered">
				<thead><tr>
					<th>Date</th>
					<th>Buyer's Name</th>
					<th>Package</th>
					<th>Your Commission</th>

				</tr></thead>

				<?php
				//foreach ($m->result() as $row)
				{

				?>
				<tbody>
				<?php
				foreach ($l->result() as $row) {

					?>

					<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $row->cname;?></td>
						<td><?php echo $row->plan;?></td>
						<td><?php echo "₦ ";?>
							<?php
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



<br><br>

<!-- Sales Medium Overview -->
<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6 tab-content">
			<h6 class="mb-2 text-gray-800">Goat Medium Sales Overview For <?php echo date(" M, Y") ;?></h6>
		</div>


		<div class="col-lg-6 tab-content">
			<div class="float-right">
				<h6 class="mb-2 text-gray-800"><a href="medium_commission">Sell all transactions</a></h6>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 tab-content">
			<table  class="table table-bordered">
				<thead><tr>
					<th>Date</th>
					<th>Buyer's Name</th>
					<th>Package</th>
					<th>Your Commission</th>

				</tr></thead>

				<?php
				//foreach ($m->result() as $row)
				{

				?>
				<tbody>
				<?php
				foreach ($d->result() as $row) {

					?>

					<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $row->cname;?></td>
						<td><?php echo $row->plan;?></td>
						<td><?php echo "₦ ";?>
							<?php
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


<br><br>

<!-- Sales Small Overview -->
<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6 tab-content">
			<h6 class="mb-2 text-gray-800">Goat Small Sales Overview For <?php echo date(" M, Y") ;?></h6>
		</div>


		<div class="col-lg-6 tab-content">
			<div class="float-right">
				<h6 class="mb-2 text-gray-800"><a href="small_commission">Sell all transactions</a></h6>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 tab-content">
			<table  class="table table-bordered">
				<thead><tr>
					<th>Date</th>
					<th>Buyer's Name</th>
					<th>Package</th>
					<th>Your Commission</th>

				</tr></thead>

				<?php
				//foreach ($m->result() as $row)
				{

				?>
				<tbody>
				<?php
				foreach ($s->result() as $row) {

					?>

					<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $row->cname;?></td>
						<td><?php echo $row->plan;?></td>
						<td><?php echo "₦ ";?>
							<?php
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


<br><br>

<!-- Sales Maxi Overview -->
<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6 tab-content">
			<h6 class="mb-2 text-gray-800">Ram Maxi Sales Overview For <?php echo date(" M, Y") ;?></h6>
		</div>


		<div class="col-lg-6 tab-content">
			<div class="float-right">
				<h6 class="mb-2 text-gray-800"><a href="maxi_commission">Sell all transactions</a></h6>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 tab-content">
			<table  class="table table-bordered">
				<thead><tr>
					<th>Date</th>
					<th>Buyer's Name</th>
					<th>Package</th>
					<th>Your Commission</th>

				</tr></thead>

				<?php
				//foreach ($m->result() as $row)
				{

				?>
				<tbody>
				<?php
				foreach ($x->result() as $row) {

					?>

					<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $row->cname;?></td>
						<td><?php echo $row->plan;?></td>
						<td><?php echo "₦ ";?>
							<?php
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

<br><br>

<!-- Sales Standard Overview -->
<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6 tab-content">
			<h6 class="mb-2 text-gray-800">Ram Standard Sales Overview For <?php echo date(" M, Y") ;?></h6>
		</div>


		<div class="col-lg-6 tab-content">
			<div class="float-right">
				<h6 class="mb-2 text-gray-800"><a href="standard_commission">Sell all transactions</a></h6>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 tab-content">
			<table  class="table table-bordered">
				<thead><tr>
					<th>Date</th>
					<th>Buyer's Name</th>
					<th>Package</th>
					<th>Your Commission</th>

				</tr></thead>

				<?php
				//foreach ($m->result() as $row)
				{

				?>
				<tbody>
				<?php
				foreach ($t->result() as $row) {

					?>

					<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $row->cname;?></td>
						<td><?php echo $row->plan;?></td>
						<td><?php echo "₦ ";?>
							<?php
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


<br><br>

<!-- Sales Compact Overview -->
<div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6 tab-content">
			<h6 class="mb-2 text-gray-800">Ram Compact Sales Overview For <?php echo date(" M, Y") ;?></h6>
		</div>


		<div class="col-lg-6 tab-content">
			<div class="float-right">
				<h6 class="mb-2 text-gray-800"><a href="compact_commission">Sell all transactions</a></h6>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 tab-content">
			<table  class="table table-bordered">
				<thead><tr>
					<th>Date</th>
					<th>Buyer's Name</th>
					<th>Package</th>
					<th>Your Commission</th>

				</tr></thead>

				<?php
				//foreach ($m->result() as $row)
				{

				?>
				<tbody>
				<?php
				foreach ($c->result() as $row) {

					?>

					<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $row->cname;?></td>
						<td><?php echo $row->plan;?></td>
						<td><?php echo "₦ ";?>
							<?php
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


</div><!-- end sale overview -->


