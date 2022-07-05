<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
	if(isset($view) && $view == 1)  {

	?>
	<div class="col-lg-12 btn btn-danger" style="top:-25px;">Please note, until you have uploaded a valid ID, your account will not be approved and your referral code will not function.</div>
		<?php
	}
	?>
	<!-- Page Heading -->
	<br>
	<h1 class="h3 mb-2 text-gray-800">Profile</h1>

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-8 tab-content">
		<?php
		// All users list
		if(isset($view) && $view == 1)  {
			?>
			<?php
			if(validation_errors()){
				?>
				<div class="alert alert-info text-center">
					<?php echo validation_errors(); ?>
				</div>
				<?php
			}
			if($this->session->flashdata('update')){
				?>
				<div class="alert alert-info text-center">
					<?php echo $this->session->flashdata('update'); ?>

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

			<?php
			if(validation_errors()){
				?>
				<div class="alert alert-info text-center">
					<?php echo validation_errors(); ?>
				</div>
				<?php
			}
			if($this->session->flashdata('error')){
				?>
				<div class="alert alert-info text-center">
					<?php echo $this->session->flashdata('error'); ?>

				</div>
				<?php
			}
			?>
			<form>

				<?php
				$sno = 1;
				foreach($response as $val){

					echo '
	
 						Status: <span class="text-success blink"> '.$val['status'].'</span>
                       <div class="form-group">
                       <input type="text" value="'.$val['fname'].'"  placeholder="Update your first name" readonly class="form-control">
						</div>
                        
                          <div class="form-group">
                       <input type="text" value="'.$val['lname'].'" placeholder="Update your last name"  readonly class="form-control">
						</div>
                       
                         <div class="form-group">
                       <input type="text" value="'.$val['referral'].'"  readonly class="form-control">
						</div>
						
                         <div class="form-group">
                       <input type="text" value="'.$val['email'].'"  readonly class="form-control">
						</div>
					
						
						  <div class="form-group">
                       <input type="text" value="'.$val['address'].'"  placeholder="Update your address" readonly class="form-control">
						</div>
                      
                      	  <div class="form-group">
                       <input type="hidden" value="'.$val['bank'].'"  class="form-control">
						</div>
                        
                        <div class="form-group">
                       <input type="hidden" value="'.$val['account_name'].'"  class="form-control">
						</div>
                       
                         <div class="form-group">
                       <input type="hidden" value="'.$val['account_number'].'"  class="form-control">
						</div>
						
						  <div class="form-group">
                       <input type="hidden" value="'.$val['user_image'].'"  class="form-control">
						</div>
						
						  <div class="form-group">
                       <input type="hidden" value="'.$val['user_card'].'"  class="form-control">
						</div>
						
                         <div class="form-group">
                       <button type="button" class="btn btn-primary"><a href="'.site_url().'user/profile?edit='.$val['id'].'" class="text-white">Click here to update your profile and Upload ID</a></button>
						</div>
                        </form>
                    ';
					$sno++;
				}
				?>
			</form>
			<?php
		}

		// Edit user
		if(isset($view) && $view == 2)  {

			?>
				<h5 class="text-primary">Update Your Bank Details And Your ID Card</h5>

			<form   method="POST" action="" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" name="fname" value='<?php echo $response['fname']; ?>'  placeholder="First Name"  class="form-control">
				</div>

				<div class="form-group">
					<input type="text" name="lname" value='<?php echo $response['lname']; ?>'  placeholder="Last Name" class="form-control">
				</div>

				<div class="form-group">
					<input type="text" name="referral" value='<?php echo $response['referral']; ?>'  readonly class="form-control">
				</div>

				<div class="form-group">
					<input type="text" name="email" value='<?php echo $response['email']; ?>'  readonly class="form-control">
				</div>

				<div class="form-group">
					<input type="text" name="address" value='<?php echo $response['address']; ?>'   placeholder="Address" class="form-control">
				</div>

				<div class="form-group">
					<label>Bank Name</label><i class="text-danger">*</i>
					<input type="text" name="bank" value='<?php echo $response['bank']; ?>'   class="form-control">
				</div>

				<div class="form-group">
					<label>Account Name</label><i class="text-danger">*</i>
					<input type="text" name="account_name" value='<?php echo $response['account_name']; ?>'  class="form-control">
				</div>

				<div class="form-group">
					<label>Account Number</label><i class="text-danger">*</i>
					<input type="text" name="account_number" value='<?php echo $response['account_number']; ?>'  class="form-control">
				</div>

				<div class="form-group">
					<label>Upload A Face ID</label><i class="text-danger">*</i><br>
					<small class="text-dark">jpeg / jpg / png. Max size: 5mb</small>
					<input type="file"  name="user_image" value='<?php echo $response['user_image']; ?>'   class="form-control" placeholder="jpg/jpeg/png">
					<small class="text-danger">See Sample</small>
				</div>

				<div class="form-group">
					<label>Upload Valid ID Card Only</label><i class="text-danger">*</i><br>
					<small class="text-dark">jpeg / jpg / png. Max size: 5mb</small>
					<input type="file"  name="user_card" value='<?php echo $response['user_card']; ?>'   class="form-control" placeholder="jpg/jpeg/png">
					<small class="text-danger">National ID, Int'l Passport, Driving License or Voter's Card</small>
				</div>




				<div class="form-group">
				<input type='submit' name='submit' value='Update' class="btn btn-primary">
				</div>


			</form>
			<?php
		}
		?>

			</div>
			<div class="col-lg-4">

				<?php
				if(isset($view) && $view == 2)  {

				?>
				<h4>Example of a Face ID</h4>
				<img src="<?php echo base_url(). 'assets/admin/images/Face-ID-Sales-Agent.jpg'; ?>">

					<?php
				}
				?>


				<?php
		if(isset($view) && $view == 1)  {

			?>
				<p class="text-center">
					<br>
					<img src="<?php echo base_url(). 'uploads/'.$val['user_image']; ?>?&text=Image+Found" alt="Your Face ID Not Found" width="281" height="179">
				</p>
			<?php
				}
			?>
			</div>

	</div><!-- End Content Row -->
</div>
