<?php
function aThreat($threatSq,$locations,$attackColor,$kingOkay=true){
	$defenseColor = ($attackColor == 'd')? 'l' : 'd';
	//--see if king is in check along COLUMN
	//ascending
	$num				= 8 - $threatSq{1};
	for($x=1;$x<=$num;++$x){
		$square			= $threatSq{0}.($threatSq{1} + $x);
		$piece			= $locations[$square];
		if($piece{1} == $defenseColor){
			break; // once we find a piece the defender owns we know that path is blocked
		}elseif($piece{1} == $attackColor){
			if($piece{0} == 'r' || $piece{0} == 'q'){
				$check[]	= $square;
				break; // stop searching, we've found what we are looking for
			}elseif($piece{0} == 'k' && $x == 1 && $kingOkay){
				$check[]	= $square;
				break; // stop searching, we've found what we are looking for
			}else{
				break; // if the piece is not a king queen or rook it can't attack the square AND it is blocking any other piece from attacking
			}
		}
	}
	//desceneding
	$num				= $threatSq{1} - 1;
	for($x=1;$x<=$num;++$x){
		$square			= $threatSq{0}.($threatSq{1} - $x);
		$piece			= $locations[$square];
		if($piece{1} == $defenseColor){
			break;
		}elseif($piece{1} == $attackColor){
			if($piece{0} == 'r' || $piece{0} == 'q'){
				$check[]	= $square;
				break;
			}elseif($piece{0} == 'k' && $x == 1 && $kingOkay){
				$check[]	= $square;
				break;
			}else{
				break;
			}
		}
	}
	//--see if king is in check along ROW
	//left to right
	$num				= 104 - ord($threatSq{0});
	for($x=1;$x<=$num;++$x){
		$square			= chr(ord($threatSq{0}) + $x).$threatSq{1};
		$piece			= $locations[$square];	
		if($piece{1} == $defenseColor){
			break;
		}elseif($piece{1} == $attackColor){
			if($piece{0} == 'r' || $piece{0} == 'q'){
				$check[]	= $square;
				break;
			}elseif($piece{0} == 'k' && $x == 1 && $kingOkay){
				$check[]	= $square;
				break;
			}else{
				break;
			}
		}
	}
	//right to left
	$num				= ord($threatSq{0}) - 97;
	for($x=1;$x<=$num;++$x){
		$square			= chr(ord($threatSq{0}) - $x).$threatSq{1};
		$piece			= $locations[$square];
		if($piece{1} == $defenseColor){
			break;
		}elseif($piece{1} == $attackColor){
			if($piece{0} == 'r' || $piece{0} == 'q'){
				$check[]	= $square;
				break;
			}elseif($piece{0} == 'k' && $x == 1 && $kingOkay){
				$check[]	= $square;
				break;
			}else{
				break;
			}
		}
	}
	//--see if king is in check along DIAGONALS
	//down and left
	$num				= 8-$threatSq{1};
	for($x=1;$x<=$num;++$x){
		$squareA				= ord($threatSq{0}) + $x;
		if($squareA <= 104){
			$square 			= chr($squareA).($threatSq{1} + $x);
			$piece				= $locations[$square];
			if($piece{1} == $defenseColor){
				break;
			}elseif($piece{1} == $attackColor){
				if($piece{0} == 'b' || $piece{0} == 'q'){
					$check[]	= $square;
					break;
				}elseif($piece{0} == 'p' && $x == 1 && $attackColor == 'd' && !empty($locations[$threatSq])){
					$check[]	= $square;
					break;
				}elseif($piece{0} == 'k' && $x == 1 && $kingOkay){
					$check[]	= $square;
					break;
				}else{
					break;
				}
			}
		}
	}
	//down and right
	$num				= 8-$threatSq{1};
	for($x=1;$x<=$num;++$x){
		$squareA				= ord($threatSq{0}) - $x;
		if($squareA >= 97){
			$square 			= chr($squareA).($threatSq{1} + $x);
			$piece				= $locations[$square];
			if($piece{1} == $defenseColor){
				break;
			}elseif($piece{1} == $attackColor){
				if($piece{0} == 'b' || $piece{0} == 'q'){
					$check[]	= $square;
					break;
				}elseif($piece{0} == 'p' && $x == 1 && $attackColor == 'd' && !empty($locations[$threatSq])){
					$check[]	= $square;
					break;
				}elseif($piece{0} == 'k' && $x == 1 && $kingOkay){
					$check[]	= $square;
					break;
				}else{
					break;
				}
			}
		}
	}		
	//up and right
	$num				= $threatSq{1}-1;
	for($x=1;$x<=$num;++$x){
		$squareA				= ord($threatSq{0}) + $x;
		if($squareA <= 104){
			$square 			= chr($squareA).($threatSq{1} - $x);
			$piece				= $locations[$square];
			if($piece{1} == $defenseColor){
				break;
			}elseif($piece{1} == $attackColor){
				if($piece{0} == 'b' || $piece{0} == 'q'){
					$check[]	= $square;
					break;
				}elseif($piece{0} == 'p' && $x == 1 && $attackColor == 'l' && !empty($locations[$threatSq])){
					$check[]	= $square;
					break;
				}elseif($piece{0} == 'k' && $x == 1 && $kingOkay){
					$check[]	= $square;
					break;
				}else{
					break;
				}
			}
		}
	}
	//up and left
	$num				= $threatSq{1}-1;
	for($x=1;$x<=$num;++$x){
		$squareA				= ord($threatSq{0}) - $x;
		if($squareA >= 97){
			$square 			= chr($squareA).($threatSq{1} - $x);
			$piece				= $locations[$square];
			if($piece{1} == $defenseColor){
				break;
			}elseif($piece{1} == $attackColor){
				if($piece{0} == 'b' || $piece{0} == 'q'){
					$check[]	= $square;
					break;
				}elseif($piece{0} == 'p' && $x == 1 && $attackColor == 'l' && !empty($locations[$threatSq])){
					$check[]	= $square;
					break;
				}elseif($piece{0} == 'k' && $x == 1 && $kingOkay){
					$check[]	= $square;
					break;
				}else{
					break;
				}
			}
		}
	}
	//--see if king is in check from KNIGHT
	//from far right
	$squareN[]	= chr(ord($threatSq{0}) - 2).($threatSq{1} + 1);
	$squareN[]	= chr(ord($threatSq{0}) - 2).($threatSq{1} - 1);
	//from far left
	$squareN[]	= chr(ord($threatSq{0}) + 2).($threatSq{1} + 1);
	$squareN[]	= chr(ord($threatSq{0}) + 2).($threatSq{1} - 1);
	//from near right
	$squareN[]	= chr(ord($threatSq{0}) - 1).($threatSq{1} + 2);
	$squareN[]	= chr(ord($threatSq{0}) - 1).($threatSq{1} - 2);
	//from near left
	$squareN[]	= chr(ord($threatSq{0}) + 1).($threatSq{1} + 2);
	$squareN[]	= chr(ord($threatSq{0}) + 1).($threatSq{1} - 2);
	//use the $squareN array to check for threatening knights
	for($x=0;$x<8;++$x){
		$square = $squareN[$x];
		$piece	= $locations[$square];
		if($piece{1} == $attackColor && $piece{0} == 'n'){
			$check[]	= $square;
		}
	}
	return $check;
}
?>