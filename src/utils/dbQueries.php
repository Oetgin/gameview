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

	$mysqli->close();

}


# For read requests
function readDB($mysqli, $sql_input) {
	$result = mysqli_query($mysqli, $sql_input);

	if($result == false || $result == null) {

		return array();

	} else {

		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

		return $data;

	}
}


# For write requests
function writeDB($mysqli, $sql_input) {

	$result = mysqli_query($mysqli, $sql_input);

	if($result) {

		return true;

	} else {

		return false;

	}
}
