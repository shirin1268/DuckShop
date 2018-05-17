<html>

<body >
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "adminNav.php"; ?>
    <!-- END mynav.php INCLUDE -->

</header>
<div class="row" >
     <h5>All products</h5>
                    <?php

    $conn = $GLOBALS['connection'];

    $stmt = $conn->prepare("SELECT * FROM `product`");
    $stmt->execute();
    $result = $stmt->get_result();

    $allCatArray = mysqli_fetch_assoc($result);



                foreach ($result as $allCatArray) {
                    ?>
                    <div class="card medium">

                            <div class="card-image">
                                <img class="card-image" style="margin: auto;" src=<?php echo "../../asset/Ducks/$allCatArray[Image]"; ?> >
                            </div>

                            <div class="input-field ">
                                <p class="active" for="productName">Product Name: <?php echo $allCatArray["productName"]; ?></p>
                            </div>

                            <div class="input-field ">
                                <p class="active" for="productID">Product ID: <?php echo $allCatArray["productID"]; ?></p>
                            </div>

                            <div class="input-field ">
                                <p class="active" for="CategoryName">Category Name: <?php echo $allCatArray["CategoryName"]; ?></p>
                            </div>

                            <div class="input-field">
                                <p class="active" for="Price"><?php echo $allCatArray["Price"]; ?> -DKK </p>
                            </div>
                        <a href="productdetailDAO.php?productID=<?php echo $allCatArray["productID"];?> ">
                                    <button class="btn"  type="edit" name="edit">
                                        Edit
                                    </button>
                        </a>

                    </div>

                <?php } ?>
    </div>
</body>
</html>
