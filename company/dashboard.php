
<?php require_once'mail.php'; ?>
<?php 
session_start();
    include_once 'include/class.user.php';
    $user = new User();

    $uid = $_SESSION['uid'];

    if (!$user->get_session()){
       header("location:login.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">

<!--FlexSlider-->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!--//FlexSlider-->
	
<link href="css/lsb.css" rel="stylesheet" type="text/css"><!-- gallery -->

<!-- custom css theme files -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<!-- //custom css theme files -->

<!-- google fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<!-- //google fonts -->

</head>
<!-- Body -->
<body>
<!-- banner -->
<div class="w3l-banner">
<div class="wthree-dot">
		<!-- nav -->
		<div class="header w3layouts">
				<div class="container-fluid">
					<nav class="navbar navbar-default">
						<div class="navbar-header navbar-left">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<h1><a class="navbar-brand" href="dashboard.php"><span>Company</span> Name</a></h1>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
							<nav>
								<ul class="nav navbar-nav">
									<li class="active"><a href="dashboard.php">Dashboard</a></li>
									<li class="active"><a href="addvendor.php">Add Vendor</a></li>
									<li class="active"><a href="vendor.php">Vendor</a></li>
									<li class="active"><a href="bill.php">Bill</a></li>
									<li class="active"><a href="record.php">Record</a></li>
									<li class="active"><a href="index.php">Logout</a></li>
								</ul>
								
							</nav>
						</div>
					</nav>
				</div>
			</div>
		<!-- //nav -->

		<!-- //Header -->
		<div class="container">
			<div class="flexslider-info">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
							<div class="w3l-info">
								<h2>Welcome to XYZ Private Ltd</h2>
								<p>Etiam vitae augue odio. Ut laoreet ipsum vel ultrices viverra. Donec nisl dolor, mollis vel libero id, 
								tempor cursus lectus. Vestibulum eu ligula et pharetra efficitur. Maecenas eleifend.</p>
								<ul>
									<li><a href="#" class="w3ls_more" data-toggle="modal" data-target="#myModal">Find More</a></li>
									<li><a href="#contact" class="scroll w3l_contact">Contact Us</a></li>
								</ul>
							</div>
							</li>
							<li>
								<div class="w3l-info">
									<h2>Welcome to XYZ Private Ltd</h2>
								<p>Etiam vitae augue odio. Ut laoreet ipsum vel ultrices viverra. Donec nisl dolor, mollis vel libero id, 
								tempor cursus lectus. Vestibulum eu ligula et pharetra efficitur. Maecenas eleifend.</p>
								<ul>
									<li><a href="#" class="w3ls_more" data-toggle="modal" data-target="#myModal">Find More</a></li>
									<li><a href="#contact" class="scroll w3l_contact">Contact Us</a></li>
								</ul>
								</div>
							</li>
							<li>
								<div class="w3l-info">
									<h2>Welcome to XYZ Private Ltd</h2>
								<p>Etiam vitae augue odio. Ut laoreet ipsum vel ultrices viverra. Donec nisl dolor, mollis vel libero id, 
								tempor cursus lectus. Vestibulum eu ligula et pharetra efficitur. Maecenas eleifend.</p>
								<ul>
									<li><a href="#" class="w3ls_more" data-toggle="modal" data-target="#myModal">Find More</a></li>
									<li><a href="#contact" class="scroll w3l_contact">Contact Us</a></li>
								</ul>
								</div>
							</li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<!-- //banner -->


<!-- Send a mail 
<h3 class="heading">Send a Mail</h3>
      <p>
		<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <input type="text" name="name" class="form-control" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" placeholder="Name" required="">
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" placeholder="Email address" required="">
    </div>
    <div class="form-group">
        <input type="text" name="subject" class="form-control" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" placeholder="Subject" required="">
    </div>
    <div class="form-group">
        <textarea name="message" class="form-control" placeholder="Write your message here" required=""><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
    </div>
    <div class="form-group">
        <input type="file" name="attachment" class="form-control">
    </div>
    <div class="submit">
        <input type="submit" name="submit" class="btn" value="SUBMIT">
    </div>
</form>
//send a mail -->




<!-- copyright -->
<div class="wthree_copy_right">
	<div class="container">
		<p>&copy; 2019 XYZ Company. All rights reserved | Design by <a href="http://facebook.com/amallick86">Aashish Mallick</a></p>
			
	</div>
</div>
<!-- //copyright -->

<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					 Solar energy
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="images/1.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
			</div>
		</div>
	</div>
<!-- //bootstrap-modal-pop-up --> 

<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- //Default-JavaScript-File -->

<!--Start-slider-script-->
	<script defer src="js/jquery.flexslider.js"></script>
		<script type="text/javascript">
		
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
<!--End-slider-script-->

<!-- testimonials required-js-files-->
							<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items : 1,
							        lazyLoad : true,
							        autoPlay : true,
							        navigation : false,
							        navigationText :  false,
							        pagination : true,
							      });
							    });
							    </script>
<!--// testimonials required-js-files-->

<!-- flexisel -->
		<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 4,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems:2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 2
					}
				}
			});
			
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<!-- //flexisel -->

<!-- gallery-pop-up -->
	<script src="js/lsb.min.js"></script>
	<script>
	$(window).load(function() {
		  $.fn.lightspeedBox();
		});
	</script>
<!-- //gallery-pop-up -->

<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
<!-- smooth scrolling -->

<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->
	
</body>
<!-- //Body -->
</html>