<?php

function getDBConn() {
	$server = "localhost";
	$username = "root";
	$password = "";

	$connection = new mysqli($server, $username, $password);

	if ($connection->connect_errno == 0 && $connection->select_db("amazonlex")) {
		return $connection;
	} else {
		return false;
	}
}

function getLoginInfo($connection) {
	$statement = $connection->prepare("select * from `students` where NetID=? and Password=?");
	$statement->bind_param("ss", $_COOKIE["NetID"], $_COOKIE["Password"]);
	$statement->execute();

	if ($result = $statement->get_result()) {
		$result = $result->fetch_array();

		return $result;
	} else {
		return false;
	}
}

?>
