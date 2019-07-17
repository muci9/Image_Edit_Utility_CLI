<?php

function width(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo["width"]) || $inputInfo["width"] == NULL) //check if we have a width value
        die;
    if (!isset($inputInfo["image"])) // check if we have an image
        die;
    $newImage = $inputInfo["image"]->getImage();
    $newWidth = (int)$inputInfo["width"];
    $height = $inputInfo["image"]->getImageGeometry()["height"];
    //this is execute()
    $newImage->adaptiveResizeImage($newWidth, $height);
    $inputInfo["image"] = $newImage;
    return $inputInfo;
}