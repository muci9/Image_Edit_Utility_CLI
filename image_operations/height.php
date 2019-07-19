<?php

function height(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo[HEIGHT]) || $inputInfo[HEIGHT] == NULL) //check if we have a width value
        return $inputInfo;
    if (!isset($inputInfo[IMAGE])) // check if we have an image
        return $inputInfo;
    if (isset($inputInfo[FORMAT])) // if we have an option of format, then the format will take care of width and height
        return $inputInfo;
    $newImage = $inputInfo[IMAGE]->getImage();
    $newHeight = (int)$inputInfo[HEIGHT];
    //this is execute()
    $newImage->scaleImage(0, $newHeight);
    $inputInfo[IMAGE] = $newImage;
    return $inputInfo;
}