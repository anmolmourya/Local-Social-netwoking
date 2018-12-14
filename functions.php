<?php
include("connection.php");
function display_posts()
{
	global $conn;
	
	$per_page=5;
	if(isset($_GET['page']))
	{
		$page= $_GET['page'];
	}
	else
	{
	   $page=1;
	}
	$start_from = ($page-1)*$per_page;
	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";
	$run_posts = mysqli_query($conn,$get_posts);
	
	while($row_posts = mysqli_fetch_array($run_posts))
	{
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
//$post_id = $row_posts['post_subject'];
		$post_title = $row_posts['post_title'];
		$post_content = substr($row_posts['post_content'],0,330);
		$post_date = $row_posts['post_date'];
// getting user details
		$user = "select * from users where user_id='$user_id'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];	
// DISPLAY THE POSTS------
	  echo "<div id='posts' style='border:1px solid blue;margin-top:10px;padding-left:5px;'>
		  <p> <img src='$user_image' width='50' height>&nbsp;&nbsp;&nbsp; <a href=''>$user_name</a> &nbsp;&nbsp;&nbsp;
		   $post_title ,&nbsp;&nbsp;&nbsp;$post_date </p>
		  <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$post_content .... <a href=''>See Full</a></p>
		  <a href='single_post.php?post_id=$post_id' style='float:right;'> <button> view full content and replies...</button></a>
	  </div><br>";
	}	
	include("pagination.php");
}

function single_post()
{
	    if(isset( $_GET['post_id']))
		{
        global $conn;
//echo "bjhjhgjh";
		$get_id=$_GET['post_id'];
		$get_post = "select * from posts where post_id='$get_id'";
	    $run_post = mysqli_query($conn,$get_post);
	    $row_post = mysqli_fetch_array($run_post);
		$post_id= $row_post['post_id'];
//echo "$post_id";
		$user_id = $row_post['user_id'];
		$post_title = $row_post['post_title'];
		$post_content = $row_post['post_content'];
		$post_date = $row_post['post_date'];
// getting user details
		$user = "select * from users where user_id='$user_id'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
// DISPLAY THE POSTS------
	  echo "<div id='posts' style='border:1px solid blue;margin-top:10px;padding-left:5px;'>
		  <p> <img src='$user_image' width='50' height>&nbsp;&nbsp;&nbsp; <a href=''>$user_name</a> &nbsp;&nbsp;&nbsp;
		   $post_title &nbsp;&nbsp;&nbsp; $post_date </p>
		  <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$post_content </p>
	   </div><br>";
		}
}

function serch_result()
{
  if(isset($_GET['search']))
	{
		$c=0;
		    global $conn;
		    $search_query = $_GET['search_query'];
	        $get_query= "select * from users where user_name='$search_query'";
	        $run_query = mysqli_query($conn,$get_query);
	      while($row_posts=mysqli_fetch_array($run_query))
	      {
			 $c=$c+1;
			 echo "user no : $c";
		     $user_image= $row_posts['user_image'];
		     $user_name= $row_posts['user_name'];
		     $user_surname= $row_posts['user_surname'];
		     $user_phone= $row_posts['user_mobile'];
		     $user_dob= $row_posts['user_birthday'];
		     echo "<div id='posts' style='border:1px solid blue;margin-top:10px;padding-left:5px;'>
		        <p> <img src='$user_image' width='50' height>&nbsp;&nbsp;&nbsp; $user_name &nbsp;
		        $user_surname ,&nbsp;&nbsp;$user_phone </p>
		        <p> &nbsp;&nbsp; $user_dob</p>
	            </div>";
	      }
	 if($c ==0)
	 {
		 echo "<script> alert('no result found !!!!...') </script>";
	 }
   }
   if($c ==0)
     echo "<h2>SORRY : no results found with this user name </h2>" ;
   else
	   echo "<h2> total result found = $c </h2>" ;
}
?>