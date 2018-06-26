<?php 
	@ob_start();
	require_once('../page/con_page.php');

?>

<?php 
	
	if (isset($_GET['user_id'])) {
		# code...
		//getting deatials
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);

		$query = "DELETE from page where user_name = '{$user_id}'";

		$result_set = mysqli_query($connection, $query);

		if($result_set){
			//user found
			header('Location: admin.php?user_delete=yes');
		
		}else{
			//query unsessesfull
			//header('Location: admin.php?user_delete=no');
		}
	}

 ?>

<?php mysqli_close($connection); ?>