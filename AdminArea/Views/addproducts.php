<?php require_once "../Controller/uploader.php";?>
<?php require_once "../Controller/infoupload.php";?>

<html>

<body >
<header>
    <!-- BEGIN mynav.php INCLUDE -->
    <?php include "adminNav.php"; ?>
    <!-- END mynav.php INCLUDE -->
</header>

<main class="section" style="margin: 75px">
<h4>Add Products</h4>

<div class="card horizontal" style="padding: 75px">
    <form name="imgUp" method="post" action="../Controller/uploader.php" enctype="multipart/form-data">

		<div class="input-field">
	        <div class="btn active">
		        <span>File </span>
		        <input type="file" name="image" class="validate">
	        </div><br><br>
	        <div class="file-path-wrapper" >

	        </div>
        </div>
        <br>

        <b class="col s6">Resize to: </b>
        <select class="browser-default" name="resizetype">
            <option value="height">Height</option>
            <option value="width">Width</option>
            <option value="Scale">Scale</option>
        </select><br>

		<div class="input-field ">
        <b class="col s6">Size: <label>px or % </label></b><br>
	    <input type="number" name="size" value="" class="validate">
	    </div>
        <br>

        <div class="col s12">

	        <div class="input-field ">
		        <b class="active" for="ProductName">Product Name:</b>
		        <input id="ProductName" type="text" name="productname" class="validate">

	        </div>

			<b class="active" for="CategoryName">Category Name:</b>
	        <select class="browser-default" name="categoryname" >
				<option>Choose category</option>
	        <?php
            $result=mysqli_query($GLOBALS['connection'],'SELECT * FROM `category`');
            $row = mysqli_fetch_array($result);
			foreach($result as $row)
            { echo "<option >".$row['CategoryName']."</option>";}?>
	        </select>
	                <br>

			<div class="input-field ">
				<b class="active" for="Price">Price:</b>
				<input id="Price" type="number" name="price" class="validate">
			</div>

	        <div class="input-field">
		        <b class="active" for="Stock">Stock:</b>
		        <input id="Stock" type="number" name="stock" class="validate">
	        </div>

			<div>

				<input type="checkbox" id="sale" name="salestatus" >
				<label  for="sale">Sale status:</label>

			</div>

			</div><br>

	    <button class="btn waves-effect waves-light" type="submit" name="submit" value="Submit">Submit
		    <i class="material-icons right">send</i>
	    </button><br>
        </div>
    </form>
</div>
</main>



</body>
</html>
