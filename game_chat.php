<?php 
//		Some Chess, a PHP multi-player chess server.
//		Copyright (C) 2007 Jon Link
session_start(); 
require_once('loginon.php');
require_once('config.php');
include_once('standard.php');
include_once('constants.php');
$name		= $_SESSION['name'];
$gameID		= validate($_GET['gameID']);
if($chatRefresh)header('refresh: '.$chatRefresh.'; url=game_chat.php?gameID='.$gameID.'#end');
function format_time($date){
	if($date<1) return false;
	$date	= ereg_replace('[^0-9]','',$date);
	return date('M j, G:i',mktime(substr($date,8,2),substr($date,10,2),0,substr($date,4,2),substr($date,6,2),substr($date,1,4)));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>chat</title>
  <style type="text/css">
		body {background:#f1f6f2;font:0.8em Sabon, Georgia, Arial;line-height:1em;color:#163970}
		h3 {display:block;margin:1em 0 0 0;padding:0;font:bold 1em Helvetica, Arial, sans-serif;margin-right:0.7em}
		p {margin:0.1em 0.1em 0.35em 0.1em}
		.you {color:#476DB7}
		.them {color:#163970}
		.note {color:#a350aa}
		.chat-time {margin-top:1em;font-size:0.9em;font-style:italic;color:#777}
	</style>
</head>
<body>
<?php
$queryChat		= 'SELECT playerName,text,`type`,ctime FROM '.dbPre.'chat WHERE gameID="'.$gameID.'" ORDER BY num DESC LIMIT 40';
$resultChat		= mysql_query($queryChat)or die('<div class="error">'.errorDBStr.' (ch-1)</div>');	
$chat_num		= mysql_num_rows($resultChat);
for($c=0;$c<$chat_num;++$c){
	$chat_name	= mysql_result($resultChat,$chat_num-($c+1),'playerName');
// format_time($chat_time)
	$div 		= ($chat_name == $name)? 'you':'them';
	$note 		= (mysql_result($resultChat,$chat_num-($c+1),'type')==1)? ' note':null;
	if(($chat_time+5)<mysql_result($resultChat,$chat_num-($c+1),'ctime')){
		$chat_time	= mysql_result($resultChat,$chat_num-($c+1),'ctime');
		$print_time	= '<div class="chat-time">('.format_time($chat_time).')</div>';
	}
	if(($div == 'you' && $note !== null) || $note == null){
		$name_head	= ($chat_name !== $last_name)? '<h3 class="'.$div.'"> '.$chat_name.'</h3> ':null;
		$text		.= $print_time.'
	'.$name_head.'<p class="'.$div.$note.'"'.$endID.'>'.mysql_result($resultChat,$chat_num-($c+1),'text').'</p>';
	}else{
		unset($chat_name);
	}
	$last_name	= $chat_name;
}
echo $text.'
	<div id="end"></div>';
?>

</body>
</html>