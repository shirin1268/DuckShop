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


        $orderdate=mysqli_query($conn,"SELECT DISTINCT OrderDate FROM `orderedproduct` WHERE UserID='$userid'");
        $dato = mysqli_fetch_array($orderdate);?>

        <b class="active" style="float: right" for="orderdato">Choose the date of your order to see your order list:</b><br>
        <select class="browser-default"  onchange="getdate(this)" style="float: right; width: 20%"  >
        <option>Choose date</option>
<?php
            foreach($orderdate as $dato)
            { echo "<option name=\"orderdato\" value=".$dato['OrderDate'].">".$dato['OrderDate']."</option>";
               }?>

        </select><br><br>

        <br><hr>

        <tr>
            <th><strong></strong></th>
            <th><strong>Name</strong></th>
            <th><strong>Quantity</strong></th>
            <th><strong>Price(pr unit)</strong></th>
            <th><strong>Subtotal</strong></th>
            <th><strong>Order status</strong></th>
        </tr>

        <?php
        if (isset($_GET['orderdato'])){
    $result=mysqli_query($conn,"Select * from orderedproduct WHERE UserID='$userid' AND OrderDate='".$_GET['orderdato']."' ");
        while( $roworder = mysqli_fetch_array($result) )
        {
            $quan=$roworder['Quantity'];
            $subtotal=$roworder['subTotalPrice'];
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
                        <td>Shipped</td>
                    </tr><br>

            <?php
           }}
           } }
        ?>
        </tbody>
        </table>
    </div><hr>
    <?php
    }}
    ?>

    <a class="btn right" type="submit" name="submit" href="../pages/home.php <?php unset($_SESSION["cart_item"]);?>" >
        <strong>Finish</strong>
    </a>

</main>
<script>
    function getdate(select) {
        var location = window.location.href;
        window.location.replace( "?orderdato="+ select.value);
    }
</script>

<footer class="page-footer teal darken-4">

    <?php include "footer.php"; ?>
</footer>


</body>
</html>