<?php


function imageLoadController(array $payload)
{
    $payload = loadImage($payload);
    if (isset($payload[ERRORS]))
        errorsController($payload);
    operationsController($payload);
}

function loadImage(array $payloadWithoutImage) : array
{
    $payloadWithImage = $payloadWithoutImage;
    if (!isset($payloadWithImage["input-file"])) {
        $payloadWithImage[ERRORS][] = "Image couldn't be loaded.";
        return $payloadWithImage;
    }
    $image = new Imagick();
    if (!$image->readImage($payloadWithImage["input-file"]))  {
        $payloadWithImage[ERRORS][] = "Image couldn't be loaded.";
        return $payloadWithImage;
    }
    $payloadWithImage["image"] = $image;
    return $payloadWithImage;
}

function imageLoadTests()
{
    $payloadWithImage["input-file"] = "/home/ciprianmuresan/PhpstormProjects/Image_Edit_Utility_CLI/pexels-photo-414612.jpeg";
    $inputWithImage = loadImage($payloadWithImage);
    assert(isset($inputWithImage["image"]) === TRUE);
    assert(get_class($payloadWithImage["image"] === "Imagick"));
}

//imageLoadTests();