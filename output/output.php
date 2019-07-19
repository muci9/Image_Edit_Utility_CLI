<?php
require_once "constants.php";

function outputController(array $payload)
{
    if (isset($payload[SUCCESS]) && $payload[SUCCESS] === TRUE)
        showSuccess($payload);
    else if (isset($payload[HELP]))
        showHelp();
    else if (isset($payload[ERRORS]))
        showErrors($payload);
    else {
        $payload[ERRORS][] = "Control reached output stage with no result.";
        showErrors($payload);
    }
    die;
}

function showSuccess(array $inputInfo) : void
{
    echo "Image saved successfully at ".$inputInfo[OUTPUT_FILE].PHP_EOL;
}

function showHelp()
{
    $helpMessage = [
        "Usage example: php index.php --input-file=test.jpg --output-file==testOut.png --width=30 --format=4:3",
        "Options:",
        "--input-file - this is a required argument for the tool. Not providing will fail the execution.",
        "--output-file - required argument.",
        "--width - optional parameter. If used, the output image must have the given width while respecting the original
         aspect ratio, or the one given in the --format argument",
        "--height - optional parameter. If used, the output image must have the given width while respecting the original
         aspect ratio, or the one given in the --format argument",
        "--format - optional parameter. If used, the output image must have the given aspect ratio",
        "--watermark - optional parameter. If used, the output image will have the given watermark image in a random corner",
        "--help - optional parameter. If used, a list with all possible arguments will be displayed explaining the usage of each one"
    ];
    echo(implode(PHP_EOL, $helpMessage).PHP_EOL);
}

function showErrors(array $payload)
{
    echo($payload[OUTPUT_ERRORS]);
}

