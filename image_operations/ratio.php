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
        return $inputInfo;
    if (!isset($inputInfo["format"])) // we don't have a format
        return $inputInfo;
    if (isset($inputInfo["height"]) && isset($inputInfo["width"])) // we have a width and a height (impossible case, w/e)
        return $inputInfo;
    list($ratioX, $ratioY) = explode(":", $inputInfo["format"]);
    $newImage = $inputInfo["image"]->getImage();
    $imgHeight = $newImage->getImageHeight();
    $imgWidth = $newImage->getImageWidth();
    if (isset($inputInfo["height"])) {// if we have a given height, we do the format by calculating a new width
        $newWidth = calculateNewWidth((int)$inputInfo["height"], $ratioX, $ratioY);
        $givenHeight = (int)$inputInfo["height"];
        $newImage->scaleImage($newWidth, $givenHeight);
    }
    else if (isset($inputInfo["width"])) { // we obtain the format by calculating a new height
        $newHeight = calculateNewHeight((int)$inputInfo["width"], $ratioX, $ratioY);
        $givenWidth = (int)$inputInfo["width"];
        $newImage->scaleImage($givenWidth, $newHeight);
    }
    else {  // we don't have a target width/height, but a given aspect ratio, so we compute a new width/height based
            // on the maximum between the 2
        if ($imgWidth > $imgHeight) {
            $newHeight = calculateNewHeight($imgWidth, $ratioX, $ratioY);;
            $newImage->scaleImage($imgWidth, $newHeight);
        }
        else {
            $newWidth = calculateNewHeight($imgHeight, $ratioX, $ratioY);;
            $newImage->scaleImage($newWidth, $imgHeight);
        }
    }
    $inputInfo["image"] = $newImage;
    return $inputInfo;
}