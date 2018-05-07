<?php
require_once "../Functions/TextDAO.php";

?>

<!DOCTYPE html>
<html lang="en-ca">


<body class="container">  <!-- id indicates page; is used by menu CSS to indicate active page. -->


    <header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "./mynav.php"; ?>
    <!-- END mynav.php INCLUDE -->

            <div class=" row card-panel teal darken-4">
                <h3 class="white-text" >Rubber Duck's Shop.</h3>
                <p class="white-text"> Find the cutest and newest rubber ducks here!</p>
            </div>
    </header>

    <main  class="section">
<div class="row">

    <?php

    //Read Products from Database
    $query = "SELECT * FROM product LIMIT 8";
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


</div>
    </main>

<footer class="page-footer teal darken-4">

    <?php include "footer.php"; ?>
</footer>


</body>
</html>
