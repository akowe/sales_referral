<form method="POST" action="<?php echo site_url().'admin/agents'; ?>">
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


	<div class="form-group">
		<input type="hidden" class="form-control" id="status" name="status" value="user">
	</div>
	<br>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create User</button>
	</div>
</form>
