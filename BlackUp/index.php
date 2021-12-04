<?php //include ('server.php'); 
	  include ('functions.php');
?>

<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Video Upload</title>
    <link rel="stylesheet" href="style.css">  
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>

<body>
    <nav class="navbar navbar-default">
		<div class="container-fluid">
        <a href="index.php" class="navbar-brand"> Home </a>
    <!-- logged in user information -->
            <h5 align = 'right'> Welcome <strong><?php echo $_SESSION['username']; ?></strong> </h5>
            <h5 align = 'right'> <a href="index.php?logout='1'" style="color: red;">Logout</a> </h5>
		</div>
	</nav>
	
    <!-- Video Upload Page -->
    <div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Upload Video</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Video</button>
		<br /><br />
		<hr style="border-top:3px solid #ccc;"/>
		<?php
			require 'server.php';
			
			$query = mysqli_query($conn, "SELECT * FROM `video` ORDER BY `video_id` ASC") or die(mysqli_connect_error());
			while($fetch = mysqli_fetch_array($query)){
		?>
		<div class="col-md-12">
			<div class="col-md-4" style="word-wrap:break-word;">
				<br />
				<h4>Video Name</h4>
				<h5 class="text-primary"><?php echo $fetch['video_name']?></h5>
			</div>
			<div class="col-md-8">
				<video width="100%" height="240" controls>
					<source src="<?php echo $fetch['location']?>">
				</video>
			</div>

     <!-- Option delete and get link Button -->
    <tr>
	    <td><a href="delete.php?del=<?php echo $fetch['video_name']; ?>" class="btn btn-danger" class="glyphicon glyphicon-remove"><span class="glyphicon glyphicon-remove"></span> Delete </a></td>
		<td><a target="_blank" href="getlink.php?get=<?php echo $fetch['video_id']; ?>" class="btn btn-info" class="glyphicon glyphicon-link"><span class="glyphicon glyphicon-link"></span> Get Link </a></td>
	</tr>

			<br style="clear:both;"/>
			<hr style="border-top:1px groovy #000;"/>
		</div>
		<?php
			}
		?>       
	</div>
    
    <!-- Option Add Video Button -->
	<div class="modal fade" id="form_modal" aria-hidden="true" role="dialog">
		<div class="modal-dialog">
			<form action="save_video.php" method="POST" enctype="multipart/form-data" style = "width: 100%"> 
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Video File</label>
								<input type="file" name="video" class="form-control-file"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>