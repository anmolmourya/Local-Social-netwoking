<?php
//session_start();
include("connection.php");
	  
?>
<!--   HEADER HTML STARTS HERE   -->
<?php
   include("header_main.php");
   //include("edit_profile.php");
?>
<html>
 <head>
    <meta charset="UTF-8">
	<link type="text/css" href="profile.css" rel="stylesheet">
 </head>
 
 <body>
    <!--     PROFILE BASE STARTS HERE       -->
	 <div>
	         <!--     PROFILE BASE    LEFT     STARTS HERE       -->
	      <div class="profile_left" > 
	        <div class="profile_picture">   <?php echo "<img  src='$user_image' width='100%' height='180' />";  ?> </div>
			<div class="profile_name"> <h2> <?php echo $user_name; ?> &nbsp; <?php echo $user_surname; ?> </h2>  </div>
			<div class="profile_email">  email: <?php echo $user_mobile; ?>  </div>
			<div class="profile_data">
			     CONTACT NO  :       <?php echo $user_mobile; ?>   <br>
				 DATE OF BIRTH:         <br>
				 STATE     :            <br>
				 CITY:                  <br>
				 MEMBER SINCE:          <br>
				 NO OF POSTS:           <br>
			</div>
	      </div>
	 
	         <!--     PROFILE   BASE   RIGHT    ENDS   HERE       -->
	      <div class="profile_right" >
		  
	                  <div class="edit_your_profile" >   <h1>EDIT YOUR PROFILE </h1>    </div>
					  <div class="edit_data_profile" >   
					    <form name="save_profile" id="form" method="post" action="" enctype="multipart/form-data">
                             
                             <input type="text" name="first_name" placeholder="&nbsp;&nbsp;&nbsp;First Name" autofocus required autocomplete="on" value="<?php echo $user_name; ?>" disabled="disabled" > </input> 
                             <input type="text" name="surname" placeholder="&nbsp;&nbsp;&nbsp;Surname" autofocus required autocomplete="on" value="<?php echo $user_surname; ?>" disabled="disabled" > </input>  <br><br>
							 <input type="text" class="email_bar" name="email" placeholder="&nbsp;&nbsp;&nbsp;Enter your Email" autofocus required autocomplete="on" > </input>  
							 <select name="gender">
                                  <option value="male">MALE</option>
                                  <option value="female">FEMALE</option>
                             </select>  <br><br>
							 <input type="text" name="Phone_Number" placeholder="&nbsp;&nbsp;&nbsp;Phone Number" autofocus required autocomplete="on" value="<?php echo $user_mobile; ?>" disabled="disabled" > </input>
                             <input type="text" name="dob" placeholder="&nbsp;&nbsp;&nbsp;dd/mm/yyyy" autofocus required > </input> <br><br>
							 <input type="text" name="state" placeholder="&nbsp;&nbsp;&nbsp;enter your State" autofocus required autocomplete="on" > </input>
                             <input type="password" name="pass" placeholder="&nbsp;&nbsp;&nbsp;enter your password" autofocus required  > </input> <br><br>
							 PROFILE PICTURE<input type="file" name="fileToUpload" id="fileToUpload"><br>
                             <button  name="edit_profile"> UPDATE </button>

                         </form>	
<?php
  if(isset($_POST['edit_profile']))
  {
	 //$phone = $_POST['Phone_Number'];
	 //$name = $_POST['first_name'];
	 //$surname = $_POST['surname'];
     $user_email=$_POST['email'];
     //$user_state=$_POST['state'];
     $user_pass=$_POST['pass'];
     $user_dob=$_POST['dob'];
     $user_gender=$_POST['gender'];
	 $user_image=$_FILE['fileToUpload']['name'];
	 $image_temp=$_FILE['fileToUpload']['tmp_name'];
	 move_uploaded_file($image_temp,"pics/$user_image");
	 
	 $update = "update users set user_email='$user_email',user_birthday='$user_dob',user_pass='$user_pass',
                user_gender='$user_gender',user_image='$user_image' where user_id='$user_id'";
        $run = mysqli_query($conn,$update);
       if($run)
	   {
		   echo "<script> alert('profile updated')</script>";
	   }		   
  }
?>
		  </div>
      </div>
  </div>
 </body>

</html>



