<?php

function parseCommandLineArguments(array $args) : array
{
    $info = [];
    array_shift($args);//remove args[0] which is the name of the command
    foreach ($args as $option) {
        list($key, $value) = explode("=", $option);
        $key = ltrim($key, "-");
        $info[$key] = $value;
    }
    return $info;
}

//parseCommandLineArguments($argv);