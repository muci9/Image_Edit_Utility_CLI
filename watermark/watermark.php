<?php

function watermarkController(array $payload)
{
    $newPayload = $payload;
    $newPayload = addWatermark($newPayload);
    if (isset($newPayload[ERRORS]))
        errorsController($newPayload);
    imageSaveController($newPayload);
}

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

function addWatermark(array $inputInfo) : array
{
    $newPayload = $inputInfo;
    // this is canExecute();
    if (!isset($newPayload[WATERMARK]) || $newPayload[WATERMARK] == NULL) {//check if we have a watermark value
        return $newPayload;
    }
    if (!isset($newPayload[IMAGE])) {// check if we have an image
        $newPayload[ERRORS][] = "There's no image loaded to apply watermark to.";
        return $newPayload;
    }
    $newImage = $newPayload[IMAGE]->getImage();
    //prepare watermark, possible to move to image_load
    $watermark = getWatermark($inputInfo[WATERMARK], $newImage);
    //get position for watermark
    list($x, $y) = getRandomCorner($newImage, $watermark);
    //this is execute()
    $newImage->compositeImage($watermark, Imagick::COMPOSITE_OVER, $x, $y);
    $newPayload[IMAGE] = $newImage;
    return $newPayload;
}