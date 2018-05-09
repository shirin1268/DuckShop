<?php
require_once "../../DB/Connection.php";

$conn = $GLOBALS['connection'];


if(isset($_POST['update'])){
    $productId= $_GET['productID'];

    $stmt = $conn->prepare("UPDATE `product` SET `productName`=? ,`CategoryName`=? ,`Price`=? ,`OnSale`=? WHERE productID='$productId' ");

    $newproductname = $_POST['newproductname'];
    $newcategoryname = $_POST['newcategoryname'];
    $newPrice = $_POST['newPrice'];

    if(isset($_POST['salestatus'])){
        $salestatus=1;
    }   else {$salestatus=0;}


    $stmt->bind_param('ssii', $newproductname,$newcategoryname,$newPrice,$salestatus);
    $stmt->execute();
    $result = $stmt->get_result();

    $upmsg= "Product's informations updated!";


    echo "<h4>$upmsg</h4>";
}
else{
    $ermsg= "Error, Product's informations can not be updated!";
    echo "<h4>$ermsg</h4>";
}

header("refresh:1; url= ../Views/editproduct.php");

/*$referrer = $_SERVER['HTTP_REFERER'];

header ("Refresh: 2;URL='$referrer'");
*/



