<?php include('user/masterpage/header.php'); ?>
<body id="login-page">
	<div class="container">
			<div id="login-box">
				<div class="logo">
					<div class="main-logo">
						<a href="#">
							<h2 id="index-logo" style="color:#6195FF; margin-bottom: 0px;border-bottom: 2px solid white;">D<span style="font-size: 20px; color:white">raggable</span> P<span style="font-size: 20px;color:white">rototype</span></h2>
						</a>
					</div>
					<h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
					<br>
				</div><!-- /.logo -->
				<div class="alert alert-danger text-center login-alert text-bold" style="display: none" id="loginErrorCustom"></div>
				<?php if(!empty($this->session->flashdata('verify'))){
						echo $this->session->flashdata('verify');
					} 
				?>
				
				<div class="controls">
					<input type="text" id="user-name" name="user-name" placeholder="Username" class="form-control login-btn-padding mb-1" />
					<input type="text" id="user-password" name="user-password" placeholder="Password" class="form-control login-btn-padding mb-1" />
					<input type="submit" id="btnLogIn" class="btn btn-default btn-block btn-custom main-btn width-48per" value="Login">
					<input type="button" id="btnSignUp" class="btn btn-default btn-custom main-btn width-48per pull-right" value="Register?" onclick="location.href='<?php echo base_url()?>register';">
				</div><!-- /.controls -->
			</div><!-- /#login-box -->
	</div><!-- /.container -->
<div id="particles-js"></div>

<!-- </body> Not write the this because this is already closed in the footer file -->

<?php include('user/masterpage/footer.php'); ?>