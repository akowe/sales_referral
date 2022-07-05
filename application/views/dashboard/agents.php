<div id="layoutSidenav_content">
	<main>

<!-- Content Row -->
<div class="container-fluid">
	<h5 class="text-uppercase">All Sales Agents</h5>

	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">

					<span class="m-0 font-weight-bold text-primary">Agent Details</span>&nbsp;&nbsp;
					<a  href="" data-toggle="modal" data-target="#userModal" title="Add New Agent">
						<i class="fas fa-plus-square text-primary " style="font-size: 18px;"></i>
					</a>
<!---->
<!--					<button class=" float-right btn btn-outline-primary" onclick="javascript:window.print();"> print</button>-->

				</div>
				<?php
				if(validation_errors()){
					?>
					<div class="alert alert-info text-center">
						<?php echo validation_errors(); ?>
					</div>
					<?php
				}
				if($this->session->flashdata('user')){
					?>
					<div class="alert alert-info text-center">
						<?php echo $this->session->flashdata('user'); ?>
					</div>
					<?php }
				?>

				<?php
				if(validation_errors()){
					?>
					<div class="alert alert-info text-center">
						<?php echo validation_errors(); ?>
					</div>
					<?php
				}
				if($this->session->flashdata('approve')){
					?>
					<div class="alert alert-info text-center">
						<?php echo $this->session->flashdata('approve'); ?>
					</div>
					<?php
				}
				?>
				<?php
				if(validation_errors()){
					?>
					<div class="alert alert-info text-center">
						<?php echo validation_errors(); ?>
					</div>
					<?php
				}
				if($this->session->flashdata('edit')){
					?>
					<div class="alert alert-info text-center">
						<?php echo $this->session->flashdata('edit'); ?>

					</div>
					<?php
				}
				?>
				<?php
				if(validation_errors()){
					?>
					<div class="alert alert-info text-center">
						<?php echo validation_errors(); ?>
					</div>
					<?php
				}
				if($this->session->flashdata('reject')){
					?>
					<div class="alert alert-info text-center">
						<?php echo $this->session->flashdata('reject'); ?>
					</div>
					<?php
				}
				?>
				<?php
				if(validation_errors()){
					?>
					<div class="alert alert-info text-center">
						<?php echo validation_errors(); ?>
					</div>
					<?php
				}
				if($this->session->flashdata('reset')){
					?>
					<div class="alert alert-info text-center">
						<?php echo $this->session->flashdata('reset'); ?>
					</div>
					<?php
				}
				?>

				<div class="card-body">
					<div class="table-responsive dataTable" >
						<table  class="table table-striped display" id="dataTable" >
							<?php
							//foreach ($h->result() as $row)
							{
							?>
							<?php if($this->session->userdata('user_type')==='admin'):?>
								<thead>
								<tr>
									<th>Date</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Address</th>
									<th>Bank</th>
									<th>Account Name</th>
									<th>Account Number</th>
									<th>Face ID</th>
									<th>Valid ID</th>
									<th>Status</th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>


								</tr></thead>
							<tbody>

							<?php foreach ($h->result() as $row) {
								?>

								<tr>
									<td><?php echo "$row->date";?></td>
									<td><?php echo "$row->fname";?></td>
									<td><?php echo "$row->lname";?></td>
									<td><?php echo "$row->email";?></td>
									<td><?php echo "$row->referral";?></td>
									<td><?php echo "$row->address";?></td>
									<td><?php echo "$row->bank";?></td>
									<td><?php echo "$row->account_name";?></td>
									<td><?php echo "$row->account_number";?></td>
									<td>
										<?php
										echo '<img src=' . base_url() . "uploads/" . $row->user_image . '  width="150px" height="100px" alt="Face ID Not Found">';
										?><br><br>
										<?php
										echo '<a class="" href=' . base_url() . "uploads/" . $row->user_image . ' download target="_blank"> Download </a>';
										?>
									</td>

									<td>
										<?php
										echo '<img src=' . base_url() . "uploads/" . $row->user_card . '  width="150px" height="100px" alt="ID Card Not Found">';
										?><br><br>
										<?php
										echo '<a class="" href=' . base_url() . "uploads/" . $row->user_card . ' download target="_blank"> Download </a>';
										?>
									</td>

									<td class='text-primary font-weight-bold'>
										<?php
										echo "$row->status";?>
									</td>


									<td class='text-primary font-weight-bold'>	<?php
										echo "<a class='btn btn-success btn-sm' href= approve_user?id=".$row->id.">Approve</a>";?></td>
									<td class='text-primary font-weight-bold'>	<?php
										echo "<a class='btn btn-danger btn-sm' href= reject_user?id=".$row->id.">Reject</a>";?></td>

									<td class='text-primary font-weight-bold'><?php
										echo "<a class='btn btn-primary btn-sm' href= edit_user?id=".$row->id.">Edit</a>";?></td>
									<!-- Admin view ony area -->

										<td class='text-primary font-weight-bold'><?php
											echo "<a class='btn bg-gradient-warning btn-sm text-white' href= reset_user?id=".$row->id.">Reset</a>";?></td>
								</tr>
							<?php }
							?>
							</tbody>
							<?php endif;?>

					<!-- Support Table Here -->
							<?php if($this->session->userdata('user_type')==='support'):?>
								<thead>
								<tr>
									<th>Date</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Address</th>
									<th>Bank</th>
									<th>Account Name</th>
									<th>Account Number</th>
									<th>Face ID</th>
									<th>Valid ID</th>
									<th>Status</th>
									<th></th>
									<th></th>
									<th></th>

								</tr></thead>
								<tbody>

								<?php foreach ($h->result() as $row) {

									?>
									<tr>
										<td><?php echo "$row->date";?></td>
										<td><?php echo "$row->fname";?></td>
										<td><?php echo "$row->lname";?></td>
										<td><?php echo "$row->email";?></td>
										<td><?php echo "$row->referral";?></td>
										<td><?php echo "$row->address";?></td>
										<td><?php echo "$row->bank";?></td>
										<td><?php echo "$row->account_name";?></td>
										<td><?php echo "$row->account_number";?></td>
										<td>
											<?php
											echo '<img src=' . base_url() . "uploads/" . $row->user_image . '  width="150px" height="100px" alt="Face ID Not Found">';
											?><br><br>
											<?php
											echo '<a class="" href=' . base_url() . "uploads/" . $row->user_image . ' download target="_blank"> Download </a>';
											?>
										</td>

										<td>
											<?php
											echo '<img src=' . base_url() . "uploads/" . $row->user_card . '  width="150px" height="100px" alt="ID Card Not Found">';
											?><br><br>
											<?php
											echo '<a class="" href=' . base_url() . "uploads/" . $row->user_card . ' download target="_blank"> Download </a>';
											?>
										</td>

										<td class='text-primary font-weight-bold'>
											<?php
											echo "$row->status";?>
										</td>


										<td class='text-primary font-weight-bold'>	<?php
											echo "<a class='btn btn-success btn-sm' href= approve_user?id=".$row->id.">Approve</a>";?></td>
										<td class='text-primary font-weight-bold'>	<?php
											echo "<a class='btn btn-danger btn-sm' href= reject_user?id=".$row->id.">Reject</a>";?></td>

										<td class='text-primary font-weight-bold'><?php
											echo "<a class='btn btn-primary btn-sm' href= edit_user?id=".$row->id.">Edit</a>";?></td>
										<!-- Admin view ony area -->
									</tr>
								<?php }
								?>
								</tbody>
							<?php endif;?>

						</table>

						<?php }?>
					</div><!-- col-12-->
				</div><!-- End Content Row -->

			</div>
		</div>
	</div>
</div>

</main>
</div>


<!-- Create Users Modal-->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="userModalLabel">Create an Agent</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<!-- body -->
			<div class="modal-body">
				<form method="POST" action="<?php echo site_url().'admin/agents'; ?>">
					<div class="form-group">
						<label for="email">Phone:</label><i class="text-danger">*</i>
						<input type="number" class="form-control" id="referral" name="referral" value="<?php echo set_value('referral'); ?>" placeholder="Phone Number">
					</div>
					<div class="form-group">
						<label for="email">Email:</label><i class="text-danger">*</i>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Valid Email">

					</div>
					<div class="form-group">
						<label for="password">Password:</label><i class="text-danger">*</i>
						<input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="password_confirm">Password:</label><i class="text-danger">*</i>
						<input type="password" class="form-control" id="password_confirm" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>" placeholder="Confirm Password">
					</div>

					<br>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Create Agent</button> 	<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					</div>
				</form>

			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
