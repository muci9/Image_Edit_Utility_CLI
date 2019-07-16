<?php

function parseCommandLineArguments(array $args) : array
{
    $info = [];
    foreach ($args as $option) {
        @list($key, $value) = explode("=", $option);
        $key = ltrim($key, "-");
        $info[$key] = $value;
    }
    return $info;
}

function testParseCommandLineArguments()
{
    $argsTest = [
        "--input-file=path",
        "--output-file=path",
        "--width=30",
        "--height=40"
    ];
    $argsTestResult = parseCommandLineArguments($argsTest);
    assert($argsTestResult === [
            "input-file" => "path",
            "output-file" => "path",
            "width" => "30",
            "height" => "40"]);

    $argsTest = [
        "--input-files=path",
        "--output-files=",
        "--width:30",
        "--height=40px"
    ];
    $argsTestResult = parseCommandLineArguments($argsTest);
    assert($argsTestResult === [
            "input-files" => "path",
            "output-files" => "",
            "width:30" => NULL,
            "height" => "40px"
        ]);
}

//testParseCommandLineArguments();
