<?php //include ('server.php'); 
	  include ('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
	<div class="col-md-4" style="word-wrap:break-word;">
<body>
	
		<?php
			require 'server.php';
			
			$query = mysqli_query($conn, "SELECT * FROM `video` ORDER BY `video_id` ASC") or die(mysqli_connect_error());
			while($fetch = mysqli_fetch_array($query)){
		?>
		<div class="col-md-12">	
			<div class="col-md-8">
				<video width="520%" height="1000" autoplay loop muted>
					<source src="<?php echo $fetch['location']?>">
				</video>
			</div>
			<br style="clear:both;"/>
			<hr style="border-top:1px groovy #000;"/>
		</div>
		<?php
			}
		?>
	</div>
	
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</div>
</html>