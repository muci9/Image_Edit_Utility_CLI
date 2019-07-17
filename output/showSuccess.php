<?php

function showSuccess(array $inputInfo) : void
{
    if (isset($inputInfo["success"]) || $inputInfo["success"] === TRUE)
        echo "Image saved successfully at ".$inputInfo["output-file"].PHP_EOL;
    else
        echo "Image couldn't be saved.".PHP_EOL;
}