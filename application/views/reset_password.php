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
						if($this->session->flashdata('reset')){
							?>
							<div class="alert alert-info text-center">
								<?php echo $this->session->flashdata('reset'); ?>

							</div>
							<?php
						}
						?>
						<form class="" method="POST" action="<?php echo site_url() . 'user/reset_password';?>">
							<div class="form-group">
								<input type="hidden" name="email" id="email" value="">

								<input type="hidden" name="code" id="code" value="">

								<label for="email" class="text-center">Enter New Password:</label>
								<input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>">

							</div>

							<div class="form-group ">
								<label for="email" class="text-center">Confirm New Password:</label>
								<input type="password" class="form-control" id="passconf" name="passconf" value="<?php echo set_value('passconf'); ?>">
							</div>




							<div class="form-group text-center mb-0">
								<button type="submit" class="btn btn-primary btn-md btn-block" >Reset Password</button>
							</div>
						</form>
					</div>

				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
</div>





	<div class="space"></div>
</div>
