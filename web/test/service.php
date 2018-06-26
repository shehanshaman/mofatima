<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="img/icons/favicon.ico" />
	<title>Fatima Church Dippitigoda</title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/service.css">
</head>
<body style="background-image: url(img/home/background/back0.jpg);">
	<div class = "wrapper">
		<?php include("html/top-bar.html"); ?>
		<div class="intro">
			<div class="intro_txt" style="background-image: url(img/services/intro.jpg);">
				<h1>SERVICES</h1>
			</div><!-- intro_txt -->
		</div><!-- intro -->

			
		<div class="welcome">
			<div class="welcome_txt">
				<h2>OUR SHEDULE</h2>
				
				<div class="shedule">
					<div class="mass">
						<div class="image">
							<img src="img/services/mass.jpg" width="200" height="267">
						</div>
						<div class="text">
							සෑම සෙනසුරාදාවකම සවස හයට ඉරුදින දිව්‍යපුජාව 
						</div>
					</div>

					<div class="nuwanaya">
						<div class="image">
							<img src="img/services/mary.jpg" width="200">
						</div>
						<div class="text">
							සෑම බ්‍රහස්පතින්දාවකම සවස හයට නුවානය සහ දිව්‍යපුජව 
						</div>
					</div>
				</div>

			</div>
			<div class="new">
				<p>
				<?php
					$im_shedule = '../test/Data/shedule/shedule-text.txt';
					$shedule_text = file_get_contents($im_shedule);

					if(!trim($shedule_text)==''){
						echo "<i class='fa fa-exclamation' aria-hidden='true'></i>";
					}
				?>
				<?php include 'Data/shedule/shedule-head.txt'; ?>
				<?php include 'Data/shedule/shedule-text.txt'; ?></p>
			</div>
		</div><!-- welcome -->

		<div class="container">
			  <h2>Verbum TV Live</h2>
			  <p></p>
			 <div class="embed-responsive embed-responsive-16by9">
			    <iframe width="854" height="480" src="http://www.ustream.tv/embed/21529927?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;">
			        
			    </iframe>
			 </div>
		</div>
		
	</div><!-- wrapper -->
	<div class="wrapper clearfix" >
		<?php include("html/botom-bar.php"); ?>
	</div>
	
</body>
</html>