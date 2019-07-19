<?php

function imageSaveController(array $payload)
{
    $payload = writeImage($payload);
    if (isset($payload[ERRORS]))
        errorsController($payload);
    outputController($payload);
}

function writeImage(array $payload) : array
{
    $newPayload = $payload;
    if (!isset($newPayload[OUTPUT_FILE]) || !isset($newPayload[IMAGE])) {
        $newPayload[ERRORS][] = "Image couldn't be saved.";
        return $newPayload;
    }
    $newPayload[SUCCESS] = FALSE;
    $writeFilePath = $newPayload[OUTPUT_FILE];
    $result =  $newPayload[IMAGE]->writeImage($newPayload[OUTPUT_FILE]);
    if ($result === TRUE)
        $newPayload[SUCCESS] = TRUE;
    return $newPayload;
}