<?php 
  include("header_main.php");
  include("connection.php");
  include("functions.php");
  include("comment_on_post.php");
?>



<html>
<head>
  <link type="text/css" href="post.css" rel="stylesheet">
</head>

<body>

 <div class="post_left">  

 </div>

         <!--   POSTS PORTION STARTS HERE    -->
  <div class="post_middle">  
                    <div class="post_middle_topline">  </div>
                         	<h1 class="post_hea"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Full Post...</h1>
                              <?php	 single_post();  ?> 
							  
						<h2 class="post_head"> Comments...</h2>
                         <form name="timeline_post_comment" id="comment" method="post" action="" >	 
                             <textarea name="content" cols="80" rows="2" placeholder="comment your view..." autofocus required >   </textarea> 		 
							 <button  name="comment"> COMMENT </button>
                         </form>
						 <?php 
						  echo $_GET['post_id'];
						 ?>
 </div>
 
      <!--   POSTS PORTION STARTS HERE    -->
 
 <div class="post_right">  
  </div>

</body>
</html>

