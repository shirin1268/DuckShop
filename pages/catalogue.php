
<!DOCTYPE html>
<html lang="en-ca">

<body class="container">

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



        </div>
                <?php
                if (isset($_GET['cat']))
                {

                    $cat=$_GET['cat'];

                    $conn = $GLOBALS['connection'];
                    $stmt = $conn->prepare("SELECT * FROM product WHERE CategoryName = ?");
                    $stmt->bind_param("s", $cat);
                    $stmt->execute();

                    //$productCat = $GLOBALS['connection']->( "SELECT * FROM product WHERE CategoryName = '".$cat."' ");

                    $result = $stmt->get_result();
                    //$catArray = mysqli_fetch_array($productCat);
                foreach ($result as $catArray) {

                //foreach ($productCat as $catArray) {


                    ?>
                    <div class="card small">
                        <form method="post"
                              action="../Functions/ShoppingCard.php?action=add&productID=<?php echo $catArray['productID']; ?>">
                            <div class="card-image">
                                <img class="card-image" style="margin: auto;" src=
                                <?php
                                echo "../asset/Ducks/$catArray[Image]"; ?> >
                            </div>

                            <div class="card-content">
                  <span class="card-title center">
                       <?php echo $catArray["productName"]; ?> </span>
                                <p class="text center"><?php echo $catArray["Price"]; ?> -DKK </p>

                                <input type="number" name="quantity" value="1">
                                <input type="submit" value="Add to cart" class="addBtn">
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
                            <div class="card-image">
                                <img class="card-image" style="margin: auto;" src=
                                <?php
                                echo "../asset/Ducks/$allCatArray[Image]"; ?> >
                            </div>

                            <div class="card-content">
                  <span class="card-title center">
                       <?php echo $allCatArray["productName"]; ?> </span>
                                <p class="text center"><?php echo $allCatArray["Price"]; ?> -DKK </p>

                                <input type="number" name="quantity" value="1">
                                <input type="submit" value="Add to cart" class="addBtn">
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