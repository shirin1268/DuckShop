<?php require "../../DB/Connection.php" ;?>
<?php require "../../DB/session.php";
confirm_logged_in();
?>


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../../materialize/css/materialize.css" >
	<link rel="stylesheet" href="../../materialize/css/materialize.min.css" >

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<nav style="margin-bottom: 100px" >
	<div class="nav-wrapper teal darken-4" >
		<ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-left: 75px">
			<li ><a href="../../index.php">Front page</a></li>
			<li><a href="editproduct.php">Products</a></li>
			<li><a href="addcategory.php">Add Category</a></li>
			<li><a href="addproducts.php">Add Product</a></li>
			<li><a href="informations.php">Company Info</a></li>
			<li>
				<form action="../../Functions/livesearch.php" method="post">
					<input type="text" style="font-size=30px"  name="query" placeholder="Search">
				</form>
			</li>
		</ul>


		<button class="waves-effect waves-light btn" style="margin-left: 75px">
			<?php if (logged_in()== true){ ?>
				<a href="../../Login/logout.php" >logout</a>
			<?php }else{ ?>
				<a href="../../pages/loginView.php" >login</a>
			<?php } ?>
		</button>

		<?php if (logged_in()== true){ echo " Hej admin! ";}?>
	</div>
</nav>


