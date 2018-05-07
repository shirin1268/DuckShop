

<html>

<body class="container">
<?php include "mynav.php"; ?>

<h2>Please login</h2>

<div class="row">
	<div class="col s12 m10">
		<div class="card teal darken-4">
			<div class="card-content white-text">
				<form action="../Login/loginController.php" method="post">
					Email:
					<input type="email" name="Email" maxlength="30" value="" />
					Password:
					<input type="password" name="Password" maxlength="30" value="" />
					<input type="submit" name="submit" value="Login" />
				</form>
			</div>
			<div class="card-action">
				<a href="CreatNewUser.php">create account here</a>

			</div>
		</div>
	</div>
</div>

</body>
<footer class="page-footer teal darken-4">

	<?php include "footer.php"; ?>
</footer>
</html>
