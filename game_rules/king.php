<?php
//$kingMove['error'] = ''; //DEBUGGING
function kingRules($locations,$newSpot,$oldSpot,$playerColor,$canCastle,$lastMove,$gametype,$kingStr=null){
	//--catch castling
	if($gametype !== 'R'){
		if($oldSpot{0} == 'e' && ($newSpot{0} == 'c' || $newSpot{0} == 'g') && $canCastle['k'] == 0){
			$kingMove['error'] = $kingStr[0];	//can't castle once king has moved
		}elseif($oldSpot{0} == 'e' && ($newSpot{0} == 'c' || $newSpot{0} == 'g') && substr($lastMove['move'],-1) == '+'){
			$kingMove['error'] = $kingStr[1];	//can't castle to get out of check
		}elseif($playerColor == 'l'){
			//---castling white
			if($newSpot == 'c1' && $oldSpot == 'e1' && $locations['a1'] == 'rl'){
				if($canCastle['a'] == 0)		$kingMove['error'] = $kingStr[2];	//can't castle after rook moves
				if($locations[$newSpot] !='') 	$kingMove['error'] = $kingStr[3];	//can't castle with lane blocked
				if($locations['d1'] !='') 		$kingMove['error'] = $kingStr[3];	//can't castle with lane blocked
				if($locations['b1'] !='') 		$kingMove['error'] = $kingStr[3];	//can't castle with lane blocked
				if(aThreat('d1',$locations,'d'))	$kingMove['error'] = $kingStr[4]; //can't move the king into check
				if(!$kingMove['error']){
					$kingMove['rookSqF'] 	= 'a1';
					$kingMove['rookSqT'] 	= 'd1';
					$kingMove['castled'] = 'O-O-O';
				}
			}elseif($newSpot == 'g1' && $oldSpot == 'e1' && $locations['h1'] == 'rl'){
				if($canCastle['h'] == 0)		$kingMove['error'] = $kingStr[2];
				if($locations[$newSpot] !='') 	$kingMove['error'] = $kingStr[3];
				if($locations['f1'] !='') 		$kingMove['error'] = $kingStr[3];
				if(aThreat('f1',$locations,'d'))	$kingMove['error'] = $kingStr[4];
				if(!$kingMove['error']){
					$kingMove['rookSqF'] 	= 'h1';
					$kingMove['rookSqT'] 	= 'f1';
					$kingMove['castled'] 	= 'O-O';
				}
			}
		}elseif($playerColor == 'd'){
			//---castling black
			if($newSpot == 'c8' && $oldSpot == 'e8' && $locations['a8'] == 'rd'){
				if($canCastle['a'] == 0)		$kingMove['error'] = $kingStr[2];
				if($locations[$newSpot] !='') 	$kingMove['error'] = $kingStr[3];
				if($locations['d8'] !='') 		$kingMove['error'] = $kingStr[3];
				if($locations['b8'] !='') 		$kingMove['error'] = $kingStr[3];
				if(aThreat('d8',$locations,'l'))	$kingMove['error'] = $kingStr[4];
				if(!$kingMove['error']){
					$kingMove['rookSqF'] 	= 'a8';
					$kingMove['rookSqT'] 	= 'd8';
					$kingMove['castled'] 	= 'O-O-O';
				}
			}elseif($newSpot == 'g8' && $oldSpot == 'e8' && $locations['h8'] == 'rd'){
				if($canCastle['h'] == 0)		$kingMove['error'] = $kingStr[2];
				if($locations[$newSpot] !='') 	$kingMove['error'] = $kingStr[3];
				if($locations['f8'] !='') 		$kingMove['error'] = $kingStr[3];
				if(aThreat('f8',$locations,'l'))	$kingMove['error'] = $kingStr[4];
				if(!$kingMove['error']){
					$kingMove['rookSqF'] 	= 'h8';
					$kingMove['rookSqT'] 	= 'f8';
					$kingMove['castled'] 	= 'O-O';
				}
			}
		}
	}else{
	//--castling rules for random games
		$oppColor = ($playerColor == 'l')? 'd' : 'l';
		if($oldSpot{0} == 'e' && ($newSpot{0} == 'c' || $newSpot{0} == 'g') && $canCastle['k'] == 0){
			$kingMove['error'] = $kingStr[0];	//can't castle once king has moved
		}elseif(ord($newSpot{0}) == (ord($oldSpot{0})-2) && $newSpot{1} == $oldSpot{1} && $canCastle['k'] == 0){
			$kingMove['error'] = $kingStr[0];	//can't castle once king has moved
		}elseif(ord($newSpot{0}) == (ord($oldSpot{0})+2) && $newSpot{1} == $oldSpot{1} && $canCastle['k'] == 0){
			$kingMove['error'] = $kingStr[0];	//can't castle once king has moved
		}elseif($oldSpot{0} == 'e' && ($newSpot{0} == 'c' || $newSpot{0} == 'g') && substr($lastMove['move'],-1) == '+'){
			$kingMove['error'] = $kingStr[1];	//can't castle to get out of check
		}elseif(ord($newSpot{0}) == (ord($oldSpot{0})+2) && $newSpot{1} == $oldSpot{1}){
		//---castling to kingside
			for($x=0;!$rookSqF;++$x){
				$sq_check = (chr(ord($oldSpot{0})+$x)).$oldSpot{1};
				if($locations[$sq_check]{0} == 'r') $rookSqF = $sq_check;
			}
			$num			= (ord($sq_check{0}) - ord($oldSpot{0})) - 1;
			for($x=0;$x<$num;++$x){
				$sq_check 	= chr(ord($oldSpot{0}) +1 +$x).$newSpot{1};				
				if($locations[$sq_check] != '' && $locations[$sq_check]{0} !== 'r') $kingMove['error'] = $kingStr[3];		
			}
			if(aThreat('',$locations,$oppColor))	$kingMove['error'] = $kingStr[4];
			if(!$kingMove['error']){
				$kingMove['rookSqF'] 	= $rookSqF;
				$kingMove['rookSqT'] 	= chr(ord($newSpot{0})-1).$oldSpot{1};
				$kingMove['castled'] 	= 'O-O';
			}
		}elseif(ord($newSpot{0}) == (ord($oldSpot{0})-2) && $newSpot{1} == $oldSpot{1}){
		//---castling to queenside 
			for($x=0;!$rookSqF;++$x){
				$sq_check = (chr(ord($oldSpot{0})-$x)).$oldSpot{1};
				if($locations[$sq_check]{0} == 'r') $rookSqF = $sq_check;
			}
			$num			= (ord($oldSpot{0}) - ord($sq_check{0})) - 1;
			for($x=0;$x<$num;++$x){
				$sq_check 	= chr(ord($oldSpot{0}) -1 -$x).$newSpot{1};
				if($locations[$sq_check] != '' && $locations[$sq_check]{0} !== 'r') $kingMove['error'] = $kingStr[3];
			}
			if(aThreat('',$locations,$oppColor))	$kingMove['error'] = $kingStr[4];
			if(!$kingMove['error']){
				$kingMove['rookSqF'] 	= $rookSqF;
				$kingMove['rookSqT'] 	= chr(ord($newSpot{0})+1).$oldSpot{1};
				$kingMove['castled'] 	= 'O-O-O';
			}
		}elseif(ord($newSpot{0}) == (ord($oldSpot{0})+1) && $newSpot{1} == $oldSpot{1} && $locations[$newSpot]{0} == 'r'){
		//---king & rook are in right corner
			if(aThreat('',$locations,$oppColor))	$kingMove['error'] = $kingStr[4];
			if(!$kingMove['error']){
				$kingMove['rookSqF'] 	= $newSpot;
				$kingMove['rookSqT'] 	= $oldSpot;
				$kingMove['castled'] 	= 'O-O';			
			}
		}elseif(ord($newSpot{0}) == (ord($oldSpot{0})-1) && $newSpot{1} == $oldSpot{1} && $locations[$newSpot]{0} == 'r'){
		//---king & rook are in left corner
			if(aThreat('',$locations,$oppColor))	$kingMove['error'] = $kingStr[4];
			if(!$kingMove['error']){
				$kingMove['rookSqF'] 	= $newSpot;
				$kingMove['rookSqT'] 	= $oldSpot;
				$kingMove['castled'] 	= 'O-O-O';			
			}
		}
	}
	//--normal movement
	if(!$kingMove['castled'] && !$kingMove['error']){
		if($newSpot{1} > $oldSpot{1} + 1) 	$kingMove['error'] = $kingStr[5];
		if($newSpot{1} < $oldSpot{1} - 1) 	$kingMove['error'] = $kingStr[5];
		if(ord($newSpot{0}) > ord($oldSpot{0}) + 1) $kingMove['error'] = $kingStr[5];
		if(ord($newSpot{0}) < ord($oldSpot{0}) - 1) $kingMove['error'] = $kingStr[5];
	}
	return $kingMove;
}
?>