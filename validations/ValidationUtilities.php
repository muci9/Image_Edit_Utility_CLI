<?php

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

}