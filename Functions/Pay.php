<?php

require "ShoppingCard.php";


 $date=date("Y-m-d");
$conn=$GLOBALS['connection'];

if(isset($_SESSION["cart_item"])){
    foreach ($_SESSION["cart_item"] as $item){

if(isset($_SESSION["Email"])){
    $Useremail=$_SESSION['Email'];
    $stmt=$conn->prepare("select * from `costumer` WHERE Email='$Useremail' ");
    $stmt->execute();
    $result=$stmt->get_result();
    $foundUser=mysqli_fetch_array($result);

    $UserID=$foundUser["UserID"];
    $itemID=$item["productID"];
    $itemQua=$item["quantity"];
    $itemprice=$item["Price"];
    $subTotal=$item["quantity"]*$item["Price"];


    $order=$conn->prepare("INSERT INTO `orderedproduct`(`UserID`, `ProductID`, `Quantity`, `subTotalPrice`, `OrderDate`) 
VALUES('$UserID','$itemID','$itemQua','$subTotal','$date')");
    $order->execute();
    $ordderDetail=$order->get_result();
}


    }
}
?>


        <div class="card" style="margin:200px auto;padding: 5%; width: 60%; border-style: solid; border-color: #004d40">

            <h2 style="margin: auto; text-align: center; color: teal; line-height: 50px">
                Thank you for purchasing the beautiful ducks.<br> we hope you enjoy your purchase and are happy for the
                products.<br>
                please contact us if there are more information you need.
            </h2>

            <a class="btn center" type="Confirm" name="Confirm" href="../pages/MyOrders.php?action=date<?php echo $date; ?>" >
                Check & Confirm
            </a>
        </div>

    <?php

//unset($_SESSION["cart_item"]);
//header("refresh:7; url= ");

?>