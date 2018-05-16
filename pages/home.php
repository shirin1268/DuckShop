<?php
//require_once "../Functions/TextDAO.php";

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
                <a href="Detailpage.php?productID=<?php echo $productRow['productID'];?>">
                    <div class="card-image">
                        <img class="card-image" style="margin: auto;"
                        <?php echo "src=../asset/Ducks/$productRow[Image]"; ?> >
                    </div>
                </a>

                <div class="card-content">
                    <div> <p style="color:red; font-size:50px; margin: -85px 0 3px 39px; position: absolute;"><?php
                        if ($productRow["OnSale"] == 1){
                            echo 'Sale';
                        } ?></p>
                    </div>
                  <span class="card-title center">
                       <?php echo $productRow["productName"]; ?> </span>

                    <p class="text center"><?php echo $productRow["Price"] . " -DKK "; ?></p>
                    <br>
                    <i onclick="document.getElementById('<?php echo $productRow["productID"]; ?>').style.color ='red'" class="fa fa-heart" id="<?php echo $productRow["productID"]; ?>" style="color: teal"></i>

                    <input type="number" style="height: 25px; width: 70%; margin: auto" name="quantity" value="1">
                    <input type="submit" name="addtocart" style="float: right" value="+" class="btn-block center">

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
                        <a href="Detailpage.php?productID=<?php echo $productRow['productID'];?>">
                           <div class="card-image">
                               <img class="card-image" style="margin: auto;"
                                <?php echo "src=../asset/Ducks/$productRow[Image]"; ?> >
                           </div>
                       </a>

                        <div class="card-content">
                             <p style="color:red; font-size:50px; margin: -85px 0 3px 40px; position: absolute;"><?php
                                    if ($productRow["OnSale"] == 1){
                                        echo 'Sale';
                                    } ?></p>

                            <span class="card-title center">
                       <?php echo $productRow["productName"]; ?> </span>
                            <p class="text center"><?php echo $productRow["Price"] . " -DKK "; ?></p>

                            <br>
                            <i  onclick="document.getElementById('<?php echo $productRow['productID'];?>').style.color ='red'" class="fa fa-heart" id="<?php echo $productRow['productID'];?>" style="color: teal"  ></i>

                            <input type="number" style="height: 25px; width: 70%; margin: auto" name="quantity" value="1">
                            <input type="submit"  name="addtocart" style="float: right" value="+" class="btn-block center">

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
