<?php
/*
function mysql_prep($value){
    global $connection;
    $value = mysqli_real_escape_string($connection,htmlspecialchars(trim($value)));
    return $value;
}
*/
function redirect_to($location) {
	header("Location: {$location}");
	exit;
}
