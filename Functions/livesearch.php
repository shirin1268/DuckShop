<?php
require_once "../DB/Connection.php"; ?>

<html>

<body >
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "../pages/mynav.php"; ?>
    <!-- END mynav.php INCLUDE -->

</header>

<main class="section">
<div class="row" style="margin-top: 75px" >

<?php
$conn=$GLOBALS['connection'];

if(isset($_POST['query'])){
$query = $_POST['query'];
// gets value sent over search form

$min_length = 2;
// you can set minimum length of the query if you want

if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

$query = htmlspecialchars($query);
// changes characters used in html to their equivalents

$query = mysqli_real_escape_string($conn,$query);
// makes sure nobody uses SQL injection

$raw_results =mysqli_query($conn, "SELECT * FROM `product`
WHERE (`productName` LIKE '%".$query."%') OR (`CategoryName` LIKE '%".$query."%')") or die(mysqli_error());

// * means that it selects all fields,
// articles is the name of our table

// '%$query%' is what we're looking for, % means anything, for example if $query is Hello


if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following

while($results = mysqli_fetch_assoc($raw_results)){

foreach ($raw_results as $results){
  ?>

 <div class="card small">
     <a href="Detailpage.php?productID=<?php echo $results["productID"];?> ">

                            <div class="card-image">
                                <img class="card-image" style="margin: auto;" src=<?php echo "../asset/Ducks/$results[Image]"; ?> >
                            </div>
     </a>
                            <div class="input-field ">
                                <p class="active" for="productName">Product Name: <?php echo $results["productName"]; ?></p>
                            </div>

                            <div class="input-field">
                                <p class="active" for="CategoryName">Category Name: <?php echo $results["CategoryName"]; ?></p>
                            </div>

                            <div class="input-field">
                                <p class="active" for="Price"><?php echo $results["Price"]; ?> -DKK </p>
                            </div>
         <i onclick="document.getElementById('<?php echo $results['productID']; ?>').style.color ='red'" class="fa fa-heart" id="<?php echo $results['productID']; ?>" style="color: teal"></i>




 </div>
<?php }
}}

}
else{ // if there is no matching rows do following
echo "No results";
}

}
else{ // if query length is less than minimum
 echo "Minimum length is ".$min_length;
}
?>

</div>

</main>
</body>
</html>
