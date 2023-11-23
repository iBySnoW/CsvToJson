<?php

require_once("Interface/IConvert.php");
require_once("config.php");

class XmlToJson implements IConvert
{

    public static function checkFileExtension(string $convertType, string $extension): bool
    {
        if($extension != "xml") {
            return false;
        }
        return true;
    }

    public static function uploadFile(string $convertType, string $uploadFile, string $targetFile): string
    {
        //CHECK IF UPLOAD_DIR EXIST
        if(!file_exists(config::UPLOAD_DIR)){
            mkdir(config::UPLOAD_DIR);
        }

        // UPLOAD FILE IN PROJECT
        if (move_uploaded_file($uploadFile, $targetFile)) {
            return "Your file has been uploaded. \n\r";
        } else {
            return "Error when uploading your file";
        }
    }

    public static function convertFile(string $convertType, string $extension, string $fileName): string
    {
        // GET XML FILE UPLOADED
        $xmlFile= file_get_contents(config::UPLOAD_DIR.$fileName.".".$extension);


        $xmldata = simplexml_load_string($xmlFile);

        $jsonObject = json_encode($xmldata, JSON_PRETTY_PRINT);

        // CHECK IF DATA.JSON FILE EXIST

        if(!file_exists(config::JSON_DIR)){
            mkdir(config::JSON_DIR);
        }

        file_put_contents(config::JSON_DIR. '/' . $fileName. ".json", $jsonObject);

        // LINK TO DOWNLOAD JSON
        return "<a href='" . config::JSON_DIR. $fileName. ".json' download>
              Download your json here
            </a>";
    }
}