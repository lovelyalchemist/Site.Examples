<?php 
include'dbcon.php';
include 'header.php';
 ?>
<div class="articles"> 
	<div class="posts">
		<?php 
			$sql = "SELECT id,body FROM posts";
			$result = $con->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			    	$body = htmlspecialchars_decode(substr($row['body'],0, 220));
			    	?>
			    	<div class="box">
			    	<?php
			        echo "" . $body. "";
			        echo "<a href='writingsview.php?id=" .$row["id"]. "'>...Devamı için Tıklayınız</a>";
			    	?>
			    	<div class="share">
				    	<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				    	<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
				    	</div>
				    </div>	
			    	<?php
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>