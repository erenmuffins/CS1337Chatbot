<?php

include "tools.php";

if (!$conn = getDBConn()) {
	die("Connection failed.");
}

if (!$stmt = $conn->prepare("select * from students where NetID=? and Password=?;")) {
	$conn->close();
	die("Prepared statement failed.");
}

if (!$stmt->bind_param("ss", $_POST["username"], $_POST["password"])) {
	$conn->close();
	die("Parameter binding failed.");
}

if (!$stmt->execute()) {
	$conn->close();
	die("SQL execution failed.");
}

if (!$result = $stmt->get_result()) {
	$conn->close();
	die("Login failed.");
}

if (!$result = $result->fetch_array()) {
	$conn->close();
	die("Login failed.");
}

// Better session management would be to use a session ID. Encryption is also needed.
//setcookie("user_ID", $_POST["username"], time() + 3600, "/");	// 1 hour login
//setcookie("password", $_POST["password"], time() + 3600, "/");	// 1 hour login

$conn->close();
header("Location: http://localhost:8000");
die();	// Recommended for security. Haven't had time to see why. Probably to prevent further loading in the case of redirect disabled on client.

?>