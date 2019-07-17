<?php

function getRandomCorner(Imagick $targetImage, Imagick $watermark) : array
{
    $maxWidth = $targetImage->getImageWidth() - $watermark->getImageWidth();
    $maxHeight = $targetImage->getImageHeight() - $watermark->getImageHeight();
    $arrCorner = [
        [0, 0],
        [0, $maxHeight],
        [$maxWidth, 0],
        [$maxWidth, $maxHeight]
    ];
    return $arrCorner[array_rand($arrCorner)];
}

function getWatermark(string $watermarkPath, Imagick $targetImage) : Imagick
{
    $watermark = new Imagick();
    $watermark->readImage($watermarkPath);
    $watermark->setImageOpacity(0.25);
    $watermark->scaleImage($targetImage->getImageWidth()/ 10, $targetImage->getImageHeight() / 10, TRUE);
    return $watermark;
}

function watermark(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo["watermark"]) || $inputInfo["watermark"] == NULL) //check if we have a watermark value
        die;
    if (!isset($inputInfo["image"])) // check if we have an image
        die;
    $newImage = $inputInfo["image"]->getImage();
    //prepare watermark, possible to move to image_load
    $watermark = getWatermark($inputInfo["watermark"], $newImage);
    //get position for watermark
    list($x, $y) = getRandomCorner($newImage, $watermark);
    //this is execute()
    $newImage->compositeImage($watermark, Imagick::COMPOSITE_OVER, $x, $y);
    $inputInfo["image"] = $newImage;
    return $inputInfo;
}