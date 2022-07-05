<div id="wrapper">
<!-- Sidebar -->

	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-right d-none d-md-inline">
		<br>
		</div>
		<!-- Sidebar - Brand -->
	<?php if($this->session->userdata('user_type')==='user'):?>
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
		<div class="sidebar-brand-icon  d-lg-none">
			<img src="<?php echo base_url(). 'assets/admin/images/logo-icon.png'; ?>" width="60" height="35">

		</div>
		<div class="sidebar-brand-text mx-3"> <img src="<?php echo base_url(). 'assets/admin/images/ls247-logo.png'; ?>" width="170" height="55"></div>
	</a>
	<?php endif;?>

	<?php if($this->session->userdata('user_type')==='admin'):?>
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">
		<div class="sidebar-brand-icon  d-lg-none">
			<img src="<?php echo base_url(). 'assets/admin/images/ls247-logo-white.png'; ?>" width="60" height="35">

		</div>
		<div class="sidebar-brand-text mx-3"> <img src="<?php echo base_url(). 'assets/admin/images/ls247-logo-white.png'; ?>" width="170" height="55"></div>
	</a>
	<?php endif;?>

		<?php if($this->session->userdata('user_type')==='support'):?>
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="support">
				<div class="sidebar-brand-icon  d-lg-none">
					<img src="<?php echo base_url(). 'assets/admin/images/ls247-logo-white.png'; ?>" width="60" height="35">

				</div>
				<div class="sidebar-brand-text mx-3"> <img src="<?php echo base_url(). 'assets/admin/images/ls247-logo-white.png'; ?>" width="170" height="55"></div>
			</a>
		<?php endif;?>


		<?php if($this->session->userdata('user_type')==='finance'):?>
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="finance">
				<div class="sidebar-brand-icon  d-lg-none">
					<img src="<?php echo base_url(). 'assets/admin/images/ls247-logo-white.png'; ?>" width="60" height="35">

				</div>
				<div class="sidebar-brand-text mx-3"> <img src="<?php echo base_url(). 'assets/admin/images/ls247-logo-white.png'; ?>" width="170" height="55"></div>
			</a>
		<?php endif;?>

	<!-- Divider -->
	<?php if($this->session->userdata('user_type')==='user'):?>
	<hr class="sidebar-divider my-0">
	<li class="nav-item">
		<a class="nav-link" href="dashboard">
		<span class="mr-2  d-lg-none text-white-600"><?php echo $this->session->userdata('fname')?></span>
		</a>
	</li>
	<?php endif;?>

	<!-- Nav Item - Dashboard -->
	<?php if($this->session->userdata('user_type')==='admin'):?>
	<li class="nav-item active">
		<a class="nav-link" href="admin">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php endif;?>

		<!-- Nav Item - Dashboard -->
		<?php if($this->session->userdata('user_type')==='support'):?>
			<li class="nav-item active">
				<a class="nav-link" href="support">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
		<?php endif;?>

		<!-- Nav Item - Dashboard -->
		<?php if($this->session->userdata('user_type')==='finance'):?>
			<li class="nav-item active">
				<a class="nav-link" href="finance">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
		<?php endif;?>

	<?php if($this->session->userdata('user_type')==='user'):?>
	<li class="nav-item active">
		<a class="nav-link" href="dashboard">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php endif;?>

	<!-- Divider -->
	<hr class="sidebar-divider">
	<!-- Heading -->
	<!-- Nav Item - Pages Collapse Menu -->
		<?php if($this->session->userdata('user_type')==='admin'):?>
		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fa fa-shopping-cart"></i>
			<span>Meat247 Transactions</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">All Transactions:</h6>
				<a class="collapse-item" href="sales">Sales</a>
				<a class="collapse-item" href="pendingOrder">Pending Orders</a>

			</div>
		</div>
	</li>
			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
					<i class="fa fa-boxes"></i>
					<span>Special Bundles</span>
				</a>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Bundles:</h6>
						<a class="collapse-item" href="flash_sales">Flash Sales</a>

					</div>
				</div>
			</li>
			<hr class="sidebar-divider">
			<li class="nav-item">
				<a class="nav-link" href="specta">
					<i class="fas fa-fw fa-coins"></i>
					<span>Specta Payments</span></a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<li class="nav-item">
				<a class="nav-link" href="commission">
					<i class="fas fa-fw fa-coins"></i>
					<span>Commissions</span></a>

			</li>
			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<li class="nav-item">
				<a class="nav-link" href="agents">
					<i class="fas fa-fw fa-users"></i>
					<span>Agents</span></a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
				<li class="nav-item">
					<a class="nav-link" href="create">
						<i class="fas fa-fw fa-users"></i>
						<span>Create Admin User</span></a>
				</li>



		<?php endif;?>

		<?php if($this->session->userdata('user_type')==='support'):?>
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fa fa-shopping-cart"></i>
				<span>Meat247 Transactions</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">All Transactions:</h6>
					<a class="collapse-item" href="sales">Sales</a>
					<a class="collapse-item" href="pendingOrder">Pending Orders</a>
				</div>
			</div>
		</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
					<i class="fa fa-boxes"></i>
					<span>Special Bundles</span>
				</a>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Bundles:</h6>
						<a class="collapse-item" href="flash_sales">Flash Sales</a>

					</div>
				</div>
			</li>

			<hr class="sidebar-divider">
			<li class="nav-item">
				<a class="nav-link" href="specta">
					<i class="fas fa-fw fa-coins"></i>
					<span>Specta Payments</span></a>
			</li>

			<hr class="sidebar-divider">
			<li class="nav-item">
				<a class="nav-link" href="agents">
					<i class="fas fa-fw fa-users"></i>
					<span>Agents</span></a>
			</li>
		<?php endif;?>

		<?php if($this->session->userdata('user_type')==='finance'):?>

			<li class="nav-item">
				<a class="nav-link" href="commission">
					<i class="fas fa-fw fa-coins"></i>
					<span>Commissions</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="sales">
					<i class="fas fa-fw fa-coins"></i>
					<span>Sales</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
					<i class="fa fa-boxes"></i>
					<span>Special Bundles</span>
				</a>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Bundles:</h6>
						<a class="collapse-item" href="flash_sales">Flash Sales</a>

					</div>
				</div>
			</li>

			<hr class="sidebar-divider">
			<li class="nav-item">
				<a class="nav-link" href="specta">
					<i class="fas fa-fw fa-coins"></i>
					<span>Specta Payments</span></a>
			</li>
		<?php endif;?>

	<!-- Nav Item - Utilities Collapse Menu -->
		<?php if($this->session->userdata('user_type')==='user'):?>
		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-coins"></i>
			<span>Commissions</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Revenue Breakdown</h6>
				<a class="collapse-item" href="">All Commission</a>
				<a class="collapse-item" href="biggie_commission">Cow Biggie</a>
				<a class="collapse-item" href="midi_commission">Cow Midi</a>
				<a class="collapse-item" href="mini_commission">Cow Mini</a>
				<hr class="sidebar-divider btn-secondary">
				<a class="collapse-item" href="large_commission">Goat Large</a>
				<a class="collapse-item" href="medium_commission">Goat Medium</a>
				<a class="collapse-item" href="small_commission">Goat Small</a>
				<hr class="sidebar-divider btn-secondary">
				<a class="collapse-item" href="maxi_commission">Ram Maxi</a>
				<a class="collapse-item" href="standard_commission">Ram Standard</a>
				<a class="collapse-item" href="compact_commission">Ram Compact</a>

			</div>
		</div>
	</li><?php endif;?>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<li class="nav-item">
		<a class="nav-link" href="profile">
			<i class="fas fa-cogs fa-sm fa-fw mr-2 "></i>
			<span>Profile</span>
		</a>
	</li>

		<hr class="sidebar-divider">
		<?php if($this->session->userdata('user_type')==='user'):?>
			<li class="nav-item d-lg-none d-md-block d-sm-block">
				<a  class="nav-link" href="<?php echo site_url(). 'user/change_password';?>">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
					<span>Change Password</span>
				</a>
			</li>

			<li class="nav-item d-lg-none d-md-block d-sm-block">
				<a  class="nav-link" href="<?php echo site_url(). 'user/logout';?>" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
					<span class="">Logout</span>
				</a>
			</li>

		<?php endif;?>

	<!-- Side Nav Item  -->

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-md-inline d-sm-block">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->

<!-- Content Top Bar Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
	<!-- Main Content -->
	<div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

			<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>

			<!-- Topbar Search -->
			<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
				<div class="input-group">
					<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<button class="btn btn-primary" type="button">
							<i class="fas fa-search fa-sm"></i>
						</button>
					</div>
				</div>
			</form>

			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">

				<!-- Nav Item - Search Dropdown (Visible Only XS) -->
				<li class="nav-item dropdown no-arrow d-sm-none">
					<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-search fa-fw"></i>
					</a>
					<!-- Dropdown - Messages -->
					<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
						<form class="form-inline mr-auto w-100 navbar-search">
							<div class="input-group">
								<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<button class="btn btn-primary" type="button">
										<i class="fas fa-search fa-sm"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</li>

				<!-- Admin view ony area -->
				<?php if($this->session->userdata('user_type')==='admin'):?>
				<!-- Nav Item - Alerts for Agents -->
				<li class="nav-item dropdown no-arrow mx-1">
					<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" title="See Total Agents" alt="See Total Agents">
						<i class="fas fa-users"></i>
						<!-- Counter Agents- Alerts -->
						<span class="badge badge-danger badge-counter">
						<?php echo
						$this->load->database();
						$this->db->from('users');
						$this->db->like('user_type', 'user');
						echo $this->db->count_all_results();
						?>
						</span>
					</a>
					<!-- Dropdown - Alerts -->
					<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
						<h6 class="dropdown-header">
							Total Agents
						</h6>


						<a class="dropdown-item d-flex align-items-center" href="#">
							<div class="mr-3">
								<div class="icon-circle bg-success">
									<i class="fas fa-exclamation-triangle text-white"></i>
								</div>
							</div>
							<div>
								<div class="small text-gray-500"> <?php  echo date("D d M, Y");?> </div>
								Total Approved Agents 	<?php echo
								$this->load->database();
								$this->db->from('users');
								$this->db->like('status', 'Approved');
								echo $this->db->count_all_results();
								?>
							</div>
						</a>

							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-gradient-warning">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
							<div>
							<div class="small text-gray-500"> <?php  echo date("D d M, Y");?> </div>
							Total Pending Agents <?php echo
								$this->load->database();
								$this->db->from('users');
								$this->db->like('status', 'Pending');
								echo $this->db->count_all_results();
								?>
					</div>
						</a>


						<a class="dropdown-item d-flex align-items-center" href="#">
							<div class="mr-3">
								<div class="icon-circle bg-gradient-danger">
									<i class="fas fa-exclamation-triangle text-white"></i>
								</div>
							</div>
							<div>
								<div class="small text-gray-500"> <?php  echo date("D d M, Y");?> </div>
								Total Rejected Agents <?php echo
								$this->load->database();
								$this->db->from('users');
								$this->db->like('status', 'Rejected');
								echo $this->db->count_all_results();
								?>
							</div>
						</a>

						<a class="dropdown-item text-center small text-gray-500" href="agents">Show All Agents</a>
					</div>
				</li>

				<!-- Counter - Sales Alerts -->

					<!-- Total Orders -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="See Pending Orders" alt="See Pending Orders">

							<i class="fas fa-shopping-basket"></i>
							<!-- Counter -Pending Order Alerts -->
							<span class="badge badge-danger badge-counter">
								<?php echo
								$this->load->database();
								$this->db->from('meat_sharing');
								$this->db->like('paystack_status', 'Pending');
								$this->db->where('month(date)', date('m'));
								echo $this->db->count_all_results();
								?>
						</span>
						</a>
						<!-- Dropdown - Alerts -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
							<h6 class="dropdown-header">
								Total Pending Orders for <?php echo date(" M, Y") ;?>
							</h6>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-gradient-danger">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Pending Biggie Orders: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Biggie');
										$this->db->like('paystack_status', 'Pending');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>

							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-gradient-danger">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Pending Midi Orders: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Midi');
										$this->db->like('paystack_status', 'Pending');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-gradient-danger">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Pending Mini Orders: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Mini');
										$this->db->like('paystack_status', 'Pending');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>

							<a class="dropdown-item text-center small text-gray-500" href="pendingOrder">Show All Pending Orders</a>
						</div>
					</li>


					<!-- Total Successful Sales -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="See Successful Sales" alt="See Successful Sales">

							<i class="fas fa-coins"></i>
							<!-- Counter -Sales Alerts -->
							<span class="badge badge-danger badge-counter">
							<?php echo
							$this->load->database();
							$this->db->from('meat_sharing');
							$this->db->like('paystack_status', 'Success');
							$this->db->where('month(date)', date('m'));
							echo $this->db->count_all_results();
							?>

						</span>
						</a>
						<!-- Dropdown - Alerts -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
							<h6 class="dropdown-header">
								Sales Breakdown <?php echo date(" M, Y") ;?>
							</h6>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Cow Biggie Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Biggie');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>

							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Cow Midi Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Midi');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Cow Mini Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Mini');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>



							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Large Goat Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Large');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Medium Goat Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Medium');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Small Goat Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Small');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Maxi Ram Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Maxi');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Standard Ram Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Standard');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Compact Ram Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Compact');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>

							<a class="dropdown-item text-center small text-gray-500" href="sales">Show All Successful Sales</a>
						</div>
					</li>
				<?php endif;?> <!-- end admin area-->


				<!-- Support view only area -->
				<?php if($this->session->userdata('user_type')==='support'):?>
					<!-- Nav Item - Alerts for Agents -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" title="See Total Agents" alt="See Total Agents">
							<i class="fas fa-users"></i>
							<!-- Counter Agents- Alerts -->
							<span class="badge badge-danger badge-counter">
						<?php echo
						$this->load->database();
						$this->db->from('users');
						$this->db->like('user_type', 'user');
						echo $this->db->count_all_results();
						?>
						</span>
						</a>
						<!-- Dropdown - Alerts -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
							<h6 class="dropdown-header">
								Total Agents
							</h6>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500"> <?php  echo date("D d M, Y");?> </div>
									Total Approved Agents 	<?php echo
									$this->load->database();
									$this->db->from('users');
									$this->db->like('status', 'Approved');
									echo $this->db->count_all_results();
									?>
								</div>
							</a>

								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-gradient-warning">
											<i class="fas fa-exclamation-triangle text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500"> <?php  echo date("D d M, Y");?> </div>
										Total Pending Agents <?php echo
										$this->load->database();
										$this->db->from('users');
										$this->db->like('status', 'Pending');
										echo $this->db->count_all_results();
										?>
									</div>
								</a>

							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-gradient-danger">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500"> <?php  echo date("D d M, Y");?> </div>
									Total Rejected Agents <?php echo
									$this->load->database();
									$this->db->from('users');
									$this->db->like('status', 'Rejected');
									echo $this->db->count_all_results();
									?>
								</div>
							</a>
								<a class="dropdown-item text-center small text-gray-500" href="agents">Show All Agents</a>
						</div>
					</li>

					<!-- Counter - Sales Alerts -->
					<!-- Total Orders -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="See Pending Orders" alt="See Pending Orders">

							<i class="fas fa-shopping-basket"></i>
							<!-- Counter -Pending orders Alerts -->
							<span class="badge badge-danger badge-counter">
									<?php echo
									$this->load->database();
									$this->db->from('meat_sharing');
									$this->db->like('paystack_status', 'Pending');
									$this->db->where('month(date)', date('m'));
									echo $this->db->count_all_results();
									?>
						</span>
						</a>
						<!-- Dropdown - Alerts -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
							<h6 class="dropdown-header">
								Total Pending Orders for <?php echo date(" M, Y") ;?>
							</h6>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-gradient-danger">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Pending Biggie Orders: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Biggie');
										$this->db->like('paystack_status', 'Pending');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>

							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-gradient-danger">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Pending Midi Orders: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Midi');
										$this->db->like('paystack_status', 'Pending');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-gradient-danger">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Pending Mini Orders: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Mini');
										$this->db->like('paystack_status', 'Pending');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>

							<a class="dropdown-item text-center small text-gray-500" href="pendingOrder">Show All Pending Orders</a>
						</div>
					</li>


				<!-- Total Successful Sales -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="See Successful Sales" alt="See Successful Sales">

							<i class="fas fa-coins"></i>
							<!-- Counter -Sales Alerts -->
							<span class="badge badge-danger badge-counter">
							<?php echo
							$this->load->database();
							$this->db->from('meat_sharing');
							$this->db->like('paystack_status', 'Success');
							$this->db->where('month(date)', date('m'));
							echo $this->db->count_all_results();
							?>

						</span>
						</a>
						<!-- Dropdown - Alerts -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
							<h6 class="dropdown-header">
								 Sales Breakdown <?php echo date(" M, Y") ;?>
							</h6>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Cow Biggie Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Biggie');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>

							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Cow Midi Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Midi');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Cow Mini Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Mini');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Large Goat Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Large');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Medium Goat Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Medium');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Small Goat Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Small');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Maxi Ram Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Maxi');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Standard Ram Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Standard');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>


							<a class="dropdown-item d-flex align-items-center" href="#">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">Total Compact Ram Sales: <?php echo
										$this->load->database();
										$this->db->from('meat_sharing');
										$this->db->like('plan', 'Compact');
										$this->db->like('paystack_status', 'Success');
										$this->db->where('month(date)', date('m'));
										echo $this->db->count_all_results();

										?></div>
								</div>

							</a>
							<a class="dropdown-item text-center small text-gray-500" href="sales">Show All Sales</a></div>
					</li>	<?php endif;?>
				<!-- end user area -->

				<div class="topbar-divider d-none d-lg-block d-md-none"></div>

				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow d-none d-lg-block d-md-block">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('email')?></span>
						<!--<img class="img-profile rounded-circle" src="">-->
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a  class="dropdown-item" href="<?php echo site_url(). 'user/change_password';?>" >
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
							<span>Change Password</span>
						</a>

						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo site_url(). 'user/logout';?>" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>

						<div class="dropdown-divider"></div>

					</div>

				</li>

			</ul>

		</nav>
		<!-- End of Topbar -->

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">We love to see you again.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary"  href="<?php echo site_url(). 'user/logout';?>">Logout</a>
					</div>
				</div>
			</div>
		</div>

