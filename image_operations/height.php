<?php

function height(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo["height"]) || $inputInfo["height"] == NULL) //check if we have a width value
        return $inputInfo;
    if (!isset($inputInfo["image"])) // check if we have an image
        return $inputInfo;
    if (isset($inputInfo["format"])) // if we have an option of format, then the format will take care of width and height
        return $inputInfo;
    $newImage = $inputInfo["image"]->getImage();
    $newHeight = (int)$inputInfo["height"];
    $width = $inputInfo["image"]->getImageWidth();
    //this is execute()
    $newImage->scaleImage(0, $newHeight);
    $inputInfo["image"] = $newImage;
    return $inputInfo;
}