<?php

function setWidth(array $inputInfo) : array
{
    // this is canExecute();
    if (!isset($inputInfo["width"]) || $inputInfo["width"] == NULL) //check if we have a width value
        die;
    if (!isset($inputInfo["image"])) // check if we have an image
        die;
    $newWidth = $inputInfo["width"];
    //we create a bl
}