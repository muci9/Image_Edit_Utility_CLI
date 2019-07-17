<?php

function width(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo["width"]) || $inputInfo["width"] == NULL) //check if we have a width value
        return $inputInfo;
    if (!isset($inputInfo["image"])) // check if we have an image
        return $inputInfo;
    if (isset($inputInfo["format"])) // if we have an option of format, then the format will take care of width and height
        return $inputInfo;
    $newImage = $inputInfo["image"]->getImage();
    $newWidth = (int)$inputInfo["width"];
    $height = $inputInfo["image"]->getImageHeight();
    //this is execute()
    $newImage->scaleImage($newWidth, 0);
    $inputInfo["image"] = $newImage;
    return $inputInfo;
}