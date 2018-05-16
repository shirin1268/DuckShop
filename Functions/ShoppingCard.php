<?php
require "../DB/Connection.php";
require_once "../DB/session.php";

confirm_logged_in();

if(!empty($_GET["action"])) {
//start the switch/case
    switch($_GET["action"]) {

        case "add":
            if(!empty($_POST["quantity"])) {
                $query= "SELECT * FROM `product` WHERE `productID` = '" . $_GET["productID"] . "' ";
                $result = mysqli_query($GLOBALS['connection'], $query);
                $row=mysqli_fetch_assoc($result);
                $results[] = $row;
                $productById=$results;

                $itemArray = array($productById[0]["productID"]=>array(
                    'Image'=>$productById[0]["Image"],
                    'productName'=>$productById[0]["productName"],
                    'productID'=>$productById[0]["productID"],
                    'quantity'=>$_POST["quantity"],
                    'CategoryName'=>$productById[0]["CategoryName"],
                    'Price'=>$productById[0]["Price"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productById[0]["productID"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productById[0]["productID"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }header('Location: ' . $_SERVER['HTTP_REFERER']);

            break;


//Remove item from cart
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET['productID'] == $_SESSION["cart_item"][$k]['productID'])
                        unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            } header('Location: ' . $_SERVER['HTTP_REFERER']);
            break;



//Empty the entire cart
        case "empty":
            unset($_SESSION["cart_item"]);
            header("refresh:1; url=../index.php");
            break;
    }




}
?>
