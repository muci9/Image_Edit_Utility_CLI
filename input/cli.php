<?php

/**
 * Creates the payload with the option => value for the command and continues the flow
 * @param array $input - array containing the input for the command
 */
function command_line_controller(array $input)
{
    $payload = parse_command_line_arguments($input);
    help_controller($payload);
}

/**
 * @param array $input - array containing the input arguments to be parsed
 * @return array $info - array where key => value represents 'option-name' => 'value'
 */
function parse_command_line_arguments(array $input) : array
{
    $info = [];
    foreach ($input as $option) {
        $key_and_val = explode("=", $option);
        $key_and_val[1] = NULL;
        if (count($key_and_val) > 2)
            $key_and_val[1] = implode("=", $key_and_val[1]);
        $info[$key_and_val[0]] = $key_and_val[1];
    }
    return $info;
}

function test_parse_command_line_arguments()
{
    $argsTest = [
        "--input-file=path",
        "--output-file=path",
        "--width=30",
        "--height=40"
    ];
    $argsTestResult = parse_command_line_arguments($argsTest);
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
    $argsTestResult = parse_command_line_arguments($argsTest);
    assert($argsTestResult === [
            INPUT_FILE => "path",
            "output-files" => "",
            "width:30" => NULL,
            HEIGHT => "40px"
        ]);
}

//test_parse_command_line_arguments();
