<?php
include_once "input/cli.php";
include_once "image_load/image_load.php";
include_once "image_operations/width.php";
include "image_operations/height.php";

$arrayTest = [
    'input-file' => 'pexels-photo-414612.jpeg',
    'output-file' => 'itWorks.jpg',
    'width' => '1920'
];
//$info = parseCommandLineArguments($argv);
$info = imageLoad($arrayTest);
ob_start();
$img = $info["image"]->getImageBlob();
$content = ob_get_contents();
ob_end_clean();
$img = base64_encode($img);
var_dump($img);
echo("<img src='data:image/jpg;base64,");
echo($img);
echo("'/><br\/><br\/>");
$info = width($info);
ob_start();
$img = $info["image"]->getImageBlob();
$content = ob_get_contents();
ob_end_clean();
$img = base64_encode($img);
var_dump($img);
echo("<img src='data:image/jpg;base64,");
echo($img);
echo("'/><br\/><br\/>");
$info["height"] = "1080";
$info = height($info);
ob_start();
$img = $info["image"]->getImageBlob();
$content = ob_get_contents();
ob_end_clean();
$img = base64_encode($img);
var_dump($img);
echo("<img src='data:image/jpg;base64,");
echo($img);
echo("'/><br\/><br\/>");