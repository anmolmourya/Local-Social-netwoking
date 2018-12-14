<?php
//session_start();
//include("connection.php");
if(isset($_POST['post']))
{
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$content = mysqli_real_escape_string($conn,$_POST['content']);
	$var_code = mt_rand();

if(strlen($title)<1)
{
	echo "<script> alert('password should be minimum 8 characters') </script>";
	exit();
}
if(strlen($content)<1)
{
	echo "<script> alert('password should be minimum 8 characters') </script>";
	exit();
}

    $insert = " insert into posts(user_id,post_title,post_content) values('$user_id','$title','$content')";
	$query = mysqli_query($conn,$insert);
	
	if($query)
	{
		echo "<script> alert('posted successfully') </script>";
	}	
	else
	{
		echo "<script> alert('post faild! ') </script>";
	}
}
?>