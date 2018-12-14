<?php 
	include("connection.php");
  include("post_php.php");
  include("functions.php");
  
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
                          <h2 class="post_head"> What's in your mind today.....</h2>
                         <form name="timeline_post" id="form2" method="post" action="" >
	                         							 
                             <input type="text"  name="title" placeholder=" topic you want to share...." autofocus required  > </input>  <br><br>
                             <textarea name="content" cols="100" rows="10" placeholder="What is in your mind...." autofocus required >   </textarea> <br>		 
                             
							 <button  name="post"> POST </button>

                         </form>
						 <div class="post_middle_topline">  </div>
						 <h1 class="post_hea"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Most recent disscussions.....</h1>
                              <?php			display_posts();  ?> 
 </div>
 
      <!--   POSTS PORTION STARTS HERE    -->
  
 <div class="post_right">  
  </div>

</body>
</html>

