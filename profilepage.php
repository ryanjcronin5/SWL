<?php
$pageName = "Profile";
include_once 'public\header.php';
?>
<section id="PC1">
    <div class="container">
        <br><br><br><br><br>
        <h5>User Name: <?php echo $_SESSION["useruid"]?></h5>
        <h5>User ID Number: <?php echo $_SESSION["userid"]?></h5>
        <h5>User Email: <?php echo $_SESSION["userMail"]?></h5>
    </div>
</section>

<section id="PC2">
    <div class="container">
        <h3>My Events</h3><?php
        require_once 'private\includes\dbh.inc.php';
        $sql = "SELECT * FROM events WHERE creatorID = '{$_SESSION["userid"]}' ORDER BY eventCreateTime";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {?>
                <hr><ul>
                    <li>Title: <?php echo $row["eventName"]?></li>
                    <li>Location: <?php echo $row["eventLocation"]?></li>
                    <li>Time: <?php echo $row["eventDTime"]?></li>
                    <li>Details: <?php echo $row["eventNotes"]?></li>
                    <br>
                </ul>

                <?php
                require_once 'private\includes\dbh.inc.php';
                $sql = "SELECT * FROM ((eventdetails INNER JOIN events ON eventdetails.eventID = events.ID) INNER JOIN users ON eventdetails.userID = users.ID) WHERE events.creatorID = '{$_SESSION["userid"]}'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {?>
                    <h4>Attending:</h4><?php
                    while ($row = $result->fetch_assoc()) {?>
                        <p>Name: <?php echo $row["usersName"]?></p>
                        <p>Faction: <?php echo $row["userFaction"]?></p>
                        <p>Points: <?php echo $row["userPoints"]?></p>
                        <?php
                    }
                } else {
                    echo '&emsp;No-one attending';
                }
                echo '<hr>';
            }
        } else {
            echo '<br>' . '0 results';
        }?>
    </div>
</section>

<section id="PC3">
    <div class="container">
        <h3>My Projects</h3><?php
        require_once 'private\includes\dbh.inc.php';
        $sql = "SELECT * FROM projects WHERE creatorID = '{$_SESSION["userid"]}' ORDER BY projectCreateTime";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {?>
                <ul>
                    <li>Title: <?php echo $row["projectName"]?></li>
                    <li>Type: <?php echo $row["projectType"]?></li>
                    <li>Notes: <?php echo $row["projectNotes"]?></li>
                    <br>
                </ul><?php
            }
        } else {
            echo '<br>' . 'You don\'t have any projects.';
        }?>
    </div>
</section>
<?php
include_once 'public\footer.php';
?>