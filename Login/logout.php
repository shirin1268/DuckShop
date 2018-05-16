<?php require_once("../DB/session.php"); ?>
<?php require_once ("../DB/Connection.php");?>
<?php require_once ("../Login/func.php");?>
<?php

		// Four steps to closing a session
		// (i.e. logging out)

		// 1. Find the session
		session_start();
		
		// 2. Unset all the session variables
		$_SESSION = array();
		
		// 3. Destroy the session cookie
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		
		// 4. Destroy the session
		session_destroy();

		// Redirect to the home page
		$home_url = '../pages/home.php';
		header('Location: ' . $home_url);
?>