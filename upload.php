<?php
require_once("config.php");
require_once("Convert.php");

session_start();

$target_file = config::UPLOAD_DIR . basename($_FILES["fileToUpload"]["name"]);
$uploadFile = $_FILES["fileToUpload"]["tmp_name"];
$fileName = explode(".", basename( $_FILES["fileToUpload"]["name"]))[0];
$fileExtension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$typeSelected = $_SESSION['converterType'];

var_dump($typeSelected);

// CHECK THE FILE EXTENSION

$checkResult = Convert::checkFileExtension($typeSelected, $fileExtension);

// CHECK IF FILE CAN BE UPLOAD
if ($checkResult === false) {
    echo "Sorry, your file was not uploaded, wrong extension";
} else {

    // UPLOAD FILE
    echo Convert::uploadFile($typeSelected, $uploadFile, $target_file);
    // CONVERT FILE
    echo Convert::convertFile($typeSelected, $fileExtension, $fileName);
}

?>