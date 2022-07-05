<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->

	<p class="mb-4"></p>

	<!-- Content Row -->
	<div class="row">
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


		<div class="col-lg-12 tab-content">
			<div class="col-lg-3 ">
			</div>
			<?php
			// All users list
			if(isset($view) && $view == 1)  {
				?>

				<form>
					<?php
					$sno = 1;
					foreach($response as $val){
						echo '
                     <h6 class="mb-2 text-gray-800"><span class="text-primary"> '.$val['fname'].' '.$val['lname'].' </span>Are You Sure You Want To Reset Password?</h6>
						<!--<table class="table table-bordered">
						<thead>
						
						</thead>
						<tbody>
						<tr>
						<td> '.$val['status'].'</td>
						</tr>
						</tbody>
						
						</table>-->
						<br>
						<a class="btn btn-primary" href="'.site_url().'user/change_password?edit='.$val['id'].'" class="text-white">Click Here To Change Password</a> 
					
                    
                      
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
				<div class="col-lg-6">


				<form method='post' action=''>

					<input type="hidden"  name="email" value='<?php echo $response['email']; ?>'   class="form-control" readonly>
					<input type="hidden"  name="referral" value='<?php echo $response['referral']; ?>'   class="form-control" readonly>

					<div class="form-group">
						<label>New Password</label><i class="text-danger">*</i>
						<input type="text"  name="password" value=''  placeholder="Password"  class="form-control">
					</div>
					<div class="form-group">
						<label>Confirm Your Password</label><i class="text-danger">*</i>
						<input type="text"  name="password1" value=''  placeholder="Repeat Password"  class="form-control">
					</div>



					<div class="form-group">
						<input type='submit' name='submit' value='Change Password' class="btn btn-primary">
					</div>


				</form>
				<?php
			}
			?>
		</div>


			<div class="col-lg-3 ">
			</div>

		</div>


	</div><!-- End Content Row -->
	<br><br><br><br><br><br><br><br>
</div>
