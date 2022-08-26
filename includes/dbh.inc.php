<?php
$serverName = "localhost";
$dBUsername = "_RCronin";
$dBPassword = "E3QieCX0mqBlikTT";
$dBName = "RCronin_base";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection Failed:".mysqli_connect_error());
}