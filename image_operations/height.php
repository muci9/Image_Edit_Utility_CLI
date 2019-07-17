<?php

function height(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo["height"]) || $inputInfo["height"] == NULL) //check if we have a width value
        die;
    if (!isset($inputInfo["image"])) // check if we have an image
        die;
    if (isset($inputInfo["format"])) // if we have an option of format, then the format will take care of width and height
        die;
    $newImage = $inputInfo["image"]->getImage();
    $newHeight = (int)$inputInfo["height"];
    $width = $inputInfo["image"]->getImageWidth();
    //this is execute()
    $newImage->scaleImage(0, $newHeight);
    $inputInfo["image"] = $newImage;
    return $inputInfo;
}