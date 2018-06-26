<?php 
	@ob_start();
	
	$file_name = '';
	$upload_to = '';
	$error = '';

	if (isset($_GET['name']) && isset($_GET['path'])) {
		# code...
		$file_name = $_GET['name'];
		$upload_to = $_GET['path'];
	}else{
		//header("Location:modify.php");
	}

	$file_uploaded = '0';
	//$print1 = '';
	//$print2 = '';

	if (isset($_POST['submit'])) {
		# code...
		/*echo "<pre>";
		print_r($_FILES);
		echo "</pre>";*/

		$file_name = $_POST['name'];
		$file_type = $_FILES['image']['type'];
		$file_size = $_FILES['image']['size'];
		$file_tmp_name = $_FILES['image']['tmp_name'];

		$upload_to = $_POST['path'];

		if ($file_type == "image/jpeg" && $file_size < '1048576') {
			$file_uploaded = move_uploaded_file($file_tmp_name, $upload_to.$file_name);
		}else{
			$error = "Image type isn't valid or Image size > 1MB";
		}
		


	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
	<style type="text/css">
		.middle {
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    transform: translate(-50%, -50%);
		    text-align: center;
		    margin-top: -50px;
		}
		.print{
			
			color: red;
		}
	</style>
</head>
<body>
	<div class="container middle">
		<h1>Image Upload</h1>
		<h3>Choose an jpg Image and click Upload</h3>

		<form action="change-pic.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="name" value="<?php echo $file_name; ?>">
			<input type="hidden" name="path" value="<?php echo $upload_to; ?>">
			<input type="file" name="image" id="">
			<button type="submit" name="submit">Upload / Reset</button>
			<!-- <button type="reset">Reset</button> -->
		</form>

		<?php 
			if ($file_uploaded) {
				
				header("Location:modify.php");
			}
			
		 ?>
		 <div class="print">
		 	<?php 
		 	echo '<img src = "'.$upload_to.$file_name.'" style = "height:200px">';
		 	echo $error; ?>
		 </div>
	</div>

</body>
</html>