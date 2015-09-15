<?

if(!isset($_GET['Y']) || !isset($_GET['D'])) {
die('Date not correctly set.');
}

if($_GET['Y']>gmdate('Y')) {
die('This year has yet to occur');
} elseif($_GET['Y']=gmdate('Y')) {
if($_GET['D']>gmdate('d')) {
die('This panel has yet to open.');
}}

include('panels/'.$_GET['Y'].'/advent_config.php');

echo('<h1>Full poem:</h1>
<i>(The topic was "'.$conf_topic[$_GET['D']].'")</i><br />
'.str_replace("\n",'<br />',$conf_poem[$_GET['D']]).'<br />
<b>By: '.$conf_poem_author[$_GET['D']].'</b><br />
<h1>Christmas song of the day:</h1>
<object width="480" height="385"><param name="movie" value="http://www.youtube.com/v/'.$conf_video[$_GET['D']].'?fs=1&amp;hl=en_GB&amp;color1=0x234900&amp;color2=0x4e9e00"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/'.$conf_video[$_GET['D']].'?fs=1&amp;hl=en_GB&amp;color1=0x234900&amp;color2=0x4e9e00" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="385"></embed></object>');




$file = fopen('visitlog.txt',"a+");
fwrite($file,gmdate('H:i:s d\/m\/Y',gmmktime()).': '.$_SERVER['REMOTE_ADDR'].' visited the panel for day '.$_GET['D'].' in year '.$_GET['Y'].'.'."\n");
fclose($file);


?>