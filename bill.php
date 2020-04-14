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
		
	$con=mysqli_connect("localhost","root","","user");
	// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		  


	if(isset($_POST['save']))  
	{  
		$name=$_POST['name'];  
		$vendorname=$_POST['vendorname']; 
		$customer_id=$_POST['customer_id'];
		$date=$_POST['date'];
		for($i = 0; $i<count($_POST['productname']); $i++)  
			{  
			mysqli_query($con, "INSERT INTO tbl_orderdetails  
			SET 
			order_id= $customer_id,
			pan='{$_POST['pan']}',
			vat='{$_POST['vat']}',
			submittedby = $uid,
			date= '{$_POST['date']}', 
			vendor_id= '{$_POST['name']}', 
			vendorname= '{$_POST['vendorname']}', 
			product_name = '{$_POST['productname'][$i]}', 
			amountdr = '{$_POST['amountdr'][$i]}',
			amountcr = '{$_POST['amountcr'][$i]}'
			");			
			}  
	  
	}
	
	?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Invoice</title>
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
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>  
			<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>   
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
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

		
<br>

<?php
// define variables and set to empty values

?>
<form action="" method="POST">  
							<div class="box box-primary">  
								<div class="box-header">  
								<center><h3>XYZ Private Ltd.</h3></center>
		<center><h5>Janakpur<br>Cash Payment Voucher </h5> </center>
		<h5 style="float:right;">Pan no<span class="error">*</span>: <input type="text" name="pan">
		||Vat No<span class="error">*</span>: <input type="text" name="vat"> </h5>
		
										
						<div style="width:160px;">  
										Date <span class="error">*</span>
										<input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">  
									</div> 
								</div>  
								<div class="box-body">  
								<div class="form-group" style="width:500px;">  
										Order No.<span class="error">*</span>
										<input type="text" name="customer_id" class="form-control"  value="<?php echo rand(); ?>" >  
									</div> 
									<div class="form-group" style="width:500px;">  
										Recepient ID  
										<?php	
													$sql = "SELECT `id`,`fname`,`lname` FROM `vendor` order by fname";
													echo "<select name=name class='form-control' value=''>Vendor Name</option>"; // list box select command
														foreach ($con->query($sql) as $row){

															echo "<option value=$row[id]>$row[fname] $row[lname] ($row[id])</option>"; 
														}
													 echo "</select>";// Closing of list box

										?>
																						
									</div>  
									
									<div class="form-group" style="width:500px;">  
										Recepient Name 
										<span class="error">*</span>
										<input type="text" name="vendorname" class="form-control" > 
																				
									</div>  
									  
									
								</div>  
								
							</div>
							<table class="table table-bordered table-hover">  
								<thead>
																	
									<th>No</th>  
									
									<th>Ledger / Particular<span class="error">*</span></th>  
									<th>Debit - Amount</th>
									<th>Credit - Amount</th>  									
									<th><input type="button" value="+" id="add" class="btnbtn-primary"></th>  
								</thead>  
								<tbody class="detail">  
									<tr>  
										<td class="no">1</td>  
										<td><input type="text" class="form-control productname" name="productname[]"></td>  
										<td><input type="text" class="form-control amountdr" name="amountdr[]"></td>
										<td><input type="text" class="form-control amountcr" name="amountcr[]"></td>  
										<td><a href="#" class="remove">Delete</td>  
								</tr>  
								</tbody>  
								<tfoot>  
								  
								<th></th>
								<th>Total</th>  
								<th style="text-align:center;" class="totaldr">0<b></b></th>
								<th style="text-align:center;" class="totalcr">0<b></b></th>								
								</tfoot>  
								</table>
..............................&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp..............................<br>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Prepared
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Checked by<br><br>
..............................&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp..............................&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
..............................<br>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbspApproved by 
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIncloser
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRecived by
<br><br><br><br> 
<input id="printpagebutton" type="submit" class="btnbtn-primary" name="save" onclick ="printFunction()" value="Print and Save Record"> 
																
						</form>  


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
<script type="text/javascript">  
		function printFunction()
		{
			//Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
		}
		
		$(function()  
		{  
		$('#add').click(function()  
			{  
				addnewrow();  
			});
		
		$('body').delegate('.remove','click',function()  
			{  
			$(this).parent().parent().remove();  
			}); 
			
		$('body').delegate('.amountdr,.amountcrr,.discount','keyup',function()  
			{  
			var tr=$(this).parent().parent();  
			//var qty=tr.find('.quantity').val();  
			//var price=tr.find('.pricedr').val();  
	  
			//var dis=tr.find('.discount').val(); 
			var amount=tr.find('.amountdr').val(); 			
			var amt =(amount);  
			tr.find('.amountdr').val(amt);  
			totaldr();  
			}); 

		$('body').delegate('.amountdr,.amountcrr,.discount','keyup',function()  
			{  
			var tr=$(this).parent().parent();  
			//var qty=tr.find('.quantity').val();  
			//var price=tr.find('.pricecr').val();  
	  
			//var dis=tr.find('.discount').val();  
			var amount=tr.find('.amountcr').val(); 			
			var amt =(amount);  
			tr.find('.amountcr').val(amt);  
			totalcr();  
			});			
		}); 

		
		function totaldr()  
		{  
			var t=0;  
			$('.amountdr').each(function(i,e)   
				{  
				var amt =$(this).val()-0;  
				t+=amt;  
				});  
			$('.totaldr').html(t);  
		} 
		
		function totalcr()  
		{  
			var t=0;  
			$('.amountcr').each(function(i,e)   
				{  
				var amt =$(this).val()-0;  
				t+=amt;  
				});  
			$('.totalcr').html(t);  
		} 
			
			
			//-------------------------------------------------------------------------------------------------
			
			//------------------------------------------------------------------------------------------------
			
			
			function addnewrow()   
			{  
			var n=($('.detail tr').length-0)+1;  
			var tr = '<tr>'+  
			'<td class="no">'+n+'</td>'+ 
			'<td><input type="text" class="form-control productname" name="productname[]"></td>'+  
			'<td><input type="text" class="form-control amountdr" name="amountdr[]"></td>'+ 
			'<td><input type="text" class="form-control amountcr" name="amountcr[]"></td>'+  
			'<td><a href="#" class="remove">Delete</td>'+  
			'</tr>';  
			$('.detail').append(tr);   
			}  
</script>  