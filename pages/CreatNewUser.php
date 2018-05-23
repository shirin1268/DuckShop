<html>

<body >
<header>
<?php include "../pages/mynav.php"; ?>
</header>
<main class="section" style="height: auto; margin-top: 35px; padding: 75px">

<h2>Sign UP</h2>
<div class="row">
	<div class="col s12 m10">
		<div class="card teal-text darken-4">
			<div class="card-content ">
				<form action="../Login/newuserController.php" method="post" >
					<label for="FullName" class="black-text"><b>Full name:</b></label><br>
					<input type="text" name="FullName" maxlength="30" value="" required/><br>
							<label for="Email" class="black-text"><b>Email:</b></label><br>
					<input type="email" name="Email" maxlength="30" value="" required/><br>
					<label for="Password" class="black-text"><b>Password:</b></label><br>
					<input type="password" placeholder="Enter Password" name="Password" required><br>

					<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

					<div class="clearfix">
				
						<button type="submit" name="submit" class="signupbtn" >Sign Up</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

</main>

	<footer class="page-footer teal darken-4">

		<?php include "../pages/footer.php"; ?>
</footer>

</body>
</html>