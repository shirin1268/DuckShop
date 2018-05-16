
<!DOCTYPE html>
<html lang="en-ca">

<body >

    <header>
        <!-- BEGIN mynav.php INCLUDE -->
        <?php include "./mynav.php"; ?>
        <!-- END mynav.php INCLUDE -->


    </header>


    <main  class="section">
        <div class="row center">
            <div class="center-block">
            <?php

            $result= mysqli_query($GLOBALS['connection'],'SELECT CategoryName FROM `category`') ;

            $row=mysqli_fetch_array($result);

            while($row = mysqli_fetch_array($result))
            {?>

             <a class="btn-large" href="catalogue.php?cat=<?php echo $row['CategoryName'] ; ?> ">
                 <?php   echo $row['CategoryName'];?>
                </a>
                <?php  }  ?>
                <a class="btn-large" href="catalogue.php">
                    Show all
                </a>


        </div>
                <?php
                if (isset($_GET['cat']))
                {

                    $cat=$_GET['cat'];

                    $conn = $GLOBALS['connection'];
                    $stmt = $conn->prepare("SELECT * FROM product WHERE CategoryName = ?");
                    $stmt->bind_param("s", $cat);
                    $stmt->execute();
                    $result = $stmt->get_result();

                foreach ($result as $catArray) {


                    ?>
                    <div class="card small">
                        <form method="post"
                              action="../Functions/ShoppingCard.php?action=add&productID=<?php echo $catArray['productID']; ?>">
                            <a href="Detailpage.php?productID=<?php echo $catArray['productID'];?>">
                            <div class="card-image">
                                <img class="card-image" style="margin: auto;" src=
                                <?php
                                echo "../asset/Ducks/$catArray[Image]"; ?> >
                            </div>
                            </a>

                            <div class="card-content">
                                <p style="color:red; font-size:40px; margin: -64px 0 3px 39px; position: absolute;"><?php
                                    if ($catArray["OnSale"] == 1){
                                        echo 'Sale';
                                    } ?></p>
                  <span class="card-title center">
                       <?php echo $catArray["productName"]; ?> </span>
                                <p class="text center"><?php echo $catArray["Price"]; ?> -DKK </p>

                                <br>
                                <i onclick="document.getElementById('<?php echo $catArray["productID"]; ?>').style.color ='red'" class="fa fa-heart" id="<?php echo $catArray["productID"]; ?>" style="color: teal"></i>
                                </i>

                                <input type="number" style="height: 25px; width: 70%; margin: auto" name="quantity" value="1">
                                <input type="submit" name="addtocart" style="float: right" value="+" class="btn-block center">
                            </div>
                        </form>
                    </div>

                    <?php
                }
                }else {?>

                    <h5>All products</h5>
                    <?php
                $products = mysqli_query($GLOBALS['connection'], "SELECT * FROM `product`");
                $allCatArray = mysqli_fetch_assoc($products);

                foreach ($products as $allCatArray) {

                    ?>

                    <div class="card small">

                        <form method="post"
                              action="../Functions/ShoppingCard.php?action=add&productID=<?php echo $allCatArray['productID']; ?>">
                            <a href="Detailpage.php?productID=<?php echo $allCatArray['productID'];?>">
                            <div class="card-image">
                                <img class="card-image" style="margin: auto;" src=
                                <?php
                                echo "../asset/Ducks/$allCatArray[Image]"; ?> >
                            </div>
                            </a>
                            <div class="card-content">
                                <p style="color:red; font-size:40px; margin: -64px 0 3px 39px; position: absolute;"><?php
                                    if ($allCatArray["OnSale"] == 1){
                                        echo 'Sale';
                                    } ?></p>
                  <span class="card-title center">
                       <?php echo $allCatArray["productName"]; ?> </span>
                                <p class="text center"><?php echo $allCatArray["Price"]; ?> -DKK </p>

                                <i onclick="document.getElementById('<?php echo $allCatArray['productID']; ?>').style.color ='red'" class="fa fa-heart" id="<?php echo $allCatArray['productID']; ?>" style="color: teal"></i>

                                <input type="number" style="height: 25px; width: 70%; margin: auto" name="quantity" value="1">
                                <input type="submit" name="addtocart" style="float: right" value="+" class="btn-block center">
                            </div>
                        </form>
                    </div>

                <?php } } ?>

</div>
    </main>

    <footer class="page-footer teal darken-4">

        <?php include "footer.php"; ?>
    </footer>

</body>
</html>