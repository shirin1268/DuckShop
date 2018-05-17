<?php require_once "../Controller/infoupload.php";?>
<?php require_once "../Controller/CompanyInfoDAO.php";?>

<html>

<body >
<header>
	<!-- BEGIN mynav.php INCLUDE -->
	<?php include "adminNav.php"; ?>
	<!-- END mynav.php INCLUDE -->

</header>

<div class="row">
	<div class="card horizontal col s12">
		<h5 > Update the new Company information</h5><br>
		<form class="col s10 "  name="infoUp" method="post" action="../Controller/CompanyInfoDAO.php" >
			<div >
				<div class="input-field s8 ">
					<b class="active" for="Coname">Company Name</b><br>
					<input placeholder="Company name" value="<?php echo $row["CompanyName"] ; ?>" type="text" name="Coname" class="validate">
				</div>
				<br>

				<div class="input-field s8 ">
					<b class="active" for="Adress">Company Adress</b><br>
					<input placeholder="Company adress" value="<?php echo  $row["CompanyAdress"]; ?>" type="text" name="Adress" class="validate">
				</div>
				<br>
				<div class="input-field s8">
					<b class="active" for="Description">Company Description</b><br>
					<input placeholder="Company Description" value="<?php echo $row["CompanyDescription"] ; ?>" type="text" name="Description" class="validate">
				</div>
				<br>
				<div class="input-field s8">
					<b class="active" for="Adress">Company Email</b><br>
					<input placeholder="Company email"  value="<?php echo $row["CompanyEmail"] ; ?>" type="text" name="CoEmail" class="validate">
				</div>
				<br>
				<div class="input-field s8 ">
					<b class="active" for="Adress">Company Tel</b><br>
					<input placeholder="Company Tel" value="<?php echo $row["CompanyTel"] ; ?>" type="text" name="CoTel" class="validate">
				</div>
				<br>
				<button class="btn waves-effect waves-light" type="update" name="update" value="update">Update
					<i class="material-icons right">send</i>
				</button>
				<br>
		</form>
	</div>
</div>


<div class="card horizontal col s12">
	<h5 > Update the new Opening Hours</h5><br>
	<form class="col s10 "  name="infoUp" method="post" action="../Controller/CompanyInfoDAO.php" >
		<table>
				<thead>
				<tr>
					<th></th>
					<th>Open from:</th>
					<th>Closed:</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>Monday</td>
					<td><input value="<?php echo $openingtime["MonOpen"];?>" type="text" name="monOpen" class="validate"></td>
					<td><input value="<?php echo $openingtime["MonClose"];?>" type="text" name="monClose" class="validate"></td>
				</tr>
				<tr>
					<td>Tuesday</td>
					<td><input value="<?php echo $openingtime["TuesOpen"];?>" type="text" name="tuesOpen" class="validate"></td>
					<td><input value="<?php echo $openingtime["TueClose"];?>" type="text" name="tuesClose" class="validate"></td>
				</tr>
				<tr>
					<td>Wednesday</td>
					<td><input value="<?php echo $openingtime["WedOpen"];?>" type="text" name="wedOpen" class="validate"></td>
					<td><input value="<?php echo $openingtime["WedClose"];?>" type="text" name="wedClose" class="validate"></td>
				</tr>
				<tr>
					<td>Thursday</td>
					<td><input value="<?php echo $openingtime["ThursOpen"];?>" type="text" name="thursOpen" class="validate"></td>
					<td><input value="<?php echo $openingtime["ThursClose"];?>" type="text" name="thursClose" class="validate"></td>
				</tr>
				<tr>
					<td>Friday</td>
					<td><input value="<?php echo $openingtime["FriOpen"];?>" type="text" name="friOpen" class="validate"></td>
					<td><input value="<?php echo $openingtime["FriClose"];?>" type="text" name="friClose" class="validate"></td>
				</tr>
				<tr>
					<td>Saturday</td>
					<td><input value="<?php echo $openingtime["SatOpen"];?>" type="text" name="satOpen" class="validate"></td>
					<td><input value="<?php echo $openingtime["SatClose"];?>" type="text" name="satClose" class="validate"></td>
				</tr>
				<tr>
					<td>Sunday</td>
					<td><input value="<?php echo $openingtime["SunOpen"];?>" type="text" name="sunOpen" class="validate"></td>
					<td><input value="<?php echo $openingtime["SunClose"];?>" type="text" name="sunClose" class="validate"></td>
				</tr>

				</tbody>
			</table>

		<button class="btn waves-effect waves-light" type="submit" name="Submit" value="Submit">Update
			<i class="material-icons right">send</i>
		</button>

		</table>
	</form>
</div>

</body>
</html>
