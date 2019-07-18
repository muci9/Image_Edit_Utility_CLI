<?php

/**
 * @param array $payload - array that contains all the information with the option => value format
 */
function help_controller(array $payload)
{
    if (is_help($payload))
        output_controller($payload);
    validation_controller($payload);
}

/**
 * @param array $payload
 * @return bool - TRUE if the payload contains the key defined by the constant HELP, FALSE otherwise
 */
function is_help(array $payload) : bool
{
    return isset($payload[HELP]) ? TRUE : FALSE;
}