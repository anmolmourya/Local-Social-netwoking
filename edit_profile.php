<?php
include("connection.php");
if(isset($_POST['edit_profile']))
{
	$phone = mysqli_real_escape_string($conn,$_POST['Phone_Number']);
	$name = mysqli_real_escape_string($conn,$_POST['first_name']);
	$surname = mysqli_real_escape_string($conn,$_POST['Surname']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$dob = mysqli_real_escape_string($conn,$_POST['dob']);
	$var_code = mt_rand();

$check_phone = "select * from users where user_mobile='$phone'";
$run_phone = mysqli_query($conn,$check_phone);
$check = mysqli_num_rows($run_phone);
if($check==1)
{
	echo "<script> alert('phone already exists.') </script>";
	exit();
}
$check_email = "select * from users where user_email='$email'";
$run_email = mysqli_query($conn,$check_email);
$check = mysqli_num_rows($run_email);
if($check==1)
{
	echo "<script> alert('email already exists.') </script>";
	exit();
}

    $insert = " insert into users(user_name,user_surname,user_mobile,user_image,user_email,user_birthday) values('$name','$surname','$phone','default.jpg','$email','$dob')";
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