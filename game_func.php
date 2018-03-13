<?php
//		Some Chess, a PHP multi-player chess server.
//		Copyright (C) 2007 Jon Link
function newGame($wID,$bID,$var,$gameFuncStr){
	//$setup		= array('a8'=>'rd','b8'=>'nd','c8'=>'bd','d8'=>'qd','e8'=>'kd','f8'=>'bd','g8'=>'nd','h8'=>'rd','a7'=>'pd','b7'=>'pd','c7'=>'pd','d7'=>'pd','e7'=>'pd','f7'=>'pd','g7'=>'pd','h7'=>'pd','a1'=>'rl','b1'=>'nl','c1'=>'bl','d1'=>'ql','e1'=>'kl','f1'=>'bl','g1'=>'nl','h1'=>'rl','a2'=>'pl','b2'=>'pl','c2'=>'pl','d2'=>'pl','e2'=>'pl','f2'=>'pl','g2'=>'pl','h2'=>'pl');
	if(!$wID || !$bID){
		return '<div class="error">'.$gameFuncStr[18].'</div>';
	}else{
		if($var=='random'){
			$pre_setup	= fisher_random();
			$opening	= array2FEN($pre_setup);
			$setup		= serialize($pre_setup);
			$game_type	= 'R';
		}else{
			$setup		= 'a:32:{s:2:"a8";s:2:"rd";s:2:"b8";s:2:"nd";s:2:"c8";s:2:"bd";s:2:"d8";s:2:"qd";s:2:"e8";s:2:"kd";s:2:"f8";s:2:"bd";s:2:"g8";s:2:"nd";s:2:"h8";s:2:"rd";s:2:"a7";s:2:"pd";s:2:"b7";s:2:"pd";s:2:"c7";s:2:"pd";s:2:"d7";s:2:"pd";s:2:"e7";s:2:"pd";s:2:"f7";s:2:"pd";s:2:"g7";s:2:"pd";s:2:"h7";s:2:"pd";s:2:"a1";s:2:"rl";s:2:"b1";s:2:"nl";s:2:"c1";s:2:"bl";s:2:"d1";s:2:"ql";s:2:"e1";s:2:"kl";s:2:"f1";s:2:"bl";s:2:"g1";s:2:"nl";s:2:"h1";s:2:"rl";s:2:"a2";s:2:"pl";s:2:"b2";s:2:"pl";s:2:"c2";s:2:"pl";s:2:"d2";s:2:"pl";s:2:"e2";s:2:"pl";s:2:"f2";s:2:"pl";s:2:"g2";s:2:"pl";s:2:"h2";s:2:"pl";}';
		}
		$castle			= 'a:3:{s:1:"k";i:1;s:1:"a";i:1;s:1:"h";i:1;}';
		$queryNewGame	= 'INSERT INTO '.dbPre.'games (whitePlayerID,blackPlayerID,setup,bCastle,wCastle,game_type, opening) VALUES ("'.$wID.'","'.$bID.'",\''.$setup.'\',\''.$castle.'\',\''.$castle.'\',"'.$game_type.'",\''.$opening.'\')';
		mysql_query($queryNewGame)or die('<div class="error">'.errorDBStr.' (ng-1)</div>');
		return $gameFuncStr[17];
	}
}
function fisher_random(){
	$squares	= array(0=>'a',1=>'b',2=>'c',3=>'d',4=>'e',5=>'f',6=>'g',7=>'h');
	$tmp		= array_rand(array(0=>'a',2=>'c',4=>'e',6=>'g'));
	$bishop1	= $squares[$tmp];
	unset($squares[$tmp]);
	$tmp		= array_rand(array(1=>'b',3=>'d',5=>'f',7=>'h'));
	$bishop2	= $squares[$tmp];
	unset($squares[$tmp]);
	$tmp		= array_rand($squares);
	$queen		= $squares[$tmp];
	unset($squares[$tmp]);
	$tmp		= array_rand($squares);
	$knight1	= $squares[$tmp];
	unset($squares[$tmp]);
	$tmp		= array_rand($squares);
	$knight2	= $squares[$tmp];
	unset($squares[$tmp]);
	$i=0;
	foreach($squares as $tmp){
		if($i==0) $rook1 	= $tmp;
		if($i==1) $king 	= $tmp;
		if($i==2) $rook2 	= $tmp;
		++$i;
	}
	return array($rook1.'1'=>'rl',$rook2.'1'=>'rl',$knight1.'1'=>'nl',$knight2.'1'=>'nl',$bishop1.'1'=>'bl',$bishop2.'1'=>'bl',$queen.'1'=>'ql',$king.'1'=>'kl',$rook1.'8'=>'rd',$rook2.'8'=>'rd',$knight1.'8'=>'nd',$knight2.'8'=>'nd',$bishop1.'8'=>'bd',$bishop2.'8'=>'bd',$queen.'8'=>'qd',$king.'8'=>'kd','a7'=>'pd','b7'=>'pd','c7'=>'pd','d7'=>'pd','e7'=>'pd','f7'=>'pd','g7'=>'pd','h7'=>'pd','a2'=>'pl','b2'=>'pl','c2'=>'pl','d2'=>'pl','e2'=>'pl','f2'=>'pl','g2'=>'pl','h2'=>'pl');
}
function mated($oppID,$gameID,$matedStr){
	$queryGames		= 'UPDATE '.dbPre.'games SET winner="'.$_SESSION['id'].'" WHERE gameID="'.$gameID.'" LIMIT 1';
	mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (md-1)</div>');
	$queryPlayers	= 'UPDATE '.dbPre.'players SET wins=wins+1, points=points+1 WHERE id="'.$_SESSION['id'].'" LIMIT 1';
	mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (md-2)</div>');
	$queryPlayers	= 'UPDATE '.dbPre.'players SET loses=loses+1 WHERE id="'.$oppID.'" LIMIT 1';
	mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (md-3)</div>');
	if(deleteChat == true) killchat($gameID);
	movesToPGN($gameID);
}
function resign($gameID,$gameFuncStr){
	$queryGame		= 'SELECT blackPlayerID,whitePlayerID FROM '.dbPre.'games WHERE gameID="'.$gameID.'" LIMIT 1';
	$resultGame		= mysql_query($queryGame)or die('<div class="error">'.errorDBStr.' (rn-1)</div>');
	$oppID = ($_SESSION['id'] == mysql_result($resultGame,0,'whitePlayerID'))? mysql_result($resultGame,0,'blackPlayerID') : mysql_result($resultGame,0,'whitePlayerID');
	$queryGames		= 'UPDATE '.dbPre.'games SET winner="'.$oppID.'" WHERE gameID="'.$gameID.'" LIMIT 1';
	mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (rn-2)</div>');
	$queryPlayers	= 'UPDATE '.dbPre.'players SET wins=wins+1, points=points+1 WHERE id="'.$oppID.'" LIMIT 1';
	mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (rn-3)</div>');
	$queryPlayers	= 'UPDATE '.dbPre.'players SET loses=loses+1 WHERE id="'.$_SESSION['id'].'" LIMIT 1';
	mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (rn-4)</div>');
	if(deleteChat == true)killchat($gameID);
	movesToPGN($gameID);
	return $gameFuncStr[1];
}
function draw($gameID,$gameFuncStr){
	$queryGame		= 'SELECT reqDraw,blackPlayerID,whitePlayerID FROM '.dbPre.'games WHERE gameID="'.$gameID.'" LIMIT 1';
	$resultGame		= mysql_query($queryGame)or die('<div class="error">'.errorDBStr.' (dw-1)</div>');
	$oppID = ($_SESSION['id'] == mysql_result($resultGame,0,'whitePlayerID'))? mysql_result($resultGame,0,'blackPlayerID') : mysql_result($resultGame,0,'whitePlayerID');
	$draw 			= mysql_result($resultGame,0,'reqDraw');
	if(!$draw){
		$queryGames		= 'UPDATE '.dbPre.'games SET reqDraw="'.$_SESSION['id'].'" WHERE gameID="'.$gameID.'" LIMIT 1';
		mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (dw-2)</div>');
		return $gameFuncStr[2];
	}elseif($draw != $_SESSION['id']){
		$queryGames		= 'UPDATE '.dbPre.'games SET winner="D" WHERE gameID="'.$gameID.'" LIMIT 1';
		mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (dw-3)</div>');
		$queryPlayers	= 'UPDATE '.dbPre.'players SET draws=draws+1, points=points+0.5 WHERE id="'.$oppID.'" || id="'.$_SESSION['id'].'" LIMIT 2';
		mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (dw-4)</div>');
		if(deleteChat == true) killchat($gameID);
		movesToPGN($gameID);
		return $gameFuncStr[3];
	}else{
		return $gameFuncStr[4];
	}
}
function ended($gameID,$gameFuncStr){
	$queryGame		= 'SELECT * FROM '.dbPre.'games WHERE gameID="'.$gameID.'" LIMIT 1';
	$resultGame		= mysql_query($queryGame)or die('<div class="error">'.errorDBStr.' (ed-1)</div>');
	$nextMoveNum	= mysql_result($resultGame,0,'nextMoveNum');
	if($_SESSION['id'] == mysql_result($resultGame,0,'blackPlayerID')){
		$oppID 			= mysql_result($resultGame,0,'whitePlayerID');
		$playerColor 	= 'black';
	}else{
		$oppID 			= mysql_result($resultGame,0,'blackPlayerID');
		$playerColor 	= 'white';
	}
	if(mysql_result($resultGame,0,'nextTurnColor') == $playerColor && $nextMoveNum > 2){
		$queryGames		= 'UPDATE '.dbPre.'games SET winner="'.$oppID.'" WHERE gameID="'.$gameID.'"';
		$queryPlayers	= 'UPDATE '.dbPre.'players SET wins=wins+1 WHERE id="'.$oppID.'" LIMIT 1';
		mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (ed-2)</div>');
		$queryPlayers	= 'UPDATE '.dbPre.'players SET loses=loses+1 WHERE id="'.$_SESSION['id'].'" LIMIT 1';
		mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (ed-3)</div>');
		$finished		= $gameFuncStr[5];
	}elseif(mysql_result($resultGame,0,'nextTurnColor') != $playerColor && $nextMoveNum > 2){
		$queryGames		= 'UPDATE '.dbPre.'games SET winner="'.$_SESSION['id'].'" WHERE gameID="'.$gameID.'"';
		$queryPlayers	= 'UPDATE '.dbPre.'players SET wins=wins+1 WHERE id="'.$_SESSION['id'].'" LIMIT 1';
		mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (ed-4)</div>');
		$queryPlayers	= 'UPDATE '.dbPre.'players SET loses=loses+1 WHERE id="'.$oppID.'" LIMIT 1';
		mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (ed-5)</div>');
		$finished		= $gameFuncStr[6];
	}else{
		$queryGames		= 'UPDATE '.dbPre.'games SET winner="X" WHERE gameID="'.$gameID.'"';
		$finished		= $gameFuncStr[7];
	}
	mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (ed-6)</div>');
	if(deleteChat == true) killchat($gameID);
	movesToPGN($gameID);
	return $finished;
}
function killChat($gameID){
	$gameID			= $gameID;
	$queryKill 		= 'DELETE FROM '.dbPre.'chat WHERE gameID="'.$gameID.'"';
	mysql_query($queryKill)or die('<div class="error">'.errorDBStr.' (kc-1)</div>');
}
function undo($gameID,$gameFuncStr){
	$queryGame		= 'SELECT * FROM '.dbPre.'games WHERE gameID="'.$gameID.'" LIMIT 1';
	$resultGame		= mysql_query($queryGame)or die('<div class="error">'.errorDBStr.' (ud-1)</div>');
	$oppID			= ($_SESSION['id'] == mysql_result($resultGame,0,'whitePlayerID'))? mysql_result($resultGame,0,'blackPlayerID') : mysql_result($resultGame,0,'whitePlayerID');
	$undo 			= mysql_result($resultGame,0,'reqUndo');
	if(!$undo){
		$queryGames		= 'UPDATE '.dbPre.'games SET reqUndo="'.$_SESSION['id'].'" WHERE gameID="'.$gameID.'" LIMIT 1';
		mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (ud-2)</div>');
		return $gameFuncStr[14];
	}elseif($undo != $_SESSION['id']){
		$nextMoveNum 	= mysql_result($resultGame,0,'nextMoveNum');
		$lastMove 		= unserialize(mysql_result($resultGame,0,'lastMove'));
		$nextTurnColor 	= mysql_result($resultGame,0,'nextTurnColor');
		$undoneNTC		= ($nextTurnColor == 'white')? 'black' : 'white';
		$undoneMoNum 	= ($undoneNTC == 'black')? $nextMoveNum-1 : $nextMoveNum;
		$canCastle 		= unserialize(mysql_result($resultGame,0,$undoneNTC{0}.'Castle'));
		$queryMoves		= 'SELECT * FROM '.dbPre.'moves WHERE gameID="'.$gameID.'" ORDER BY moveNum DESC LIMIT 1';
		$resultMoves	= mysql_query($queryMoves)or die('<div class="error">'.errorDBStr.' (ud-3)</div>');
		$LaMove['move']	= mysql_result($resultMoves,0,$nextTurnColor.'Move');
		$undoneLaMove	= serialize($LaMove);
		$pgn			= movesToPGN($gameID,true);
		$movedPiece		= $lastMove['move']{0};
		if($lastMove['move']{0} == 'O'){
			$canCastle['k'] = 1;
			$canCastle['km'] = null;
		}elseif($movedPiece == 'K' || $movedPiece == 'R'){
			if($movedPiece == 'K' && $canCastle['km'] == $nextMoveNum){
				$canCastle['k'] = 1;
				$canCastle['km'] = null;
			}elseif($movedPiece == 'R' && $canCastle['am'] == $nextMoveNum){
				$canCastle['a'] = 1;
				$canCastle['am'] = null;
			}elseif($movedPiece == 'R' && $canCastle['hm'] == $nextMoveNum){
				$canCastle['h'] = 1;
				$canCastle['hm'] = null;
			}
		}
		$unCanCastle	= serialize($canCastle);
		$playerMove		= ($undoneNTC == 'white')? '2' : '1';
		$undoneLocat	= serialize(parsePGN($pgn,($nextMoveNum -1),$playerMove));
		if($undoneNTC == 'black'){
			$queryUnMoves	= 'UPDATE '.dbPre.'moves SET '.$undoneNTC.'Move="" WHERE gameID="'.$gameID.'" AND moveNum="'.$undoneMoNum.'" LIMIT 1';
		}else{
			$queryUnMoves	= 'DELETE FROM '.dbPre.'moves WHERE gameID="'.$gameID.'" AND moveNum="'.$undoneMoNum.'"';
		}
		mysql_query($queryUnMoves)or die('<div class="error">'.errorDBStr.' (ud-4)</div>');
		$queryUnGames	= 'UPDATE '.dbPre.'games SET reqUndo="", lastMove=\''.$undoneLaMove.'\', nextTurnColor="'.$undoneNTC.'", nextMoveNum="'.$undoneMoNum.'", setup=\''.$undoneLocat.'\', '.$undoneNTC{0}.'Castle=\''.$unCanCastle.'\' WHERE gameID="'.$gameID.'" LIMIT 1';
		mysql_query($queryUnGames)or die('<div class="error">'.errorDBStr.' (ud-5)</div>');
		return $gameFuncStr[13];
	}else{
		return $gameFuncStr[14];
	}
}
function movesToPGN($gameID,$justConvert=false){
	$gameID			= $gameID;
	$queryGames		= 'SELECT * FROM '.dbPre.'games WHERE gameID="'.$gameID.'" LIMIT 1';
	$resultGames	= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (mn-1)</div>');
	$winner	 		= mysql_result($resultGames,0,'winner');
	$wID	 		= mysql_result($resultGames,0,'whitePlayerID');
	$bID	 		= mysql_result($resultGames,0,'blackPlayerID');
	$gameDate 		= mysql_result($resultGames,0,'gameDate');
	$pgnDate		= substr($gameDate,0,4).'.'.(substr($gameDate,4,2)).'.'.(substr($gameDate,6,2));
	if($winner == $wID){$result='1-0';}elseif($winner == $bID){$result='0-1';}elseif($winner='D'){$result='1/2-1/2';}else{$result='*';}
	$queryPlayers	= 'SELECT * FROM '.dbPre.'players WHERE id="'.$bID.'" OR id="'.$wID.'" LIMIT 2';
	$resultPlayers	= mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (mn-2)</div>');
	$names[mysql_result($resultPlayers,0,'id')]	= mysql_result($resultPlayers,0,'name');
	$names[mysql_result($resultPlayers,1,'id')]	= mysql_result($resultPlayers,1,'name');
	$queryMoves		= 'SELECT * FROM '.dbPre.'moves WHERE gameID="'.$gameID.'" ORDER BY moveNum ASC';
	$resultMoves	= mysql_query($queryMoves)or die('<div class="error">'.errorDBStr.' (mn-3)</div>');
	$movesNum		= mysql_num_rows($resultMoves);
	$pgnHead 		='[Event "Some Chess Game"]
[Site "Some Chess"]
[Date "'.$pgnDate.'"]
[Round ""]
[White "'.$names[$wID].'"]
[Black "'.$names[$bID].'"]
[Result "'.$result.'"]
[Board	"'.$gameID.'"]
';
if(mysql_result($resultGames,0,'game_type') == 'R') $pgnHead .= '[Variant "fischerandom"]
[SetUp "1"]'.'
[FEN "'.mysql_result($resultGames,0,'opening').'"]
';
	for($i=0;$i<$movesNum;++$i) $pgnMoves .= mysql_result($resultMoves,$i,'moveNum').'.'.(mysql_result($resultMoves,$i,'whiteMove')).' '.(mysql_result($resultMoves,$i,'blackMove')).' ';
	$players	= $names[$wID].' Vs. '.$names[$bID];
	$pgn 		= $pgnHead.$pgnMoves;
	if(!$justConvert){
		$queryPGN	= 'INSERT INTO '.dbPre.'complete (gameID,players,result,pgn) VALUES ("'.$gameID.'","'.$players.'","'.$result.'",\''.$pgn.'\')';
		mysql_query($queryPGN)or die('<div class="error">'.errorDBStr.' (mn-4)</div>'.$queryPGN);
	}
	if(deleteMoves && !$justConvert){
		$killMoves 	= 'DELETE FROM '.dbPre.'moves WHERE gameID="'.$gameID.'"';
		mysql_query($killMoves)or die('<div class="error">'.errorDBStr.' (mn-5)</div>');
	}
	return $pgn;
}
function parsePGN($pgn,$movesNum=false,$playerMove=2,$toMoves=null,$newGame=null){
	$pgn	= trim(str_replace('\r\n',' ',$pgn));
	$pgn	= stripslashes($pgn);
	if(strpos($pgn,'[SetUp "1"]')){
		$FEN	= preg_replace('/[\s\S]*\[FEN "([\s\S]*)"\][\s\S]*/i','$1',$pgn);
		$setup	= FEN2array($FEN);
	}else{
		$setup 	= array('a8'=>'rd','b8'=>'nd','c8'=>'bd','d8'=>'qd','e8'=>'kd','f8'=>'bd','g8'=>'nd','h8'=>'rd','a7'=>'pd','b7'=>'pd','c7'=>'pd','d7'=>'pd','e7'=>'pd','f7'=>'pd','g7'=>'pd','h7'=>'pd','a1'=>'rl','b1'=>'nl','c1'=>'bl','d1'=>'ql','e1'=>'kl','f1'=>'bl','g1'=>'nl','h1'=>'rl','a2'=>'pl','b2'=>'pl','c2'=>'pl','d2'=>'pl','e2'=>'pl','f2'=>'pl','g2'=>'pl','h2'=>'pl');
	}
	if($movesNum === 0) return $setup;
	
	if($newGame){
		$white	= preg_replace('/[\s\S]*\[white "([\s\S]*)"\][\s\S]*/i','$1',$pgn);
		$black	= preg_replace('/[\s\S]*\[black "([\s\S]*)"\][\s\S]*/i','$1',$pgn);
		$date	= preg_replace('/[\s\S]*\[date "([\s\S]*)"\][\s\S]*/i','$1',$pgn);
		if(strpos($pgn,'board')){
			$importID	= preg_replace('/[\s\S]*\[board "([0-9]*)"\][\s\S]*/i','$1',$pgn);
			$queryGames = 'SELECT * FROM '.dbPre.'games WHERE gameID="'.$importID.'" LIMIT 1'; 
			$resultGames= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (pp-1)</div>');
			if(mysql_num_rows($queryGames) == 1) $inDB = true;
		}
		
		$queryPlayers 		= 'SELECT * FROM '.dbPre.'players WHERE name="'.$black.'" LIMIT 1'; 
		$resultPlayers 		= mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (pp-2)</div>');
		if(mysql_num_rows($resultPlayers) == 1){
			$blackID		= mysql_result($resultPlayers,0,'id');
		}else{
			$makePlayers 	= 'INSERT INTO '.dbPre.'players (name,invitedBy) VALUES ("'.$black.'","-1")';
			mysql_query($makePlayers)or die('<div class="error">'.errorDBStr.' (pp-3)</div>');
			$blackID		= mysql_insert_id();
		}
		$queryPlayers 		= 'SELECT * FROM '.dbPre.'players WHERE name="'.$white.'" LIMIT 1';
		$resultPlayers 		= mysql_query($queryPlayers)or die('<div class="error">'.errorDBStr.' (pp-4)</div>');
		if(mysql_num_rows($resultPlayers) == 1){
			$whiteID		= mysql_result($resultPlayers,0,'id');
		}else{
			$makePlayers 	= 'INSERT INTO '.dbPre.'players (name,invitedBy) VALUES ("'.$white.'","-1")';
			mysql_query($makePlayers)or die('<div class="error">'.errorDBStr.' (pp-5)</div>');
			$whiteID		= mysql_insert_id();
		}
		if(!$inDB){
			$setupDB	 		= serialize($setup);
			$queryGame	 		= 'INSERT INTO '.dbPre.'games (whitePlayerID,blackPlayerID,nextMoveNum,nextTurnColor,setup) VALUES ("'.$whiteID.'","'.$blackID.'","1","white",\''.$setupDB.'\')';
			mysql_query($queryGame)or die('<div class="error">'.$queryGame.' '.errorDBStr.' (pp-6)</div>');
			$gameID				= mysql_insert_id();
		}else{
			$gameID = $importID;
		}
	}
	$moves 	= trim(preg_replace('/\[.*\]/','',$pgn));
	$moves	= preg_split('/\d*\./',$moves);
	if($movesNum === false) $movesNum = count($moves);
	$playerMovesNum = 2;
	for($i=1;$i<=$movesNum;++$i){
		$moveSet 	= explode(' ',$moves[$i]);
		if($toMoves && !empty($moveSet[0])){
			$queryMove	= 'INSERT INTO '.dbPre.'moves (gameID,moveNum,whiteMove,blackMove) VALUES ("'.$gameID.'","'.$i.'","'.$moveSet[0].'","'.$moveSet[1].'")';
			mysql_query($queryMove)or die('<div class="error">'.errorDBStr.' (pp-7)</div>');
		}
		if($i>$movesNum-1)$playerMovesNum = $playerMove;
		for($x=0;$x<$playerMovesNum;++$x){
			unset($oldSpot,$newSpot,$specific);
			$move 			= $moveSet[$x];
			$pieceColor 	= ($x == 0)? 'l' : 'd';
			if($newGame){
				if(strpos($move,'#') !== false) $winner	= $pieceColor;
				if($winner == 'l'){
					$winner = $whiteID;
				}elseif($winner == 'd'){
					$winner = $blackID;
				}
			}
			if(strpos($move,'K') !== false){
			//--king movement
				$piece 						= 'k'.$pieceColor;
				$oldSQ						= array_search($piece,$setup);
				$setup[$oldSQ] 				= null;
				$setup[substr($move,-2)] = $piece;
			}elseif(substr($move,0,5) === 'O-O-O'){
			//--queenside castle movement, check for queenside first because it would also validate at a kingside (castle because of substr)
				$piece 	= 'k'.$pieceColor;
				if(strpos($pgn,'fischerandom')){
				//castling for random games
					$kingSQ	= array_search($piece,$setup);
					$rookSQ	= array_search('r'.$pieceColor,$setup);
					$rook_file 	= chr(strpos($FEN,'r')+97);
					$rookSQ		= ($pieceColor)? $rook_file.'1': $rook_file.'8';
					$numSQ	= ($pieceColor == 'l')? $numSQ = '1' : $numSQ = '8';
					if($kingSQ{0}=='b'){
						$setup['a'.$numSQ] 	= 'k'.$pieceColor;
						$setup['b'.$numSQ] 	= 'r'.$pieceColor;
					}else{
						$new_kingSQ			= chr(ord($kingSQ{0})-2).$numSQ;
						$new_rookSQ			= chr(ord($kingSQ{0})-1).$numSQ;
						$setup[$rookSQ] 	= null;
						$setup[$kingSQ] 	= null;
						$setup[$new_kingSQ] = 'k'.$pieceColor;
						$setup[$new_rookSQ] = 'r'.$pieceColor;
					}
				}else{
				//castling for standard games
					if($pieceColor == 'd'){
						$setup['e8'] = null;
						$setup['a8'] = null;
						$setup['d8'] = 'rd';
						$setup['c8'] = $piece;
					}else{
						$setup['e1'] = null;
						$setup['a1'] = null;
						$setup['d1'] = 'rl';
						$setup['c1'] = $piece;
					}
				}
			}elseif(substr($move,0,3) === 'O-O'){
			//--kingside castle movement
				$piece 	= 'k'.$pieceColor;
				if(strpos($pgn,'fischerandom')){
				//castling for random games
					$kingSQ	= array_search($piece,$setup);
					$rookSQ	= array_search('r'.$pieceColor,array_reverse($setup));
					$numSQ	= ($pieceColor == 'd')? $numSQ = '8' : $numSQ = '1';
					if($kingSQ{0}=='g'){
						$setup['h'.$numSQ] 	= 'k'.$pieceColor;
						$setup['g'.$numSQ] 	= 'r'.$pieceColor;
					}else{
						$new_kingSQ			= chr(ord($kingSQ{0})+2).$numSQ;
						$new_rookSQ			= chr(ord($kingSQ{0})+1).$numSQ;
						$setup[$rookSQ] 	= null;
						$setup[$kingSQ] 	= null;
						$setup[$new_kingSQ] = 'k'.$pieceColor;
						$setup[$new_rookSQ] = 'r'.$pieceColor;
					}					
				}else{
				//castling for standard games
					if($pieceColor == 'd'){
						$setup['e8'] = null;
						$setup['h8'] = null;
						$setup['f8'] = 'rd';
						$setup['g8'] = $piece;
					}else{
						$setup['e1'] = null;
						$setup['h1'] = null;
						$setup['f1'] = 'rl';
						$setup['g1'] = $piece;
					}
				}
 			}elseif(strpos($move,'Q') !== false && strpos($move,'=') == false){
 			//--queen movement
				$piece = 'q'.$pieceColor;
				$oldSQ				= array_search($piece,$setup);
				$setup[$oldSQ] 		= null;
				$newSpot			= str_replace('+','',$move);
				$newSpot			= str_replace('#','',$newSpot);
				$newSpot			= substr($newSpot,-2);
				$setup[$newSpot]	= $piece;
			}elseif(strpos($move,'B') !== false && strpos($move,'=') == false){
			//--bishop movement
				$piece = 'b'.$pieceColor;
				$newSpot	= str_replace('+','',$move);
				$newSpot	= str_replace('#','',$newSpot);
				$newSpot	= str_replace('x','',$newSpot);	
				if(strlen($newSpot)>3) $specific = $newSpot{1};
				$newSpot	= substr($newSpot,-2);
				$pieceArray	= array_keys($setup,$piece);
				$arrayCount	= count($pieceArray);
				for($n=0;$n<$arrayCount;++$n){
					$square	= $pieceArray[$n];
					if($specific){
						if($square{0} == $specific || $square{1} == $specific) $oldSpot	= $square;
					}elseif(!$oldSpot){
						if(abs(ord($newSpot{0})-ord($square{0})) == abs($newSpot{1}-$square{1})){
							if($newSpot{0} > $square{0} && $newSpot{1} > $square{1}){
								$gapSize = abs($newSpot{1} - $square{1});
								$direc	 = 'ur';
							}elseif($newSpot{0} < $square{0} && $newSpot{1} < $square{1}){
								$gapSize = abs($newSpot{1} - $square{1});
								$direc	 = 'dl';
							}elseif($newSpot{0} > $square{0} && $newSpot{1} < $square{1}){
								$gapSize = abs($newSpot{1} - $square{1});
								$direc	 = 'dr';
							}elseif($newSpot{0} < $square{0} && $newSpot{1} > $square{1}){
								$gapSize = abs($newSpot{1} - $square{1});
								$direc	 = 'ul';
							}
							unset($blocked);
							for($r=1;$r<$gapSize;++$r){
								if($direc == 'ur'){
									$lookSq	= chr(ord($newSpot{0})-$r).($newSpot{1}-$r);
								}elseif($direc == 'dl'){
									$lookSq	= chr(ord($newSpot{0})+$r).($newSpot{1}+$r);
								}elseif($direc == 'dr'){
									$lookSq	= chr(ord($newSpot{0})-$r).($newSpot{1}+$r);
								}elseif($direc == 'ul'){
									$lookSq	= chr(ord($newSpot{0})+$r).($newSpot{1}-$r);
								}
								if($setup[$lookSq] != '') $blocked = true;
							}
							if(!$blocked) $oldSpot = $square;
						}
					}
				}	
				$setup[$newSpot]	= $piece;
				$setup[$oldSpot]	= null;
 			}elseif(strpos($move,'N') !== false && strpos($move,'=') == false){
			//--knight movement
				$piece = 'n'.$pieceColor;
				$newSpot	= str_replace('+','',$move);
				$newSpot	= str_replace('#','',$newSpot);
				$newSpot	= str_replace('x','',$newSpot);
				if(strlen($newSpot)>3) $specific = $newSpot{1};
				$newSpot	= substr($newSpot,-2);
				$posArray[0]	= chr(ord($newSpot{0}) - 2).($newSpot{1} + 1);
				$posArray[1]	= chr(ord($newSpot{0}) - 2).($newSpot{1} - 1);
				$posArray[2]	= chr(ord($newSpot{0}) + 2).($newSpot{1} + 1);
				$posArray[3]	= chr(ord($newSpot{0}) + 2).($newSpot{1} - 1);
				$posArray[4]	= chr(ord($newSpot{0}) - 1).($newSpot{1} + 2);
				$posArray[5]	= chr(ord($newSpot{0}) - 1).($newSpot{1} - 2);
				$posArray[6]	= chr(ord($newSpot{0}) + 1).($newSpot{1} + 2);
				$posArray[7]	= chr(ord($newSpot{0}) + 1).($newSpot{1} - 2);
				for($n=0;$n<8;++$n){
					$square 	= $posArray[$n];
					$spotPiece	= $setup[$square];
					if($spotPiece == $piece){
						if($specific){
							if(strpos($square, $specific) !== false) $oldSpot = $square;
						}else{
							$oldSpot = $square;
						}
					}
				}
				$setup[$newSpot]	= $piece;
				$setup[$oldSpot]	= null;
 			}elseif(strpos($move,'R') !== false && strpos($move,'=') == false){
			//--rook movement
				$piece = 'r'.$pieceColor;
				$newSpot	= str_replace('+','',$move);
				$newSpot	= str_replace('#','',$newSpot);
				$newSpot	= str_replace('x','',$newSpot);
				if(strlen($newSpot)>3) $specific = $newSpot{1};
				$newSpot	= substr($newSpot,-2);
				$pieceArray	= array_keys($setup,$piece);
				$arrayCount	= count($pieceArray);
				for($n=0;$n<$arrayCount;++$n){
					$square	= $pieceArray[$n];
					if($square{0} == $newSpot{0} || $square{1} == $newSpot{1}){
						if($specific){
							if($square{0} == $specific || $square{1} == $specific) $oldSpot	= $square;
						}elseif(!$oldSpot){
							if($newSpot{0} == $square{0}){
								$gap 	 = $newSpot{1} - $square{1};
								$gapSize = abs($gap);
								$direc	 = 'file';
							}else{
								$gap 	 = ord($newSpot{0}) - ord($square{0});
								$gapSize = abs($gap);
								$direc	 = 'row';
							}
							unset($blocked);
							for($r=1;$r<$gapSize;++$r){
								if($direc == 'file'){
									if($gap<0){
										$lookSq	= $newSpot{0}.($newSpot{1}+$r);
									}else{
										$lookSq	= $newSpot{0}.($newSpot{1}-$r);
									}
								}else{
									if($gap<0){
										$lookSq	= chr(ord($newSpot{0})+$r).$newSpot{1};
									}else{
										$lookSq	= chr(ord($newSpot{0})-$r).$newSpot{1};
									}
								}
								if($setup[$lookSq] != '') $blocked = true;
							}
							if(!$blocked) $oldSpot	= $square;
						}
					}
				}	
				$setup[$newSpot]	= $piece;
				$setup[$oldSpot]	= null;
			}elseif($move){
			//-- pawn movement
				$piece 		= 'p'.$pieceColor;
				if(strpos($move,'x')){
					if($pieceColor == 'l'){
						$setup[$move{2}.$move{3}]		= $piece;
						$setup[$move{0}.($move{3}-1)]	= null;
						$spot							= $move{0}.($move{3}-1);
						if(strpos($move,'EP')) $setup[$move{2}.($move{3}-1)] = null;
					}else{
						$setup[$move{2}.$move{3}]		= $piece;
						$setup[$move{0}.($move{3}+1)]	= null;
						$spot							= $move{0}.($move{3}+1);
						if(strpos($move,'EP')) $setup[$move{2}.($move{3}+1)] = null;
//echo "<div style='position:absolute;top:0;left:0;padding:1em;background:#ccc;z-index:99;border:1px solid red;'>spot: ".."</div>";
					}
					if(strpos($move,'=')){
						$setup[$spot]		= null;
						$setup[$move{2}.$move{3}]		= strtolower($move{5}.$pieceColor);
					}			
				}else{
					$move	= preg_replace('/[+#]*/','',$move);
					if($pieceColor == 'l'){
						$square	= $move{0}.($move{1}-1);
						if($setup[$square] == $piece){
							$oldSpot	= $square;
						}else{
							$oldSpot	= $move{0}.($move{1}-2);
						}
					}else{
						$square	= $move{0}.($move{1}+1);
						if($setup[$square] == $piece){
							$oldSpot	= $square;
						}else{
							$oldSpot	= $move{0}.($move{1}+2);
						}
					}
					if(strpos($move,'=')){
						$setup[$move{0}.$move{1}]	= strtolower($move{3}).$pieceColor;
					}else{
						$setup[$move] 	= $piece;
					}
					$setup[$oldSpot]	= null;
				}
			}
		}
	}
	if($newGame){
		if(!$winner) $winner = 'X';
		$setup 		= serialize($setup);
		$queryGame 	= 'UPDATE '.dbPre.'games SET setup=\''.$setup.'\', winner=\''.$winner.'\' WHERE gameID="'.$gameID.'" LIMIT 1';
		mysql_query($queryGame)or die('<div class="error">'.$queryGame.'<br />'.errorDBStr.' (pp-8)</div>');
	}
	return $setup;
}
function array2FEN($opening){
	$backrow = $opening['a1']{0}.$opening['b1']{0}.$opening['c1']{0}.$opening['d1']{0}.$opening['e1']{0}.$opening['f1']{0}.$opening['g1']{0}.$opening['h1']{0};
	return	$backrow.'/pppppppp/8/8/8/8/PPPPPPPP/'.strtoupper($backrow).' w KQkq - 0 1';
}
function FEN2array($FEN){
	return array('a8'=>$FEN{0}.'d','b8'=>$FEN{1}.'d','c8'=>$FEN{2}.'d','d8'=>$FEN{3}.'d','e8'=>$FEN{4}.'d','f8'=>$FEN{5}.'d','g8'=>$FEN{6}.'d','h8'=>$FEN{7}.'d','a7'=>'pd','b7'=>'pd','c7'=>'pd','d7'=>'pd','e7'=>'pd','f7'=>'pd','g7'=>'pd','h7'=>'pd','a1'=>$FEN{0}.'l','b1'=>$FEN{1}.'l','c1'=>$FEN{2}.'l','d1'=>$FEN{3}.'l','e1'=>$FEN{4}.'l','f1'=>$FEN{5}.'l','g1'=>$FEN{6}.'l','h1'=>$FEN{7}.'l','a2'=>'pl','b2'=>'pl','c2'=>'pl','d2'=>'pl','e2'=>'pl','f2'=>'pl','g2'=>'pl','h2'=>'pl');
}
?>