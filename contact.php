
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Contact Two Ridges Presbyterian Church</title>
		<?php require_once("include/head.php"); ?>
	</head>

  <body>

  	<?php require_once("include/email_helper.php"); ?>
	<?php require_once("include/navbar.php"); ?>

    <!-- Begin page content -->
	<div class="container mytext">
		<h4>Two Ridges contact information:</h4>
		<address>
		Two Ridges Presbyterian Church<br>
		1085 Canton Road<br>
		Wintersville, OH 43953<br>
		(740) 264-3443
		</address>
	</div>
	<br>
	<?php
	// display form if user has not clicked submit
	if (!isset($_POST["submit"])) {
		?>
		<div class="container mytext">
	<h4>Send the church a message below:</h4>
		<form role="form" name="contactfrm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <strong>Fields marked (*) are required</strong>
		<p></p>
		<div class="form-group">
			<label>Your Email Address *</label>
			<input type="email" class="form-control" name="EmailFrom" placeholder="Enter email">
        </div>
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="Name" placeholder="Enter name">
        </div>
		<div class="form-group">
			<label>Address</label>
			<input type="text" class="form-control" name="Address" placeholder="Enter address">
        </div>
		<div class="form-group">
			<label>City</label>
			<input type="text" class="form-control" name="City" placeholder="Enter city">
        </div>
		<div class="form-group">
        <label>State:</label>
			<select class="form-control" name="State">
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH" selected="selected">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
					<option value="UNK">Other</option>
			</select>
        </div>
		<div class="form-group">
			<label>Telephone</label>
			<input type="text" class="form-control" name="Phone" placeholder="Enter phone number">
        </div>
		<div class="form-group">
			<label>Message:</label>
			<textarea class="form-control" name="Message" rows="5" placeholder="Enter your message"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
        <p></p>
        </div>
    	<?php
    } else {  // the user has submitted the form
	  // Check if the "EmailFrom" input field is filled out
	  if (isset($_POST["EmailFrom"])) {
	    // Check if "from" email address is valid
	    $mailcheck = spamcheck($_POST["EmailFrom"]);
	    if ($mailcheck==FALSE) {
	    	echo "Invalid input";
	    } else {
	    	require_once("include/geoplugin.class.php");
	    	$geoplugin = new geoPlugin();
	    	$geoplugin->locate();
	    	$to = 'contact@tworidges.org';
		    $subject = "Contact Form from Two Ridges";
		    $message = "<html><body>This message was sent on ";
		    $message .= date('M j\, Y \a\t h:i:s A T');
			$message .= "<br><br><u><b><fontface='Arial'><font color='#000000'>";
			$message .= "Two Ridges - Contact Us Form</b></u></font><br>";
			$message .= "<br><fontface='Arial'><b>Name: </b>" . $_POST["Name"];
			$message .= "<br><fontface='Arial'><b>Address: </b>" . $_POST["Address"];
			$message .= "<br><fontface='Arial'><b>City: </b>" . $_POST["City"];
			$message .= "<br><fontface='Arial'><b>State: </b>" . $_POST["State"];
			$message .= "<br><fontface='Arial'><b>Phone: </b>" . $_POST["Phone"];
			// message lines should not exceed 70 characters (PHP rule), so wrap it
			$message .= "<br><fontface='Arial'><b>Message: </b>";
			$message .= wordwrap($_POST["Message"], 70, "\r\n");
			$message .= "<br><br><u><b><fontface='Arial'><font color='#000000'>";
			$message .= "Visitor information</b></u></font></p><br>";
			$message .= "<br><fontface='Arial'><b>From IP address: </b>" . $_SERVER["REMOTE_ADDR"];
		    $message .= "<br><fontface='Arial'><b>From hostname: </b>" . gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		    $message .= "<br><fontface='Arial'><b>Using browser: </b>" . $_SERVER["HTTP_USER_AGENT"];
		    $message .= "<br><fontface='Arial'><b>Referred by: </b>" . $_SERVER["HTTP_REFERER"];
		    $message .= "<br><fontface='Arial'><b>City: </b>{$geoplugin->city}";
		    $message .= "<br><fontface='Arial'><b>Region: </b>{$geoplugin->region}";
		    $message .= "<br><fontface='Arial'><b>Area Code: </b>{$geoplugin->areaCode}";
		    $message .= "<br><fontface='Arial'><b>DMA Code: </b>{$geoplugin->dmaCode}";
		    $message .= "<br><fontface='Arial'><b>Country Name: </b>{$geoplugin->countryName}";
		    $message .= "<br><fontface='Arial'><b>Latitude: </b>{$geoplugin->latitude}";
		    $message .= "<br><fontface='Arial'><b>Longitude: </b>{$geoplugin->longitude}";
			$message .= "</body></html>";
		    // To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: ' . $_POST["EmailFrom"] . "\r\n";
			$headers .= 'Reply-To: ' . $_POST["EmailFrom"] . "\r\n";
		    // send mail
		    mail($to,$subject,$message,$headers);
		    print '	<div class="container">
						<div class="alert alert-success">
							Thank you.  Your message has been sent to the church.
						</div>
					</div>';
		}
	  }
    }
    ?>
	<?php require_once("include/js.php"); ?>
  </body>
</html>
