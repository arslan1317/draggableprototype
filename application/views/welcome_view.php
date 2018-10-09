<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Draggable Prototype</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="assets/css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="assets/css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="assets/css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/onepage.css"/>
	<!-- <link type="text/css" rel="stylesheet" href="assets/css/style.css"  -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="one-page-error text-center" id="one-page-error" style="display: none">
		<div class="one-page-error-text">
			<p style="margin-bottom: 0px;">All Fields are Required</p>
		</div>
	</div>
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('../draggableprototype/assets/images/background1.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.html">
							<h2 id="index-logo" style="color:#6195FF; margin-bottom: 0px;border-bottom: 2px solid white;">D<span style="font-size: 20px; color:white">raggable</span> P<span style="font-size: 20px;color:white">rototype</span></h2>
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#service">Services</a></li>
					<li><a href="#team">Team</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text">DESIGN YOUR OWN ANDROID APP</h1>
							<p class="white-text">Management Tool to create your Android App by Draggable functionality and After completing your design you can easily integrated with your android studio.</p>
							<a href="<?php echo base_url()?>login" class="white-btn">Get Started!</a>
							<a href="<?php echo base_url()?>register" class="main-btn">Register?</a>
						</div>
					</div>
					<!-- /home content -->

				</div>
			</div>
		</div>
		<!-- /home wrapper -->

	</header>
	<!-- /Header -->

	<!-- About -->
	<div id="about" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Welcome to Website</h2>
				</div>
				<!-- /Section header -->

				<!-- about -->
				<div class="col-md-3">
					<div class="about">
						<i class="fa fa-cogs"></i>
						<h3>Project</h3>
						<p>Update your Project Neccessary details</p>
						<a href="#">Read more</a>
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-3">
					<div class="about">
						<i class="fa fa-tasks" aria-hidden="true"></i>
						<h3>Task</h3>
						<p>Divide your Project into different Task</p>
						<a href="#">Read more</a>
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-3">
					<div class="about">
						<i class="fa fa-mobile"></i>
						<h3>Assign</h3>
						<p>Assign your project Task to any other User</p>
						<a href="#">Read more</a>
					</div>
				</div>
				<!-- /about -->

				<div class="col-md-3">
					<div class="about">
						<i class="fa fa-magic"></i>
						<h3>Supervisor</h3>
						<p>Assign Supervisor to manage all the Activities</p>
						<a href="#">Read more</a>
					</div>
				</div>

				<div class="col-md-3">
					<div class="about">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>
						<h3>Work Done</h3>
						<p>Wireframes, Mockup and Prototype done step by step</p>
						<a href="#">Read more</a>
					</div>
				</div>

				<div class="col-md-3">
					<div class="about">
						<i class="fa fa-bell-o" aria-hidden="true"></i>
						<h3>Notification</h3>
						<p>All Notification related to the Project</p>
						<a href="#">Read more</a>
					</div>
				</div>

				<div class="col-md-3">
					<div class="about">
						<i class="fa fa-android" aria-hidden="true"></i>
						<h3>Android Code</h3>
						<p>All code related to Android Studio is Downloaded</p>
						<a href="#">Read more</a>
					</div>
				</div>

				<div class="col-md-3">
					<div class="about">
						<i class="fa fa-book" aria-hidden="true"></i>
						<h3>Documentation</h3>
						<p>Documentation to integrated code.</p>
						<a href="#">Read more</a>
					</div>
				</div>
		
			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /About -->

	<!-- Service -->
	<div id="service" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">What we offer</h2>
				</div>
				<!-- /Section header -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-diamond"></i>
						<h3>Wire Frames</h3>
						<p>We provide assistance for making wire frames of a project</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-rocket"></i>
						<h3>Mockups</h3>
						<p>When wireframes are done Mockups will start</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-cogs"></i>
						<h3>Prototypes</h3>
						<p>Final deliverable product is protype of that product</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Service -->


	<!-- Why Choose Us -->
	<div id="features" class="section md-padding bg-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- why choose us content -->
				<div class="col-md-6">
					<div class="section-header">
						<h2 class="title" style="margin-bottom: 15px">Why Choose Us</h2>
					</div>
					<p>Technology is running so fast as the developer cannot stay on one technology, its neccessary for his to upgrade himself according to the new technology. We Provided you the simple draggable prototype in which you can make your android app by using draggable functionality, difference task of single project is given the user so user can create Wireframes, Mockups or Prototype according to the given task.</p>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Easy and Simple to Use.</p>
					</div>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>24/7 Availablity</p>
					</div>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Show same as shown in the android studio</p>
					</div>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Low resources in Design Process</p>
					</div>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Management Tool to track your project design completion</p>
					</div>
				</div>
				<!-- /why choose us content -->

				<!-- About slider -->
				<div class="col-md-6">
					<div id="about-slider" class="owl-carousel owl-theme">
						<img class="img-responsive height-420px" src="assets/images/newabout1.jpg" alt="">
						<img class="img-responsive height-420px" src="assets/images/about2.jpg" alt="">
						<img class="img-responsive height-420px" src="assets/images/about1.jpg" alt="">
						<img class="img-responsive height-420px" src="assets/images/newabout4.jpg" alt="">
					</div>
				</div>
				<!-- /About slider -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Why Choose Us -->


	<!-- Numbers -->
	<div id="numbers" class="section sm-padding">

		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('../draggableprototype/assets/images/background2.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-users"></i>
						<h3 class="white-text"><span class="counter">451</span></h3>
						<span class="white-text">Users</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-trophy"></i>
						<h3 class="white-text"><span class="counter">12</span></h3>
						<span class="white-text">Supervisors</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-coffee"></i>
						<h3 class="white-text"><span class="counter">154</span>K</h3>
						<span class="white-text">Projects</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-file"></i>
						<h3 class="white-text"><span class="counter">45</span></h3>
						<span class="white-text">Generated Codes</span>
					</div>
				</div>
				<!-- /number -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Numbers -->

	

	<!-- Team -->
	<div id="team" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Our Team</h2>
				</div>
				<!-- /Section header -->

				<!-- team -->
				<div class="col-sm-3">
					<div class="team">
						<div class="team-img">
                                                    <img class="img-responsive height-220px" src="assets/images/daniyal.jpg" alt="" width="100%">
							<div class="overlay">
								<div class="team-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</div>
							</div>
						</div>
						<div class="team-content">
							<h3>Daniyal Hussain</h3>
							<span>Full Stack Developer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-3">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive height-220px" src="assets/images/mirza.jpg" alt="" width="100%">
							<div class="overlay">
								<div class="team-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</div>
							</div>
						</div>
						<div class="team-content">
							<h3>Mirza Arslan Ali</h3>
							<span>Front-end Developer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-3">
					<div class="team">
						<div class="team-img">
                                                        <img class="img-responsive height-220px" src="assets/images/team1.jpg" alt="" width="100%">
							<div class="overlay">
								<div class="team-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</div>
							</div>
						</div>
						<div class="team-content">
							<h3>Waleed Ali</h3>
							<span>BACK-END DEVELOPER</span>
						</div>
					</div>
				</div>
				<!-- /team -->
				<div class="col-sm-3">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive height-220px" src="assets/images/mohsin.jpg" alt="" width="100%">
							<div class="overlay">
								<div class="team-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</div>
							</div>
						</div>
						<div class="team-content">
							<h3>Mohsin Bashir</h3>
							<span>Quality Engineer</span>
						</div>
					</div>
				</div>
			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Team -->

	<!-- Blog -->
	

	<!-- Contact -->
	<div id="contact" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">Get in touch</h2>
				</div>
				<!-- /Section-header -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-phone"></i>
						<h3>Phone</h3>
						<p>512-421-3940</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-envelope"></i>
						<h3>Email</h3>
						<p>draggableprototype@gmail.com</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-map-marker"></i>
						<h3>Address</h3>
						<p>IQRA University</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact form -->
				<div class="col-md-8 col-md-offset-2">
					<div class="contact-form">
						<input type="text" class="input" placeholder="Name" id="one-page-full-name">
						<input type="email" class="input" placeholder="Email" id="one-page-email">
						<input type="text" class="input" placeholder="Subject" id="one-page-subject">
						<textarea class="input" placeholder="Message" id="one-page-message"></textarea>
						<button class="main-btn" id="one-page-send-message">Send message</button>
					</div>
				</div>
				<!-- /contact form -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo">
						<a href="index.html">
							<h2 style="color:#6195FF; margin-bottom: 0px; margin-top: 6px;border-bottom: 2px solid white;display: inline;">D<span style="font-size: 20px; color:white">raggable</span> P<span style="font-size: 20px;color:white">rototype</span></h2>
						</a>
					</div>
					<!-- /footer logo -->

					<!-- footer follow -->
					<ul class="footer-follow">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<!-- /footer follow -->

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p>Copyright © 2018. All Rights Reserved. Designed by Draggable prototype group</p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.magnific-popup.js"></script>
    <script type="text/javascript" src="assets/js/onepage.js"></script>
</body>

</html>
