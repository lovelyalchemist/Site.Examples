<?php 
include('dbcon.php');
include 'header.php';
 ?>
	<div class="about">
		<div class="boxabout">  
		<?php 
			$sql = "SELECT title, body FROM about";
			$result = $con->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			    	$body = htmlspecialchars_decode($row["body"]);
			        echo "<div class='text-body'>";
			        echo "" . $body. "";
			        echo "</div>";
			    }
			} else {
			    echo "0 results";
			}
		$con->close();
		?>
		</div>
	</div>
</div>
</div>

