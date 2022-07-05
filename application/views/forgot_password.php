<div class="contact-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">

				<!-- Form content box start -->
				<div class="form-content-box text-center">
					<a href="index"> <img src="<?php echo base_url().'assets/images/ls-logo.png' ?>" width="150" height="95">
					</a>

					<!-- details -->
					<div class="details">
						<!-- Logo -->

						<?php
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

						<?php
						if(validation_errors()){
							?>
							<div class="alert alert-info text-center">
								<?php echo validation_errors(); ?>
							</div>
							<?php
						}
						if($this->session->flashdata('flash_message')){
							?>
							<div class="alert alert-info text-center">
								<?php echo $this->session->flashdata('flash_message'); ?>

							</div>
							<?php
						}
						?>
						<form method="POST" action="<?php echo site_url(). 'user/forgot_password';?>">
							<div class="form-group text-center">
								<label for="email" class="text-center">Enter Email Address:</label>
								<input type="email" class="form-control" id="email" name="email" value="">
							</div>


							<div class="form-group text-center mb-0">
								<button type="submit" class="btn btn-primary btn-md btn-block">Reset Password</button>
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
