<?php require_once( "../../DB/Connection.php" ); ?>

<?php
spl_autoload_register(function ($class){
	include "Class/".$class.".php";});
define("MAX_SIZE" , "3000");
$upmsg = array();
if(isset($_POST['submit'])){
	if($_FILES['image']['name']){
		$imagename = $_FILES['image']['name'];
		$file = $_FILES['image']['tmp_name'];
		$image_type = getimagesize($file);
		if($image_type[2]==2 || $image_type[2]==3 || $image_type[2]==4){
			$size = filesize($file);
			if($size<MAX_SIZE*1024){
				$prefix = uniqid();
				$iName = $prefix."_".$imagename;
				$newname = "../../asset/Ducks/".$iName;
				$resOBJ = new ImageResizer();
				$resOBJ->load($file);
				if($_POST['resizetype']=="width"){
					$width = $_POST['size'];
					$resOBJ->resizeToWidth(trim($width));
					array_push($upmsg, "Image resized to $width px wide");
				}elseif ($_POST['resizetype']=="height"){
					$height = $_POST['size'];
					$resOBJ->resizeToHeight(trim($height));
					array_push($upmsg, "Image resized to $height px high");
				}elseif ($_POST['resizetype']=="scale"){
					$scale = $_POST['size'];
					$resOBJ->scale(trim($scale));
					array_push($upmsg,"image scaled to $scale %");
				}
			}else{array_push($upmsg,"image to big! max 3mb");}
		}else{array_push($upmsg,"wrong filetype!");}
		$resOBJ->save($newname);

		$price = $_POST['price'];
		$productname= $_POST['productname'];
		$categoryname= $_POST['categoryname'];
		$stock=$_POST['stock'];
		$result= mysqli_query($GLOBALS['connection'],"INSERT INTO `product` (`productName`, `CategoryName`, `Price`, `Image`, `Stock`) 
VALUES ('$productname', '$categoryname', '$price', '$iName', '$stock')");

		array_push($upmsg, "image uploaded!");

		header("refresh:1; url= ../Views/addproducts.php");

	}else{array_push($upmsg, "no file selected!");}
}

foreach($upmsg as $msg){
	echo "<h4>$msg</h4>";
}
?>
