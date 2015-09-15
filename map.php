<?
if(!isset($_GET['T'])) { header ("Content-type: image/png"); }

$conf_year = gmdate(Y);
if(isset($_GET['Y'])) {
$conf_year = $_GET['Y'];
}

$conf_map = '../maps/claimsmap.png';

include('panels/'.$conf_year.'/advent_config.php');

$height = 1800; $width = 3600;
$base = imagecreatetruecolor($width,$height);
$map = imagecreatefrompng($conf_map);

//background
imagecopy($base,$map,0,0,15,15,imagesx($map),imagesy($map));
imagedestroy($map);
/*
for($h=1;$h<=31;$h++) {
$num = str_pad($h,2,'0',STR_PAD_LEFT);
$closed[$h] = imagecreatefrompng('panels/'.$conf_year.'/closed/'.$num.'.png');
$open[$h] = imagecreatefrompng('panels/'.$conf_year.'/open/'.$num.'.png');
}*/



if(gmdate(m)==12) {
if(gmdate(Y)==$conf_year) {
if(gmdate(d)>28) {
$day=28;
} else {
$day=gmdate(d);
}} else {
$day=28;
}} else {
if(gmdate(Y)==$conf_year) {
$day=0;
} else {
$day=28;
}
}

//open panels
for($a=1;$a<=$day;$a++) {
$num = str_pad($a,2,'0',STR_PAD_LEFT);
if(file_exists('panels/'.$conf_year.'/open/'.$num.'.png')) {
$open[$a] = imagecreatefrompng('panels/'.$conf_year.'/open/'.$num.'.png');
imagecopy($base,$open[$a],$panel_x[$a],$panel_y[$a],0,0,imagesx($open[$a]),imagesy($open[$a]));
imagedestroy($open[$a]);
} else {
$closed[$a] = imagecreatefrompng('panels/'.$conf_year.'/closed/'.$num.'.png');
imagecopy($base,$closed[$a],$panel_x[$a],$panel_y[$a],0,0,imagesx($closed[$a]),imagesy($closed[$a]));
imagedestroy($closed[$a]);
}
}

//closed panels
for($a=($day+1);$a<=28;$a++) {
$num = str_pad($a,2,'0',STR_PAD_LEFT);
$closed[$a] = imagecreatefrompng('panels/'.$conf_year.'/closed/'.$num.'.png');
imagecopy($base,$closed[$a],$panel_x[$a],$panel_y[$a],0,0,imagesx($closed[$a]),imagesy($closed[$a]));
imagedestroy($closed[$a]);
}


if(!isset($_GET['T'])) { imagepng($base); }
imagedestroy($base);

?>