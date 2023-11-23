<?php

require_once("Converter/CsvToJson.php");
require_once("Converter/XmlToJson.php");
class Convert implements IConvert
{
    public static function checkFileExtension(string $convertType, string $extension): bool
    {
        switch ($convertType){
            case 'csvToJson':
                return CsvToJson::checkFileExtension($convertType, $extension);
            case 'xmlToJson':
                return XmlToJson::checkFileExtension($convertType, $extension);
            default:
              return false;
        }
    }

    public static function uploadFile(string $convertType, string $uploadFile, string $targetFile): string
    {
        switch ($convertType){
            case 'csvToJson':
                return CsvToJson::uploadFile($convertType, $uploadFile,$targetFile);
            case 'xmlToJson':
                return XmlToJson::uploadFile($convertType, $uploadFile,$targetFile);
            default:
                return "Wrong convert type";
        }
    }

    public static function convertFile(string $convertType, string $extension, string $fileName): string
    {
        switch ($convertType){
            case 'csvToJson':
                return CsvToJson::convertFile($convertType, $extension, $fileName);
            case 'xmlToJson':
                return XmlToJson::convertFile($convertType, $extension, $fileName);
            default:
                return "Wrong convert type";
        }
    }
}