<?php

include("connection.php");
if(isset($_POST['sign_up_form']))
{
	$phone = mysqli_real_escape_string($conn,$_POST['Phone_Number']);
	$name = mysqli_real_escape_string($conn,$_POST['first_name']);
	$surname = mysqli_real_escape_string($conn,$_POST['Surname']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$var_code = mt_rand();

$check_phone = "select * from users where user_mobile='$phone'";
$run_phone = mysqli_query($conn,$check_phone);
$check = mysqli_num_rows($run_phone);
if($check==1)
{
	echo "<script> alert('phone already exists.') </script>";
	exit();
}
if(strlen($password)<8)
{
	echo "<script> alert('password should be minimum 8 characters') </script>";
	exit();
}
    $insert = " insert into users(user_name,user_surname,user_pass,user_mobile,user_image) values('$name','$surname','$password','$phone','default.jpg')";   
	$query = mysqli_query($conn,$insert);
	if($query)
	{
		echo "<script> alert('form submitted successfully') </script>";
	}	
	else
	{
		echo "<script> alert('submission faild! ') </script>";
	}
}
?>