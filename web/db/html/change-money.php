<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/functions.php'); ?>

<?php 
	
	//members details with family

	$change_details = '';
	//getting the details
	$query0 = "SET @x = 0";
	$query1 = "SELECT @x:=@x+1 as num,add_money,change_date,comment from change_money order by change_date desc";

	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query1);

	verify_query($details);
			//query sussesfull
	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$change_details .= "<tr>";
		$change_details .= "<td>{$user['num']}</td>";
		$change_details .= "<td>{$user['add_money']}</td>";
		$change_details .= "<td>{$user['change_date']}</td>";
		$change_details .= "<td>{$user['comment']}</td>";
		$change_details .= "</tr>";

	}

	$errors = array();

	if(isset($_POST['submit'])){

		//checking required fields
		$req_fields  = array('add_money','change_date','comment');
		
		$errors = array_merge($errors,check_req_fields($req_fields));
		

		$max_len_fields  = array('comment' => 50);

		$errors = array_merge($errors,check_max_len($max_len_fields));
		
		if(empty($errorsr)){
			//add data to database
			$add_money = mysqli_real_escape_string($connection,$_POST['add_money']);
			$comment = mysqli_real_escape_string($connection,$_POST['comment']);
			$change_date = mysqli_real_escape_string($connection,$_POST['change_date']);

			$query = "INSERT INTO change_money VALUES ('{$add_money}','{$change_date}','{$comment}')";

			$result = mysqli_query($connection,$query);

			$query = "update result SET money=money+'{$add_money}'";
			$result = mysqli_query($connection,$query);

			if($result){
				header('Location: admin/admin-members.php?change=true');
			}else{
				$errors[] = 'Failed to add the new record.';
			}
		}

	}

	$update = '';

	$query = "SELECT last_update from result";

	$details = mysqli_query($connection, $query);

	verify_query($details);

	$row = mysqli_fetch_assoc($details);
	$update = "{$row['last_update']}";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add-Donation</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/add.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>

	<div class="wrapper clearfix"></div>
		
		<div class="top_bar">
			<div class="db_name">
				<p>Welcome to User Mangement System</p>
			</div>
			<div class="user_id">
				<p> Hello <?php echo $_SESSION['user_name']; ?>  
					<a href="admin/admin-members.php"> Back to Admin</a>
				</p>
			</div>
		</div><!-- top_bar -->

		<div class="addin">

			<?php 
				if(!empty($errors)){
					display_errors($errors);
				}
			 ?>
			
			<form action="change-money.php" method="post">
				<h3>Add Money Transfe </h3>
				<table class="table table-striped">

				<tr>
					<td><label>Change money Value </label></td>
					<td><input type="text" name="add_money" ></td>
				</tr>

				<tr>
					<td><label>Date </label></td>
					<td><input type="text" name="change_date" value = "<?php echo date('Y-m-d');?>" ></td>
				</tr>

				<tr>
					<td><label>Comment </label></td>
					<td><input type="text" name="comment" ></td>
				</tr>


				<tr>
					<td><label>&nbsp;</label></td>
					<td><button type="submit" name="submit">SAVE</button></td>
				</tr>
				
				</table>
			</form>
		</div>
		<table class="change_details table table-striped">
			<tr>
				<h1>Money Changes</h1>
				<th>No</th>
				<th>Add/Sub</th>
				<th>Change Date</th>
				<th>Comment</th>
			</tr>

			<?php echo $change_details; ?>
		</table>
	</div>
	<div class="bottom_bar">
		<div class="create">
			<p>Created By M.S.S.M PERERA</p>
			<p><?php echo "Last update on ".$update." ."; ?>
		</div>
		<div class="link">
			<a href="../../">Fatima Church Home</a>
		</div>
	</div>
</body>
</html>

<?php mysqli_close($connection); ?>