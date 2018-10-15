<?php include('user/masterpage/header.php'); ?>
<body id="login-page">
	<div class="container">
			<div id="login-box" class="reg-box">
				<div class="logo">
					<div class="main-logo">
						<a href="#">
							<h2 id="index-logo" style="color:#6195FF; margin-bottom: 0px;border-bottom: 2px solid white;">D<span style="font-size: 20px; color:white">raggable</span> P<span style="font-size: 20px;color:white">rototype</span></h2>
						</a>
					</div>
					<h2 class="logo-caption"><span class="tweak">R</span>egister</h2>
					<br>
				</div><!-- /.logo -->
				
				<div class="alert alert-danger text-center login-alert text-bold" style="display: none" id="signUpError">
				</div>

				<div class="controls">
                    <input type="text" id="first-name" name="first-name" placeholder="First Name" class="form-control login-btn-padding mb-1" />
					<input type="text" id="last-name" name="last-name" placeholder="Last Name" class="form-control login-btn-padding mb-1" />
					<input type="text" id="email-name" name="email-name" placeholder="Email" class="form-control login-btn-padding mb-1" />
					<div class="password-box"><input type="password" id="password" name="password" placeholder="Password" class="form-control login-btn-padding mb-1 show-password" /><span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password upper-eye"></span></div>
					<div class="password-box"><input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="form-control login-btn-padding mb-1 show-password" /><span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password upper-eye"></span></div>
					<input type="submit" id="btnRegister" class="main-btn width-48per" value="Register">
					<input type="button" id="btnSignUp" class="main-btn width-48per pull-right" value="Back" onclick="location.href='<?php echo base_url()?>login';">
				</div><!-- /.controls -->
			</div><!-- /#login-box -->
	</div><!-- /.container -->
<div id="particles-js"></div>

<!-- </body> Not write the this because this is already closed in the footer file -->

<?php include('user/masterpage/footer.php'); ?>