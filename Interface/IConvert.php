<?php

interface IConvert
{
    public static function checkFileExtension(string $convertType, string $extension): bool;
    public static function uploadFile(string $convertType, string $uploadFile, string $targetFile): string;
    public static function convertFile(string $convertType, string $extension, string $fileName): string;
}