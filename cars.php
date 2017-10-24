<?php
header("Content-type:application/json");

define('SERVER', "localhost");
define('USER', "root");
define('PASS', "");
define('DATABASE', "fakeapplication");
if(isset($_POST['owner']) && $_POST['owner'] != "") {
	try {
	   $conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully"; 
	    $statement = $conn->prepare("INSERT INTO cars (owner, license, model, make)
	    	VALUES (:owner, :license, :model, :make)");
	   	
	   	// variantas 1
	   $statement->bindParam(':owner', $_POST['owner']);
	   $statement->bindParam(':license', $_POST['license']);
	   $statement->bindParam(':model', $_POST['model']);
	   $statement->bindParam(':make', $_POST['make']);
	   //$statement->bindParam(':date', $_POST['date']);
	   $statement->execute();
	   // variantas 2
	   // $statement->execute($_POST);
	    $conn = null;
	  	$response['message'] = ['type' => 'success','body' => 'Car was added'];
	} catch(PDOException $e) {
	    $response['message'] = ['type' => 'danger','body' => $e->getMessage()];
	}
} else {
	$response['message'] = ['type' => 'warning','body' => 'No car data to submit'];
}
try {
    $conn = new PDO("mysql:host=localhost;dbname=fakeapplication;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['last101'])) {
    	//nesaugu
    	$statement = $conn->query("SELECT * FROM cars ORDER BY date DESC LIMIT 10");
    	$statement->execute();
    	$response['cars'] = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
    	$statement = $conn->query("SELECT * FROM cars");
    	$response['cars'] = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    elseif(isset($_GET['search'])) {
    	//nesaugu
    	$statement = $conn->prepare("SELECT * FROM cars WHERE (UPPER(owner) LIKE :search) OR (UPPER(license) LIKE :search)");
    	$s = "%" . strtoupper($_GET['search']) . "%";
    	$statement->bindParam(":search", $s);
    	$statement->execute();
    	 $response['cars'] = $statement->fetchAll(PDO::FETCH_ASSOC);

    } else {
    	$statement = $conn->prepare("SELECT * FROM cars");
    	$statement->execute();
    	$response['cars'] = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    $conn = null;
  
} catch(PDOException $e) {
    $response['message'] = ['type' => 'danger','body' =>  $e->getMessage()];
}
echo json_encode($response);