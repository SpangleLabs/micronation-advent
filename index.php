<?

$conf_year = gmdate(Y);
if(isset($_GET['Y'])) {
$conf_year = $_GET['Y'];
}


include('panels/'.$conf_year.'/advent_config.php');

echo('<img border="0" src="map.php?Y='.$conf_year.'" usemap = "#advent" alt = "Advent calendar" />
<map id ="advent" name="advent">');



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
$width = 200;
if($a==24) { $width = 400; }
if($a==25) { $width = 600; }
echo('<area  shape ="rect" coords ="'.$panel_x[$a].','.$panel_y[$a].','.($panel_x[$a]+$width).','.($panel_y[$a]+200).'" 
 href ="'.$conf_link[$a].'" alt="Day'.$num.'" />');
}


//header('Location: map.php');



$file = fopen('visitlog.txt',"a+");
fwrite($file,gmdate('H:i:s d\/m\/Y',gmmktime()).': '.$_SERVER['REMOTE_ADDR'].' visited the Index page.'."\n");
fclose($file);


?>