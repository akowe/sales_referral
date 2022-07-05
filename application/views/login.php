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
						if($this->session->flashdata('msg')){
							?>
							<div class="alert alert-info text-center">
								<?php echo $this->session->flashdata('msg'); ?>

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
						if($this->session->flashdata('verify')){
							?>
							<div class="alert alert-info text-center">
								<?php echo $this->session->flashdata('verify'); ?>

							</div>
							<?php
						}
						?>
						<form method="POST" action="<?php echo site_url().'user/auth'; ?>">

							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>">
							</div>
							<div class="checkbox">
								<div class="ez-checkbox pull-left">
									<label>
										<input type="checkbox" class="ez-hide">
										Remember me
									</label>
								</div>

								<a href="<?php echo site_url(). 'user/forgot_password';?>" class="link-not-important pull-right">Forgot Password</a>
								<div class="clearfix"></div>
							</div>


								<div class="form-group text-center mb-0">
							<button type="submit" class="btn btn-primary btn-md btn-block">Login</button>
							</div>
						</form>
					</div>
<!--					<div class="footer">-->
<!--						<span>Don't have account? <a href="register" class="text-primary">Register Here</a></span>-->
<!--					</div>-->
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>



	<!-- Reset Password Modal-->
	<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">

			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>


				<div class="modal-body">
					<div class="text-center form-group">
						<h5 class=" text-primary ">Forgot Your Password?</h5>
					</div>
					<form action="" method="post">
						<div class="form-group">
							<input class="form-control text-center" type="email" name="email" id="email" placeholder="Enter Emmail Address">
						</div>

						<div class="form-group">
						<button class="btn btn-primary" type="submit" name="submit">RESET PASSWORD</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="space"></div>
</div>
