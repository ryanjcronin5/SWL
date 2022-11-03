<?php 
$pageName = "Home";
include_once 'public\header.php';
?>

<div class="header">
    <h1>Star Wars Legion Armoury</h1>
</div>

<section id="C1">
    <div class="container">
        <img src="swl-2019_preview_cover.jpg" alt="Star Wars Legion" width="100%" />
    </div>
</section>
<section id="C2">
	<div class="container">
        <h3 class="cHeader">Top Events</h3>
        <hr/><?php
		require_once 'private\includes\dbh.inc.php';
		$sql = "SELECT ID, eventName, eventLocation, eventDTime, eventNotes, approved, eventLikes, eventCreateTime FROM events ORDER BY eventCreateTime LIMIT 10";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if ($row["approved"] == 1) {?>
					<ul>
                    	<li>Title: <?php echo $row["eventName"]?></li>
                    	<li>Location: <?php echo $row["eventLocation"]?></li>
                    	<li>Time: <?php echo $row["eventDTime"]?></li>
                    	<li>Details: <?php echo $row["eventNotes"]?></li>
						<?php
						$a = 'Viewing';
						echo '<a href="query.php?link='.$a.'&num='.$row["ID"].'"><button>View</button></a>';
						?>
                    	<br>
                	</ul><?php
				} else {
				echo '<br>'.'0 results';
				}
			}
		}?>
	</div>
</section>

<section id="C3">
    <div class="container">
        <h3 class="cHeader">Top Projects</h3>
        <hr>
        <?php
		require_once 'private/includes/dbh.inc.php';
		$sql = "SELECT * FROM projects ORDER BY projectCreateTime LIMIT 5";
		$result = $conn->query($sql); 
		if ($result->num_rows > 0) { 
			while($row = $result->fetch_assoc()) { 
				if ($row["approved"] == 1) {?>
        			<h5 class="cSubtitle"><?php echo $row["projectName"]?></h5>
					<p>
						Type: <?php echo $row["projectType"]?><br/>
						Details: <?php echo $row["projectNotes"]?>
					</p>
					<button id="pBtn">View</button><br/><?php
				} else { 
					echo '<br/>'.'0 results'; 
				} 
			} 
		}?>
    </div>
</section>
<?php include_once 'public\footer.php';?>