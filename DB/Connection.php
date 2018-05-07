<?php
include_once ("Constant.php");

//oprette en forbindelse til mysql:

$GLOBALS['connection'] = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);


//hvis forbindelsen ikke kan oprettes, så kom med en fejlbesked, og luk forbindselsen:
if (mysqli_connect_errno($GLOBALS['connection'])) //hvis der IKKE kunne læses noget til variablen, så luk forbindelsen:
{
	die ("Failed to connect to MySQL: " . mysqli_connect_error());
}
//mysqli_close($GLOBALS['connection']);