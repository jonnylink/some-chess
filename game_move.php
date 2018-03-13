<?php
//		Some Chess, a PHP multi-player chess server.
//		Copyright (C) 2007 Jon Link

//	echo '<div style="position:absolute;top:0;left:0;padding:0.1em;z-index:100;background:#fff;border:2px solid red">'.print_r($canCastle).'</div>'; //DEBUGGING

function moveIt($locations,$oldSpot,$newSpot,$gameID,$playerColor,$lastMove,$promote,$lang,$oppID,$emailMove){
	include_once('game_rules/threat.php');
	require('languages/'.$lang.'_chess.php');
	
	$query			= 'SELECT bCastle,wCastle,nextMoveNum,game_type FROM '.dbPre.'games WHERE gameID="'.$gameID.'" LIMIT 1';
	$result			= mysql_query($query)or die('<div class="error">'.errorDBStr.' (bg-1)</div>');
	$canCastle		= unserialize(mysql_result($result,0, $playerColor{0}.'Castle')); // this will need to change once playerColor is just b or w
	$moveNum		= mysql_result($result,0,'nextMoveNum');
	$gametype		= mysql_result($result,0,'game_type');

	//--catch errors
	//----do we have all the vars
	if(!$locations) $spRules['error']	= $movesStr[0];
	if(!$gameID) 	$spRules['error']	= $movesStr[0];
	//--if no errors are caught
	if(!$message){
		//--go through the old array and make the changes from the move in an new array
		$playerColor	= ($playerColor == 'white')? 'l' : 'd'; // again, this all needs to be simplified to b & w instead of white & black, l & d, and b & w
		$defColor		= ($playerColor == 'd')? 'l' : 'd'; // AGH! this all needs to be simplified to b & w instead of white & black, l & d, and b & w ALSO this is already figured out in board.php, just share the result in an array called opp --- $opp = array(id, color)
		$movingPiece	= $locations[$oldSpot];
		//--check for illegal moves
		if(strpos($lastMove,'#') !== false){
			$spRules['error']	= $movesStr[1];
		}elseif(ord($newSpot{0}) < 97 || ord($newSpot{0}) > 104 || $newSpot{1} > 8 || $newSpot{1} < 1){
			$spRules['error']	= $movesStr[2];
		}elseif(ord($oldSpot{0}) < 97 || ord($oldSpot{0}) > 104 || $oldSpot{1} > 8 || $oldSpot{1} < 1){
			$spRules['error']	= $movesStr[3];
		}elseif($playerColor != $movingPiece{1}){
			$spRules['error']	= $movesStr[5];
		}elseif($playerColor == ($locations[$newSpot]{1}) && $movingPiece{0} !== 'k' && $gametype == 'R'){
			$_SESSION['oldSpot'.$gameID] = $newSpot;
			return 'redo';
		}elseif($playerColor == ($locations[$newSpot]{1}) && $movingPiece{0} == 'k' && $locations[$newSpot]{0} !== 'r' && $gametype == 'R'){
			$_SESSION['oldSpot'.$gameID] = $newSpot;
			return 'redo';
		}elseif($playerColor == ($locations[$newSpot]{1}) && $movingPiece{0} == 'k' && ($newSpot{1} == '1' || $newSpot{1} == '8') && $gametype == 'R'){
			if($movingPiece{0} == 'k'){include('game_rules/king.php');		$spRules	= kingRules($locations,$newSpot,$oldSpot,$movingPiece{1},$canCastle,$lastMove,$gametype,$kingStr);}
		}elseif($playerColor == ($locations[$newSpot]{1}) && $movingPiece{0} == 'k' && (ord($newSpot{0}) !== (ord($oldSpot{0})+2)) && (ord($newSpot{0}) !== (ord($oldSpot{0})-2)) && $gametype == 'R'){
			$_SESSION['oldSpot'.$gameID] = $newSpot;
			return 'redo';
		}elseif($oldSpot == $newSpot || ($playerColor == ($locations[$newSpot]{1}) && $gametype !== 'R')){
			$_SESSION['oldSpot'.$gameID] = $newSpot;
			return 'redo';
		}else{
			//----check with rules
			if($movingPiece{0} == 'k'){include('game_rules/king.php');		$spRules	= kingRules($locations,$newSpot,$oldSpot,$movingPiece{1},$canCastle,$lastMove,$gametype,$kingStr);}
			if($movingPiece{0} == 'q'){include('game_rules/queen.php');		$spRules 	= queenRules($locations,$newSpot,$oldSpot,$movingPiece,$queenStr);}
			if($movingPiece{0} == 'r'){include('game_rules/rook.php');		$spRules 	= rookRules($locations,$newSpot,$oldSpot,$movingPiece,$rookStr);}
			if($movingPiece{0} == 'b'){include('game_rules/bishop.php');		$spRules 	= bishopRules($locations,$newSpot,$oldSpot,$movingPiece,$bishopStr);}
			if($movingPiece{0} == 'n'){include('game_rules/knight.php'); 	$spRules 	= knightRules($locations,$newSpot,$oldSpot,$movingPiece,$knightStr);}
			if($movingPiece{0} == 'p'){include('game_rules/pawn.php');		$spRules 	= pawnRules($locations,$newSpot,$oldSpot,$movingPiece,$lastMove,$pawnStr);}
		}
		//----if rules are broken then don't move & let the player know
		if($spRules['error']){
			//echo '<div id="info" class="badmove">'.$spRules['error'].'</div>';
			$error['name']	= 'illegal';
			$error['type']	= $spRules['error'];
			return $error;
		//--if rules aren't broken then continue
		}else{
			for($row=1;$row<=8;++$row){
				for($col=1;$col<=8;++$col){
					$square 	= chr(ord('a')-1+$col).(9-$row);
					$piece		= $locations[$square];
					if($square == $oldSpot) $piece = '';
					if($square == $newSpot){
						$piece 		= $movingPiece;
						$capture	= $locations[$newSpot];
						if($capture && $locations[$newSpot]{1} !== $playerColor) $capNote = 'x';
					}
					$newLocations[$square] = $piece;
				}
			}
			// anytime the king moves turn off castling
			if($movingPiece{0} == 'k' && $canCastle['k'] == 1){$canCastle['k'] = 0; $canCastle['km'] = $moveNum;}
			if($gametype == 'R'){
			//  if random chess then use the FEN to shut off the proper rook
//				$opening	= mysql_result($result,0,'opening');
			}else{
			// anytime the rook moves turn off castling to that side
				if($movingPiece{0} == 'r' && $oldSpot{0} == 'a' && $canCastle['a'] == 1){$canCastle['a'] = 0; $canCastle['am'] = $moveNum;}
				if($movingPiece{0} == 'r' && $oldSpot{0} == 'h' && $canCastle['h'] == 1){$canCastle['h'] = 0; $canCastle['hm'] = $moveNum;}
			}
			$canCastle = serialize($canCastle);
			//--move the rook if castled & set castling variable
			if($spRules['castled']){
				$moveNote				= $spRules['castled'];
				$rookSqF				= $spRules['rookSqF'];
				$rookSqT				= $spRules['rookSqT'];
				if($newLocations[$rookSqF]{0} == 'r') $newLocations[$rookSqF] = ''; // only empty the rook's old spot if there is still a rook there (sometimes the king is there in random chess)
				$newLocations[$rookSqT] = 'r'.$playerColor;
				$notePiece 				= $spRules['castled'];
				unset($newSpot);
			}
			//--promote the pawn
			if($promote){
				$newLocations[$newSpot] = ($promote).$playerColor;
				$pawnPromo				= '='.strtoupper($promote);
			}
			if($spRules['promo'] && !$promote){
				$_SESSION['oldSpot'.$gameID] = $oldSpot;
				echo '<div class="dialog">
				<b class="dialog_t"><b class="xb1"></b><b class="xb2"></b><b class="xb3"></b><b class="xb4"></b></b>
					<div class="dialog_content">
					<p>Promote to:</p>
					<form action="game_board_play.php" method="post">
						<input type="hidden" name="do" value="move" />
						<input type="hidden" name="promote" value="q" />
						<input type="hidden" name="newSpot" value="',$newSpot,'" />
						<input type="hidden" name="gameID" value="',$gameID,'" />
						<input type="image" value="submit" src="img/queenB.png" alt="Queen" style="border:1px #999 solid" />
					</form>
					<form action="game_board_play.php" method="post">
						<input type="hidden" name="do" value="move" />
						<input type="hidden" name="promote" value="b" />
						<input type="hidden" name="newSpot" value="',$newSpot,'" />
						<input type="hidden" name="gameID" value="',$gameID,'" />
						<input type="image" value="submit" src="img/bishopB.png" alt="bishop" style="border:1px #999 solid" />
					</form>
					<form action="game_board_play.php" method="post">
						<input type="hidden" name="do" value="move" />
						<input type="hidden" name="promote" value="r" />
						<input type="hidden" name="newSpot" value="',$newSpot,'" />
						<input type="hidden" name="gameID" value="',$gameID,'" />
						<input type="image" value="submit" src="img/rookB.png" alt="rook" style="border:1px #999 solid" />
					</form>
					<form action="game_board_play.php" method="post">
						<input type="hidden" name="do" value="move" />
						<input type="hidden" name="promote" value="n" />
						<input type="hidden" name="newSpot" value="',$newSpot,'" />
						<input type="hidden" name="gameID" value="',$gameID,'" />
						<input type="image" value="submit" src="img/knightB.png" alt="knight" style="border:1px #999 solid" />
					</form>
					<p>&nbsp;</p>
					</div>
					<b class="dialog_b"><b class="xb4"></b><b class="xb3"></b><b class="xb2"></b><b class="xb1"></b></b>
				</div>';
				return $locations;
			}
			//--en passant
			$thisMove['twoSpaces'] = $spRules['twoSpaces'];
			if($spRules['cap']){
				$capSq					= $spRules['cap'];
				$newLocations[$capSq]	= '';
			}
			//--did the player put the opponent in check
			if($playerColor=='d'){$kingSq = array_search('kl',$newLocations);}else{$kingSq = array_search('kd',$newLocations);}
			$check = aThreat($kingSq,$newLocations,$playerColor);
			if($check) $checkNote = '+';
			if($check){
				include_once('game_rules/mate.php');
				if($checkmate) $checkNote = $checkmate;
			}
			//--write the notation
			if(!$notePiece) $notePiece	= strtoupper($movingPiece{0});
			if($notePiece=='P'){
				$notePiece='';
				if($capNote) $notePiece = $oldSpot{0};
			}
			if(isset($spRules['notePiece'])) $notePiece = $spRules['notePiece'];  //if we need to be specific ex Rea3
			$moveNote = (substr($notePiece,-2,2)=='EP')? $notePiece.$checkNote : $notePiece.$capNote.$newSpot.$pawnPromo.$checkNote;
			if(substr($moveNote,-3,2)=='EP') $moveNote = substr($moveNote,0,-1);
			$thisMove['move'] = $moveNote;
			//--discover if the player is putting him/herself into check
			$kingSq = array_search('k'.$playerColor,$newLocations);
			$selfCheck 	= aThreat($kingSq,$newLocations,$defColor);
			if($selfCheck) $spRules['error']	= $movesStr[8];
			//one last illegal move check (to see if player puts her/himself into check -- can only be done once we see what the new board looks like)
			if($spRules['error']){
				$error['name']	= 'illegal';
				$error['type']	= $spRules['error'];
				return $error;
			}else{
				//--throw the notation into the moves DB
				if($playerColor=='l'){
					$queryNote		= 'INSERT INTO '.dbPre.'moves (gameID,moveNum,whiteMove) VALUES ("'.$gameID.'","'.$moveNum.'","'.$moveNote.'")';
					$nextMoveNum	= $moveNum;
					$nextTurnColor	= 'black';
				}else{
					$queryNote		= 'UPDATE '.dbPre.'moves SET blackMove="'.$moveNote.'" WHERE gameID="'.$gameID.'" AND moveNum="'.$moveNum.'"';
					$nextMoveNum	= $moveNum + 1;
					$nextTurnColor	= 'white';
				}
				@mysql_query($queryNote)or die('<div class="error">'.errorDBStr.' (mv-1)</div>');
				//--format the array and throw it into the DB, then send out the new array
				$newLocationsDB 	= serialize($newLocations);
				$thisMove			= serialize($thisMove);
				$now			 	= date(YmdHis);
				$color				= ($playerColor == 'd')? 'b' : 'w';
				$queryMove 			= 'UPDATE '.dbPre.'games SET setup=\''.$newLocationsDB.'\', nextMoveNum="'.$nextMoveNum.'", nextTurnColor="'.$nextTurnColor.'", '.$color.'Castle=\''.$canCastle.'\', lastMove=\''.$thisMove.'\', gameDate="'.$now.'", reqDraw="0", reqUndo="0" WHERE gameID="'.$gameID.'"';
				mysql_query($queryMove)or die('<div class="error">'.errorDBStr.' (mv-2)</div>');
				if(isset($checkmate)){
					include('game_func.php');
					mated($oppID,$gameID,$matedStr);
				}
				if($emailMove){
					//--email move
					include('config.php');
					$queryemail		= 'SELECT email FROM '.dbPre.'players WHERE id="'.$oppID.'" LIMIT 1';
					$resultemail	= mysql_query($queryemail)or die('<div class="error">'.errorDBStr.' (mv-3)</div>');
					$addr			= mysql_result($resultemail,0,'email');
					$message		= $emailStr[1].$_SESSION['vs'.$gameID].$emailStr[2].$_SESSION['name'].$emailStr[3].$moveNote.$emailStr[4].$gameID.')'."\n\r http://".$domain;
					$headers  	= 'MIME-Version: 1.0
Content-type: text/plain; charset=iso-8859-1
Date: '.date("r").'
X-Priority: 3
X-Mailer: Some Chess
';
					$headers 	.= 'From: "Some Chess" <somechess@'.$domain.'>';
					if($addr) mail($addr,$emailStr[0],$message,$headers);
				}
				return $newLocations;
			}
		}
	}else{
		echo '<div id="info" class="badMove">',$message,'</div>';
		return $locations;
	}
}
?>