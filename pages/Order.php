
<!DOCTYPE html>
<html lang="en-ca">


<body class="container">  <!-- id indicates page; is used by menu CSS to indicate active page. -->
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "./mynav.php"; ?>
    <!-- END mynav.php INCLUDE -->


</header>


        <div class="btn">
            <a id="emptyBtn" href="../Functions/ShoppingCard.php?action=empty">Empty Cart</a>
        </div>


        <?php
        //Reset total cost to do recalc
        if(isset($_SESSION["cart_item"])){
            $item_total = 0;

            ?>

            <table cellpadding="10" cellspacing="1">
                <tbody>
                <tr>
                    <th><strong>Image</strong></th>
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
                        <td><img style="width: 200px; height: auto" <?php echo "src=../asset/Ducks/$item[Image]"; ?> ></td>
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
                    $item_total += ($item["Price"]*$item["quantity"]);
                }
                ?>

                <tr>
                    <td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total. " DKK"; ?></td>
                </tr>
                </tbody>
            </table>
            <?php
        }
        ?>




<footer class="page-footer teal darken-4">

    <?php include "footer.php"; ?>
</footer>


</body>
</html>