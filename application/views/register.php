<div class="contact-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<!-- Form content box start -->
				<div class="form-content-box text-center">
					<a href="index"> <img src="<?php echo base_url().'assets/images/ls-logo.png' ?>" width="150" height="95">
					</a>
					<br>
					<h5 class="text-white">BECOME OUR SALES AGENT </h5>
					<br>
					<!-- details -->
					<div class="details">
						<!-- Logo -->	<?php
						if(validation_errors()){
							?>
							<div class="alert alert-info text-center">
								<?php echo validation_errors(); ?>
							</div>
							<?php
						}
						if($this->session->flashdata('message')){
							?>
							<div class="alert alert-info text-center">
								<?php echo $this->session->flashdata('message'); ?>
							</div>
							<?php
						}
						?>
						<p class="">All fields mark <i class="text-danger">*</i> are compulsory.<br></p>
						<form method="POST" action="<?php echo site_url().'user/register'; ?>">
							<div class="form-group">
								<label for="email">First Name:</label><i class="text-danger">*</i>
								<input type="text" class="form-control" id="fname" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name">
							</div>

							<div class="form-group">
								<label for="email">Last Name:</label><i class="text-danger">*</i>
								<input type="text" class="form-control" id="lname" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="Last Name">
							</div>

							<div class="form-group">
								<label for="email">Phone:</label><i class="text-danger">*</i>
								<input type="number" class="form-control" id="referral" name="referral" value="<?php echo set_value('referral'); ?>" placeholder="Phone Number">
							</div>

							<div class="form-group">
								<label for="email">Address:</label><i class="text-danger">*</i>
								<input type="text" class="form-control" id="address" name="address" value="<?php echo set_value('address'); ?>" placeholder="Contact Address">
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
								<input type="password" class="form-control" id="password_confirm" name="password_confirm"
									   value="<?php echo set_value('password_confirm'); ?>" placeholder="Confirm Password">
							</div>

							<div class="form-group">
								<input type="hidden" class="form-control" id="status" name="status" value="Pending">
							</div>
							<div class="form-group text-center mb-0">
							<button type="submit" class="btn btn-primary btn-md btn-block">Register</button>
							</div>
						</form>
					</div>
					<div class="footer">
						<span>Already a member? <a href="login" class="text-primary">Login Here</a></span>
					</div>
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
	<div class="space"></div>
</div>
