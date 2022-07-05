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
		if($this->session->flashdata('reject')){
			?>
			<div class="alert alert-info text-center">
				<?php echo $this->session->flashdata('reject'); ?>

			</div>
			<?php
		}
		?>
		<div class="col-lg-12 tab-content">
			<?php
			// All users list
			if(isset($view) && $view == 1)  {
				?>

				<form>
					<?php
					$sno = 1;
					foreach($response as $val){
						echo '
                     <h4 class="mb-2 text-gray-800"><span class="text-primary">Reject</span> Agent >>> '.$val['fname'].' '.$val['lname'].' </h4>
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
						<a class="btn btn-primary" href="'.site_url().'admin/reject_user?edit='.$val['id'].'" class="text-white">Click Here To Reject Agent</a> 
					
                    
                      
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
				<h5 class="text-primary">Reject status for <?php echo $response['fname']; ?> <?php echo $response['lname']; ?></h5>

				<form method='post' action=''>

					<input type="hidden"  name="email" value='<?php echo $response['email']; ?>'   class="form-control" readonly>
					<input type="hidden"  name="referral" value='<?php echo $response['referral']; ?>'   class="form-control" readonly>
					<div class="form-group">
						<input type="text"  name="status" value='Rejected'   class="form-control" readonly>
					</div>


					<div class="form-group">
						<input type='submit' name='submit' value='Reject' class="btn btn-primary">
					</div>


				</form>
				<?php
			}
			?>





		</div>


	</div><!-- End Content Row -->
</div>
