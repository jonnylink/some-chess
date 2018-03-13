<?php
//		Some Chess, a PHP multi-player chess server.
//		Copyright (C) 2007 Jon Link
function displayBoard($locations,$side,$gameID){
	$flip 		= ($side == 'black')? true : false;
	echo'<div id="board-box">',(($flip)? '<h3>H</h3><h3>G</h3><h3>F</h3><h3>E</h3><h3>D</h3><h3>C</h3><h3>B</h3><h3>A</h3>':'<h3>A</h3><h3>B</h3><h3>C</h3><h3>D</h3><h3>E</h3><h3>F</h3><h3>G</h3><h3>H</h3>');
//	$col_array 	= array('A','B','C','D','E','F','G','H');
//	for($x=0;$x<=7;++$x) echo'<h3>',($flip? $col_array[8-$x] : $col_array[$x]),'</h3>';
	for($row=1;$row<=8;++$row){ 
		for($col=1;$col<=8;++$col){
			$sq 		= ($flip)? chr(105-$col).$row : chr(96+$col).(9-$row);
			$piece		= $locations[$sq];
			$color 		= ((($row + $col) % 2) == 0)?'l':'d';
			echo'
			<a href="game_board_play.php?do=move&amp;gameID=',$gameID,'&amp;sq='.$sq,'" title="',$sq,'"><img src="',imgDir,$piece,$color,imgExt,'" class="sq" alt="',$piece,'" /></a>';		
		}
		echo'<h4>',($flip?($row) : (9-$row)),'</h4>';
	}
	echo'</div>';
}
?>
