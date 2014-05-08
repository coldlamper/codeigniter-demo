<div class="column">
	<h3>Welcome <?php echo $this->session->userdata('user_name'); ?>!</h3>
     <p>You have user status.</p>
	<div class="button logout"><?php echo anchor('user/logout', 'Logout'); ?></div>
</div>

<?php
/* End of file welcome.php */
/* Location: ./application/views/welcome.php */