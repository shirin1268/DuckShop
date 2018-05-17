<?php


	session_start();

	function logged_in() {
		return isset($_SESSION['Email']);
        }

	function confirm_logged_in() {
		if (!logged_in()) {
		    echo "Please login first";
            header("refresh:2; url=../../index.php");
		}
	}
//session_unset();
?>