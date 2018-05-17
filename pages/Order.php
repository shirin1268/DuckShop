
<!DOCTYPE html>
<html lang="en-ca" xmlns="http://www.w3.org/1999/html">


<body >  <!-- id indicates page; is used by menu CSS to indicate active page. -->
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "./mynav.php";
    confirm_logged_in();?>
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
                $catname = array();
                foreach ($_SESSION["cart_item"] as $item){
                    ?>
                    <tr>
                        <a href="Detailpage.php?productID=<?php echo $item['productID'];?>">
                            <td><img style="width: 150px; height: auto" <?php echo "src=../asset/Ducks/$item[Image]"; ?> ></td>
                        </a>
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
                    array_push($catname, $item["CategoryName"]);

                $item_total += ($item["Price"]*$item["quantity"]);}
                ?>

                <tr>
                    <td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total. " DKK"; ?></td>
                </tr>
                </tbody>
            </table>
            <?php

        ?>
</div>

    <hr>
<button class="btn right" id="Checkout" value="Pay" onclick="myFunction()" >
        Pay & check out
</button>

    <div class="row" style="width: 90%; height: auto">
        <h5>You may also like this:</h5>
        <?php
        $newcatname=array_shift($catname);
        $query="select * from product where CategoryName='$newcatname' ORDER BY productName limit 5";
        $result=mysqli_query($GLOBALS['connection'],$query);
        $relevant=mysqli_fetch_array($result);
        foreach ($result as $relevant){?>
           <div class="card" style="margin: 20px; width: 200px; height:auto; float:left">
            <a href="Detailpage.php?productID=<?php echo $relevant['productID'];?>">
                <div class="card-image">
                    <img class="card-image" style="margin: auto;"
                        <?php echo "src=../asset/Ducks/$relevant[Image]"; ?> >
                </div>
            </a>

            <div class="card-content">
                <span class="card-title center">
                       <?php echo $relevant["productName"]; ?>
                </span>
                <p class="text center">
                    <?php echo $relevant["Price"] . " -DKK "; ?>
                </p><br>
            </div>
           </div>


        <?php
        }}
       ?>
    </div>

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