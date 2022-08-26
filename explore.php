<?php include_once 'header.php';?>

<div class="header">
	<h1>Find Or Plan Events</h1>
	<a href="createEvent.php"><button type="button">Create An Event</button></a>
</div>
<section id="ex_content1">
		<input type="text" placeholder="Search For Event To Attend" name="find" class="subitem1">
		<button type="submit" class="subitem2">Search</button>
	</div>
</section>

<section id="ex_content2">
	<?php

	$sql = "SELECT eventName, evLocation, evDTime, evNotes, Approved FROM events ORDER BY evDTime LIMIT 10";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if ($row["Approved"] == 1) {
				echo '<div class="container"><ul><li>Title: ' . $row["eventName"]. '</li><li>Location: ' . $row["evLocation"]. '</li><li>Time: ' . $row["evDTime"]. '</li><li>Details: ' .$row["evNotes"]. '</li><br></ul></div>';
			}
		}
	} else {
		echo "<br>"."0 results";
	}?>
</section>

<?php include_once 'footer.php';?>