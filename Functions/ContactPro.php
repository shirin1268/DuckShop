<?php//Checking For reCAPTCHA

if (isset($_POST['g-recaptcha-response'])) {
	$captcha = $_POST['g-recaptcha-response'];
}
// Checking For correct reCAPTCHA
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=SECRETKEY&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
if (!$captcha || $response.success == false) {
	echo "Your CAPTCHA response was wrong.";
	exit ;
} else {

if(isset($_POST['email'])) {

	$email_to = "shirinvazirian@yahoo.com";
	$subject = "Subject";

	function err($error) {
		echo "Error processing your form input<br /><br />";
		echo "<b>The errors are:</b><br />";
		echo $error."<br /><br />";
		die();
	}

	// validation expected data exists
	if(!isset($_POST['name']) ||
	   !isset($_POST['email']) ||
	   !isset($_POST['message'])) {
		err('no input to validate.');
	}

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$err_msg = "";

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$err_msg .= 'The Email Address you entered does not appear to be valid.<br />';
	}

	$string_exp = "/^[A-Za-z .'-]+$/";

	if(!preg_match($string_exp,$name)) {
		$err_msg .= 'The Name you entered does not appear to be valid.<br />';
	}

	if(strlen($message) < 2) {
		$err_msg .= 'The Message you entered does not appear to be valid.<br />';
	}

	if(strlen($err_msg) > 0) {
		err($err_msg);
	}

	$email_message = "Form details below.\n\n";

	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:","href");
		return str_replace($bad,"",$string);
	}

	$email_message .= "Name: ".clean_string($name)."\n";
	$email_message .= "Email: ".clean_string($email)."\n";
	$email_message .= "Message: ".clean_string($message)."\n";

	$headers = 'From: '.$email."\r\n".
	           'Reply-To: '.$email."\r\n" .
	           'X-Mailer: PHP/' . phpversion();
	mail($email_to, $subject, $email_message, $headers);
	?>

	<!-- your success msg -->
	Thank you for your message <?php echo $name; ?>.

	<?php
}}
?>
