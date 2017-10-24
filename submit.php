<?php

define('SERVER', "localhost");
define('USER', "root");
define('PASS', "");
define('DATABASE', "fakeapplication");
if (isset($_POST['owner']) && $_POST['owner'] !=null) {	
	try {

		$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$statement = $conn->prepare("INSERT INTO cars (owner, license, model, make) VALUES (:owner,:license,:model,:make)");
		$statement->bindParam(":owner", $_POST['owner']); //bind pririsa
		$statement->bindParam(":license", $_POST['license']);
		$statement->bindParam(":model", $_POST['model']);
		$statement->bindParam(":make", $_POST['make']);
		//$statement->bindParam(":date", $_POST['date']);
		$statement->execute();
		$conn = null;
		echo '<div class="alert alert-success" role="alert">Car added</div>';

	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
} else {
	echo '<div class="alert alert-danger" role="alert">No data</div>';
}




header("Content-type:application/json");

define('SERVER', "localhost");
define('USER', "root");
define('PASS', "");
define('DATABASE', "fakeapplication");

try {

	$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$statement = $conn->prepare("SELECT * FROM cars");
	$statement->execute();
	
	$cars = $statement->fetchAll(PDO::FETCH_ASSOC);

	$conn = null;

	} 
	catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}

echo json_encode($cars);