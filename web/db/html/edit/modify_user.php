<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>

<?php 
	$errors = array();

	$SID =	'';
	$user_id = '';
	$FAMILY_ID = '';
	$PAY = '';
	$START = '';
	$TEL_NUM = '';
	$ADDRESS = '';

	if (isset($_GET['user_id'])) {
		# code...
		//getting deatials
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);

		$query = "SELECT * from members where SID = {$user_id}";

		$result_set = mysqli_query($connection, $query);

		if($result_set){

			if(mysqli_num_rows($result_set) == 1){
				//user found
				$result = mysqli_fetch_assoc($result_set);
				$SID =	$result['SID'];
				$FAMILY_ID = $result['FAMILY_ID'];
				$PAY = $result['PAY'];
				$START = $result['START'];
				$TEL_NUM = $result['TEL_NUM'];
				$ADDRESS = $result['ADDRESS'];

			}else{
				//user not found
				header('Location: ../admin/admin-members.php?not_found');
			}
		}else{
			//query unsessesfull
			header('Location: ../admin/admin-members.php?query_error');
		}
	}


	if(isset($_POST['submit'])){

		$user_id = $_POST['user_id'];
		$SID =	$_POST['SID'];
		$FAMILY_ID =$_POST['FAMILY_ID'];
		$PAY =$_POST['PAY'];
		$START = $_POST['START'];
		$TEL_NUM = $_POST['TEL_NUM'];
		$ADDRESS = $_POST['ADDRESS'];

		//checking required fields
		$req_fields  = array('user_id','SID','FAMILY_ID','PAY','START','TEL_NUM','ADDRESS');
		
		$errors = array_merge($errors,check_req_fields($req_fields));
		

		$max_len_fields  = array('TEL_NUM' => 10,'ADDRESS' => 100);

		$errors = array_merge($errors,check_max_len($max_len_fields));
		
		if(empty($errors)){
			//add data to database
			$SID = mysqli_real_escape_string($connection,$_POST['SID']);
			$FAMILY_ID = mysqli_real_escape_string($connection,$_POST['FAMILY_ID']);
			$PAY = mysqli_real_escape_string($connection,$_POST['PAY']);
			$START = mysqli_real_escape_string($connection,$_POST['START']);
			$TEL_NUM = mysqli_real_escape_string($connection,$_POST['TEL_NUM']);
			$ADDRESS = mysqli_real_escape_string($connection,$_POST['ADDRESS']);

			$query = "UPDATE members SET  SID = '{$SID}',
										FAMILY_ID = '{$FAMILY_ID}',
										PAY = '{$PAY}', 
										START = '{$START}', 
										TEL_NUM = '{$TEL_NUM}', 
										ADDRESS = '{$ADDRESS}'
											 WHERE SID =  '{$user_id}'";

			$result = mysqli_query($connection,$query);

			if($result){
				header('Location: ../admin/admin-members.php?user_modified=true');
			}else{
				$errors[] = 'Failed to modify the new record.';
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
			
			<form action="modify_user.php" method="post">

				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

				<table>

				<tr>
					<td><label>SID </label></td>
					<td><input type="text" name="SID" <?php echo 'value = "'.$SID.'"'; ?>></td>
				</tr>

				<tr>
					<td><label>Family ID </label></td>
					<td><input type="text" name="FAMILY_ID" <?php echo 'value = "'.$FAMILY_ID.'"'; ?>></td>
				</tr>

				<tr>
					<td><label>Pay </label></td>
					<td><input type="text" name="PAY" <?php echo 'value = "'.$PAY.'"'; ?>></td>
				</tr>

				<tr>
					<td><label>Date </label></td>
					<td><input type="text" name="START"<?php echo 'value = "'.$START.'"'; ?>></td>
				</tr>

				<tr>
					<td><label>Tel Number </label></td>
					<td><input type="text" name="TEL_NUM"<?php echo 'value = "'.$TEL_NUM.'"'; ?>></td>
				</tr>

				<tr>
					<td><label>Address </label></td>
					<td><input type="text" name="ADDRESS"<?php echo 'value = "'.$ADDRESS.'"'; ?>></td>
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