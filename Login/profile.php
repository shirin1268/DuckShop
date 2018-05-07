<?php
require_once("../DB/Connection.php");


if(isset($_POST["submit"])) {

    $Email=$_SESSION['Email'];

    $result = mysqli_query($GLOBALS['connection'],"SELECT * FROM costumer where Email='{$Email}'");

    $FullName = $_POST['FullName'];
    $Gender=$_POST['Gender'];
    $Adress=$_POST['Adress'];
    $Tel=$_POST['Tel'];

    $target_dir = "../asset/profilePic/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $target_pic= $_FILES["fileToUpload"]["name"];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $file = $_FILES["fileToUpload"]["tmp_name"];
    $imageType = getimagesize($file);
    //$size = filesize($file);

// Check if image file is a actual image or fake image
   // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($imageType !== false) {
        echo "File is an image - " . $imageType["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}
else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}

   $result= mysqli_query($GLOBALS['connection'],"UPDATE `costumer` SET `FullName`='$FullName',`Gender`='$Gender',`Tel`='$Tel',`Adress`='$Adress',`Picture`='$target_pic' WHERE Email='$Email'");

	if ($result) {
		$message = "Your profile is updated!.";
	} else {
		$message = "Your profile can not be edited.";
		$message .= "<br />" . mysql_error();
	}

if (!empty($message)) {echo "<p>" . $message . "</p>";}

}

