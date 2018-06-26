<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/functions.php'); ?>

<?php 

	if (!isset($_SESSION['usr_id'])) {
		# code...
		header('Location: dbhome.php');
	}

	$my_details = '';

	$query = "SELECT * from members where sid = '{$_SESSION['usr_id']}'";

	$details = mysqli_query($connection, $query);

	verify_query($details);

	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$my_details .= "<tr><td>SID</td><td>{$user['SID']}</td></tr>";
		$my_details .= "<tr><td>Family ID</td><td>{$user['FAMILY_ID']}</td></tr>";
		$my_details .= "<tr><td>Start date</td><td>{$user['START']}</td></tr>";
		$my_details .= "<tr><td>Tel No</td><td>{$user['TEL_NUM']}</td></tr>";
		$my_details .= "<tr><td>Group No</td><td>{$user['GROUP_NO']}</td></tr>";
		$my_details .= "<tr><td>Address</td><td>{$user['ADDRESS']}</td></tr>";
	}



	$members_details = '';

	//getting the details
	$query0 = "SET @x = 0";
	$query = "SELECT @x:=@x+1 as num, FAMILY_ID, NAME FROM members_details 
				WHERE FAMILY_ID IN (SELECT FAMILY_ID from members where sid = '{$_SESSION['usr_id']}')";
	
	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query);

	verify_query($details);
			//query sussesfull
	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$members_details .= "<tr>";
		$members_details .= "<td>{$user['num']}</td>";
		$members_details .= "<td>{$user['FAMILY_ID']}</td>";
		$members_details .= "<td>{$user['NAME']}</td>";
		$members_details .= "<td><a href=\"edit/modify_family.php?family_id={$user['FAMILY_ID']}&name={$user['NAME']}\">Edit</a></td>";
		$members_details .= "</tr>";
	}

	//Donation query creating
	$don_details = '';

	//geting details
	$query0 = "SET @x = 0";
	$query = "SELECT @x:=@x+1 as num, SID, PRICE, DON_DATE,COMMENT FROM donation 
				WHERE SID = '{$_SESSION['usr_id']}'";

	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query);

	verify_query($details);

	while ($row = mysqli_fetch_assoc($details)) {
		# code...
		$don_details .= "<tr>";
		$don_details .= "<td>{$user['num']}</td>";
		$don_details .= "<td>{$row['SID']}</td>";
		$don_details .= "<td>{$row['PRICE']}</td>";
		$don_details .= "<td>{$row['DON_DATE']}</td>";
		$don_details .= "<td>{$row['COMMENT']}</td>";
		$don_details .= "</tr>";
	}

	//detath person details
	$death_details = '';

	//geting details
	$query0 = "SET @x = 0";
	$query = "SELECT @x:=@x+1 as num, SID, NAME, GIVE_MONEY, GIVE_DATE FROM death
				WHERE SID = '{$_SESSION['usr_id']}'";

	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query);

	verify_query($details);

	while ($row = mysqli_fetch_assoc($details)) {
		# code...
		$death_details .= "<tr>";
		$death_details .= "<td>{$row['SID']}</td>";
		$death_details .= "<td>{$row['NAME']}</td>";
		$death_details .= "<td>{$row['GIVE_MONEY']}</td>";
		$death_details .= "<td>{$row['GIVE_DATE']}</td>";
		$death_details .= "</tr>";
	}

	//payment details
	$pay = '';

	//geting details
	$query = "SELECT * FROM members
				WHERE SID = '{$_SESSION['usr_id']}'";

	$details = mysqli_query($connection, $query);

	verify_query($details);

	$row = mysqli_fetch_assoc($details);
	$pay = "{$row['PAY']}";

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
	<title>User</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/user.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<div class="wrapper clearfix"></div>
		
		<div class="top_bar">
			<div class="db_name">
				<p>Welcome to User Mangement System</p>
			</div>
			<div class="user_id">
				<p> Your user id : <?php echo $_SESSION['usr_id']; ?>
					<a href="log_out.php">Log Out</a>
				</p>
			</div>
		</div><!-- top_bar -->
		<main>
			<div class="payment_low">
				<?php if($pay<0){
					$pay_low = 0 - $pay;
					echo "You will have to pay ".$pay_low." .";
				} ?>
			</div>
			<div class="payment_ok">
				<?php if($pay>0){
					echo "You have paid ".$pay." .";
				} ?>
			</div>
			<table class="my table table-striped">
				<h1>My Details</h1>
				<?php echo $my_details; ?>
			</table>
			<table class="member_detail">
				<h1>All Members</h1>
				<tr>
					<th>No</th>
					<th>Family ID</th>
					<th>Name</th>
					<th>Edit</th>
				</tr>

				<?php echo $members_details; ?>
			</table>

			<table class="donation table table-striped">
				<h1>Donation Details</h1>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Price</th>
					<th>Date</th>
					<th>Comment</th>
				</tr>

				<?php echo $don_details; ?>
			</table>

			<table class="death table table-striped">
				<h1>Past Members</h1>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Name</th>
					<th>Give Money</th>
					<th>Date</th>
				</tr>

				<?php echo $death_details; ?>
			</table>	
		</main>
		<div class="bottom_bar">
		<div class="create">
			<p>Created By M.S.S.M PERERA</p>
			<p><?php echo "Last update on ".$update." ."; ?>
		</div>
		<div class="link">
			<a href="../../">Fatima Church Home</a>
		</div>
	</div>
	</wrapper>
	

</body>
</html>