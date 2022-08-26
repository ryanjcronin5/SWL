<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>| SWL Tournament |</title>
        <link rel="stylesheet" href="gridstyle.css">
        <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="nav">
            <a href="root.php">Home</a>
            <a href="explore.php">Events</a>
			<?php
				if (isset($_SESSION["useruid"])) {
					echo '<a href="profilepage.php">Profile Page</a>';
					echo '<a href="logout.php">Log Out</a>';
				} else {
					echo '<a href="sign_up.php">Sign Up</a>';
					echo '<a href="sign_in.php">Sign In</a>';
				}
			?>
        </div>
