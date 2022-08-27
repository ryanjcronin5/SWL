<?php include_once 'header.php';?>

<div class="header">
	<h1>Your Profile</h1>
</div>

<div id="myModal" class="modal">
	<div class="modal-content">
		<span class="close">&times;</span>
		<h1>Event</h1>
		<?php
		echo "<h4>Title: ".$yourEvent."</h4>";
		?>
	</div>
</div>


<section id="content1">
	<div class="container">
		<?php 
		echo "<h5>User Name: ".$_SESSION["useruid"]."</h5>";
		echo "<h5>User ID Number: ".$_SESSION["userid"]."</h5>";
		echo "<h5>User Email: ".$_SESSION["userMail"]."</h5>";
		?>
		<button type="button">Change Password</button>
	</div>
</section>

<section id="content2">
	<div class="container">
		<h3>Your Events</h3>
		<?php
		require_once 'includes/dbh.inc.php';
		$sql = "SELECT ID, eventName, evLocation, evDTime, evNotes, Approved FROM events WHERE CreaterId = '{$_SESSION["userid"]}' ORDER BY evLocation";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			global $yourEvent;
			while($row = $result->fetch_assoc()) {
				$yourEvent = $row["eventName"];
				echo '<ul><li>Title: '.$row["eventName"].'</li><li>Location: '.$row["evLocation"].'</li><li>Time: '.$row["evDTime"].'</li><li>Details: '.$row["evNotes"].'</li><button id="myBtn">View</button><br></ul>';
			}
		} else {
			echo "<br>"."0 results";
		}
		echo $row[0][0];?>
		<script src="script.js"></script>
		<?php
		
		if ($_SESSION["useruid"] == "RCronin") {
			echo "<h3>Admin: Waiting to be approved</h3>";
			$sql = "SELECT eventName, evLocation, evDTime, evNotes, Approved FROM events ORDER BY evDTime LIMIT 10";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if ($row["Approved"] == 0) {
						echo '<div class="event"><ul><li>Title: ' . $row["eventName"]. '</li><li>Location: ' . $row["evLocation"]. '</li><li>Time: ' . $row["evDTime"]. '</li><li>Details: ' .$row["evNotes"]. '</li><br></ul></div>';
					} 
				}
			} else {
				echo "0 results";
			}
		}?>
	</div>
</section>

<?php include_once 'footer.php';?>
