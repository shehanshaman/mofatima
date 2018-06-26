<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="../../img/icons/favicon.ico" />
	<title>මරණාධාර සමිතිය</title>
	<link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/society.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-image: url(img/home/background/back0.jpg);">
	<div class = "wrapper">
		<?php include("top-bar.html"); ?>
		<div class="intro">
			<div class="intro_txt" style="background-image: url(../../img/society/intro.jpg);">
				<h1 class="sinhala">මරණාධාර සමිතිය</h1>
			</div><!-- intro_txt -->
		</div><!-- intro -->

		<div class="all_society sinhala">
			<div class="society_list">
				<ul>
					<li><a href="tharunasamithiya.php">තරුණ සමිතිය</a></li>
					<li><a href="maranadarasamithiya.php">මරණාධාර සමිතිය</a></li>
					<li><a href="darmaduthasamithiya.php">ධර්මදුත සමිතිය</a></li>
					<li><a href="divyahardaye.php">ශ්‍රී හර්දයේ සමිතිය</a></li>
					<li><a href="pujaudaw.php">පුජා උදව් සමිතිය</a></li>
				</ul>
			</div><!-- society_list -->
			<div class="description">
				<img src="../../img/society/common.jpg" alt="common">
				<p><?php include("../../Data/society/ms.txt") ?></p>
				
			</div><!-- description -->
		</div><!-- all_society -->
		<p class="note"><a href="edit-society.php?id=ms">Click here to edit above text</a></p>
		<div class="free_area">
			<img src="../../img/society/free.jpg">
		</div>	
	</div><!-- wrapper -->
	<div class="wrapper clearfix" >
		<?php include("botom-bar.php"); ?>
	</div>
	
</body>
</html>