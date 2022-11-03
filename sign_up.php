<?php 
$pageName = "Sign Up";
include_once 'public\header.php';
?>

<section id="sign">
	<div class="container">
		<h3>Sign Up</h3>
		<form action="private\includes\signup.inc.php" method="POST">
			<input type="text" name="name" placeholder="Full Name">
			<input type="text" name="email" placeholder="Email">
			<input type="text" name="uid" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<input type="password" name="pwdrepeat" placeholder="Repeat Password">
			<button type="submit" name="submit">Sign Up</button>
		</form>
	</div>
		<?php
		if (isset($_GET["error"])) {
			if ($_GET["error"] == "emptyinput") { echo '<p>"Fill in all fields!"</p>';} 
			else if ($_GET["error"] == "invaliduid") { echo '<p>"Choose a proper username!"</p>';} 
			else if ($_GET["error"] == "invalidemail") { echo '<p>"Choose a proper email!"</p>';} 
			else if ($_GET["error"] == "pwdDontMatch") { echo '<p>"Choose a proper email!"</p>';}
			else if ($_GET["error"] == "stmtfailed") { echo '<p>"Something Went Wrong"</p>';} 
			else if ($_GET["error"] == "usernametaken") { echo '<p>"Username is Taken"</p>';} 
			else if ($_GET["error"] == "none") { echo '<p>"Signed Up!"</p>';}
		}?>
</section>

<?php include_once 'public\footer.php';?>
