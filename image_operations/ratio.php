<?php

function calculateNewWidth(int $imgHeight, int $ratioX, int $ratioY) : int
{
    return $imgHeight * $ratioX / $ratioY;
}

function calculateNewHeight(int $imgWidth, int $ratioX, int $ratioY) : int
{
    return $imgWidth * $ratioY / $ratioX;
}



function ratio(array $inputInfo) : array
{
    ///can execute
    if (!isset($inputInfo["image"]))
        die;
    if (!isset($inputInfo["format"])) // we don't have a format
        die;
    if (isset($inputInfo["height"]) && isset($inputInfo["width"])) // we have a width and a height (impossible case, w/e)
        die;
    list($ratioX, $ratioY) = explode(":", $inputInfo["format"]);
    $newImage = $inputInfo["image"]->getImage();
    if (isset($inputInfo["height"])) {// if we have a given height, we do the format by calculating a new width
        $newWidth = calculateNewWidth($inputInfo["image"]->getImageHeight(), $ratioX, $ratioY);
        $givenHeight = (int)$inputInfo["height"];
        $newImage->scaleImage($newWidth, $givenHeight);
    }
    else { // we obtain the format by calculating a new height
        $newHeight = calculateNewHeight($inputInfo["image"]->getImageWidth(), $ratioX, $ratioY);
        $givenWidth = (int)$inputInfo["width"];
        $newImage->scaleImage($givenWidth, $newHeight);
    }
    $inputInfo["image"] = $newImage;
    return $inputInfo;
}