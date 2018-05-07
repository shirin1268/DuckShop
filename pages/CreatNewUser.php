<html>

<body class="container">

<?php include "../pages/mynav.php"; ?>

<script type="text/javascript">
	function validate(){

		var a = document.getElementById("Password").value;
		var b = document.getElementById("confirm_password").value;
		if (a!=b) {
			alert("Passwords do no match");
			return false;
		}return true;
	}
</script>

<h2>Sign UP</h2>
<div class="row">
	<div class="col s12 m6">
		<div class="card teal-text darken-4">
			<div class="card-content ">
				<form action="../Login/newuserController.php" method="post" >
					Full name:
					<input type="text" name="FullName" maxlength="30" value="" required/>
					Email:
					<input type="email" name="Email" maxlength="30" value="" required/>
					Password:
					<input type="password" name="Password" maxlength="30" value=""  required/>
					<!-- Repeat Password:
					<input type="password"  name="confirm_password" value="" onclick="return'validate()'" required/> -->

					<input type="submit" name="submit" value="Create"  />
				</form>
			</div>

		</div>
	</div>
</div>


	</body>
	<footer class="page-footer teal darken-4">

		<?php include "../pages/footer.php"; ?>
</footer>
	</html>