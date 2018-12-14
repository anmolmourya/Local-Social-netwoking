<?php
session_start();

include("connection.php");

if(isset($_POST['log_in']))
{
	
	$phone = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);
	
	
	$select_user = "select * from users where user_mobile='$phone' AND user_pass='$pass'";
	
	$query = mysqli_query($conn,$select_user);
	$check_user = mysqli_num_rows($query);

	if($check_user==1)
	{	
		$_SESSION['user_mobile'] = $phone;
		echo "<script> window.open('header.php','_self') </script>";
	}
	else
	{
		echo "<script> alert('data is wrong !!!!1.....') </script>";
	}
}
?>