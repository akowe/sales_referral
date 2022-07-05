<div id="layoutSidenav_content">
	<main>
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<h6 class="text-uppercase">Cow Meats Packages</h6>
			<!-- Content Row -->
			<div class="row">
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-lg-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All Total Biggie Payments for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">

										<?php echo $this->Main_model->allBiggie();
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

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-lg-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">All Total Midi Payments for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<?php echo $this->Main_model->allMidi();
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

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-lg-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">All Total Mini Payments for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<?php  echo $this->Main_model->allMini();
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

			</div><!-- row -->

			<br>
				<!-- All total payments -->
				<!-- All payment by months -->
				<div class="row">

				<div class="col-lg-4">
					<div class="col mr-2">
						<div class="h5 mb-0 font-weight-bold text-gray-800" >
							<?php echo $this->Main_model->dateBiggie();
							?>
						</div>
					</div>
					<label class=" btn btn-outline-primary btn-block" onclick="biggieFunction()">Select Biggie Previous Month</label>


					<form method="get" action="" id="oldSales" >
						<label>from</label>
						<input type="date" name="from" class="small form-control" value="">

						<label>to</label>
						<input type="date" name="to" class="small form-control">
						<input type="submit" value="search" class="btn btn-outline-primary btn-block" >
					</form>

				</div>


				<div class="col-lg-4">
					<div class="h5 mb-0 font-weight-bold text-gray-800">
						<div class="col mr-2">
							<?php  echo $this->Main_model->dateMidi();
							?>
						</div>
					</div>
					<label class=" btn btn-outline-success btn-block" onclick="midiFunction()">Select Midi Previous Month</label>

					<form method="get" action="" id="oldSalesMidi">
						<label>from</label>
						<input type="date" name="midi_from" class="small form-control">

						<label>to</label>
						<input type="date" name="midi_to" class="small form-control">
						<input type="submit" value="search" class="btn btn-outline-warning btn-block">
					</form>

				</div>

				<div class="col-lg-4">
					<div class="col mr-2">
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php  echo $this->Main_model->dateMini();
							?>
						</div>
					</div>
					<label class=" btn btn-outline-danger btn-block" onclick="miniFunction()">Select Mini Previous Month</label>

					<form method="get" action="" id="oldSalesMini">
						<label>from</label>
						<input type="date" name="mini_from" class="small form-control">

						<label>to</label>
						<input type="date" name="mini_to" class="small form-control">
						<input type="submit" value="search" class="btn btn-outline-danger btn-block">
					</form>
				</div>
			</div>
			<!-- cow meat -->

			<br>
			<h6 class="text-uppercase">Goat Meat Packages</h6>
			<!-- Content Row -->
			<div class="row">
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-lg-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">All Total Large Payments for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">

										<?php echo $this->Main_model->allLarge();
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

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-lg-4">
					<div class="card border-left-secondary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">All Total Medium Payments for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<?php echo $this->Main_model->allMedium();
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

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-lg-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1">All Total Small Payments for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<?php  echo $this->Main_model->allSmall();
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

			</div><!-- row -->

			<br>
			<!-- All total payments -->
			<!-- All payment by months -->
			<div class="row">

				<div class="col-lg-4">
					<div class="col mr-2">
						<div class="h5 mb-0 font-weight-bold text-gray-800" >
							<?php echo $this->Main_model->dateLarge();
							?>
						</div>
					</div>
					<label class=" btn btn-outline-warning btn-block" onclick="largeFunction()">Select Large Previous Month</label>


					<form method="get" action="" id="large" >
						<label>from</label>
						<input type="date" name="large_from" class="small form-control" value="">

						<label>to</label>
						<input type="date" name="large_to" class="small form-control">
						<input type="submit" value="search" class="btn btn-outline-primary btn-block" >
					</form>
				</div>

				<div class="col-lg-4">
					<div class="h5 mb-0 font-weight-bold text-gray-800">
						<div class="col mr-2">
							<?php  echo $this->Main_model->dateMedium();
							?>
						</div>
					</div>
					<label class=" btn btn-outline-secondary btn-block" onclick="mediumFunction()">Select Medium Previous Month</label>

					<form method="get" action="" id="medium">
						<label>from</label>
						<input type="date" name="medium_from" class="small form-control">

						<label>to</label>
						<input type="date" name="medium_to" class="small form-control">
						<input type="submit" value="search" class="btn btn-outline-warning btn-block">
					</form>

				</div>

				<div class="col-lg-4">
					<div class="col mr-2">
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php  echo $this->Main_model->dateSmall();
							?>
						</div>
					</div>
					<label class=" btn btn-outline-info btn-block" onclick="smallFunction()">Select Small Previous Month</label>

					<form method="get" action="" id="small">
						<label>from</label>
						<input type="date" name="small_from" class="small form-control">

						<label>to</label>
						<input type="date" name="small_to" class="small form-control">
						<input type="submit" value="search" class="btn btn-outline-danger btn-block">
					</form>
				</div>

			</div>	<!-- end Goat meat -->


			<br>
			<h6 class="text-uppercase">Ram Meat Packages</h6>
			<!-- Content Row -->
			<div class="row">
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-lg-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">All Total Maxi Payments for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">

										<?php echo $this->Main_model->allMaxi();
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

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-lg-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All Total Standard Payments for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<?php echo $this->Main_model->allStandard();
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

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-lg-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">All Total Compact Payments for <?php echo date(" M, Y") ;?></div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<?php  echo $this->Main_model->allCompact();
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

			</div><!-- row -->

			<br>
			<!-- All total payments -->
			<!-- All payment by months -->
			<div class="row">

				<div class="col-lg-4">
					<div class="col mr-2">
						<div class="h5 mb-0 font-weight-bold text-gray-800" >
							<?php echo $this->Main_model->dateMaxi();
							?>
						</div>
					</div>
					<label class=" btn btn-outline-danger btn-block" onclick="maxiFunction()">Select Maxi Previous Month</label>


					<form method="get" action="" id="maxi" >
						<label>from</label>
						<input type="date" name="maxi_from" class="small form-control" value="">

						<label>to</label>
						<input type="date" name="maxi_to" class="small form-control">
						<input type="submit" value="search" class="btn btn-outline-primary btn-block" >
					</form>

				</div>




				<div class="col-lg-4">
					<div class="h5 mb-0 font-weight-bold text-gray-800">
						<div class="col mr-2">
							<?php  echo $this->Main_model->dateStandard();
							?>
						</div>
					</div>
					<label class=" btn btn-outline-primary btn-block" onclick="standardFunction()">Select Standard Previous Month</label>

					<form method="get" action="" id="standard">
						<label>from</label>
						<input type="date" name="standard_from" class="small form-control">

						<label>to</label>
						<input type="date" name="standard_to" class="small form-control">
						<input type="submit" value="search" class="btn btn-outline-warning btn-block">
					</form>

				</div>

				<div class="col-lg-4">
					<div class="col mr-2">
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php  echo $this->Main_model->dateCompact();
							?>
						</div>
					</div>
					<label class=" btn btn-outline-success btn-block" onclick="compactFunction()">Select Compact Previous Month</label>

					<form method="get" action="" id="compact">
						<label>from</label>
						<input type="date" name="compact_from" class="small form-control">

						<label>to</label>
						<input type="date" name="compact_to" class="small form-control">
						<input type="submit" value="search" class="btn btn-outline-danger btn-block">
					</form>
				</div>

			</div>	<!-- end Ram meat -->
		</div><!-- container-->



			<!-- Content Row -->


</main>
</div>



