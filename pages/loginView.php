

<html>

<body >
<header>
<?php include "mynav.php"; ?>
</header>
<main class="section" style="height: auto; margin-top: 35px; padding: 75px">
<h2>Please login</h2>

<div class="row">
	<div class="col s12 m10">
		<div class="card teal darken-4">
			<div class="card-content white-text">
				<form action="../Login/loginController.php" method="post">
					<br>Email:
					<br><input style="color: black" type="email" name="Email" maxlength="30" value="" />
					<br>Password:
					<br><input style="color: black" type="password" name="Password" maxlength="30" value="" />
					<br><input style="color: black" type="submit" name="submit" value="Login" />
				</form>
			</div>
			<div class="card-action">
				<a href="CreatNewUser.php">create account here</a>

			</div>
		</div>
	</div>
</div>
</main>

<footer class="page-footer teal darken-4">

	<?php include "footer.php"; ?>
</footer>
</body>
</html>
