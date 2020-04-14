<?php 
session_start();
    include_once 'class.user.php';
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

<?php 
require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$pdf->Cell(40,10,"id");

 
$pdf->output();
?>


<div class="container">
			<div class="flexslider-info">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
						

							<li>
							<h3 class="heading">Edit Bill</h3>
							
							<form name="form" method="post" action=""> 
							<fieldset>
							<input type="hidden" name="new" value="1" />
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