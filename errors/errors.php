<?php

function errorsController(array $payload)
{
    if (!isset($payload[ERRORS]))
        $payload[ERRORS][] = "Something went terribly wrong. You shouldn't have been here.";
    $payload[OUTPUT_ERRORS] = implode(PHP_EOL, $payload[ERRORS]);
    outputController($payload);
}