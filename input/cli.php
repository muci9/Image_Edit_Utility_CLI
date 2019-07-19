<?php

/**
 * Creates the payload with the option => value for the command and continues the flow
 * @param array $input - array containing the input for the command
 */
function commandLineController(array $input)
{
    $payload = parseCommandLineArguments($input);
    helpController($payload);
}

/**
 * @param array $input - array containing the input arguments to be parsed
 * @return array $info - array where key => value represents 'option-name' => 'value'
 */
function parseCommandLineArguments(array $input) : array
{
    $info = [];
    foreach ($input as $option) {
        $keyAndValue = explode("=", $option);
        $keyAndValue[1] = NULL;
        if (count($keyAndValue) > 2)
            $keyAndValue[1] = implode("=", $keyAndValue[1]);
        $info[$keyAndValue[0]] = $keyAndValue[1];
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
            INPUT_FILE => "path",
            OUTPUT_FILE => "path",
            WIDTH => "30",
            HEIGHT => "40"]);

    $argsTest = [
        "--input-files=path",
        "--output-files=",
        "--width:30",
        "--height=40px"
    ];
    $argsTestResult = $parseCommmandLineArguments($argsTest);
    assert($argsTestResult === [
            INPUT_FILE => "path",
            "output-files" => "",
            "width:30" => NULL,
            HEIGHT => "40px"
        ]);
}

//$testParseCommandLineArguments();
