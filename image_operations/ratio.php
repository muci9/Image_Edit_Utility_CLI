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
    if (!isset($inputInfo[IMAGE]))
        return $inputInfo;
    if (!isset($inputInfo[FORMAT])) // we don't have a format
        return $inputInfo;
    if (isset($inputInfo[HEIGHT]) && isset($inputInfo[WIDTH])) // we have a width and a height (impossible case, w/e)
        return $inputInfo;
    list($ratioX, $ratioY) = explode(":", $inputInfo[FORMAT]);
    $newImage = $inputInfo[IMAGE]->getImage();
    $imgHeight = $newImage->getImageHeight();
    $imgWidth = $newImage->getImageWidth();
    if (isset($inputInfo[HEIGHT])) {// if we have a given height, we do the format by calculating a new width
        $newWidth = calculateNewWidth((int)$inputInfo[HEIGHT], $ratioX, $ratioY);
        $givenHeight = (int)$inputInfo[HEIGHT];
        $newImage->scaleImage($newWidth, $givenHeight);
    }
    else if (isset($inputInfo[WIDTH])) { // we obtain the format by calculating a new height
        $newHeight = calculateNewHeight((int)$inputInfo[WIDTH], $ratioX, $ratioY);
        $givenWidth = (int)$inputInfo[WIDTH];
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
    $inputInfo[IMAGE] = $newImage;
    return $inputInfo;
}