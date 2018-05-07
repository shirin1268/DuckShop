<html>

<body class="container">
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "adminNav.php"; ?>
    <!-- END mynav.php INCLUDE -->

</header>

<div class="row" >
    <?php
    $products = mysqli_query($GLOBALS['connection'],"SELECT * FROM `product` WHERE `productID`= '".$_GET['productID']."' ");
    $allCatArray = mysqli_fetch_array($products);
        ?>
        <div style="padding:35px" >
                <form name="imgUp" method="post" action="../Controller/productDAO.php" enctype="multipart/form-data">
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

                <div class="input-field">
                    <b class="active" for="sale">Sale status:</b>
                    <input type="checkbox" id="myCheck" onclick="myFunction()">
                    <p id="text" style="display:none">On Sale!</p>
                </div>
                <br><br>

                    <button class="btn center"  type="update" name="update">
                        Update
                    </button>

            </form>
        </div>
</div>
<script>
    function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("myCheck");
        // Get the output text
        var text = document.getElementById("text");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>
</body>
</html>
