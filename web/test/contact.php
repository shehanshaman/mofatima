<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="img/icons/favicon.ico" />
	<title>Fatima Church Dippitigoda</title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-image: url(img/home/background/back0.jpg);">
	<div class = "wrapper">
		<?php include("html/top-bar.html"); ?>
		<div class="intro">
			<div class="intro_txt" style="background-image: url(img/contact/intro.jpg);">
				<h1>CONTACT</h1>
			</div><!-- intro_txt -->
		</div><!-- intro -->

		<div class = "view_map" id="map" style="width:800px;height:500px;background:black"></div>

		<script>
		function myMap() {
		var mapOptions = {
		    center: new google.maps.LatLng(6.974541, 79.906216),
		    zoom: 18,
		    mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(document.getElementById("map"), mapOptions);
		}
		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi7y_WchESweYBb6yr9OepOTCkR-gJKyo&callback=myMap"></script>

	</div><!-- wrapper -->

	<div class="wrapper clearfix" >

		<div class="contact_list clearfix">
			<div class="tel">
				<i class="fa fa-phone" aria-hidden="true"></i>
				<p></p>
			</div><!-- tel -->
			<div class="address">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<p class="sinhala">පාතිමා  දේවස්ථානය <br> දිප්පිටිගොඩ <br> කැළණිය </p>
			</div><!-- address -->
			<div class="mail">
				<i class="fa fa-envelope-o" aria-hidden="true"></i>
				<p>fatimachurchdg@gmail.com</p>
			</div>
		</div>

		<div class="feedback">
			<h2>FEEDBACK</h2>
			<p>Please take 60 seconds to fill out the form below. Your feedback is very important</p>
			<a href="https://goo.gl/forms/59xuiZKXf2klsk5Q2"> CLICK HERE</a>
		</div>
	
		<?php include("html/botom-bar.php"); ?>
	</div>
	
</body>
</html>