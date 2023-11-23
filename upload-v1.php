<?php
require_once("config.php");

$target_file = config::UPLOAD_DIR . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileName = explode(".", basename( $_FILES["fileToUpload"]["name"]))[0];
$fileExtension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// CHECK IF THE FILE IS CSV
if($fileExtension != "csv") {
    echo "Sorry, only csv file is accepted";
    $uploadOk = 0;
}

// CHECK IF FILE CAN BE UPLOAD
if ($uploadOk === 0) {
    echo "  Sorry, your file was not uploaded";

} else {

    //CHECK IF UPLOAD_DIR EXIST
    if(!file_exists(config::UPLOAD_DIR)){
        mkdir(config::UPLOAD_DIR);
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ".basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. \n\r";
    } else {
        echo "Error when uploading your file";
        $uploadOk = 0;
    }
}

// CHECF IF FILE IS CORRECTLY UPLOAD
if($uploadOk === 1){

    // GET CSV FILE UPLOADED
    $csvFile= file_get_contents(config::UPLOAD_DIR.$_FILES["fileToUpload"]["name"]);

    // PARSE CSV STRING INTO AN ARRAY
    $csvLineArray = explode("\n", $csvFile);

    $result = array_map('str_getcsv' , $csvLineArray);

    $headers = $result[0];
    $jsonArray = array();
    $rowCount = count($result);
    for ($i=1;$i<$rowCount;$i++) {
        foreach ($result[$i] as $key => $column) {
            $jsonArray[$i][$headers[$key]] = $column;
        }
    }

    // TRANSFORM ARRAY TO JSON
    $jsonObject = json_encode($jsonArray, JSON_PRETTY_PRINT);

    // CHECK IF DATA.JSON FILE EXIST

    if(!file_exists(config::JSON_DIR)){
        mkdir(config::JSON_DIR);
    }

    file_put_contents(config::JSON_DIR. '/' . $fileName. ".json", $jsonObject);

    // LINK TO DOWNLOAD JSON
    echo "<a href='" . config::JSON_DIR. $fileName. ".json' download>
              Your json here
            </a>";
}

?>