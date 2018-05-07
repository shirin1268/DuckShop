<?php
require("../Login/profile.php");

?>

<html>

<body class="container">
<?php include "../pages/mynav.php"; ?>

<h3 class="teal-text">Edit your profile</h3>

<div class="row" >
	<div class="card horizontal col s12">




					<?php
					$Email=$_SESSION['Email'];
					$result = mysqli_query($GLOBALS['connection'], "SELECT * FROM costumer where Email='{$Email}'");
					if($row=mysqli_fetch_array($result)){
						echo "  <img style='width:auto' src=\"../asset/profilePic/$row[Picture]\" > <br/>".
							'<input type="file" name="fileToUpload" id="fileToUpload" >';?>
		<br><br><br>
						<form  class="col s12" action="../Login/profile.php" method="post" enctype="multipart/form-data">
					<?php
					echo '<br>'. '<p>Name:</p>' .
						'<input class="input-field col s6" type="text" name="FullName" maxlength="30" value="'.$row['FullName'].' " />';

						echo '<br>'. '<p>Gender:</p>' .
							'<input class="input-field col s6" type="text" name="Gender" maxlength="2" value="'. $row['Gender']. '" />';
						echo
							'<br>'. '<p>Adress:</p>' .
							'<input class="input-field col s6" type="text" name="Adress" maxlength="30" value="'. $row['Adress'] . '" />';
						echo
							'<br>'. '<p>Tel:</p>'.
							'<input class="input-field col s6" type="text" name="Tel" maxlength="30" value="'. $row['Tel'].'" />';

						echo
							'<br>'.'<br>'.'<br>'.'<button type="submit" name="submit" value="Update">'.'Update'. '</button>';

						echo '<br>'.'<a href="../Login/profile.php?id='.$row['Email'].'"'.
						'onclick="return confirm(\'Are you sure you want to delete your profile?\')" '. '>';

						echo '<br>'.'<i class="material-icons">delete</i> </a><br>';
					} ?>

				</form>


			</div>
		</div>
	</div>
</div>


<footer class="page-footer teal darken-4">

	<?php include "../pages/footer.php"; ?>
</footer>

</body>

</html>