
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
<link href="css/calendar.css" type="text/css" rel="stylesheet" />
</head>
<!-- Body -->
<body>
<!-- banner -->
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
							<h1><a class="navbar-brand" href="dashboard.php"><span>XYZ Company</span> Pvt Ltd</a></h1>
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

		<div class="container">
			<center><h1>Dashboard</h1></center>
		<br><br>
		<?php 
			
			
			$host    = "localhost";
					$user    = "root";
					$pass    = "";
					$db_name = "user";


					//create connection
					$connection = mysqli_connect($host, $user, $pass, $db_name);
					
					//test if connection failed
					if(mysqli_connect_errno()){
					die("connection failed: "
					. mysqli_connect_error()
					. " (" . mysqli_connect_errno()
					. ")");
					}

$vendorsql = "SELECT * FROM vendor ";
$query = mysqli_query($connection,$vendorsql);
$countvendor = $query->num_rows;

$orderSql = "SELECT * FROM tbl_orderdetails ";
$orderQuery = mysqli_query($connection,$orderSql);
$countOrder = $orderQuery->num_rows;

$totalamountcr = 0;
while ($orderResult = $orderQuery->fetch_assoc()) {
	$totalamountcr += $orderResult['amountcr'];
}
$orderSql = "SELECT * FROM tbl_orderdetails ";
$orderQuery = mysqli_query($connection,$orderSql);
$countOrder = $orderQuery->num_rows;

$totalamountdr = 0;
while ($orderResult = $orderQuery->fetch_assoc()) {
	$totalamountdr += $orderResult['amountdr'];
}


$connection->close();

?>


<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>




<div class="row">
<div class="col-md-8">
		
			<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Calendar</div>
			
				<?php
include 'calendar.php';
 
$calendar = new Calendar();
 
echo $calendar->show();
?>
			
		
		
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="vendor.php" style="text-decoration:none;color:black;">
					Total Vendor
					<span class="badge pull pull-right"><?php echo $countvendor; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->

		<div class="col-md-4">
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="record.php?o=manord" style="text-decoration:none;color:black;">
					Total Record
					<span class="badge pull pull-right"><?php echo $countOrder; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		</div> <!--/col-md-4-->

	<div class="col-md-4">
		<div class="card">
		  <div class="cardHeader">
		    <h1><?php echo date('d'); ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
		  </div>
		</div> 
		<br/>

		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <h1><?php if($totalamountdr) {
		    	echo $totalamountdr;
		    	} else {
		    		echo '0';
		    		} ?></h1>
		  </div>
		 

		  <div class="cardContainer">
		    <p> <i class="glyphicon glyphicon-usd"></i> Total Amount DR</p>
		  </div>
		</div> 
		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <h1><?php if($totalamountcr) {
		    	echo $totalamountcr;
		    	} else {
		    		echo '0';
		    		} ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p> <i class="glyphicon glyphicon-usd"></i> Total Amount Cr</p>
		  </div>
		</div>
		
		
		
	</div>

	
</div> <!--/row-->



<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>

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