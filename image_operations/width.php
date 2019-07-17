<?php

function width(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo["width"]) || $inputInfo["width"] == NULL) //check if we have a width value
        die;
    if (!isset($inputInfo["image"])) // check if we have an image
        die;
    if (isset($inputInfo["format"])) // if we have an option of format, then the format will take care of width and height
        die;
    $newImage = $inputInfo["image"]->getImage();
    $newWidth = (int)$inputInfo["width"];
    $height = $inputInfo["image"]->getImageHeight();
    //this is execute()
    $newImage->scaleImage($newWidth, 0);
    $inputInfo["image"] = $newImage;
    return $inputInfo;
}