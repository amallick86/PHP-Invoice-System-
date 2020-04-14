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
		$cser=mysqli_connect("localhost","root","","user");
					
					$id=$_REQUEST['id'];
					$query = "SELECT * from tbl_orderdetails where id='".$id."'"; 
					$result = mysqli_query($cser, $query) or die ( mysqli_error());
					$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Solar Energy a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

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

		<!-- //Header -->
		<div class="container">
							<h3 class="heading">Edit Bill of</h3> 
							<h3><?php echo $row['vendorname'];?> </h3><br><br>
							
							<form name="form" method="post" action=""> 
							<fieldset>
							<input type="hidden" name="new" value="1" />
							Pan Number:-
							<?php echo $row['pan'];?><br><br>
							Vat number:-
							<?php echo $row['vat'];?><br><br>
							Bill ID:-
							<?php echo $row['id'];?><br><br>
							Order ID:-
							<input type="number" name="order_id"  value="<?php echo$row['order_id'];?>" readonly /><br><br>
							Vendor ID:-
							&nbsp <input type="text" name="vendor_id" value="<?php echo $row['vendor_id'];?>" /><br><br>
							Vendor Name:-
							&nbsp <input type="text" name="vendorname" value="<?php echo $row['vendorname'];?>" /><br><br>
							Date:-
							&nbsp &nbsp <input type="date" name="date" value="<?php echo $row['date'];?>" /><br><br>
							Ledger / Particular:-
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="Product_name" value="<?php echo $row['Product_name'];?>" /><br><br>
							Amount dr :-
							<input type="Number" name="amountdr" value="<?php echo $row['amountdr'];?>" /><br><br>
							Amount cr :-
							<input type="Number" name="amountcr" value="<?php echo $row['amountcr'];?>" /><br><br>
	
							<input type="submit" value="Update" name="submit"><br><br>
							
							</fieldset >
							</form>

					<?php
			
					
									
					$status = "";
					if(isset($_POST['new']) && $_POST['new']==1)
						{
						$id=$_REQUEST['id'];
						$order_id = $_REQUEST['order_id'];
						$vendor_id = $_REQUEST['vendor_id'];
						$vendorname =$_REQUEST['vendorname'];
						$date =$_REQUEST['date'];
						$Product_name = $_REQUEST['Product_name'];
						$amountdr =$_REQUEST['amountdr'];
						$amountcr = $_REQUEST['amountcr'];
						
					//	$ins_query="insert into vendor (`id`,`trn_date`,`fname`,`lname`,`gender`,`email`,`phonenumber`,`mobile`,`company`,`branch`,`submittedby`) 
					//	values ('','$trn_date','$fname','$lname','$gender','$email','$phonenumber','$mobile','$company','$branch','$submittedby')";
						
						$update="update tbl_orderdetails set  
							   order_id='".$order_id."', 
							   vendor_id='".$vendor_id."', 
							   vendorname='".$vendorname."',
							   date='".$date."',
							   Product_name='".$Product_name."', 
							   amountdr='".$amountdr."',
							   amountcr='".$amountcr."' 
							    where id='".$id."'";
							   
						mysqli_query($cser,$update) or die(mysql_error());
						
						//if($result)
						//{
						//	echo "Registration Successfully";
					//	}
						//else{
						//	echo "failed:";
					//	}
						
						
						$status = "New Record Inserted Successfully.</br></br><a href='record.php'>View Inserted Record</a>";
						}

				
					?>
								</div>
							
					</div>

<!-- //banner -->




<!-- copyright -->
<div class="wthree_copy_right">
	<div class="container">
		<p>&copy; 2019 XYZ Private COmpany. All rights reserved | Design by <a href="http://facebook.com/amallick86">Aashish Mallick</a></p>
			
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