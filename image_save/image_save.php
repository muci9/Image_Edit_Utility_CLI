<?php

function imageSave(array $inputInfo) : array
{
    if (!isset($inputInfo["output-file"]) || !isset($inputInfo["image"]))
        die;
    $result =  $inputInfo["image"]->writeImage($inputInfo["output-file"]);
    if ($result === TRUE)
        $inputInfo["success"] = TRUE;
    else
        $inputInfo["success"] = FALSE;
    return $inputInfo;
}