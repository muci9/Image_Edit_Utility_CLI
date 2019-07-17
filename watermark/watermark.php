<?php

function watermark(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo["watermark"]) || $inputInfo["watermark"] == NULL) //check if we have a watermark value
        die;
    if (!isset($inputInfo["image"])) // check if we have an image
        die;
    $newImage = $inputInfo["image"]->getImage();
    $watermark = new Imagick();
    $watermark->readImage($inputInfo["watermark"]);
    $watermark->setImageOpacity(0.1);
    $watermark->scaleImage($newImage->getImageWidth()/ 10, $newImage->getImageHeight() / 10, TRUE);
    //this is execute()
    $newImage->compositeImage($watermark, Imagick::COMPOSITE_OVER, 0, 0);
    $inputInfo["image"] = $newImage;
    return $inputInfo;
}