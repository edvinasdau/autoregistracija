<pre><?php

print_r($_FILES);

$target_file = "uploads/" . rand(1,99999) . "-" .  basename($_FILES["failas"]["name"]);

// date("Y-m-d_Hms") 2017-10-28_100755-failas.csv

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

        	if (move_uploaded_file($_FILES["failas"]["tmp_name"], $target_file)) {
		echo "The file ". basename($_FILES["failas"]["name"]). " has been uploaded.";
		$conn = new PDO("mysql:host=localhost;dbname=fakeapplication;charset=utf8", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$failai = fopen($target_file, "r") or die ("Unable to open file !");
		
		for ($i=1; !feof($failai) ; $i++) { 
			$file = explode(",", rtrim(fgets($failai), ""));
			$statement = $conn->prepare("INSERT INTO cars (owner, license, model, make)
				VALUES (:owner, :license, :model, :make)");
			$statement->bindParam(':owner', $file[0]);
			$statement->bindParam(':license',$file[1]);
			$statement->bindParam(':model', $file[2]);
			$statement->bindParam(':make', $file[3]);
			$statement->execute();
		}
		$conn = null;  
		header("location: index.php");




    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}