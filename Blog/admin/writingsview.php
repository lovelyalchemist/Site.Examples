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
<div>
	<a href="writings.php">Add New Record</a>
<?php
	$sql = "SELECT id, title, body FROM posts";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {

			$body = htmlspecialchars_decode($row['body']);
			?> 
			<div class="text-body">
			 <?php
				echo "" .$body. "";
			 ?>
			</div>
			<div class="buttonsfortext">
				<div class="text-button"> 
					<?php
					echo "<a href='writings.php?id=" .$row["id"]. "'>Edit</a>";
					?>
				</div>	
				<div class="text-button">
					<?php
					echo "<a href='delete.php?id=" .$row["id"].  "'>Delete</a>";
					?>
				</div> 
			</div>
		<?php
		}
	}else {
		echo "0 results";
	}
	// show an error if there is an issue with the database query

// close database connection


?>
</div>
</div>
</body>
</html>