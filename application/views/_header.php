<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo (isset($title)) ? $title : "Default Title" ?></title>
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script src="/js/head.min.js"></script>
		<script>
			head.load({ jQuery: "/js/jquery-2.1.1.min.js"}, function() {
				head.load({foundation: "/js/foundation/foundation.min.js"}, {custom: "/js/custom.js"} );

			});

			head.ready("foundation", function () {
				// this will only be executed once foundation has finished loading
				$(document).foundation();
			});


		</script>
	</head>

	<body>
	<div class="off-canvas-wrap" data-offcanvas>
		<div class="inner-wrap">

			<nav class="tab-bar hide-for-medium-up">
				<section class="left-small">
					<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
				</section>

				<section class="middle tab-bar-section">
					<h1 class="title">Demo App</h1>
				</section>


			</nav>

			<!-- Off Canvas Menu -->
			<aside class="left-off-canvas-menu">
				<ul>
					<li>
						<div class="row">
						<?php if(!$this->session->userdata('logged_in')): ?>
							<?php echo form_open("user/login"); ?>
							<div class="large-12 columns">
								<label for="email">Email:</label>
								<input type="text" id="email" name="email" value="" placeholder="email" />
							</div>
							<div class="large-12 columns">
								<label for="pass">Password:</label>
								<input type="password" id="pass" name="pass" value="" placeholder="password" />
							</div>
							<div class="small-12 columns">
								<input type="submit" class="small-12 button" value="Login" />
							</div>

							<?php echo form_close(); ?>
						<?php else: ?>
							<div class="large-12 columns welcome-user">
								Welcome <?php echo $this->session->userdata('user_name') ?>
							</div>
						<?php endif; ?>
						</div>
						<div class="row">
							<div class="spacer small-12 columns"></div>
						</div>
						<div class="row">
							<dl class="sub-nav large-12 columns">
								<?php $active_menu = $this->uri->uri_string == '' ? ' active' : ''; ?>
								<dd class="small-12 left menu_user_register<?php echo $active_menu; ?>"><a href="<?php echo site_url(''); ?>">Register</a></dd>

								<?php $active_menu = $this->uri->uri_string == 'user/members' ? ' active' : ''; ?>
								<dd class="small-12 left menu_user_members<?php echo $active_menu; ?>"><a href="<?php echo site_url('user/members'); ?>">Members</a></dd>

							</dl>
						</div>
					</li>

				</ul>
			</aside>


            <div class="main-nav-wrapper">
				<div class="main-nav row show-for-medium-up">

					<dl class="sub-nav large-6 columns left">
						<dt>Demo Site</dt>
						<?php $active_menu = $this->uri->uri_string == '' ? ' active' : ''; ?>
						<dd class="menu_user_register<?php echo $active_menu; ?>"><a href="<?php echo site_url(''); ?>">Register</a></dd>

						<?php $active_menu = $this->uri->uri_string == 'user/members' ? ' active' : ''; ?>
						<dd class="menu_user_members<?php echo $active_menu; ?>"><a href="<?php echo site_url('user/members'); ?>">Members</a></dd>

					</dl>
					<?php if(!$this->session->userdata('logged_in')): ?>
						<?php echo form_open("user/login", array('id' => 'login_form')); ?>
						<div class="large-2 medium-2 columns right">
							<label for="submit">&nbsp;</label>
							<input type="submit" class="button tiny" value="Login" />
						</div>

						<div class="large-2 medium-2 columns right">
							<label for="pass">Password:</label>
							<input class="<?php echo(isset($form_error_class)) ? $form_error_class : '' ?>" type="password" id="pass" name="pass" value="" placeholder="password" />
						</div>

						<div class="large-2 medium-2 columns right">
							<label for="email">Email:</label>
							<input class="<?php echo(isset($form_error_class)) ? $form_error_class : '' ?>" type="text" id="email" name="email" value="" placeholder="email" />
						</div>
						<?php echo form_close(); ?>
					<?php else: ?>
						<div class='welcome-user'>
							<div class="large-2 columns right">
								<div class='button tiny logout'>
									<?php echo anchor('user/logout', 'Logout'); ?>
								</div>
							</div>
							<div class="large-2 columns right welcome-user-text">
								Welcome <?php echo $this->session->userdata('user_name') ?>
							</div>
						</div>
					<?php endif; ?>

				</div>
			</div>
			<section class="content row">

<?php
/* End of file _header.php */
/* Location: ./application/views/_header.php */