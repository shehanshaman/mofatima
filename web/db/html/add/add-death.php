<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>

<?php 
	$errors = array();

	if(isset($_POST['submit'])){

		//checking required fields
		$req_fields  = array('SID','NAME','GIVE_DATE');
		
		$errors = array_merge($errors,check_req_fields($req_fields));
		

		$max_len_fields  = array('NAME' => 50);

		$errors = array_merge($errors,check_max_len($max_len_fields));
		
		if(empty($errorsr)){
			//add data to database
			$SID = mysqli_real_escape_string($connection,$_POST['SID']);
			$NAME = mysqli_real_escape_string($connection,$_POST['NAME']);
			$GIVE_DATE = mysqli_real_escape_string($connection,$_POST['GIVE_DATE']);

			$query = "CALL storeDeth('{$SID}','{$NAME}','{$GIVE_DATE}')";

			$result = mysqli_query($connection,$query);

			if($result){
				header('Location: ../admin/admin-past.php?user_death=true');
			}else{
				$errors[] = 'Failed to add the new record.';
			}
		}

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add-Death</title>
	<link rel="stylesheet" type="text/css" href="../../css/add.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
</head>
<body>

	<div class="wrapper clearfix"></div>
		
		<div class="top_bar">
			<div class="db_name">
				<p>Welcome to User Mangement System</p>
			</div>
			<div class="user_id">
				<p> Hello <?php echo $_SESSION['user_name']; ?>  
					<a href="../admin/admin-past.php"> Back to Admin</a>
				</p>
			</div>
		</div><!-- top_bar -->

		<div class="addin">

			<?php 
				if(!empty($errors)){
					display_errors($errors);
				}
			 ?>
			
			<form action="add-death.php" method="post">

				<table>

				<tr>
					<td><label>SID </label></td>
					<td><input type="text" name="SID" ></td>
				</tr>

				<tr>
					<td><label>Name </label></td>
					<td><input type="text" name="NAME" ></td>
				</tr>

				<tr>
					<td><label>Date </label></td>
					<td><input type="text" name="GIVE_DATE" value="<?php echo date('Y-m-d');?> "></td>
				</tr>

				<tr>
					<td><label>&nbsp;</label></td>
					<td><button type="submit" name="submit">SAVE</button></td>
				</tr>
				
				</table>
			</form>

		</div>
	
	</div>
	<div class="bottom_bar">
		<div class="create">
			<p>Created By M.S.S.M PERERA</p>
		</div>
		<div class="link">
			<a href="../../">Fatima Church Home</a>
		</div>
	</div>
</body>
</html>

<?php mysqli_close($connection); ?>