<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "killingbot";
$dBName = "content";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection Failed:".mysqli_connect_error());
}
