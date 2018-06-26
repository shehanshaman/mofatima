<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>

<?php 
	
	if (isset($_GET['user_id']) && isset($_GET['name'])) {
		# code...
		//getting deatials
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
		$name = mysqli_real_escape_string($connection, $_GET['name']);

		$query = "DELETE from death where SID = {$user_id} AND NAME = '{$name}'";

		$result_set = mysqli_query($connection, $query);

		if($result_set){
			//user found
			header('Location: ../admin/admin-past.php?death_delete=yes');
			
		}else{
			//query unsessesfull
			header('Location: ../admin/admin-past.php?query_error');
		}
	}

 ?>

<?php mysqli_close($connection); ?>