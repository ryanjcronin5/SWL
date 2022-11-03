<?php 
$pageName = "Explore";
include_once 'public/header.php';
$pageID = "explore.php";

?>
<div class="header">
	<h1>Find Or Plan Events</h1>
	<?php 
	$a = 'Adding'; 
	echo '<a href="query.php?link='.$a .'"><button>Create An Event</button></a>'; ?>
</div>
<section id="EC1">
	<div class="container">
		<button>Events</button>
		<button>Projects</button>
	</div>
</section>

<section id="EC2">
	<div class="container">
	</div>
</section>
<?php echo '
<section id="EC3">
	<div class="container">';
		require_once 'private\includes\dbh.inc.php';
		$sql = "SELECT ID, eventName, eventLocation, eventDTime, eventNotes, approved, eventLikes, eventCreateTime FROM events ORDER BY eventCreateTime LIMIT 10";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if ($row["approved"] == 1) {
					echo '
						<ul>
							<li>Title: '.$row["eventName"].'</li>
							<li>Location: '.$row["eventLocation"].'</li>
							<li>Time: '.$row["eventDTime"].'</li>
							<li>Details: '.$row["eventNotes"].'</li>';
							$a = 'Viewing';
							echo '<a href="query.php?link='.$a.'&num='.$row["ID"].'"><button>View</button></a>';
							echo '<br>
						</ul>';
			} else {
				echo '<br>'.'0 results';
			}
		}
	}
echo '</div></section>';?>

<?php include_once 'public\footer.php';?>