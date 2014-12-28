<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Two Ridges Presbyterian Church Donations</title>
		<?php require_once("include/head.php"); ?>
	</head>

  <body>
	<?php require_once("include/navbar.php"); ?>

    <!-- Begin page content -->
	<div class="container mytext">
		<p>Donations to the church are accepted here via Paypal, credit card, or debit card.  Transactions are made safely and securely through the Paypal website.  A short note can be made to direct the use of your donation or to provide contact information for a tax deduction letter.</p>
	</div>
	<br>
	<div class="container mytext text-center">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="DRR9EYAZQTBA8">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
	<?php require_once("include/js.php"); ?>
  </body>
</html>
