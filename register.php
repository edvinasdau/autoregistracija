<?php

session_start();

$errors = [];

if (isset($_POST['username']) && ($_POST['password']) == ($_POST['repeat_password'])){
	
	try {
		$conn = new PDO("mysql:host=localhost;dbname=students;charset=utf8", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$statement = $conn->prepare("SELECT * FROM userss WHERE username = :username");
			$statement->bindParam(':username', $_POST['username']);
			$statement->execute();
			$user_data = $statement->fetch(PDO::FETCH_ASSOC);

			if($user_data > 0){
				$errors[] = "Such user already exists. <br>Please try different username";
			} else {
		$statement = $conn->prepare("INSERT INTO userss (username, password)
			VALUES (:username, :password)");
		$statement->bindParam(':username', $_POST['username']);
		$crypt = password_hash($_POST['password'],PASSWORD_DEFAULT);
		$statement->bindParam(':password', $crypt);
		$statement->execute();
		$conn = null;
		header("Location: login.php");
			}
	}	catch(PDOException $e) {
		echo $e->getMessage();
	}



}
 
 

?>

<<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<form method="post">
					<input id="username" type="text" name="username" placeholder="username">
					<input id="pw" type="password" name="password" placeholder="password">
					<input id="pw_r" type="password" name="repeat_password" placeholder="repeat_password">
					<input id="reg" type="submit" name="registruotis" class="btn btn-warning" value="Register">
				</form>
			</div>
		</div>
	</div>	

</body>
</html>