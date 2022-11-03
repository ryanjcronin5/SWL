<?php
if (isset($_POST['submit'])) {
    $pName = $_POST['projectName'];
    $pType = $_POST['projectType'];
    $pNote = $_POST['projectNotes'];

    require_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    createproject($conn, $pName, $pType, $pNote);

} else {
    header("location: ..\..\profilepage.php");
    exit();
}