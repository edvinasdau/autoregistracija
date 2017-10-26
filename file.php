<pre><?php

print_r($_FILES);

$target_file = "uploads/" . rand(1,99999) . "-" .  basename($_FILES["failas"]["name"]);

// date("Y-m-d_Hms") 2017-10-28_100755-failas.csv

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

    if (move_uploaded_file($_FILES["failas"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["failas"]["name"]). " has been uploaded.";
        header("location: index.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}