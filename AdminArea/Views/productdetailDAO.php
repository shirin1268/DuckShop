<?php
//require "../Controller/productDAO.php";
?>


<html>

<body class="container">
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "adminNav.php"; ?>
    <!-- END mynav.php INCLUDE -->

</header>

<div class="row" >
    <?php
    $conn = $GLOBALS['connection'];
    $productId= $_GET['productID'];
    $stmt = $conn->prepare("SELECT * FROM `product` WHERE `productID`= ?");

    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    $allCatArray = mysqli_fetch_array($result);
        ?>
        <div style="padding:35px" >
                <form name="imgUp" method="post" action="../Controller/productDAO.php?productID=<?php echo $allCatArray["productID"];?>" enctype="multipart/form-data">
                    <div class="card-image">
                        <img class="card-image" style="width:200px; margin: auto;" src=<?php echo "../../asset/Ducks/$allCatArray[Image]"; ?> >

                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="image">
                            </div>
                            <div class="file-path-wrapper" >
                                <input class="file-path validate" type="text" placeholder="upload file" >
                            </div>
                        </div>
                    </div>

                    <div class="input-field">
                        <b class="active" for="productName">Product Name:</b>
                        <span class="card-title center">
                            <?php echo $allCatArray["productName"]; ?>
                        </span>
                        <input placeholder="New name" type="text" name="newproductname" class="validate">
                    </div>

                <div>
                <b class="active" for="CategoryName">Category Name:</b>
                <span class="card-title center">
                    <?php echo $allCatArray["CategoryName"]; ?>
                </span>
                <select placeholder="New Category" class="browser-default" name="newcategoryname" >
                    <?php
                    $result=mysqli_query($GLOBALS['connection'],'SELECT * FROM `category`');
                    $row = mysqli_fetch_array($result);
                    foreach($result as $row)
                    { echo "<option >".$row['CategoryName']."</option>";}?>
                </select>
                </div>

                <div class="input-field">
                    <b class="active" for="Price">Price:</b>
                    <span class="card-title center">
                        <?php echo $allCatArray["Price"]; ?> -DKK </span>
                    <input class="file-path validate" type="text" name="newPrice" placeholder="New Price" >
                </div>

                <div>

                    <input type="checkbox" id="sale" name="salestatus" <?php if($allCatArray["OnSale"]==1){
                    echo 'checked=\"checked\"';}?> >
                    <label  for="sale">Sale status:</label>

                </div>
                <br><br>

                    <button class="btn center"  type="update" name="update">
                        Update
                    </button>


            </form>
        </div>
</div>

</body>
</html>
