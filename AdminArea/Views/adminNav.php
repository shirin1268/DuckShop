<?php require "../../DB/Connection.php" ;?>
<?php require "../../DB/session.php";?>


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../../materialize/css/materialize.css" >
	<link rel="stylesheet" href="../../materialize/css/materialize.min.css" >

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<nav >
	<div class="nav-wrapper teal darken-4">
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li ><a href="../../index.php">Front page</a></li>

			<li>Edit products
				<ul>
					<li><a href="editproduct.php?page=products">Products</a></li>
					<li><a href="addcategory.php">Add Category</a></li>
					<li><a href="addproducts.php">Add Product</a></li>
				</ul>
			</li>
			<li>Update Info
				<ul>
					<li><a href="informations.php">Company info</a></li>
					<li><a href="#">Contact info</a></li>
					<li><a href="#">Context</a></li>
				</ul>
			</li>

		</ul>


		<button class="waves-effect waves-light btn">
			<?php if (logged_in()== true){ ?>
				<a href="../../Login/logout.php" >logout</a>
			<?php }else{ ?>
				<a href="../../pages/loginView.php" >login</a>
			<?php } ?>
		</button>

		<?php if (logged_in()== true){ echo " Hej admin! ";}?>
	</div>
</nav>

<div class="input-field center">
	<label class="label-icon" for="search">
		<input id="search" type="search" required>
		<i class="material-icons right_text">search</i>
		<i class="material-icons left">clear</i>
	</label>
</div>

