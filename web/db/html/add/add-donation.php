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
		$req_fields  = array('SID','DON_DATE','COMMENT');
		
		$errors = array_merge($errors,check_req_fields($req_fields));
		

		$max_len_fields  = array('COMMENT' => 50);

		$errors = array_merge($errors,check_max_len($max_len_fields));
		
		if(empty($errorsr)){
			//add data to database
			$SID_array = array();
			$SID_array = explode(",",mysqli_real_escape_string($connection,$_POST['SID']));
			$COMMENT = mysqli_real_escape_string($connection,$_POST['COMMENT']);
			$DON_DATE = mysqli_real_escape_string($connection,$_POST['DON_DATE']);

			$x = 1; 

			while($x <= sizeof($SID_array)) {
				$SID = $SID_array[$x-1];
			    $query = "CALL storeDon('{$SID}','{$DON_DATE}','{$COMMENT}')";

				$result = mysqli_query($connection,$query);
			    $x++;
			} 

			if($result){
				header('Location: ../admin/admin-donation.php?don=true');
			}else{
				$errors[] = 'Failed to add the new record.';
			}
		}

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add-Donation</title>
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
					<a href="../admin/admin-donation.php"> Back to Admin</a>
				</p>
			</div>
		</div><!-- top_bar -->

		<div class="addin">

			<?php 
				if(!empty($errors)){
					display_errors($errors);
				}
			 ?>
			
			<form action="add-donation.php" method="post">

				<table>

				<tr>
					<td><label>SID </label></td>
					<td><input type="text" name="SID" ></td>
				</tr>

				<tr>
					<td><label>Date </label></td>
					<td><input type="text" name="DON_DATE" value = "<?php echo date('Y-m-d');?>" ></td>
				</tr>

				<tr>
					<td><label>Comment </label></td>
					<td><input type="text" name="COMMENT" ></td>
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