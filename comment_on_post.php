<?php 
//session_start();
//include("connection.php");
if(isset($_POST['comment']))
{

	$content = mysqli_real_escape_string($conn,$_POST['content']);
	$var_code = mt_rand();


if(strlen($content)<1)
{
	echo "<script> alert('plzz write something first') </script>";
	exit();
}


    $insert = " insert into comments(user_id,content_content) values('$user_id','$content')";
    
	$query = mysqli_query($conn,$insert);
	
	if($query)
	{
		echo "<script> alert('comment successfully') </script>";
	}	
	else
	{
		echo "<script> alert('comment faild! ') </script>";
	}
}

?>