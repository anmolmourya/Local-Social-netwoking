<?php
$query = "select * from posts";
$result = mysqli_query($conn, $query);

//count total records
$total_posts = mysqli_num_rows($result);

//using ceil function divide total records pr page
$total_pages = ceil($total_posts/$per_page);

//going to first page
echo "
      <center>
	  <div id='pagination'>
	  <a href='header.php?page=1'> First page</a>
     ";
	 
	 for($i=1;$i<=$total_pages;$i++)
	 {
		 echo "<a href='header.php?page=$i'> $i </a>";
	 }
     
	 echo "<a href='header.php?page=$total_pages'> last page </a></center></div>";
	 

?>