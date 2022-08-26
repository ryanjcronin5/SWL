<?php include_once 'header.php';?>

<section id="sign">
	<div class="container">
		<h3>Sign In <?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></h3>
		<form action="includes/login.inc.php" method="POST">
			<input type="text" name="uid" placeholder="Email/Username">
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="submit">Login</button>
		</form>
	</div>
	<?php
		if (isset($_GET["error"])) {
			if ($_GET["error"] == "emptyinput") {
				echo '<p>"Fill in all fields!"</p>';
			} 
			else if ($_GET["error"] == "wronglogin") {
				echo '<p>"Incorrect Login Information"</p>';
			} 
		}?>
</section>

<?php include_once 'footer.php';?>