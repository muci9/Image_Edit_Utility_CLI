<?php

require_once "ValidationUtilities.php";
require_once "errors/errors.php";

/**
 * @param array $input
 */
function validationController(array $input)
{
    $verifiedInput = validateInput($input);
    if (!isset($verifiedInput[ERRORS]))
        imageLoadController($verifiedInput);
    else
        errorsController($verifiedInput);
}

/**
 * @param array $input
 * @return array $verified_input - contains all the initial values of the $input array, plus a value with the
 * key ERRORS in case there is invalid input
 */
function validateInput(array $input) : array
{
    $verifiedInput = $input;
    if (!validKeys($verifiedInput))
        $verifiedInput[ERRORS][] = "Invalid option(s) given.";
    if (!validRequiredParameters($verifiedInput))
        $verifiedInput[ERRORS][] = "Required options --input-file and/or --output-file is missing.";
    if (!validInputFilePath($verifiedInput))
        $verifiedInput[ERRORS][] = "Invalid input file path.";
    if (!validInputFileType($verifiedInput))
        $verifiedInput[ERRORS][] = "Invalid input file type.";
    if (!validOutputFilePath($verifiedInput))
        $verified_input[ERRORS][] = "Invalid output file path.";
    //if (!validOutputFileType($verifiedInput))
    //    $verified_input[ERRORS][] = "Invalid output file type.";
    if (!validInputWidth($verifiedInput))
        $verifiedInput[ERRORS][] = "Invalid width option.";
    if (!validInputHeight($verifiedInput))
        $verifiedInput[ERRORS][] = "Invalid height option.";
    if (!validInputFormat($verifiedInput))
        $verifiedInput[ERRORS][] = "Invalid format option.";
    return $verifiedInput;
}



