<?php
require("../Login/profile.php");

?>

<html>

<body >
<?php include "../pages/mynav.php"; ?>

<?php
$Email=$_SESSION['Email'];
$result = mysqli_query($GLOBALS['connection'], "SELECT * FROM `customer` where `Email`='{$Email}'");
$row=mysqli_fetch_assoc($result);

?>

<div  style="margin-left: 75px; margin-right: 75px; margin-top: 75px; height: auto">

	<h3 class="teal-text">Edit your profile</h3>

			<form  method="post" enctype="multipart/form-data" action="../Login/profile.php?id=<?php echo $row['UserID']; ?>">
				<br><div class="card horizontal">

					<div class="card-image" >
					<?php
						echo "<img style=\"height: 250px; width: auto; margin-left: 30px; margin-top: 30px\" src=\"../asset/profilePic/$row[Picture]\" > <br/>".
							'<input type="file" name="fileToUpload" id="fileToUpload">';
					?>
					</div>
					<input type="hidden" name="imgURL" id="imgURL" value="<?php echo $row['Picture'] ?>">


		<br><br>
					<div style="width: 50%; margin-left: 20%">

					<?php
					echo '<br>'. '<p >Email:</p>' .$row['Email']. '<br>';

					echo '<br>'. '<p>Name:</p>' .
						'<input class="input-field" type="text" name="FullName"  value="'.$row['FullName'].' " />';

						echo '<br>'. '<p>Gender:</p>' .
							'<span class="title" value="'. $row['Gender']. '" />';?>
							<select  class="browser-default" name="Gender" >
								<option>Female</option>
								<option>Male</option>
							</select>

					<?php echo
							'<br>'. '<p>Adress:</p>' .
							'<input class="input-field" type="text" name="Adress"  value="'. $row['Adress']. '" />';
						echo
							'<br>'. '<p>Tel:</p>'.
							'<input class="input-field " type="text" name="Tel"  value="'. $row['Tel'].'" />';

						echo '<br>'.'<br>'.

							'<button type="submit" name="submit" value="submit" >'.'Update'. '</button>';

						echo '<br>'.'<br>'.'<a href="../Login/profile.php?Email='.$row['Email'].'"'.
						'onclick="return confirm(\'Are you sure you want to delete your profile?\')" '. '>';

						echo '<i class="material-icons">delete</i>'.' </a>'.'<br>'.'<br>';
					 ?>
					</div>
				</div>
			</form>
</div>




<footer class="page-footer teal darken-4">

	<?php include "../pages/footer.php"; ?>
</footer>

</body>

</html>