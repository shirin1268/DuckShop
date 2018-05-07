<?php
require "../../DB/Connection.php";
if(isset($_POST['update'])){


    $newproductname = $_POST['newproductname'];
    $newcategoryname = $_POST['newcategoryname'];
    $newPrice = $_POST['newPrice'];
    $Sale= $_POST['sale'];

    $result= mysqli_query($GLOBALS['connection'],"UPDATE `product` 
SET `productName`='$newproductname',`CategoryName`='$newcategoryname',`Price`='$newPrice',`OnSale`='$Sale' WHERE 1");
echo $result;
    $upmsg= "Product's informations updated!";

    echo "<h4>$upmsg</h4>";
}
else{
    echo "Error, informations can not be updated!";
}
//header('Location: ' . $_SERVER['HTTP_REFERER']);


