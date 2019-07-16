<?php


function imageLoad(array $inputInfo) : array
{
    if (!isset($inputInfo["input-file"]))
        die;
    $image = new Imagick();
    if (!$image->readImage($inputInfo["input-file"]))
        die;
    $inputInfo["image"] = $image;
    return $inputInfo;
}


function imageLoadTests()
{
    $inputInfo["input-file"] = "/home/ciprianmuresan/PhpstormProjects/Image_Edit_Utility_CLI/pexels-photo-414612.jpeg";
    $inputWithImage = imageLoad($inputInfo);
    assert(isset($inputWithImage["image"]) === TRUE);
}

imageLoadTests();