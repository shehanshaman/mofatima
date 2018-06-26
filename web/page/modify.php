<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('con_page.php'); ?>

<?php 

	if (!isset($_SESSION['user_name'])) {
		# code...
		header('Location: index.php');
	}

	require("../test/html/variables.php");

	$update = '';

	$query = "SELECT last_update from result";

	$details = mysqli_query($connection, $query);

	$row = mysqli_fetch_assoc($details);
	$update = "{$row['last_update']}";

		// configuration
	$file1 = '../test/Data/event/event1.txt';
	$file2 = '../test/Data/event/event2.txt';
	$file3 = '../test/Data/event/event3.txt';

	$im_shedule = '../test/Data/shedule/shedule-text.txt';

	$head1 = '../test/Data/event/event1-head.txt';
	$head2 = '../test/Data/event/event2-head.txt';
	$head3 = '../test/Data/event/event3-head.txt';

	$im_shedule_head = '../test/Data/shedule/shedule-head.txt';

	$latest = '../test/html/variables.php';

	// check if form has been submitted
	if (isset($_POST['text1']))
	{
	    // save the text contents
	    file_put_contents($file1, $_POST['text1']);
	    file_put_contents($head1, $_POST['head1']);
	    $text = '<?php $event = 1; ?>';
	    file_put_contents($latest, $text);
	    $event = 1;
	}
	else if (isset($_POST['text2']))
	{
	    // save the text contents
	    file_put_contents($file2, $_POST['text2']);
	    file_put_contents($head2, $_POST['head2']);
	    $text = '<?php $event = 2; ?>';
	    file_put_contents($latest, $text);
	    $event = 2;
	}
	else if (isset($_POST['text3']))
	{
	    // save the text contents
	    file_put_contents($file3, $_POST['text3']);
	    file_put_contents($head3, $_POST['head3']);
	    $text = '<?php $event = 3; ?>';
	    file_put_contents($latest, $text);
	    $event = 3;
	}

	if (isset($_POST['shedule-text']))
	{
	    // save the text contents
	    file_put_contents($im_shedule, $_POST['shedule-text']);
	    file_put_contents($im_shedule_head, $_POST['shedule-head']);
	}

	// read the textfile
	$text1 = file_get_contents($file1);
	$text2 = file_get_contents($file2);
	$text3 = file_get_contents($file3);

	$shedule_text = file_get_contents($im_shedule);
	
	$text1_head = file_get_contents($head1);
	$text2_head = file_get_contents($head2);
	$text3_head = file_get_contents($head3);

	$shedule_head = file_get_contents($im_shedule_head);


?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
		
		<div class="top_bar">
			<div class="db_name">
				<p>Welcome to User Mangement System</p>
			</div>
			<div class="user_id">
				<p> Your user id : <?php echo $_SESSION['user_name']; ?>
					<a href="log_out.php">Log Out</a>
				</p>
			</div>
		</div><!-- top_bar -->
		<div class="events">
			<div class="eventleft col-sm-8">
				<div class="dropdown col-sm-12">
				    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Change Pictures
				    <span class="caret"></span></button>
				    <ul class="dropdown-menu">
				      <li><a href="change-pic.php?name=intro2.jpg&path=../test/img/home/">Home 1</a></li>
				      <li><a href="change-pic.php?name=intro1.jpg&path=../test/img/home/">Home 2</a></li>
				      <li><a href="change-pic.php?name=intro0.jpg&path=../test/img/home/">Home 3</a></li>
				    </ul>
				 </div>
				<h1 class="col-sm-12 col-xs-12">Modify Events</h1>
				<a href="update-time.php"><input type="button" value="Change Time" class= " btn btn-info col-sm-2"></a>
				<div class="col-sm-12 col-xs-12"><h4>Latest event : event <?php echo $event; ?></h4></div>
				
			</div>

			<div class="eventright col-sm-4 col-xs-12">
				
			</div>
			
			
			<div class="event first">
				<label class="col-sm-12 col-xs-12"><h3>Event 1</h3></label>
				<form class="col-sm-12" action="" method="post">
				<textarea class="col-sm-2 col-xs-12" name="head1"  rows="4"><?php echo htmlspecialchars($text1_head) ?></textarea>
				<textarea class="col-sm-7 col-xs-12" name="text1"  rows="4"><?php echo htmlspecialchars($text1) ?></textarea>
				<div class="col-sm-3 btn-group col-xs-12">
					<input class="btn btn-success col-sm-6 col-xs-6" type="submit" />
					<input class="btn btn-warning col-sm-6 col-xs-6" type="reset" />
				</div>
				
				</form>
			</div>
			<div class="event">
				<label class="col-sm-12 col-xs-12"><h3>Event 2</h3></label>
				<form class="col-sm-12" action="" method="post">
				<textarea class="col-sm-2 col-xs-12" name="head2"  rows="4"><?php echo htmlspecialchars($text2_head) ?></textarea>
				<textarea class="col-sm-7 col-xs-12" name="text2"  rows="4"><?php echo htmlspecialchars($text2) ?></textarea>
				<div class="col-sm-3 btn-group col-xs-12">
					<input class="btn btn-success col-sm-6 col-xs-6" type="submit" />
					<input class="btn btn-warning col-sm-6 col-xs-6" type="reset" />
				</div>
				
				</form>
			</div>
			<div class="event">
				<label class="col-sm-12 col-xs-12"><h3>Event 3</h3></label>
				<form class="col-sm-12" action="" method="post">
				<textarea class="col-sm-2 col-xs-12" name="head3"  rows="4"><?php echo htmlspecialchars($text3_head) ?></textarea>
				<textarea class="col-sm-7 col-xs-12" name="text3"  rows="4"><?php echo htmlspecialchars($text3) ?></textarea>
				<div class="col-sm-3 btn-group col-xs-12">
					<input class="btn btn-success col-sm-6 col-xs-6" type="submit" />
					<input class="btn btn-warning col-sm-6 col-xs-6" type="reset" />
				</div>
				
				</form>
			</div>

		</div>

		<div class="important col-sm-12 col-xs-12">
			<h1>Important Notices</h1>
			<div class="shedule">
				<label class="col-sm-12 col-xs-12"><h3>Shedule</h3></label>
				<form class="col-sm-12" action="" method="post">
					<textarea class="col-sm-2 col-xs-12" name="shedule-head"  rows="4"><?php echo htmlspecialchars($shedule_head) ?>
					</textarea>
					<textarea class="col-sm-7 col-xs-12" name="shedule-text"  rows="4"><?php echo htmlspecialchars($shedule_text) ?>
					</textarea>
					<div class="col-sm-3 btn-group col-xs-12">
						<input class="btn btn-success col-sm-6 col-xs-6" type="submit" />
						<input class="btn btn-warning col-sm-6 col-xs-6" type="reset" />
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-12 col-xs-12">
			<a href="https://www.google.com/intl/si/inputtools/try/">
				<label><b>Sinhala Input</b> <br> <p>Note : Recommend google sinhala fonts click here to use.</p> </label>
			</a>
		</div>
		<div class="bottom_bar">
			<div class="create">
				<p>Created By M.S.S.M PERERA</p>
					<p><?php echo "Last update on ".$update." ."; ?>
					</p>
			</div>
			<div class="link">
				<a href="../../">Fatima Church Home</a>
			</div>
		</div>
</body>
</html>