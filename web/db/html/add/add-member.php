<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>

<?php 
	$errors = array();

	$SID =	'';
	$FAMILY_ID = '';
	$START = '';
	$TEL_NUM = '';
	$GROUP_NO = '';
	$ADDRESS = '';

	if(isset($_POST['submit'])){

		$SID =	$_POST['SID'];
		$FAMILY_ID =$_POST['FAMILY_ID'];
		$START = $_POST['START'];
		$TEL_NUM = $_POST['TEL_NUM'];
		$GROUP_NO = $_POST['GROUP_NO'];
		$ADDRESS = $_POST['ADDRESS'];

		//checking required fields
		$req_fields  = array('SID','FAMILY_ID','START','TEL_NUM','GROUP_NO','ADDRESS');
		
		$errors = array_merge($errors,check_req_fields($req_fields));
		

		$max_len_fields  = array('TEL_NUM' => 10,'ADDRESS' => 100);

		$errors = array_merge($errors,check_max_len($max_len_fields));
		
		if(empty($errors)){
			//add data to database
			$SID = mysqli_real_escape_string($connection,$_POST['SID']);
			$FAMILY_ID = mysqli_real_escape_string($connection,$_POST['FAMILY_ID']);
			$START = mysqli_real_escape_string($connection,$_POST['START']);
			$TEL_NUM = mysqli_real_escape_string($connection,$_POST['TEL_NUM']);
			$GROUP_NO = mysqli_real_escape_string($connection,$_POST['GROUP_NO']);
			$ADDRESS = mysqli_real_escape_string($connection,$_POST['ADDRESS']);

			$query = "CALL addMember('{$SID}','{$FAMILY_ID}','{$START}','{$TEL_NUM}','{$GROUP_NO}','{$ADDRESS}')";

			$result = mysqli_query($connection,$query);

			if($result){
				header('Location: ../admin/admin-members.php?user_added=true');
			}else{
				$errors[] = 'Failed to add the new record.';
			}
		}

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add-New-Member</title>
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
					<a href="../admin/admin-members.php"> Back to Admin</a>
				</p>
			</div>
		</div><!-- top_bar -->

		<div class="addin">

			<?php 
				if(!empty($errors)){
					display_errors($errors);
				}
			 ?>
			
			<form action="add-member.php" method="post">

				<table>

				<tr>
					<td><label>SID </label></td>
					<td><input type="text" name="SID" <?php echo 'value = "'. $SID .'"'; ?> ></td>
				</tr>

				<tr>
					<td><label>Family ID </label></td>
					<td><input type="text" name="FAMILY_ID" <?php echo 'value = "'. $FAMILY_ID .'"'; ?> ></td>
				</tr>

				<tr>
					<td><label>Date </label></td>
					<td><input type="text" name="START" value=" <?php echo date('Y-m-d');?> "></td>
				</tr>

				<tr>
					<td><label>Tel Number </label></td>
					<td><input type="text" name="TEL_NUM" <?php echo 'value = "'. $TEL_NUM .'"'; ?> ></td>
				</tr>

				<tr>
					<td><label>Group No </label></td>
					<td><input type="text" name="GROUP_NO" <?php echo 'value = "'. $GROUP_NO .'"'; ?> ></td>
				</tr>

				<tr>
					<td><label>Address </label></td>
					<td><input type="text" name="ADDRESS" <?php echo 'value = "'. $ADDRESS .'"'; ?> ></td>
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