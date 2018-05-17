<?php require_once("../DB/Connection.php"); ?>


<?php
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$email = trim(mysqli_real_escape_string($GLOBALS['connection'], $_POST['Email']));
		$password = trim(mysqli_real_escape_string($GLOBALS['connection'], $_POST['Password']));
		$fullname = trim(mysqli_real_escape_string($GLOBALS['connection'], $_POST['FullName']));

		$iterations = ['cost' => 15];
		$hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);

		$query = "INSERT INTO `customer` (FullName, Email, Password) VALUES ('{$fullname}','{$email}','{$hashed_password}')";
		$result = mysqli_query($GLOBALS['connection'], $query);
		if ($result) {
			$message = "User Created.";
		} else {
			$message = "User could not be created.";
			$message .= "<br />" . mysql_error();
		}

}
	if (!empty($message)) {echo "<p>" . $message . "</p>";}
	?>

<?php
if (isset($GLOBALS['connection'])){mysqli_close($GLOBALS['connection']);}
?>