<?php
require "../../DB/Connection.php";

//Update company informations
if(isset($_POST['update'])){


	$Coname = $_POST['Coname'];
	$Adress = $_POST['Adress'];
    $CoDes = $_POST['Description'];
    $CoEmail= $_POST['CoEmail'];
    $CoTel= $_POST['CoTel'];

    $result= mysqli_query($GLOBALS['connection'],"UPDATE `companyinformation` SET `CompanyName`='$Coname',`CompanyAdress`='$Adress', `CompanyDescription`='$CoDes',`CompanyEmail`='$CoEmail',`CompanyTel`='$CoTel' WHERE CompanyID=1");

	$upmsg= "information updated!";

	echo "<h4>$upmsg</h4>";

}

// get CompanyName Adress and set into the footer
$companyInfo= mysqli_query($GLOBALS['connection'],"SELECT * FROM companyinformation");
$row=mysqli_fetch_array($companyInfo);



if(isset($_POST['Submit'])){
    $monopen= $_POST['monOpen'];
    $monclose= $_POST['monClose'];
    $tuesopen= $_POST['tuesOpen'];
    $tuesclose= $_POST['tuesClose'];
    $wedopen= $_POST['wedOpen'];
    $wedclose= $_POST['wedClose'];
    $thursopen= $_POST['thursOpen'];
    $thursclose= $_POST['thursClose'];
    $friopen= $_POST['friOpen'];
    $friclose= $_POST['friClose'];
    $satopen= $_POST['satOpen'];
    $satclose= $_POST['satClose'];
    $sunopen= $_POST['sunOpen'];
    $sunclose= $_POST['sunClose'];

    echo $thursopen.$friclose;

    $opening=mysqli_query($GLOBALS['connection'],"UPDATE `openinghours` set
    `MonOpen`='$monopen',`TuesOpen`='$tuesopen',`WedOpen`='$wedopen',
    `ThursOpen`='$thursopen',`FriOpen`='$friopen',`SatOpen`='$satopen',
    `SunOpen`='$sunopen',`MonClose`='$monclose',`TueClose`='$tuesclose',
    `WedClose`='$wedclose',`ThursClose`='$thursclose',`FriClose`='$friclose',
    `SatClose`='$satclose',`SunClose`='$sunclose' WHERE `DailyID`=1 ");

    $upmsg= "information updated!";

    echo "<h4>$upmsg</h4>";
    header("refresh:1; url= ../Views/informations.php");
}

$Openinghours=mysqli_query($GLOBALS['connection'],"SELECT * FROM openinghours");
$openingtime=mysqli_fetch_array($Openinghours);


