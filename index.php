<?php
include_once "input/cli.php";
include_once "image_load/image_load.php";
include_once "image_operations/width.php";
include_once "image_operations/height.php";
include_once "watermark/watermark.php";
include_once "image_operations/ratio.php";
include_once "image_save/image_save.php";
include_once "output/showSuccess.php";

function imageEditUtility(array $input)
{
}

imageEditUtility($argv);
//$arrayTest = [
//    'input-file' => 'pexels-photo-414612.jpeg',
//    'output-file' => 'itWorks.jpg',
//    'width' => '1920'
//];
//$info = imageLoad($arrayTest);
//$img = $info["image"]->getImageBlob();
//$img = base64_encode($img);
//var_dump("Original.");
//echo("<img src='data:image/jpg;base64,");
//echo($img);
//echo("'/><br\/><br\/>");
//$info = width($info);
//$img = $info["image"]->getImageBlob();
//$img = base64_encode($img);
//var_dump("Width changed.");
//echo("<img src='data:image/jpg;base64,");
//echo($img);
//echo("'/><br\/><br\/>");
//$info["height"] = "1080";
//$info = height($info);
//$img = $info["image"]->getImageBlob();
//$img = base64_encode($img);
//var_dump("Height changed.");
//echo("<img src='data:image/jpg;base64,");
//echo($img);
//echo("'/><br\/><br\/>");
//$info["watermark"] = "/home/ciprianmuresan/PhpstormProjects/Image_Edit_Utility_CLI/C1Iuu2FH_400x400.jpg";
//$info = watermark($info);
//$img = $info["image"]->getImageBlob();
//$img = base64_encode($img);
//var_dump("Watermark added.");
//echo("<img src='data:image/jpg;base64,");
//echo($img);
//echo("'/><br\/><br\/>");
//
//
//
//$arrayTest = [
//    'input-file' => 'pexels-photo-414612.jpeg',
//    'output-file' => 'itWorks.jpg',
//    'width' => '1440',
//    'format' => '16:9'
//];
////$info = parseCommandLineArguments($argv);
//$info = imageLoad($arrayTest);
//$info = ratio($info);
//$img = $info["image"]->getImageBlob();
//$img = base64_encode($img);
//var_dump("Aspect ratio with width.");
//echo("<img src='data:image/jpg;base64,");
//echo($img);
//echo("'/><br\/><br\/>");
//
//$info["format"] = "4:1";
//unset($info["width"]);
//$info["height"] = "300";
//$info = ratio($info);
//$img = $info["image"]->getImageBlob();
//$img = base64_encode($img);
//var_dump("Aspect ratio with height.");
//echo("<img src='data:image/jpg;base64,");
//echo($img);
//echo("'/><br\/><br\/>");
//
//$arrayTest = [
//    'input-file' => 'pexels-photo-414612.jpeg',
//    'output-file' => 'itWorks.jpg',
//    'format' => '16:9'
//];
//$info = imageLoad($arrayTest);
//$info = ratio($info);
//$img = $info["image"]->getImageBlob();
//$img = base64_encode($img);
//var_dump("Aspect ratio only.");
//echo("<img src='data:image/jpg;base64,");
//echo($img);
//echo("'/><br\/><br\/>");