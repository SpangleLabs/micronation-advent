<?
header('Content-type: image/png');

$img = imagecreatefrompng($_GET['Y'].'/'.$_GET['O'].'/'.$_GET['D'].'.png');

imagepng($img);
imagedestroy($img);

?>