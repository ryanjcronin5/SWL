<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo '<title>| ' . $pageName . ' | Star Wars Legion</title>'; ?>
        <link rel="stylesheet" href="public\css\fontText.css">
        <link rel="stylesheet" href="public\css\gridstyle.css">
		<link rel="stylesheet" href="public\css\style.css">
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="nav">
            <a href="root.php">Home</a>
            <a href="explore.php">Events</a>
			<?php if (isset($_SESSION["useruid"])) {
       echo '<a href="profilepage.php">Profile Page</a>';
       echo '<a href="private\logout.php?event=null">Log Out</a>';
   } else {
       echo '<a href="sign_up.php">Sign Up</a>';
       echo '<a href="sign_in.php">Log In</a>';
   } ?>
        </div>
