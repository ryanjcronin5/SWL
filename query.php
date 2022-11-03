<?php
$pageName = "DataBase Modification";
include_once 'public\header.php';

if ($_GET['link'] == 'Adding') { ?>
    <div class="header"><h1>Create Event</h1></div>
    <form id="EC1">
        <div class="container">
            <label for="eventName">Event Name</label>
            <input id="eventName" type="text" placeholder="Enter Name" minlength="6" maxlength="20" required>
            <br><br>
            <label for="eventLocation">Location</label>
            <input id="eventLocation" type="text" placeholder="Address of event" autocomplete="street-address" required>
            <br><br>
            <label for="eventTime">Date Time</label><br>
            <input id="eventTime" type="datetime-local" value="2022-01-01" style="border: solid 1px #ccc" required>
            <br><br>
            <label for="eventNote">Details</label><br>
            <textarea id="eventNote" placeholder="Give information about your event to the users" maxlength="255" rows="6" cols="121" style="border: solid 1px #ccc"></textarea>
            <br></div>
            <button type="submit">Submit</button>
    </form>
    <?php
} elseif ($_GET['link'] == 'Viewing') {?>
    <div id="EC1">
        <div class="container">
        <?php require_once 'private\includes\dbh.inc.php';
        $sql = "SELECT ID, eventName, eventLocation, eventDTime, eventNotes, approved, eventLikes, eventCreateTime FROM events WHERE ID ='".$_GET['num']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if (($row["approved"] == 1 ) && ($row["ID"] == $_GET['num'])) { ?>
                    <h2><?php echo $row["eventName"]?></h2>
                    <p>Location:<br>&emsp;<?php echo $row["eventLocation"]?></p>
                    <p>Start Time:<br>&emsp;<?php echo $row["eventDTime"]?></p>
                    <p>Extra Notes:<br>&emsp;<?php echo $row["eventNotes"]?></p>
                    <br>
                <?php }
            }
        }
        ?>
        </div>
    </div>
    <?php
} elseif ($_GET['link'] == 'Editing') {
    
} elseif ($_GET['link'] == 'Project') {?>
    <div class="header"><h1>Create Event</h1></div>
    <form id="EC1" action="private\includes\submit.php" method="POST">
        <div class="container">
            <label for="projectName">Project Name</label>
            <input id="projectName" name="projectName" type="text" placeholder="Enter Name" minlength="6" maxlength="20" required>
            <br><br>
            <label for="projecttype">Project Type</label><br>
            <select id="projecttype" name="projectType">
                <option value="" selected></option>
                <option value="painting">Painting</option>
                <option value="custom">Custom Mini</option>
                <option value="terrian">Terrian</option>
            </select>
            <br><br>
            <label for="projectNote">Details</label><br>
            <textarea id="projectNote" name="projectNotes" placeholder="Give some information on your project..." maxlength="255" rows="6" cols="121" style="border: solid 1px #ccc"></textarea>
            <br></div>
            <button type="submit">Submit</button>
    </form><?php
}

include_once 'public\footer.php';
?>
