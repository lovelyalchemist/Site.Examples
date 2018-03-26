<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>
 <?php 

include ('header.php');

 ?>
 <div class="main">
<h1>About</h1>


<?php

	$sql = "SELECT id, title, body FROM about";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$body = htmlspecialchars_decode($row['body']);
			
			echo "" .$body. "";
			echo "<td><a href='aboutpost.php?id=" .$row["id"]. "'>Edit</a></td>";
			echo "<td><a href='delete.php?id=" .$row["id"].  "'>Delete</a></td>";
			
		}
	}else {
		echo "0 results";
	}
	// show an error if there is an issue with the database query

// close database connection


?>

</div>
</body>
</html>