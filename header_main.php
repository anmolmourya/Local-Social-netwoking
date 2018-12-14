<?php
session_start();
include("connection.php");
$user = $_SESSION['user_mobile'];
	   $get_user = "select * from users where user_mobile='$user'";
	   $run_user = mysqli_query($conn,$get_user);
	   $row = mysqli_fetch_array($run_user);
	   
	   $user_name = $row['user_name'];
	   $user_surname = $row['user_surname'];
	   $user_mobile = $row['user_mobile'];
	   $user_image = $row['user_image'];
	   $user_id =$row['user_id']; 
?>
<html>
 <head>
    <meta charset="UTF-8">
	<link type="text/css" href="header_main.css" rel="stylesheet">
 </head>
 <body>
  <div class="header" >
   <div class="header_name" >                                 <h1> IET LUCKNOW <h1>                       </div>
   <div class="header_search" href="" target="_blank"> 
        <form  method="get" class="example" action="search_results.php">
             <input type="text" class="input_bar" placeholder="Search...." name="search_query">
             <button type="submit" class="input_button" name="search" > SEARCH </button>
        </form>
   </div>
   <div class="header_picture" href="" target="_blank" >    <?php echo "<img  src='$user_image' width='60%' height='70%' style='margin:15%;border-radius:25px;'/>";  ?> </div>
   <div class="header_home" href="" target="_blank" >   <a href="header.php">                                       HOME </a></div>
    <div class="header_profile" href="index.php" target="_blank" > <a href="profile.php"> PROFILE </a>
       
    </div>
   <div class="header_logout" href="" target="_blank" >      <a href="log_out.php">       LOGOUT </a>                        </div>
   <div class="header_messages" href="" target="_blank" >                                                           MESSAGES     </div>
   <div class="header_student_name" href="" target="_blank" > <?php echo $user_name;  ?>                                       </div>
  </div>
  <div class="header_bottom_line">  </div>
    
 </body>

</html>

