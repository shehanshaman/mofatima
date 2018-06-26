<div class="endline clearfix col-sm-12" >
			<div class="about_us col-sm-4">
				<h2>about us</h2>
				<p class="sinhala">කොළඹ පදවියේ  දළුගම මීසමට  අයත් පාතිමා දෙව්මැදුර,  දිප්පිටිගොඩ ග්‍රාමයේ  කතෝලික පවුල් එකක 200 කට අදික  ප්‍රමාණයකින් සමන්විත වූ  කුඩා සන්ගයකි.</p>
			</div>
			<div class="address col-sm-4">
				<h2>Address</h2>
				<p class="sinhala">පාතිමා  දේවස්ථානය <br> දිප්පිටිගොඩ <br> කැළණිය <br><br> fatimachurchdg@gmail.com </p>
			</div>
			<div class="links col-sm-4">
				<h2>links</h2>
				<a href="https://script.google.com/macros/s/AKfycbzf5Esitb7Ah1BnpyK1FLliIQ6JBepDG1VMDOfDbQr5GCirwgg7/exec">Upload Pictures & Videos</a><br>
				<a href = "https://goo.gl/forms/59xuiZKXf2klsk5Q2">Feedback</a><br>
				<a class="sinhala" href="../../../db/html/dbhome.php">මරණාධාර සමිතිය</a><br>
				<a href="../../../page">Page Admin Log In</a>
			</div>
		</div>
		<?php 
			require_once('../../../page/con_page.php');

			$update = '';

			$query = "SELECT last_update from result";

			$details = mysqli_query($connection, $query);
			
			if (!$details){

			    die("Database query failed : ".mysqli_error($connection));

		    }

			$row = mysqli_fetch_assoc($details);
			$update = "{$row['last_update']}";


		 ?>
		<div class="last_update">
				<p>Last updated on <?php echo $update; ?></p>
		</div>