<?php

require "../DB/Connection.php";
require_once "../DB/session.php";


	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$email = trim(mysqli_real_escape_string($GLOBALS['connection'], $_POST['Email']));
		$password = trim(mysqli_real_escape_string($GLOBALS['connection'],$_POST['Password']));

		$query = "SELECT * FROM costumer WHERE Email = '{$email}' LIMIT 1";


		$result = mysqli_query($GLOBALS['connection'], $query);


		if (mysqli_num_rows($result) == 1) {
			// username/password authenticated
			// and only 1 match
			$found_user = mysqli_fetch_array($result);

			echo $found_user['FullName'];
			if(password_verify($password, $found_user['Password'])){

				$_SESSION['FullName'] = $found_user['FullName'];
				$_SESSION['Email'] = $found_user['Email'];
				$_SESSION['Picture'] = $found_user['Picture'];
				$_SESSION['UserID'] = $found_user['UserID'];


				header("refresh:1; url=../index.php");
			} else {
				// username/password combo was not found in the database
				$message = "Email/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}}
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$message = "You are now logged out.";
		}
	}
	if (!empty($message)) {echo "<p>" . $message . "</p>";} ?>



<?php
if (isset($GLOBALS['connection'])){mysqli_close($GLOBALS['connection']);}
?>