<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
	if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$results = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidUid($username) {
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$results = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidEmail($email) {
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$results = true;
	} else {
		$result = false;
	}
	return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
	if ($pwd !== $pwdRepeat) {
		$results = true;
	} else {
		$result = false;
	}
	return $result;
}

function uidExists($conn, $username, $email) {
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../sign_up.php?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} else {
		$result	= false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd) {
	$sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../sign_up.php?error=stmtfailed");
		exit();
	}
	
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../sign_up.php?error=none");
	exit();
}

function emptyInputLogin($username, $pwd) {
	if (empty($username)|| empty($pwd)) {
		$results = true;
	} else {
		$result = false;
	}
	return $result;
}

function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username, $username);
	
	if ($uidExists === false) {
		header("location: ../sign_in.php?error=wronglogin");
		exit();
	}
	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);
	if ($checkPwd === false) {
		header("location: ../sign_in.php?error=wronglogin");
		exit();
	}
	else if ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"];
		$_SESSION["useruid"] = $uidExists["usersUid"];
		$_SESSION["userMail"] = $uidExists["usersEmail"];
		header("location: ../profilepage.php");
		exit();
	}
}
