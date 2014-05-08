<div class="large-6 medium-6 columns large-centered medium-centered">
	<div class="row">
		<div class="large-6 columns">
			<?php if(isset($form_error_class) && $form_error_class != ''): ?>
			<p class="error">Invalid Login</p>
			<?php endif; ?>
			<h3>User Registration</h3>
		</div>
	</div>

	<?php echo form_open("user/registration"); ?>
	<div class="row">
		<div class="columns">
			<label class="<?php echo form_error('username') ? 'error' : '' ?>" for="username">User Name:</label>
			<input class="<?php echo form_error('username') ? 'error' : '' ?>" type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" />
			<?php echo form_error('username', '<small class="error">', '</small>'); ?>
		</div>
	</div>
	<div class="row">
		<div class="columns">
			<label class="<?php echo form_error('email') ? 'error' : '' ?>" for="email">Your Email:</label>
			<input class="<?php echo form_error('email') ? 'error' : '' ?>" type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" />
			<?php echo form_error('email', '<small class="error">', '</small>'); ?>
		</div>
	</div>
	<div class="row">
		<div class="columns">
			<label class="<?php echo form_error('password') ? 'error' : '' ?>" for="password">Password:</label>
			<input class="<?php echo form_error('password') ? 'error' : '' ?>" type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
			<?php echo form_error('password', '<small class="error">', '</small>'); ?>
		</div>
	</div>
	<div class="row">
		<div class="columns">
			<label class="<?php echo form_error('password_confirm') ? 'error' : '' ?>" for="password_confirm">Confirm Password:</label>
			<input class="<?php echo form_error('password_confirm') ? 'error' : '' ?>" type="password" id="password_confirm" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>" />
			<?php echo form_error('password_confirm', '<small class="error">', '</small>'); ?>
		</div>
	</div>
	<div class="row">
		<div class="columns">
			<input type="submit" class="button" value="Submit" />
		</div>
	</div>
	<?php echo form_close(); ?>
</div>

<?php
/* End of file registration.php */
/* Location: ./application/views/registration.php */