<?php 
//		Some Chess, a PHP multi-player chess server.
//		Copyright (C) 2007 Jon Link
function displayBoardMin($locations,$side,$gameID,$glow){
	$flip 		= ($side == 'black')? true : false;
	echo'<div id="board-box">',(($flip)? '<h3>H</h3><h3>G</h3><h3>F</h3><h3>E</h3><h3>D</h3><h3>C</h3><h3>B</h3><h3>A</h3>':'<h3>A</h3><h3>B</h3><h3>C</h3><h3>D</h3><h3>E</h3><h3>F</h3><h3>G</h3><h3>H</h3>');
	for($row=1;$row<=8;++$row){ 
		for($col=1;$col<=8;++$col){
			$sq 		= ($flip)? chr(105-$col).$row : chr(96+$col).(9-$row);
			$glowing 	= ($sq==$glow)? 'style="width:3.1em;height:3.1em;border:0.15em red solid;"':null;
			$piece		= $locations[$sq];
			$color 		= ((($row + $col) % 2) == 0)?'l':'d';
			echo'	<a><img src="',imgDir,$piece,$color,imgExt,'" class="sq" alt="',$piece,'" ',$glowing,' /></a>
';
		}
		echo'	<h4>',($flip?($row) : (9-$row)),'</h4>
';
	}
	echo'
</div><!--board-box-->
';
}

function info($playerColor,$gameID,$extra_butt,$infoBoxStr){	
	echo'<div id="menu">
	<form action="export.php" method="post" target="_top">
		<input type="hidden" name="gameID" value="',$gameID,'" />
		<input type="submit" value="'.$infoBoxStr[5].'" class="butt" />	
	</form>
	',$extra_butt,'
</div><!--menu-->
';
	$queryHist 	= 'SELECT * FROM '.dbPre.'moves WHERE gameID="'.$gameID.'" ORDER BY moveNum';
	$resultHist	= mysql_query($queryHist)or die('<div class="error">'.errorDBStr.' (mh-1)</div>');
	$moveNum 	= mysql_num_rows($resultHist);
	for($i=0;$i<$moveNum;++$i) $moves .= '<p><span class="movenum">'.mysql_result($resultHist,$i,'moveNum').'.</span><span class="move">'.mysql_result($resultHist,$i,'whiteMove').'</span>'.mysql_result($resultHist,$i,'blackMove').'</p>';
	echo'<div id="history-box">
	<div id="history">
		<h2>'.$infoBoxStr[0].'</h2>
		'.$moves.'
	</div>
</div>';
}
?>