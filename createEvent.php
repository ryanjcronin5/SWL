<?php include_once 'header.php';?>

<div class="header">
	<h1>Create An Event</h1>
</div>

<section id="sign">
	<div class="container">
		<form action="" method="POST">
			<br>
			<input type="text" name="name" placeholder="Event Title...">
			<input type="text" name="location" placeholder="Location...">
			<textarea rows = "5" cols = "100" name = "notes">Extra details...</textarea>
			<br>
			<label for="DTime">Select Start Time: </label>
			<input type="datetime-local" name="DTime">
			<br>
			<button type="submit" name="submit">Submit To Admin</button>
		</form>
	</div>
</section>

<?php include_once 'footer.php';?>