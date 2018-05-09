<?php
require_once "../Functions/TextDAO.php";
//require_once "../AdminArea/Controller/productDAO.php";

?>

<!DOCTYPE html>
<html lang="en-ca">


<body >  <!-- id indicates page; is used by menu CSS to indicate active page. -->


    <header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "./mynav.php"; ?>
    <!-- END mynav.php INCLUDE -->

            <div class=" row card-panel" style="margin-top: 35px">
                <h3 class="teal-text" style="margin-left: 45px" >Rubber Duck's Shop.</h3>
                <p class="teal-text" style="margin-left: 45px"> Find the cutest and newest rubber ducks here!</p>
            </div>
    </header>

    <main class="section" style="margin-left: 45px">
<div class="row">
    <h4 class="teal-text" style="margin-left: 45px">The newest ducks!</h4>

    <?php

    //Read Products from Database
    $query = "SELECT * FROM product ORDER BY productID DESC LIMIT 8 ";
    $result = mysqli_query($GLOBALS['connection'], $query) or die('Error, query failed');
    $productRow=mysqli_fetch_array($result);


    foreach ($result as $productRow){
    ?>

        <div class="card small">
            <form method="post" action="../Functions/ShoppingCard.php?action=add&productID=<?php echo $productRow['productID'];?>">
                <div class="card-image">

                    <img class="card-image" style="margin: auto;"
                        <?php echo "src=../asset/Ducks/$productRow[Image]"; ?> >

                </div>

                <div class="card-content">
                    <div> <p style="color:red; font-size:50px; margin: -64px 0 3px 39px; position: absolute;"><?php
                        if ($productRow["OnSale"] == 1){
                            echo 'Sale';
                        } ?></p>
                    </div>
                  <span class="card-title center">
                       <?php echo $productRow["productName"]; ?> </span>
                    <p class="text center"><?php echo $productRow["Price"] . " -DKK "; ?></p>
                    <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i>

                    <input type="number" name="quantity" value="1">
                    <input type="submit" name="addtocart" value="Add to cart" class="addBtn">

                </div>
            </form>
        </div>

        <?php
        }
          ?>


</div>
        <div class="row">
            <h4 class="teal-text" style="margin-left: 45px">Daily offers</h4>

        <?php
               //Read Products from Database
            $query = "SELECT * FROM product WHERE Onsale=1 LIMIT 4 ";
            $result = mysqli_query($GLOBALS['connection'], $query) or die('Error, query failed');
            $productRow=mysqli_fetch_array($result);


            foreach ($result as $productRow){
                ?>

                <div class="card small">

                    <form method="post" action="../Functions/ShoppingCard.php?action=add&productID=<?php echo $productRow['productID'];?>">
                        <div class="card-image">

                            <img class="card-image" style="margin: auto;"
                                <?php echo "src=../asset/Ducks/$productRow[Image]"; ?> >

                        </div>

                        <div class="card-content">
                             <p style="color:red; font-size:50px; margin: -64px 0 3px 39px; position: absolute;"><?php
                                    if ($productRow["OnSale"] == 1){
                                        echo 'Sale';
                                    } ?></p>

                            <span class="card-title center">
                       <?php echo $productRow["productName"]; ?> </span>
                            <p class="text center"><?php echo $productRow["Price"] . " -DKK "; ?></p>

                            <input type="number" name="quantity" value="1">
                            <input type="submit" name="addtocart" value="Add to cart" class="addBtn">

                        </div>
                    </form>
                </div>

                <?php
            }
            ?>
            <a class="btn-medium right teal-text" href="catalogue.php">
                See more...
            </a>
        </div>

    </main>

<footer class="page-footer teal darken-4">

    <?php include "footer.php"; ?>
</footer>


</body>
</html>
