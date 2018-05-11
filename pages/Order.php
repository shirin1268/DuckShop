
<!DOCTYPE html>
<html lang="en-ca" xmlns="http://www.w3.org/1999/html">


<body >  <!-- id indicates page; is used by menu CSS to indicate active page. -->
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "./mynav.php"; ?>
    <!-- END mynav.php INCLUDE -->


</header>

<main class="section" style="margin: 75px; height: auto">
        <div class="btn">
            <a id="emptyBtn" href="../Functions/ShoppingCard.php?action=empty">Empty Cart</a>
        </div>

<div  style="width: 70%; margin: auto">
        <?php

        $conn=$GLOBALS['connection'];
        //Reset total cost to do recalc
        if(isset($_SESSION["cart_item"])){
            $item_total = 0;

            ?>

            <table cellpadding="10" cellspacing="1">
                <tbody>
                <tr>
                    <th><strong></strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>ID</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Price</strong></th>
                    <th><strong>Action</strong></th>
                </tr>
                <?php
                foreach ($_SESSION["cart_item"] as $item){
                    ?>
                    <tr>
                        <td><img style="width: 150px; height: auto" <?php echo "src=../asset/Ducks/$item[Image]"; ?> ></td>
                        <td><strong><?php echo $item["productName"]; ?></strong></td>
                        <td><?php echo $item["productID"]; ?></td>
                        <td><?php echo $item["quantity"]; ?></td>
                        <td><?php echo $item["Price"]." DKK"; ?></td>
                        <td>
                            <a href="../Functions/ShoppingCard.php?action=remove&productID=<?php echo $item["productID"]; ?>
                              " class="removeBtn">Remove</a>
                        </td>
                    </tr>
                    <?php
                    $item_total += ($item["Price"]*$item["quantity"]);}
                ?>

                <tr>
                    <td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total. " DKK"; ?></td>
                </tr>
                </tbody>
            </table>
            <?php
        }
        ?>
</div>


<button class="btn right" id="Checkout" value="Pay" onclick="myFunction()" >
        Pay & check out
</button>

    <script>
        function myFunction() {
            var x;
            var r = confirm("Are you sure that you want to pay?");
            if (r == true) {
                x = "Thank you! You are paid your orders.";
                window.location.href = "../Functions/Pay.php";
            }
            else {
                x = "You pressed Cancel!";
            }
            document.getElementById("demo").innerHTML = x;
        }
    </script>



</main>

<footer class="page-footer teal darken-4">

    <?php include "footer.php"; ?>
</footer>


</body>
</html>