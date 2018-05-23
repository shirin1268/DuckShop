<?php


	session_start();

	function logged_in() {
		return isset($_SESSION['Email']);
        }

	function confirm_logged_in() {
		if (!logged_in()) {
		    echo "<h1 style='color: red'>Please login first</h1>";
          
		}
	}
//session_unset();
?>