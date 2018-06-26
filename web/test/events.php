<?php require("html/variables.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="img/icons/favicon.ico" />
	<title>Fatima Church Dippitigoda</title>
	
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/events.css">
</head>
<body style="background-image: url(img/home/background/back0.jpg);">
	<div class = "wrapper">
		<?php include("html/top-bar.html"); ?>
		<div class="intro">
			<div class="intro_txt" style="background-image: url(img/events/intro.jpg);">
				<h1>EVENTS</h1>
			</div><!-- intro_txt -->
		</div><!-- intro -->

			<div class="next_event clearfix col-sm-12">
					<h1>NEXT EVENTS</h1>
					<div class="col-sm-4 well">
						<h2 class="sinhala"><?php include("Data/event/event1-head.txt"); 
							if($event==1){
								echo "<img src='img/events/new.gif' class='img-new' alt='new' style='width:48px;height:48px;'>";
							}
								?></h2>
						<p class="sinhala"><?php include("Data/event/event1.txt"); ?></p><br>
						<a class="hide" href="">Read More >></a>
					</div>

					<div class="col-sm-4 well">
						<h2 class="sinhala"><?php include("Data/event/event2-head.txt"); 
							if($event==2){
								echo "<img src='img/events/new.gif' class='img-new' alt='new' style='width:48px;height:48px;'>";
							}

						?></h2>
						<p class="sinhala"><?php include("Data/event/event2.txt"); ?></p><br>
						<a class="hide" href="#">Read More >></a>
					</div>

					<div class="col-sm-4 well">
						<h2 class="sinhala"><?php include("Data/event/event3-head.txt"); 
							if($event==3){
								echo "<img src='img/events/new.gif' class='img-new' alt='new' style='width:48px;height:48px;'>";
							}

						?></h2>
						<p class="sinhala"><?php include("Data/event/event3.txt"); ?></p><br>
					</div>
			</div><!-- next_event -->

		<div class="past-event col-sm-12">
			<div class="past-intro-img col-sm-8">
				<img src="img/events/past-intro.jpg" class="img-rounded saturate" alt="past-into" height="300">
			</div>
			<div class="past-intro-text col-sm-4">
				<label><a href="https://fatimachurchdg.wixsite.com/index"><h3>Past Event's Gallery</h3><br><p>click me</p></a></label>
			</div>
		</div>
			
	</div><!-- wrapper -->
	<div class="container">
			  <h2>National Basilica Church</h2>
			  <p></p>
			  <div class="embed-responsive embed-responsive-16by9">
			    <!--<iframe width="854" height="480" src="https://www.youtube.com/embed/7jIC0DYwPzY?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
			    <iframe width="854" height="480" src="video/New_Lourdes_Church_Thewatta.mp4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			  </div>
			</div>
	<div class="wrapper clearfix" >
		<?php include("html/botom-bar.php"); ?>
	</div>
	
</body>
</html>