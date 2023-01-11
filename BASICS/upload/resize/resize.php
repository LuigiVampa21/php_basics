<?php

$file = "a2ca487820813669cb70054b7d42e37d.png";

$image = __DIR__ . "/../files/" . $file;

// RETRIEVE DATA

$data = getimagesize($image);

$width = $data[0];
$height = $data[1];

var_dump($data);

$newImage = imagecreatetruecolor($width/2, $height/2);

switch($data["mime"]){
    case "image/png":
        $imageRoot = imagecreatefrompng($image); 
        break;
    case "image/jpeg":
        $imageRoot = imagecreatefromjpeg($image); 
        break;
    default:
    die('Incorrect file format');
}

// COPY ROOT IMAGE INTO DESTINATION IMG AND RESIZE

imagecopyresampled(
    $newImage, // Destination img
    $imageRoot, // starting img
    0, //posX upperleftside in dest file
    0, //posY upperleftside in dest file
    0, //posX upperleftside in root file
    0, //posY upperleftside in root file
    $width / 2, // width dest file
    $height / 2, // hieght dest file
    $width, // width root file
    $height, // hieght root file
);

// Save img to server

switch($data["mime"]){
    case "image/png":
        imagepng($newImage, __DIR__ . "/resized-" . $file);
        break;
    case "image/jpeg":
        imagepng($newImage, __DIR__ . "resized-" . $file);
        break;
    default:
    die('Incorrect file format');
}

imagedestroy($imageRoot);
imagedestroy($newImage);

?>