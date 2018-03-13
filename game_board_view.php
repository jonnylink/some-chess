<?php @session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>board</title>
	<link rel="stylesheet" type="text/css" href="game_board.css" />
</head>
<body>
<?php 
//	Some Chess, a PHP multi-player chess server.
//    Copyright (C) 2007 Jon Link 
require_once('loginon.php');
require_once('config.php');
include_once('languages/'.$lang.'_chess.php');
include_once('standard.php');
include_once('constants.php');
include_once('game_func.php');
$id				= validate($_SESSION['id']);
online();
$move			= $_GET['move'];
$player			= $_GET['player'];
$gameID			= $_GET['gameID'];
$gameID			= validate($gameID);

//$winner	= $_SESSION['vs'.$gameID];


$pgn			= movesToPGN($gameID,true);
$moves 			= trim(preg_replace('/\[.*\]/','',$pgn));
$moves			= preg_split('/\d*\./',$moves);
$movesNum		= count($moves);
	
if($move){
	$locations		= parsePGN($pgn,$move,$player);
	$lastMoveSet	= explode(' ',$moves[$move]);
	$glow			= substr(preg_replace('/[^a-z0-9]/','',$lastMoveSet[$player-1]),-2);	
	if($lastMoveSet[$player-1]=='O-O'){
		$glow = ($player==1)? 'g1' : $glow = 'g8';
	}elseif($lastMoveSet[$player-1]=='O-O-O'){ 
		$glow = ($player==1)? 'c1' : $glow = 'c8';	
	}
	if($player==1){
		$stepPlayer = 2;
		$backMove	= $move - 1;
		$nextMove	= $move;
	}else{
		$stepPlayer	= 1;
		$backMove	= $move;
		$nextMove	= $move + 1;
	}
	if($backMove > 0){ 
		$goBack 	= 'href="game.php?do=display&amp;gameID='.$gameID.'&amp;status=view&amp;move='.$backMove.'&amp;player='.$stepPlayer.'" target="_top"';
		$start		= 'href="game.php?do=display&amp;gameID='.$gameID.'&amp;status=view&amp;move=1&amp;player=1" target="_top"';
	}else{
		$backOn 	= 'opacity:0.5;';
		$startOn 	= 'opacity:0.5;';
	}
	if($nextMove < $movesNum){
		$goNext 	= 'href="game.php?do=display&amp;gameID='.$gameID.'&amp;status=view&amp;move='.$nextMove.'&amp;player='.$stepPlayer.'" target="_top"';
	}else{
		$nextOn 	= 'opacity:0.5;';	
	}
}else{
	$query			= 'SELECT * FROM '.dbPre.'games WHERE gameID="'.$gameID.'" LIMIT 1';
	$result			= mysql_query($query)or die('<div class="error">'.errorDBStr.'game</div>');	
	$locations		= unserialize(mysql_result($result,0,'setup'));
	$lastMoveSet 	= explode(' ',$moves[$movesNum-1]);

	$nextOn 		= 'opacity:0.5;';	
	$stepPlayer		= count($lastMoveSet) - 1;
	if($stepPlayer == 0) $stepPlayer = 2;
	$backMove		= $movesNum-1; 
	if($stepPlayer == 2) $backMove-1;
	if($backMove > 0){ 
		$goBack = 'href="game.php?do=display&amp;gameID='.$gameID.'&amp;status=view&amp;move='.$backMove.'&amp;player='.$stepPlayer.'" target="_top"';
		$start	= 'href="game.php?do=display&amp;gameID='.$gameID.'&amp;status=view&amp;move=1&amp;player=1" target="_top"';
	}else{
		$backOn = 'opacity:0.5;';
		$startOn = 'opacity:0.5;';
	}
}
include_once('game_display_minimal.php');
displayBoardMin($locations,$playerColor,$gameID,$glow);
$extra_butt = '<a '.$start.' class="butt first-butt" style="'.$startOn.'">'.$infoBoxStr[14].'</a><a '.$goBack.' class="butt" style="'.$backOn.'">&larr;</a><a '.$goNext.' class="butt" style="'.$nextOn.'">&rarr;</a>';
$mess			= info($playerColor,$gameID,$extra_butt,$infoBoxStr);
if($lastMoveSet[$player-1]){
	echo'<div id="info">'.$viewStr[0].'<br />#'.$move.' '.$lastMoveSet[$player-1].'</div>';
}elseif($winner){
	echo'<div id="info"><p><b>'.$winner.'</b>'.$infoBoxStr[11].'</b></p></div>';
}

?>

</body>
</html>