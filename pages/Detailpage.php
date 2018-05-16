<?php

require ("../Functions/recentlyController.php");
?>

<!DOCTYPE html>
<html lang="en-ca">


<body >  <!-- id indicates page; is used by menu CSS to indicate active page. -->


<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "./mynav.php"; ?>
    <!-- END mynav.php INCLUDE -->
</header>

<main class="section" style="margin: 75px; height: auto">

        <?php

        //Read Products from Database

        $query = "SELECT * FROM `product` WHERE `productID` = '" . $_GET["productID"] . "' ";
        $result = mysqli_query($GLOBALS['connection'], $query) or die('Error, query failed');
        $productRow=mysqli_fetch_array($result);

        $item=$productRow["Image"];
        setRecentProduct("$item",htmlspecialchars($_SERVER['REQUEST_URI']));


        foreach ($result as $productRow){
        }
        ?>

<div class="row">
        <form method="post" style="width: 40%; margin: 0" action="../Functions/ShoppingCard.php?action=add&productID=<?php echo $productRow['productID'];?>">

     <span class="card-title center" style="font-size: 45px; color: teal">
                       <?php echo $productRow["productName"] ; ?> </span>
            <div class="card" >
                <div class="card-image"style="width: 400px; height: 400px">
                    <img class="card-image" style="margin: auto; width:auto; height:90%"
                        <?php echo "src=../asset/Ducks/$productRow[Image]"; ?> >
                </div>
            </div>

            <div class="card-content">
                <div> <p style="color:red; font-size:50px; margin: -85px 0 3px 39px; position: absolute;"><?php
                        if ($productRow["OnSale"] == 1){
                            echo 'Sale';
                        } ?></p>
                </div>
                <div >
                    <input type="number" style="height: 25px; width:50%; margin: auto" name="quantity" value="1">
                    <input type="submit" name="addtocart" style="float: left; margin-right: 10px" value="+" class="btn-block center">
                    <i onclick="document.getElementById('<?php echo $productRow['productID'];?>').style.color ='red'" class="fa fa-heart" id="<?php echo $productRow['productID'];?>" style="color: teal; margin-right: 20px"></i>
                </div>
            </div>
        </form>
        <div class="card-content" style="float: right; margin-right: 30%; margin-top: -350px" >
            <b style="float: left">Status:</b>
            <br>
            <b class="text left" style="float: left"><?php if($productRow["Stock"]>0){
                    echo "It is available";
                }
                else{
                    echo "Not available!";
                }?></b>
            <br><br>
                    <b style="float: left">Price:</b>
                    <br>
                    <b class="text left" style="float: left"><?php echo $productRow["Price"] . " -DKK "; ?></b>
                    <br><br>
                    <b style="float: left">Category:</b>
                    <br>
                    <b class="text left" style="float: left"><?php echo $productRow["CategoryName"]  ?></b>
                    <br><br>
                    <b style="float: left">Description:</b>
                    <br><?php
            $query="SELECT Description from category WHERE CategoryName='".$productRow["CategoryName"]."'";
            $result=mysqli_query($GLOBALS['connection'],$query);
            $description= mysqli_fetch_assoc($result);

            ?>
                    <b class="text left" style="float: left"><?php echo $description["Description"]  ?></b>
                    <br><br>
        </div>
</div>
    <br>
    <br>
<hr>
    <div class="row" style="width: 90%; margin: auto; height: auto">
    <?php
    getRecentProducts();
    ?>
    </div>
</main>

<footer class="page-footer teal darken-4">
    <?php include "footer.php"; ?>
</footer>



</body>
</html>

