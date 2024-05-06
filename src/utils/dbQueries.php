<?php

# Opens the connection to the database
function connectionDB() {
	$mysqli = mysqli_connect(SERVER, USER, PWD, DB_NAME);
	
	// Errors management
	if (mysqli_connect_errno()) {
		echo "Echec de la connexion MySQL : " . mysqli_connect_error();
		exit();
	}

	if(mysqli_errno($mysqli)) {
		echo "Echec mysqli " . mysqli_errno($mysqli);
	}

	mysqli_set_charset($mysqli, "utf8");	// UTF-8 conversion

	return $mysqli;

}

# Closes the connection
function closeDB($mysqli) {
	mysqli_close($mysqli);
}


# For read requests
function readDB($sql_stmt) {

	mysqli_stmt_execute($sql_stmt);

	$result = mysqli_stmt_get_result($sql_stmt);

	if($result == false || $result == null) {
		return array();
	} else {
		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $data;
	}
}


# For write requests
function writeDB($sql_stmt) {

	mysqli_stmt_execute($sql_stmt);

	$rows = mysqli_stmt_affected_rows($sql_stmt);

	return $rows; // (0 is falsy, can be used in an if)
}
