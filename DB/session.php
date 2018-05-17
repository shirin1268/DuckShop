<?php


	session_start();

	function logged_in() {
		return isset($_SESSION['Email']);
        }

	function confirm_logged_in() {
		if (!logged_in()) {
		    echo "<h1 style='color: red'>Please login first</h1>";
            header("refresh:2; url=../index.php");
		}
	}
//session_unset();
?>