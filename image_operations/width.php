<?php

function width(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo[WIDTH]) || $inputInfo[WIDTH] == NULL) //check if we have a width value
        return $inputInfo;
    if (!isset($inputInfo[IMAGE])) // check if we have an image
        return $inputInfo;
    if (isset($inputInfo[FORMAT])) // if we have an option of format, then the format will take care of width and height
        return $inputInfo;
    $newImage = $inputInfo[IMAGE]->getImage();
    $newWidth = (int)$inputInfo[WIDTH];
    //this is execute()
    $newImage->scaleImage($newWidth, 0);
    $inputInfo[IMAGE] = $newImage;
    return $inputInfo;
}