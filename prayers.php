
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Welcome to Two Ridges Presbyterian Church</title>
		<?php require_once("include/head.php"); ?>
	</head>

  <body>

	<?php require_once("include/navbar.php"); ?>

    <!-- Begin page content -->
	<?php
	// display form if user has not clicked submit
	if (!isset($_POST["submit"])) {
		?>
		<div class="container mytext">
	<h4>Send the church a prayer request below:</h4>
		<form role="form" name="prayerfrm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<!-- Add g-recaptcha-response to the form so it will be POSTed with form -->
		<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
        <strong>Please enter the information you are comfortable sharing.  For confidentiality reasons,
         please only provide your information, not the person for whom you are praying.  If you wish to
          receive a response, please provide enough information to reach you.</strong>
		<p></p>
		<div class="form-group">
			<label>Your Email Address</label>
			<input type="email" class="form-control" name="EmailFrom" placeholder="Your email">
        </div>
		<div class="form-group">
			<label>Your Name</label>
			<input type="text" class="form-control" name="Name" placeholder="Your name">
        </div>
		<div class="form-group">
			<label>Your Address</label>
			<input type="text" class="form-control" name="Address" placeholder="Your address">
        </div>
		<div class="form-group">
			<label>Your City</label>
			<input type="text" class="form-control" name="City" placeholder="Your city">
        </div>
		<div class="form-group">
        <label>Your State</label>
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
			<label>Your Telephone</label>
			<input type="text" class="form-control" name="Phone" placeholder="Your phone number">
        </div>
        <script>
        $('.btn').button();
        </script>
        <strong>Would you like a response?  If so, how?</strong>
        <div class="form-group">
	        <div class="btn-group" data-toggle="buttons">
	        		<label class="btn btn-primary">
	        			<input type="radio" name="Response" id="email" value="email">Email
	        		</label>
	        		<label class="btn btn-primary">
	        			<input type="radio" name="Response" id="postal" value="postal">Postal Letter
	        		</label>
	        		<label class="btn btn-primary">
	        			<input type="radio" name="Response" id="none" value="none">No Response
	        		</label>
	        </div>
	    </div>
		<div class="form-group">
			<label>Your Prayer Request</label>
			<textarea class="form-control" name="Message" rows="5" placeholder="Enter your prayer request"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
        <p></p>
        </div>
    	<?php
    } else {  // the user has submitted the form
  	require_once("include/geoplugin.class.php");
  	$geoplugin = new geoPlugin();
  	$geoplugin->locate();
  	$to = 'prayers@tworidges.org';
    $message = "<html><body>This message was sent on ";
    $message .= date('M j\, Y \a\t h:i:s A T');
		$message .= "<br><br><u><b>";
		$message .= "Two Ridges - Prayer Request</b></u><br>";
		$message .= "<br><b>Name: </b>" . filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
		$message .= "<br><b>Address: </b>" . filter_var($_POST["Address"], FILTER_SANITIZE_STRING);
		$message .= "<br><b>City: </b>" . filter_var($_POST["City"], FILTER_SANITIZE_STRING);
		$message .= "<br><b>State: </b>" . filter_var($_POST["State"], FILTER_SANITIZE_STRING);
		$message .= "<br><b>Phone: </b>" . filter_var($_POST["Phone"], FILTER_SANITIZE_STRING);
		$message .= "<br><b>Response requested: </b>" . filter_var($_POST["Response"], FILTER_SANITIZE_STRING);
		// message lines should not exceed 70 characters (PHP rule), so wrap it
		$message .= "<br><b>Prayer request: </b>";
		$message .= wordwrap(filter_var($_POST["Message"], FILTER_SANITIZE_STRING), 70, "\r\n");
		$message .= "<br><br><u><b>";
		$message .= "Visitor information</b></u></p><br>";
		$message .= "<br><b>From IP address: </b>" . $_SERVER["REMOTE_ADDR"];
    $message .= "<br><b>From hostname: </b>" . gethostbyaddr($_SERVER["REMOTE_ADDR"]);
    $message .= "<br><b>Using browser: </b>" . $_SERVER["HTTP_USER_AGENT"];
    $message .= "<br><b>Referred by: </b>" . $_SERVER["HTTP_REFERER"];
    $message .= "<br><b>City: </b>{$geoplugin->city}";
    $message .= "<br><b>Region: </b>{$geoplugin->region}";
    $message .= "<br><b>Area Code: </b>{$geoplugin->areaCode}";
    $message .= "<br><b>DMA Code: </b>{$geoplugin->dmaCode}";
    $message .= "<br><b>Country Name: </b>{$geoplugin->countryName}";
    $message .= "<br><b>Latitude: </b>{$geoplugin->latitude}";
    $message .= "<br><b>Longitude: </b>{$geoplugin->longitude}";
		$message .= "</body></html>";
	    // To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: ' . filter_var($_POST["EmailFrom"], FILTER_SANITIZE_EMAIL) . "\r\n";
		$headers .= 'Reply-To: ' . filter_var($_POST["EmailFrom"], FILTER_SANITIZE_EMAIL) . "\r\n";

		// If email is valid, verify reCAPTCHA
		require_once __DIR__ . '/include/recaptcha/autoload.php';
		$config = include __DIR__ . '/include/recaptcha/config.php';
		$siteKey = $config['v3']['site'];
		$secret = $config['v3']['secret'];
		$recaptcha = new \ReCaptcha\ReCaptcha($secret);
		$resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
											->setScoreThreshold(0.5)
											->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
		if ($resp->isSuccess()) {
			// If reCAPTCHA validation is successful, send email
	    $subject = "Prayer Request from Two Ridges";
	    mail($to,$subject,$message,$headers);
	    print '	<div class="container">
					<div class="alert alert-success">
						Thank you.  Your prayer request has been sent to the church and you
						will receive a response if requested.
					</div>
				</div>';
			} else {
					// If reCAPTCHA returns likely spam
					$recaptcha_debug = $config['v3']['debug'];
					if ($recaptcha_debug == TRUE) {
						// If we're in debug mode, send the email that would have been sent, marking as spam
						$subject = "SPAM via Prayer Request from Two Ridges";
						mail($to,$subject,$message,$headers);
					}
					print '	<div class="container">
							<div class="alert alert-danger">
								Sorry, you appear to be sending spam according to our filters.
								Your prayer was not sent to the church.
								If you believe this was incorrect, please contact the church through a different method.
							</div>
						</div>';
			}
    }
    ?>
	<?php require_once("include/js.php"); ?>
  </body>
</html>
