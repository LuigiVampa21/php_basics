<?php

$file = "a2ca487820813669cb70054b7d42e37d.png";

$image = __DIR__ . "/../files/" . $file;

var_dump($image);

$data = getimagesize($image);

var_dump($data);

// GET Image Root

switch($data["mime"]){
    case "image/png":
        $imageRoot = imagecreatefrompng($image); 
        break;
    case "image/jpeg":
        $imageRoot = imagecreatefromjpeg($image); 
        break;
    default:
    die('Incorrect file format');
};

$newImage = imagecrop($imageRoot, [
    'x' => 200,
    'y' => 200,
    'width' => 300,
    'height' => 150,
]);

switch($data["mime"]){
    case "image/png":
        imagepng($newImage, __DIR__ . "/cropped-" . $file);
        break;
    case "image/jpeg":
        imagepng($newImage, __DIR__ . "cropped-" . $file);
        break;
    default:
    die('Incorrect file format');
}

?>