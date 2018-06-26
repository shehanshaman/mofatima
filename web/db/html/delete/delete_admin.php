<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>

<?php 
	
	if (isset($_GET['user_id'])) {
		# code...
		//getting deatials
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);

		$query = "DELETE from admins where user_name = '{$user_id}'";

		$result_set = mysqli_query($connection, $query);

		if($result_set){
			//user found
			header('Location: ../admin/admin-admin.php?user_delete=yes');
		
		}else{
			//query unsessesfull
			header('Location: ../admin/admin-admin.php?query_error');
		}
	}

 ?>

<?php mysqli_close($connection); ?>