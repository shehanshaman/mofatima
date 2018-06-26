<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/functions.php'); ?>

<?php 

	if (!isset($_SESSION['user_name'])) {
		# code...
		header('Location: dbhome.php');
	}

	//check valid or not
	$valid_or_not = '';
	$add_query = '';

	$query = "SELECT * from admins WHERE user_name='{$_SESSION['user_name']}' LIMIT 1";
	$details = mysqli_query($connection, $query);

	$user = mysqli_fetch_assoc($details);
	$valid_or_not = "{$user['valid']}";

	if($valid_or_not){
		$add_query = "<br><a href=\"add_query.php\">Add Query</a>";
	}


	$members_details = '';

	//getting the details
	$query0 = "SET @x = 0";
	$query1 = "SELECT @x:=@x+1 as num,SID,FAMILY_ID,PAY,START,TEL_NUM,GROUP_NO,ADDRESS from members";
	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query1);

	verify_query($details);
	//query sussesfull
	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$members_details .= "<tr>";
		$members_details .= "<td>{$user['num']}</td>";
		$members_details .= "<td>{$user['SID']}</td>";
		$members_details .= "<td>{$user['FAMILY_ID']}</td>";
		$members_details .= "<td>{$user['PAY']}</td>";
		$members_details .= "<td>{$user['START']}</td>";
		$members_details .= "<td>{$user['TEL_NUM']}</td>";
		$members_details .= "<td>{$user['GROUP_NO']}</td>";
		$members_details .= "<td>{$user['ADDRESS']}</td>";
		$members_details .= "<td><a href=\"modify_user.php?user_id={$user['SID']}\">Edit</a></td>";
		$members_details .= "<td><a href=\"delete_user.php?user_id={$user['SID']}\">Delete</a></td>";
		$members_details .= "</tr>";
	}
	

	//get all donation
	$donation_details = '';

	//getting the details
	$query0 = "SET @x = 0";
	$query1 = "SELECT @x:=@x+1 as num,SID,PRICE,DON_DATE,COMMENT from donation";

	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query1);

	verify_query($details);
			//query sussesfull
	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$donation_details .= "<tr>";
		$donation_details .= "<td>{$user['num']}</td>";
		$donation_details .= "<td>{$user['SID']}</td>";
		$donation_details .= "<td>{$user['PRICE']}</td>";
		$donation_details .= "<td>{$user['DON_DATE']}</td>";
		$donation_details .= "<td>{$user['COMMENT']}</td>";
		$donation_details .= "</tr>";
	}

	//death person details
	$death_details = '';

	//getting the details
	$query0 = "SET @x = 0";
	$query1 = "SELECT @x:=@x+1 as num,SID,NAME,GIVE_MONEY,GIVE_DATE from DEATH";

	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query1);

	verify_query($details);
			//query sussesfull
	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$death_details .= "<tr>";
		$death_details .= "<td>{$user['num']}</td>";
		$death_details .= "<td>{$user['SID']}</td>";
		$death_details .= "<td>{$user['NAME']}</td>";
		$death_details .= "<td>{$user['GIVE_MONEY']}</td>";
		$death_details .= "<td>{$user['GIVE_DATE']}</td>";
		$death_details .= "<td><a href=\"delete_death_user.php?user_id={$user['SID']}&name={$user['NAME']}\">Delete</a></td>";
		$death_details .= "</tr>";
	}

	//money
	$save = '';

	//getting the details
	$query = "SELECT * from result";

	$details = mysqli_query($connection, $query);

	verify_query($details);

	$row = mysqli_fetch_assoc($details);
	$save = "{$row['money']}";
	

	//admins details
	$admins_details = '';

	$query0 = "SET @x = 0";
	$query1 = "SELECT @x:=@x+1 as num,user_name,password,valid,last_login from admins";

	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query1);

	verify_query($details);
			//query sussesfull
	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$admins_details .= "<tr>";
		$admins_details .= "<td>{$user['num']}</td>";
		$admins_details .= "<td>{$user['user_name']}</td>";
		if($valid_or_not){
			$admins_details .= "<td>{$user['password']}</td>";
		}else{
			$admins_details .= "<td>Not Available</td>";
		}
		$admins_details .= "<td>{$user['valid']}</td>";
		$admins_details .= "<td>{$user['last_login']}</td>";
		if($valid_or_not){
			$admins_details .= "<td><a href=\"delete_admin.php?user_id={$user['user_name']}\">Delete</a></td>";
		}
		$admins_details .= "</tr>";
	}

	//members details with family

	$family_details = '';
	//getting the details
	$query0 = "SET @x = 0";
	$query1 = "SELECT @x:=@x+1 as num,FAMILY_ID,NAME from members_details";

	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query1);

	verify_query($details);
			//query sussesfull
	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$family_details .= "<tr>";
		$family_details .= "<td>{$user['num']}</td>";
		$family_details .= "<td>{$user['FAMILY_ID']}</td>";
		$family_details .= "<td>{$user['NAME']}</td>";
		$family_details .= "<td><a href=\"delete_family.php?user_id={$user['FAMILY_ID']}&user_name={$user['NAME']}\">Delete</a></td>";
		$family_details .= "</tr>";

	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
				<p> Hello <?php echo $_SESSION['user_name']; ?>  
					<a href="log_out.php"> Log Out</a>
					<?php echo $add_query; ?>
				</p>
			</div>
			
		</div><!-- top_bar -->
		
		<main class="main_left">
			<div class="save">
				<p>We have Rs :<?php echo $save; ?></p>
			</div>
			<table class="members_details">
				<h1>Member
					<span>
						<a href="add-member.php"> +Add new</a>
					</span>
				</h1>
				<tr>
					<th>No</th>
					<th>SID</th>
					<th>Family ID</th>
					<th>Pay</th>
					<th>START</th>
					<th>Tel Number</th>
					<th>Group</th>
					<th>Address</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>

				<?php echo $members_details; ?>
			</table>

			<table class="death_details">
				<h1>Past Members
					<span>
						<a href="add-death.php"> +Add new</a>
					</span>
				</h1>
				<tr>
					<th>No</th>
					<th>SID</th>
					<th>Name</th>
					<th>Given Money</th>
					<th>Date</th>
					<th>Delete</th>
				</tr>

				<?php echo $death_details; ?>
			</table>

			<table class="admins_details">
				<h1>Admins
					<span>
						<a href="add-admin.php"> +Add new</a>
					</span>	 
				</h1>

				<tr>
					<th>No</th>
					<th>User Name</th>
					<th>Password</th>
					<th>Valid</th>
					<th>Last Login</th>
					<th>Delete</th>
				</tr>

				<?php echo $admins_details; ?>
			</table>

		</main>
		<main class="main_right">
			<table class="donation_details">
				
				<tr>
					<h1>All donation
						<span>
							<a href="add-donation.php"> +Add new</a>
						</span>
					</h1>
					<th>No</th>
					<th>SID</th>
					<th>Donation</th>
					<th>Date</th>
					<th>Comment</th>
				</tr>

				<?php echo $donation_details; ?>
			</table>

			<table class="family_details">
				
				<tr>
					<h1>Family Details
						<span>
							<a href="add-family.php"> +Add new</a>
						</span>
					</h1>
					<th>No</th>
					<th>Family No</th>
					<th>Name</th>
					<th>Delete</th>
				</tr>

				<?php echo $family_details; ?>
			</table>
		</main>
	</wrapper>

</body>

</html>
<?php mysqli_close($connection); ?>