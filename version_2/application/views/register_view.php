<?php include('user/masterpage/header.php'); ?>
<body id="login-page">
	<div class="container">
			<div id="login-box" class="reg-box">
				<div class="logo">
					<img src="<?php echo base_url(); ?>assets/automated/img/login-image.jpg" class="img img-responsive img-circle center-block"/>
					<h1 class="logo-caption"><span class="tweak">R</span>egister</h1>
					<br>
				</div><!-- /.logo -->
				
				<div class="alert alert-danger text-center login-alert text-bold" style="display: none" id="signUpError">
				</div>

				<div class="controls">
					<input type="text" id="first-name" name="first-name" placeholder="First Name" class="form-control" />
					<input type="text" id="last-name" name="last-name" placeholder="Last Name" class="form-control" />
					<input type="text" id="email-name" name="email-name" placeholder="Email" class="form-control" />
					<input type="text" id="password" name="password" placeholder="Password" class="form-control" />
					<input type="text" id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="form-control" />
					<input type="submit" id="btnRegister" class="btn btn-default btn-block btn-custom" value="Register">
					<input type="button" id="btnSignUp" class="btn btn-default btn-block btn-custom" value="Back" onclick="location.href='<?php echo base_url()?>login';">
				</div><!-- /.controls -->
			</div><!-- /#login-box -->
	</div><!-- /.container -->
<div id="particles-js"></div>

<!-- </body> Not write the this because this is already closed in the footer file -->

<?php include('user/masterpage/footer.php'); ?>