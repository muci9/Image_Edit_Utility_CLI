<?php

function validRequiredParameters(array $input) : bool
{
    if ((!isset($input[INPUT_FILE]) || !isset($input[OUTPUT_FILE])) && isset($input[HELP]))
        return FALSE;
    return TRUE;
}

/**
 * Function to check that the array contains only keys from the STANDARD_KEYS constant
 * @param array $input
 * @return bool - TRUE if the keys of the array are all in the STANDARD_KEYS, FALSE otherwise
 */
function validKeys(array $input) : bool
{
    $inputKeys = array_keys($input);
    foreach ($inputKeys as $key) {
        if (!in_array($key, STANDARD_KEYS)) {
            return FALSE;
        }
        if ($key === ERRORS) {
            return FALSE;
        }
    }
    return TRUE;
}

/**
 * @param array $input
 * @return bool
 */
function validInputFilePath(array $input) : bool
{
    $verified_input = $input;
    if (!isset($verified_input[INPUT_FILE]))
        return FALSE;
    if (!file_exists($verified_input[INPUT_FILE])) {
        if (!file_exists(INPUT_DIR.$verified_input[INPUT_FILE])) {
            return FALSE;
        }
    }
    return TRUE;
}


function validInputFileType(array $input) : bool
{
    $verifiedInput = $input;
    if (!isset($verifiedInput[INPUT_FILE]))
        return FALSE;
    $pathToFile = $verifiedInput[INPUT_FILE];
    if (!file_exists($pathToFile)) {
        if (file_exists(INPUT_DIR . DIRECTORY_SEPARATOR . $verifiedInput[INPUT_FILE]))
            $pathToFile = INPUT_DIR . DIRECTORY_SEPARATOR . $verifiedInput[INPUT_FILE];
        else
            return FALSE;
    }
    $contentType = mime_content_type($pathToFile);
    if ($contentType !== "image/jpeg" && $contentType !== "image/png")
        return FALSE;
    $fileExtension = pathinfo($pathToFile, PATHINFO_EXTENSION);
    if ($fileExtension !== "jpg" && $fileExtension !== "png" && $fileExtension !== "jpeg")
        return FALSE;
    return TRUE;
}

function validOutputFilePath(array $input) : bool
{
    if (!isset($input[OUTPUT_FILE]))
        return FALSE;
    $filePath = $input[OUTPUT_FILE];
    $directorySeparatorPosition = strrpos($filePath, "/");
    if ($directorySeparatorPosition === FALSE) // only a filename is given
        return TRUE;
    $filePath = substr($filePath, 0, $directorySeparatorPosition - 1);
    if (is_dir($filePath))
        return TRUE;
    return FALSE;
}

function validInputWidth(array $input) : bool
{
    if (isset($input[WIDTH]) && !preg_match("/\d+/", $input[WIDTH]))
        return FALSE;
    return TRUE;
}

function validInputHeight(array $input) : bool
{
    if (isset($input[HEIGHT]) && !preg_match("/\d+/", $input[HEIGHT]))
        return FALSE;
    return TRUE;
}

function validInputFormat(array $input) : bool
{
    if (isset($input[FORMAT]) && !preg_match("/\d+:\d+/", $input[FORMAT]))
        return FALSE;
    return TRUE;
}