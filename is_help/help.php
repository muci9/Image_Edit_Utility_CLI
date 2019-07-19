<?php
require_once "constants.php";
require_once "validations/validations.php";
require_once "output/output.php";

/**
 * @param array $payload - array that contains all the information with the option => value format
 */
function helpController(array $payload)
{
    if (hasRequestedHelp($payload))
        outputController($payload);
    validationController($payload);
}

/**
 * @param array $payload
 * @return bool - TRUE if the payload contains the key defined by the constant HELP, FALSE otherwise
 */
function hasRequestedHelp(array $payload) : bool
{
    return key_exists(HELP, $payload) ? TRUE : FALSE;
}