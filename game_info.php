<?PHP
//		Some Chess, a PHP multi-player chess server.
//		Copyright (C) 2007 Jon Link
$queryHist 	= 'SELECT * FROM '.dbPre.'moves WHERE gameID="'.$gameID.'" ORDER BY moveNum';
$resultHist	= mysql_query($queryHist)or die('<div class="error">'.errorDBStr.' (im-1)</div>');
$moveNum 	= mysql_num_rows($resultHist);
for($i=0;$i<$moveNum;++$i) $moves .= '<p><span class="movenum">'.mysql_result($resultHist,$i,'moveNum').'.</span><span class="move">'.mysql_result($resultHist,$i,'whiteMove').'</span>'.mysql_result($resultHist,$i,'blackMove').'</p>';
echo'<div id="history-box">
	<div id="history">
		<h2>'.$infoBoxStr[0].' (#'.$gameID.')</h2>
		'.$moves.'
	</div>
</div>
<div id="menu">
	<form action="menu.php" method="post" target="_top">
		<input type="hidden" name="do" value="resign" />
		<input type="hidden" name="gameID" value="',$gameID,'" />
		<input type="submit" value="'.$infoBoxStr[1].'" class="butt" />	
	</form>
	<form action="menu.php" method="post" target="_top">
		<input type="hidden" name="do" value="draw'.$doDK.'" />
		<input type="hidden" name="gameID" value="',$gameID,'" />
		<input type="submit" value="'.$infoBoxStr[2].$okayD.'" class="butt" />	
	</form>';
if($undoB==2 && $allowUndo==1){$okayU = ' &#10003;';$doUK='OK';}
if($undoB>0 && $allowUndo==1){
	echo'<form action="menu.php" method="post" target="_top">
		<input type="hidden" name="do" value="undo'.$doUK.'" />
		<input type="hidden" name="gameID" value="',$gameID,'" />
		<input type="submit" value="'.$infoBoxStr[4].$okayU.'" class="butt" />	
	</form>';	
}
if($endB) echo'<form action="menu.php" method="post" target="_top">
		<input type="hidden" name="do" value="end" />
		<input type="hidden" name="gameID" value="',$gameID,'" />
		<input type="submit" value="'.$infoBoxStr[3].'" class="butt" />	
	</form>';
echo'<a href="game.php?do=display&amp;gameID=',$gameID,'&amp;status=view" class="butt" target="_top">Review</a>	
</div>
<div id="info">';
if($message) echo'<div class="look">'.$message.'</div>';	
if($error) echo'<div class="badmove">'.$error.'</div>';	
if($moving) echo'<div class="moving">'.$moving.'</div>';	
if(strpos($lastMove['move'],'#') === false && !$error) echo $turn;
if($undoD==2 && $allowUndo==1){$okayD = ' &#10003;';$doDK='OK';}
echo'</div>';	
?>