<?php 
  //include("functions.php");
  //include("header_main.php");
  
  
?>
<html>
<head></head>

<body>

<?php
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
		     $user_image= $row_posts['user_image'];
		     $user_name= $row_posts['user_name'];
		     $user_surname= $row_posts['user_surname'];
		     $user_phone= $row_posts['user_mobile'];
		     $user_dob= $row_posts['user_birthday'];
		     echo "<div id='posts' style='border:1px solid blue;margin-top:10px;padding-left:5px;'>
		        <p> <img src='$user_image' width='50' height>&nbsp;&nbsp;&nbsp; $user_name &nbsp;&nbsp;&nbsp;
		        $user_surname ,&nbsp;&nbsp;$user_phone </p>
		        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $user_dob</p>
	            </div><br>";
	      }
	 if($c>0)
	 {
	     echo "<h2>total result found = $c </h2>" ;
	 }
	 if($c ==0)
	 {
		 echo "<script> alert('no result found !!!!...') </script>";
	 }
   }
   
   
	 ?>

</body>
</html>