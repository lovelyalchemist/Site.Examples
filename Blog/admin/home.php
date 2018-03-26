<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>
<?php include ('header.php');?>
  <div class="content">
	<div class="text--animation">
		<div class="text__background">Welcome <?php echo $row['name']; ?> 	</div>
		<div class="text--big"> Welcome <?php echo $row['name']; ?> </div>
	</div> 	
</div>
</div>
</div>


