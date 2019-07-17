<?php

function height(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo["height"]) || $inputInfo["height"] == NULL) //check if we have a width value
        die;
    if (!isset($inputInfo["image"])) // check if we have an image
        die;
    $newImage = $inputInfo["image"]->getImage();
    $newHeight = (int)$inputInfo["height"];
    $width = $inputInfo["image"]->getImageGeometry()["width"];
    //this is execute()
    $newImage->scaleImage(0, $newHeight);
    $inputInfo["image"] = $newImage;
    return $inputInfo;
}