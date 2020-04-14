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

			
					?>
		
<?php
$id=$_REQUEST['id'];
$query = "DELETE FROM tbl_orderdetails WHERE id=$id"; 
$result = mysqli_query($connection,$query) or die ( mysqli_error());
header("Location: record.php"); 
?>