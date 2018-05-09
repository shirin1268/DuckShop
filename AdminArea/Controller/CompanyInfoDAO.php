<?php
require "../../DB/Connection.php";

$conn = $GLOBALS['connection'];
//Update company informations
if(isset($_POST['update'])){


	$Coname = $_POST['Coname'];
	$Adress = $_POST['Adress'];
    $CoDes = $_POST['Description'];
    $CoEmail= $_POST['CoEmail'];
    $CoTel= $_POST['CoTel'];

    $stmt=$conn->prepare("UPDATE `companyinformation` SET `CompanyName`=?,`CompanyAdress`=?, `CompanyDescription`=?,`CompanyEmail`=? ,`CompanyTel`=? WHERE CompanyID=1");
    $stmt-> bind_param('ssssi',$Coname,$Adress,$CoDes,$CoEmail,$CoTel);
    $stmt->execute();
    $info = $stmt->get_result();
	$upmsg= "information updated!";

	echo "<h4>$upmsg </h4>";
    header("refresh:1; url= ../Views/informations.php");
}

// get CompanyName Adress and set into the inputfeilds
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

    $stmt=$conn->prepare
    ("UPDATE `openinghours` set `MonOpen`=?,`TuesOpen`=?,`WedOpen`=?,`ThursOpen`=?,`FriOpen`=?,`SatOpen`=?,
    `SunOpen`=?,`MonClose`=?,`TueClose`=?,`WedClose`=?,`ThursClose`=?,`FriClose`=?,`SatClose`=?,`SunClose`=? WHERE 1 ");

    $stmt->bind_param('ssssssssssssss',$monopen,$tuesopen,$wedopen,$thursopen,$friopen,$satopen,$sunopen,$monclose,$tuesclose,$wedclose,
           $thursclose,$friclose,$satclose,$sunclose);
    $stmt->execute();
    $result = $stmt->get_result();

    $upmsg= "information updated!";

    echo "<h4>$upmsg</h4>";
    header("refresh:1; url= ../Views/informations.php");}


//Get the current opening hours and set into the time casual
$Openinghours=mysqli_query($GLOBALS['connection'],"SELECT * FROM openinghours");
$openingtime=mysqli_fetch_array($Openinghours);


