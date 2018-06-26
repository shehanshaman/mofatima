<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="img/icons/favicon.ico" />
	<title>Fatima Church Dippitigoda</title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">

</head>

<body style="background-image: url(img/home/background/back0.jpg);">
	<div class = "wrapper">

		<?php include("html/top-bar.html"); ?>

		<div class="intro cycle-slideshow" 
			data-cycle-slides="> div"
		>
			<div class="intro_txt" style="background-image: url(img/home/intro2.jpg); background-size: 1000px 563px;">
				<!-- <img src="img/home/intro2.jpg" width="1000px"> -->
				<p>AN INCLUSIVE COMMUNITY FOR ALL WHO</p>
				<h1>BELIEVE IN THE LOVE AND <br> SPIRIT OF THE CHURCH</h1>
				<a class="hide" href="#">Read more >></a>
			</div><!-- intro_txt -->

			<div class="intro_txt" style="background-image: url(img/home/intro0.jpg); background-size: 1000px 563px;">
				<!-- <img src="img/home/intro2.jpg" width="1000px"> -->
				<p>AN INCLUSIVE COMMUNITY FOR ALL WHO</p>
				<h1>BELIEVE IN THE LOVE AND <br> SPIRIT OF THE CHURCH</h1>
				<a class="hide" href="#">Read more >></a>
			</div><!-- intro_txt -->

			<div class="intro_txt" style="background-image: url(img/home/intro1.jpg); background-size: 1000px 563px;">
				<!-- <img src="img/home/intro2.jpg" width="1000px"> -->
				<p>AN INCLUSIVE COMMUNITY FOR ALL WHO</p>
				<h1>BELIEVE IN THE LOVE AND <br> SPIRIT OF THE CHURCH</h1>
				<a class="hide" href="#">Read more >></a>
			</div><!-- intro_txt -->
		</div><!-- intro -->

			<div class="next_event clearfix">
					<h1>NEXT EVENTS</h1>
					<div class="event0">
						<h2 class="sinhala"><?php include("Data/event/event1-head.txt"); ?></h2>
						<p class="sinhala"><?php include("Data/event/event1.txt"); ?></p><br>
						<a class="hide" href="#">Read More >></a>
					</div>

					<div class="event1">
						<h2><?php include("Data/event/event2-head.txt"); ?></h2>
						<p><?php include("Data/event/event2.txt"); ?></p><br>
						<a class="hide" href="#">Read More >></a>
					</div>

					<div class="event2">
						<h2><?php include("Data/event/event3-head.txt"); ?></h2>
						<p><?php include("Data/event/event3.txt"); ?></p><br>
					</div>
			</div><!-- next_event -->

		<div class="welcome">
			<div class="welcome_txt">
				<h2>WELCOMING YOU HOME</h2>
				<p>"Therefore welcome one another as christ has welcomed you, for the glory of God." <br><br> Romans 15:7 </p>
			</div>

			<div class="our_church">
				<img src="img/home/our_church.jpg" alt="our_church">
				<h2>ABOUT OUR CHURCH</h2>
				<div class="sub">
					
				</div>	
				<p class="sinhala">කොළඹ පදවියේ  දළුගම මීසමට  අයත් පාතිමා දෙව්මැදුර,  දිප්පිටිගොඩ ග්‍රාමයේ  කතෝලික පවුල් එකක 200 කට අදික  ප්‍රමාණයකින් සමන්විත වූ  කුඩා සන්ගයකි.</p>
				<a href="about_us.php">read more >></a>
			</div><!-- our_church -->

			<div class="society">
				<img src="img/home/society.jpeg" alt="society">
				<h2>society</h2>
				<div class="sub">
				
				</div>
				<p>The Catholic Church in Sri Lanka is part of the worldwide Catholic Church, under the spiritual leadership of the pope in Rome. The country comes under the province of Colombo and is made up of 12 dioceses including one archdiocese.</p>
				<a href="society.php">read more >></a>
			</div><!-- activity -->

			<div class="services">
				<img src="img/home/services.jpg" alt="services">
				<h2>service</h2>
				<div class="sub">
					
				</div>
				<p>The Mass or Eucharistic Celebration is the central liturgical ritual in the Catholic Church where the Eucharist (Communion) is consecrated. The church describes the mass as "the source and summit of the Christian life". The church teaches that through consecration..</p>
				<a href="https://en.wikipedia.org/wiki/Mass_in_the_Catholic_Church">read more >></a>
			</div><!-- activity -->
			</div><!-- services -->
		</div>

	</div><!-- wrapper -->
	<div class="wrapper clearfix" >
		<div class="help_txt" style="background-image: url(img/home/hands.jpg); background-size: 1000px 563px;">
			<h2>HELP US TO SPREAD OUR <br> LOVE AND FAITH</h2>
		</div>
		
		<?php include("html/botom-bar.php"); ?>

	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script>

</body>
</html>