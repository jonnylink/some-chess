<?php 
//	Some Chess, a PHP multi-player chess server.
//    Copyright (C) 2007 Jon Link
session_start(); 
require_once('loginon.php');
require_once('config.php');
include_once('languages/'.$lang.'_main.php');
include_once('constants.php');
include_once('standard.php');
include('menu_bar.php');

/*----- CONFIG STATS -----*/
	$showIP		= 1;
	$showGames	= 1;
	$showWins	= 1;
	$showLoses	= 0;
	$showDraws	= 1;
	$showWinAvg	= 0;
	$showPoints = 1;
	$statsJoke 	= 0;
/*--- END CONFIG STATS ---*/

$do				= $_POST['do'];
if(!$do) $do	= $_GET['do'];
$statID			= $_GET['statID'];
$statLink		= ($statID)? '&amp;statID='.$statID : null;
$ordering		= $_GET['ordering'];
$orderLink		= ($ordering)? '&amp;ordering='.$ordering : null;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Some Chess</title>
	<link rel="stylesheet" type="text/css" href="somechess.css" />
	<style type="text/css">
		#wrapper {width:70em;height:52em;}
		p {margin:0.25em 0 1em 0}
		h5 {font-size:0.9em;font-weight:700}
		h6 {float:left;clear:left;width:7em;margin-left:0.5em;font-size:0.9em}
		.righty {padding-right:0.2em}
		#player-list-panel {float:left;width:49.5%;padding-left:1%;clear:left;}
		#records {display:block;clear:both;height:24.5em;width:34em;margin:0 0 1.5em 0.2em;overflow:auto}
		#records p {margin-bottom:0.25em}
		a.namelabel, a.names {float:left;display:inline;width:11.2em}
		.stat {float:left;width:3.2em}
		.stat_medium {width:4.5em}
		.stat_wide {width:6.5em}
		.odd {background:#c3c3c3}
		#leaderboard {display:block;clear:both;width:26em;margin:0 0 1.5em 0.2em}
		#one-player {width:40%}
		.player-image {float:right;margin:1em;border:1px #aaa solid}
		#vitals {float:left;margin:1em}
		#bar-graphs {float:left;height:15.5em;margin-top:1em}
		.col {float:left;width:7.5em}
		#stat-col {float:left;width:20em}
		.playerbar, .avgbar {background:#6699cc;border:1px solid #336699;height:0.87em}
		.avgbar {background:#3366cc;border:1px solid #003366}
		#player-stats {float:left;margin-top:2em;padding:4%}
	</style>
	<!--[if lt IE 7]>
		<style type="text/css">
			h4 {margin-left:0.1em;font-size:1em}
		</style>
	<![endif]-->
</head>
<body>
<div id="wrapper">
	<div id="header">
		<img src="img/head-right.png" alt="na" id="header-right-corner" />
		<div id="header-title">
			<h1>Some Chess</h1>
		</div><!--header-content-->
		<?php if($do != 'logout') echo $menu; ?>
	</div><!--header-->
	
	<div id="contents">
<?php
online();
include_once('players_func.php');
if($do =='players' || !$do){ 
//--display stats
	$order				= array('wins'=>'wins','loses'=>'loses','draws'=>'draws','points'=>'points','online'=>'timeOnline');
	$ordering			= (key_exists($ordering,$order))? $order[$ordering].' DESC' : 'name';

	$queryPlayer		= 'SELECT * FROM '.dbPre.'players WHERE invitedBy > -1 ORDER BY '.$ordering;	
	$resultPlayer		= mysql_query($queryPlayer)or die('<div class="error">'.errorDBStr.' (pl-2)</div>');
	$numPlayer			= mysql_num_rows($resultPlayer);

	$queryGames			= 'SELECT * FROM '.dbPre.'games WHERE whitePlayerID="'.$statID.'" OR blackPlayerID="'.$statID.'"';
	$resultGames		= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (pl-3)</div>');
	$numGames			= mysql_num_rows($resultGames);

	$queryGames			= 'SELECT * FROM '.dbPre.'games WHERE winner="0"';
	$resultGamesIP		= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (pl-4)</div>');
	$numGamesIP			= mysql_num_rows($resultGamesIP);

	echo '
		<div id="player-list-panel">
			<h2>'.$statsStr[0].'</h2>
			<h4>
				<a href="players.php?ordering=names'.$statLink.'" class="namelabel">'.$statsStr[1].'</a>
				<a href="players.php?ordering=wins'.$statLink.'" class="stat">'.$statsStr[2].'</a>
				<a href="players.php?ordering=loses'.$statLink.'" class="stat">'.$statsStr[3].'</a>
				<a href="players.php?ordering=draws'.$statLink.'" class="stat">'.$statsStr[4].'</a>
				<a href="players.php?ordering=points'.$statLink.'" class="stat stat_medium">'.$statsStr[17].'</a>
				<a href="players.php?ordering=online'.$statLink.'" class="stat stat_wide">'.$statsStr[19].'</a>
			</h4>
		';
	for($i=0;$i<$numPlayer;++$i){
		$fod		= array();
		$nem		= array();
		unset($fodGo,$nemGo,$gamesIP);
		$playerID = mysql_result($resultPlayer,$i,'id');
		for($x=0;$x<$numGames;++$x){
			if($statID && mysql_result($resultGames,$x,'winner') != 0){			
				if(mysql_result($resultGames,$x,'winner') == $playerID){ 
					if(mysql_result($resultGames,$x,'whitePlayerID') != $playerID){
						$fod[mysql_result($resultGames,$x,'whitePlayerID')] == ++$fod[mysql_result($resultGames,$x,'whitePlayerID')];
					}else{
						$fod[mysql_result($resultGames,$x,'blackPlayerID')] == ++$fod[mysql_result($resultGames,$x,'blackPlayerID')];
					}
					$fodGo = true;
				}
				if(mysql_result($resultGames,$x,'winner') == 'D' && (mysql_result($resultGames,$x,'whitePlayerID') == $playerID || mysql_result($resultGames,$x,'blackPlayerID') == $playerID)) ++$draws;
				if(mysql_result($resultGames,$x,'winner') != $playerID && mysql_result($resultGames,$x,'winner') != 'D' && mysql_result($resultGames,$x,'winner') != 'X' && (mysql_result($resultGames,$x,'whitePlayerID') == $playerID || mysql_result($resultGames,$x,'blackPlayerID') == $playerID)){ 
					$nem[mysql_result($resultGames,$x,'winner')] == ++$nem[mysql_result($resultGames,$x,'winner')];
					$nemGo = true;
				}
			}
		}
		if($fodGo){
			$fodMax				 = max($fod);
			$stats[$i]['fod']	= array_search($fodMax,$fod);
		}
		if($nemGo){
			$nemMax 			= max($nem);
			$stats[$i]['nem']	= array_search($nemMax,$nem);
		}
		for($x=0;$x<$numGamesIP;++$x){
			if(mysql_result($resultGamesIP,$x,'whitePlayerID') == $playerID || mysql_result($resultGamesIP,$x,'blackPlayerID') == $playerID) ++$gamesIP;
		}
		$stats[$i]['id'] 		= $playerID;
		$stats[$i]['pic'] 		= mysql_result($resultPlayer,$i,'pic');;
		$stats[$i]['name'] 		= mysql_result($resultPlayer,$i,'name');
		$stats[$i]['realname'] 	= mysql_result($resultPlayer,$i,'realname');
		$stats[$i]['location'] 	= mysql_result($resultPlayer,$i,'location');
		$stats[$i]['addDate'] 	= formatDate(mysql_result($resultPlayer,$i,'addDate'));
		$stats[$i]['invitedBy'] = mysql_result($resultPlayer,$i,'invitedBy');
		$stats[$i]['lastOnline'] = formatDate(mysql_result($resultPlayer,$i,'timeOnline'));
		$stats[$i]['wins'] 		= mysql_result($resultPlayer,$i,'wins');
		$stats[$i]['loses'] 	= mysql_result($resultPlayer,$i,'loses');
		$stats[$i]['draws'] 	= mysql_result($resultPlayer,$i,'draws');
		$stats[$i]['points'] 	= round(mysql_result($resultPlayer,$i,'points'));
		$stats[$i]['gamesIP'] 	= $gamesIP;
		$stats[$i]['games']		= ($stats[$i]['loses']) + ($stats[$i]['wins']) + ($stats[$i]['draws']);
		if($stats[$i]['wins'] > 0){
			$stats[$i]['winAvg']	= number_format(str_replace('.','',number_format(($stats[$i]['wins'] / $stats[$i]['games']),2)));
		}else{
			$stats[$i]['winAvg']	= '0.0';
		}
		if($stats[$i]['loses'] > 0){
			$stats[$i]['loseAvg']	= number_format(str_replace('.','',number_format(($stats[$i]['loses'] / $stats[$i]['games']),2)));
		}else{
			$stats[$i]['loseAvg']	= '0.0';
		}
		if($stats[$i]['draws'] > 0){
			$stats[$i]['drawAvg']	= number_format(str_replace('.','',number_format(($stats[$i]['draws'] / $stats[$i]['games']),2)));
		}else{
			$stats[$i]['drawAvg']	= '0.0';
		}
		$color = ($i%2)? ' odd' : null;
		$playerRecords .= '
				<a class="names'.$color.'" href="players.php?statID='.$stats[$i]['id'].$orderLink.'">'.trunc($stats[$i]['name']).'</a><div class="stat'.$color.'">'.$stats[$i]['wins'].'</div><div class="stat'.$color.'">'.$stats[$i]['loses'].'</div><div class="stat'.$color.'">'.$stats[$i]['draws'].'</div><div class="stat stat_medium'.$color.'">'.$stats[$i]['points'].'</div><div class="stat stat_wide'.$color.'">'.$stats[$i]['lastOnline'].'</div>';
	}
	echo '	<div id="records">',$playerRecords,'
			</div><!--records-->
			<div id="leaderboard">
				';
//-- PACK LEADERS
	if($showIP)echo'<h5>',$statsStr[6],'</h5><p>',mostStat('gamesIP',$stats,$numPlayer,$statsStr,$orderLink),'</p>
				';
	if($showGames)echo'<h5>',$statsStr[7],'</h5><p>',mostStat('games',$stats,$numPlayer,$statsStr,$orderLink),'</p>
				';
	if($showWins)echo'<h5>',$statsStr[8],'</h5><p>',mostStat('wins',$stats,$numPlayer,$statsStr,$orderLink),'</p>
				';
	if($showLoses)echo'<h5>',$statsStr[9],'</h5><p>',mostStat('loses',$stats,$numPlayer,$statsStr,$orderLink),'</p>
				';
	if($showDraws)echo'<h5>',$statsStr[10],'</h5><p>',mostStat('draws',$stats,$numPlayer,$statsStr,$orderLink),'</p>
				';
	if($showWinAvg)echo'<h5>',$statsStr[11],'</h5><p>',mostStat('winAvg',$stats,$numPlayer,$statsStr,$orderLink,'%'),'</p>
				';
	if($showPoints)echo'<h5>',$statsStr[18],'</h5><p>',mostStat('points',$stats,$numPlayer,$statsStr,$orderLink),'</p>
				';
	if($statsJoke)echo randomStat($stats,$numPlayer,rand(2,5));
	echo'
			</div><!--leaderboard-->
		</div><!--player-list-panel-->';

//-- PLAYER SPECIFIC INFO
	for($i=0;$i<$numPlayer;++$i){
		if($stats[$i]['id'] == $statID){$key=$i;break;}
	}
	if($statID && isset($key)){	
		$avg['wins'] 	= average('wins',$stats,$numPlayer);
		$avg['loses']	= average('loses',$stats,$numPlayer);
		$avg['draws']	= average('draws',$stats,$numPlayer);
		$avg['gamesIP']	= average('gamesIP',$stats,$numPlayer);
		$avg['games']	= average('games',$stats,$numPlayer);
		for($i=0;$i<$numPlayer;++$i){
			if($stats[$key]['invitedBy'] == $stats[$i]['id']) $invitedBy 		= $stats[$i]['name'];
			if($stats[$key]['invitedBy'] == $stats[$i]['id']) $invitedByLink 	= 'href="players.php?statID='.$stats[$i]['id'].'"';

			if($stats[$key]['fod'] == $stats[$i]['id']) $fodName = $stats[$i]['name'];
			if($stats[$key]['fod'] == $stats[$i]['id']) $fodLink = 'href="players.php?statID='.$stats[$i]['id'].'"';

			if($stats[$key]['nem'] == $stats[$i]['id']) $nemName = $stats[$i]['name'];
			if($stats[$key]['nem'] == $stats[$i]['id']) $nemLink = 'href="players.php?statID='.$stats[$i]['id'].'"';
		}
		echo '
		<div id="player-stat-panel">
			<img src="',$playerImgDir,'/',$stats[$key]['pic'],'" alt="player image" class="player-image" />
			<div id="vitals">
				<h2>',$statsStr[12],'</h2>
				<h2>',$stats[$key]['name'],' (',$statsStr[13],': ',noEmpty($stats[$key]['realname']),')</h2>
				<h6>',$statsStr[14],': </h6>',noEmpty($stats[$key]['location']),'<br />
				<h6>',$statsStr[15],': </h6>',noEmpty($stats[$key]['addDate']),'<br />'; 
		if($invitedBy) echo'<h6>',$statsStr[16],': </h6><a '.$invitedByLink.'>',$invitedBy,'</a><br />';
		echo'<h6>',$statsStr[19],': </h6>',noEmpty($stats[$key]['lastOnline']),'
			</div>
			<div id="bar-graphs">
				<div class="col righty">
					<h5>Wins</h5>
					<h5>Avg Wins</h5>
					<br />
		
					<h5>Loses</h5>
					<h5>Avg Loses</h5>
					<br />
					
					<h5>Draws</h5>
					<h5>Avg Draws</h5>
					<br />
					
					<h5>Games IP</h5>
					<h5>Avg Games IP</h5>
					<br />
		
					<h5>Games</h5>
					<h5>Avg Games</h5>
				</div><!--col-->
				<div id="stat-col">
					<div class="playerbar" style="width:'.barWidth($stats[$key]['wins'],$avg['wins'],'p').'px;"></div>
					<div class="avgbar" style="width:'.barWidth($stats[$key]['wins'],$avg['wins'],'a').'px;"></div>
					
					<br />
					<div class="playerbar" style="width:'.barWidth($stats[$key]['loses'],$avg['loses'],'p').'px;"></div>
					<div class="avgbar" style="width:'.barWidth($stats[$key]['loses'],$avg['loses'],'a').'px;"></div>
					
					<br />
					<div class="playerbar" style="width:'.barWidth($stats[$key]['draws'],$avg['draws'],'p').'px;"></div>
					<div class="avgbar" style="width:'.barWidth($stats[$key]['draws'],$avg['draws'],'a').'px;"></div>
					
					<br />
					<div class="playerbar" style="width:'.barWidth($stats[$key]['gamesIP'],$avg['gamesIP'],'p').'px;"></div>
					<div class="avgbar" style="width:'.barWidth($stats[$key]['gamesIP'],$avg['gamesIP'],'a').'px;"></div>
		
					<br />
					<div class="playerbar" style="width:'.barWidth($stats[$key]['games'],$avg['games'],'p').'px;"></div>
					<div class="avgbar" style="width:'.barWidth($stats[$key]['games'],$avg['games'],'a').'px;"></div>					
				</div><!--stat-col-->
			</div><!--bar-graphs-->
			<div id="player-stats">
				<span class="col">'.$statsStr[20].':</span>',noEmpty($stats[$key]['winAvg']),'%<br />
				<span class="col">'.$statsStr[21].':</span>',noEmpty($stats[$key]['loseAvg']),'%<br />
				<span class="col">'.$statsStr[22].':</span>',noEmpty($stats[$key]['drawAvg']),'%<br />
				<span class="col">'.$statsStr[23].':</span>',noEmpty($stats[$key]['games']),'<br />
				<span class="col">'.$statsStr[24].':</span>',noEmpty($stats[$key]['gamesIP']),'<br />
				<span class="col">'.$statsStr[25].':</span><a '.$fodLink.'>',noEmpty($fodName),'</a><br />
				<span class="col">'.$statsStr[26].':</span><a '.$nemLink.'>',noEmpty($nemName),'</a><br />
			</div><!--player-stats-->
		</div><!--one-player-->';	
	}
}
?>

	</div><!--contents-->
</div><!--wrapper-->
</body>
</html>