<?php

require_once "height.php";
require_once "ratio.php";
require_once "width.php";

function operationController(array $payload)
{
    $payload = height($payload);
    $payload = width($payload);
    $payload = ratio($payload);
    imageSaveController($payload);
}