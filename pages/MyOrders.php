<!DOCTYPE html>
<html lang="en-ca" >


<body >
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "./mynav.php"; ?>
    <!-- END mynav.php INCLUDE -->
</header>


<main class="section" style="margin: 75px; height: auto">

    <div  style="width: 70%; margin: auto">

        <table cellpadding="10" cellspacing="1">
            <tbody>

        <?php
        $conn=$GLOBALS['connection'];

            if(isset($_SESSION["Email"])){

                $useremail=$_SESSION["Email"];

    $query= mysqli_query($conn,"Select * from costumer WHERE Email='$useremail'");
    while( $row = mysqli_fetch_array($query) )
    {
        echo "<h6><strong>Customer Name: $row[FullName]</strong></h6><br>";
        echo "<h6>Custumer Email: $row[Email]</h6><br>";

        $userid=$row['UserID'];

        ?>

        <tr>
            <th><strong></strong></th>
            <th><strong>Name</strong></th>
            <th><strong>Quantity</strong></th>
            <th><strong>Price(pr unit)</strong></th>
            <th><strong>subtotal</strong></th>
            <th><strong>Order date</strong></th>
            <th><strong>Order status</strong></th>
        </tr>

        <?php
    $result=mysqli_query($conn,"Select * from orderedproduct WHERE UserID='$userid'  ");
        while( $roworder = mysqli_fetch_array($result) )
        {
            $orderdate=$roworder['OrderDate'];
            $quan=$roworder['Quantity'];
            $subtotal=$roworder['subTotalPrice'];
           // var_dump(array($subtotal));
           // echo "Total price: ".array_sum($subtotal);
            $proid=$roworder['ProductID'];

        $products=mysqli_query($conn,"select * from product WHERE productID=$proid");
           while ( $orders=mysqli_fetch_array($products)){

               $proname=$orders['productName'];
               $price=$orders['Price'];
               $image=$orders['Image'];


               foreach ($products as $orders)
                   {
                    ?>
                    <tr>
                        <td><img style="width: 150px; height: auto" <?php echo "src=../asset/Ducks/$image"; ?> ></td>
                        <td><strong><?php echo $proname; ?></strong></td>
                        <td><?php echo $quan; ?></td>
                        <td><?php echo $price." DKK"; ?></td>
                        <td><?php echo $subtotal; ?></td>
                        <td><?php echo $orderdate; ?></td>
                        <td>Shipped</td>
                    </tr><br>

            <?php
           }
           } }
        ?>
        </tbody>
        </table>
    </div><hr>
    <?php
    }}
    ?>

    <a class="btn right" type="submit" name="sabmit" href="../pages/home.php <?php unset($_SESSION["cart_item"]);?>" >
        <strong>Finish</strong>
    </a>

</main>

<footer class="page-footer teal darken-4">

    <?php include "footer.php"; ?>
</footer>


</body>
</html>