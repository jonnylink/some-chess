<?php 
//		Some Chess, a PHP multi-player chess server.
//		Copyright (C) 2007 Jon Link
session_start();
require_once('loginon.php');
require_once('config.php');
include('languages/'.$lang.'_main.php');
include('constants.php');
include('standard.php');
include('menu_bar.php');
$_SESSION['endDate']	= date(YmdHis, mktime(0, 0, 0, date(m), date(d)-$endDays, date(Y)));
$do = ($_POST['do'])? $_POST['do'] : $_GET['do'];
$status					= validate($_GET['status']);
$gameID = ($_POST['gameID'])? $_POST['gameID'] : validate($_GET['gameID']);
$vsName				 	= str_replace('_',' ',$_GET['vs']);
$_SESSION['vs'.$gameID]	= $vsName;
online();
$query	= 'SELECT * FROM '.dbPre.'games WHERE gameID="'.$gameID.'" LIMIT 1';
$result	= mysql_query($query)or die('<div class="error">'.errorDBStr.' (vp-1)</div>');
if(mysql_result($result,0,'blackPlayerID') !== $_SESSION['id'] && mysql_result($result,0,'whitePlayerID') !== $_SESSION['id']) $status='view';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Some Chess</title>
	<link rel="stylesheet" type="text/css" href="somechess.css" />
</head>
<body>
<div id="game-wrapper">
	<div id="header">
		<img src="img/head-right.png" alt="na" id="header-right-corner" />
		<div id="header-title">
			<h1>Some Chess</h1>
		</div><!--header-content-->
		<?php if($do != 'logout') echo $menu; ?>
	</div><!--header-->
	
	<div id="contents">
<?php
if($status !== 'view'){
	echo'		<object classid="clsid:25336920-03F9-11CF-8FD0-00AA00686F13" type="text/html" data="game_board_play.php?gameID=',$gameID,'&amp;do=',$do,'&amp;vs=',$vsName,'" id="board">
			<h3>'.$gameStr[1].'</h3>
		</object>';
}else{
	if($_GET['move'])$move		= '&amp;move='.$_GET['move'];
	if($_GET['player'])$player	= '&amp;player='.$_GET['player'];
	echo'		<object classid="clsid:25336920-03F9-11CF-8FD0-00AA00686F13" type="text/html" data="game_board_view.php?gameID=',$gameID,'&amp;status=',$status,$move,$player,'" id="board">
			<h3>'.$gameStr[1].'</h3>
		</object>';
}
if(!$status && $showChat == 1){
	echo'
		<div id="chat-panel">
			<object classid="clsid:25336920-03F9-11CF-8FD0-00AA00686F13" type="text/html" data="game_chat.php?gameID=',$gameID,'#end" id="chat">
				<h3>'.$gameStr[1].'</h3>
			</object>
			<form action="game.php?do=display&amp;gameID=',$gameID,'&amp;vs=',$vsName,'" method="post" id="chat-form">
				<p><textarea name="chat" id="chat-input" rows="2" cols="10"></textarea>
				<input type="hidden" name="gameID" value="',$gameID,'" />
				<input type="hidden" name="act" value="chat" />
				<input type="submit" value="Chat" class="chat-butt" /><p>
				<p class="note-input">note <input type="checkbox" name="noted" class="checkbox" /></p>
			</form>
		</div><!--chat-panel-->
		';
}
$act			= $_POST['act'];
if($act == 'chat'){
	$ctime		= date(YmdHi);
	$chat		= validate($_POST['chat'],false);
	$name		= validate($_SESSION['name']);	
	$noted 		= ($_POST['noted'] == 'on')? 1:0;
	$queryChat	= 'SELECT gameID FROM '.dbPre.'chat WHERE gameID="'.$gameID.'"'; 
	$resultChat	= mysql_query($queryChat)or die('<div class="error">'.errorDBStr.' (sc-1)</div>');	
	$nextChat	= mysql_num_rows($resultChat)+1;	
	$queryChat	= 'INSERT INTO '.dbPre.'chat (gameID,playerName,num,text,`type`,ctime) VALUES ("'.$gameID.'","'.$name.'","'.$nextChat.'","'.$chat.'","'.$noted.'","'.$ctime.'")';
	$resultChat	= mysql_query($queryChat)or die('<div class="error">'.errorDBStr.' (sc-2)</div>'.$queryChat);	
}
$vsName			= str_replace('_',' ',$vsName);
if($showPlayerImg && $status !=='view'){
	$queryVS	= 'SELECT * FROM '.dbPre.'players WHERE name="'.$vsName.'" LIMIT 1';
	$resultVS	= mysql_query($queryVS)or die('<div class="error">'.errorDBStr.' (ui-1)</div>');
	$VSpic		= mysql_result($resultVS,0,'pic');
	$vsMargin	= 3;
}
$query			= 'SELECT * FROM '.dbPre.'games WHERE gameID="'.$gameID.'" LIMIT 1';
$result			= mysql_query($query)or die('<div class="error">'.errorDBStr.' (gg-1)</div>');	
$bID			= mysql_result($result,0,'blackPlayerID');
$wID			= mysql_result($result,0,'whitePlayerID');
if($_SESSION['id'] == $bID){
	$playerColor = 'black'; $oppColor='white';
	$displayPlayerColor=$colorStr[1]; $displayOppColor=$colorStr[0];
}elseif($_SESSION['id'] == $wID){
	$playerColor = 'white'; $oppColor='black';
	$displayPlayerColor=$colorStr[0]; $displayOppColor=$colorStr[1];
}
if(!$showChat){
	echo '<div id="picframe-b">
			';
}elseif(!$status){
	echo '<div id="picframe-a">
			';
}
if($status !=='view'){
	echo'<div class="name">
				';
	if($showPlayerImg) echo'<img src="'.$playerImgDir.'/'.$_SESSION['pic'].'" alt="" class="pic" />
				';
	echo'<p>'.$_SESSION['name'].'</p>('.$displayPlayerColor.')
			</div><!--name-->
			<div style="width:19%;margin-top:'.$vsMargin.'em;float:left;text-align:center;font-weight:700;">vs. </div>
			<div class="name">';
	if($showPlayerImg) echo'
				<img src="'.$playerImgDir.'/'.$VSpic.'" alt="" class="pic" />
				';
	echo'<p>'.$vsName.'</p>('.$displayOppColor.')
			</div><!--name-->
		</div><!--player-frame-->
';
}else{
	$queryNames		= 'SELECT whitePlayerID, blackPlayerID FROM '.dbPre.'games WHERE gameID="'.$gameID.'"';
	$resultNames	= mysql_query($queryNames)or die('<div class="error">'.errorDBStr.' (gg-2)</div>');
	$whiteID		= mysql_result($resultNames,0,'whitePlayerID');
	$blackID		= mysql_result($resultNames,0,'blackPlayerID');
	$queryNames		= 'SELECT name FROM '.dbPre.'players WHERE id="'.$whiteID.'"';
	$resultNames	= mysql_query($queryNames)or die('<div class="error">'.errorDBStr.' (gg-3)</div>');
	$whiteName		= mysql_result($resultNames,0,'name');
	$queryNames		= 'SELECT name FROM '.dbPre.'players WHERE id="'.$blackID.'"';
	$resultNames	= mysql_query($queryNames)or die('<div class="error">'.errorDBStr.' (gg-4)</div>');
	$blackName		= mysql_result($resultNames,0,'name');
	echo '
		<div id="picframe-c">
			<b>'.$whiteName.'</b> ('.$colorStr[0].')<br />vs.<br /> <b>'.$blackName.'</b> ('.$colorStr[1].')
		</div>
';
}
?>
	</div><!--contents-->
</div><!--wrapper-->
</body>
</html>