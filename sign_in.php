<?php 
$pageName = "Log In";
include_once 'public\header.php';
error_reporting(E_ERROR | E_PARSE | E_NOTICE);
if ($_GET['event'] == 'try'){
	echo '<script>alert("Please log in first.")</script>';
}
?>

<section id="sign">
	<div class="container">
		<h3>Log In <?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></h3>
		<form action="private\includes\login.inc.php" method="POST">
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

<?php include_once 'public\footer.php';?>
