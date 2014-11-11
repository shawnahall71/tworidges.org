
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Welcome to Two Ridges Presbyterian Church</title>
		<?php require_once("include/head.php"); ?>
	</head>

  <body>
	<?php require_once("include/navbar.php"); ?>

    <!-- Begin page content -->
	<div class="container">
		<div class="row">
			<div class="jumbotron">
				<p>Two Ridges Presbyterian Church is a growing congregation loving one another and witnessing to the world through mission in Jesus' name.  We will share the good news and compassion of Jesus Christ by reaching out to youth and community.</p>
				<h2>Worship Time: 9:30 AM Sunday</h2>
				<h2>Rev. Dr. Bill Lawrence, Pastor</h2>
			</div>
			<div class="col-md-6">
				<img class="img-responsive center-block" src="img/church.jpg">
			</div>
			<div class="col-md-6 mytext">
				<h2 class="text-center">Newsletter</h2>
				<img class="img-responsive center-block" src="img/newsletter_thumbnail.png">
				<p>Find out the latest news from Two Ridges, including prayer requests, the church calendar, birthdays, anniversaries, and more.</p>
				<a class="btn btn-primary" href="js/pdfjs/web/viewer.html?file=/files/newsletter.pdf" role="button">Newsletter &raquo;</a>
			</div>
		</div>
		<div class="row padtop">
			<div class="col-md-6 mytext">
				<h2 class="text-center">Music</h2>
				<p>See the latest anthems sung by the Two Ridges choir as well as music provided by special guests.</p>
				<a class="btn btn-primary" href="media.php#choir" role="button">Media &raquo;</a>
			</div>
			<div class="col-md-6">
				<img class="img-responsive center-block" style="max-width:50%" src="img/pcusa_seal.gif">
			</div>
		</div>
		<div class="row padtop">
			<div class="col-md-6">
				<img class="img-responsive center-block" src="img/prayer.jpg">
			</div>
			<div class="col-md-6 mytext">
				<h2 class="text-center">Prayer Requests</h2>
				<p>Know someone who needs prayer?  Need prayer for yourself?  Just want to praise God?  Send your prayers or praise to the church.</p>
				<a class="btn btn-primary" href="prayers.php" role="button">Prayers &raquo;</a>
			</div>
		</div>
	</div>
	<?php require_once("include/js.php"); ?>
  </body>
</html>
