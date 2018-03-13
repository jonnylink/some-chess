<?php
//--GET USER'S INFO
	$queryPlayer		= 'SELECT * FROM '.dbPre.'players WHERE id="'.$_SESSION['id'].'" LIMIT 1';
	$resultPlayer		= mysql_query($queryPlayer)or die('<div class="error">'.errorDBStr.' (mp-1)</div>');	
	$name				= mysql_result($resultPlayer,0,'name');
	$realname			= mysql_result($resultPlayer,0,'realname');
	$email				= mysql_result($resultPlayer,0,'email');
	$location			= mysql_result($resultPlayer,0,'location');
	$power				= mysql_result($resultPlayer,0,'power');
	
//--GET OTHER PLAYER'S INFO
	$queryVS			= 'SELECT * FROM '.dbPre.'players WHERE id !="'.$_SESSION['id'].'" && invitedBy > -1 ORDER BY name';
	$resultVS			= mysql_query($queryVS)or die('<div class="error">'.errorDBStr.' (mp-2)</div>');
	$numVS				= mysql_num_rows($resultVS);
	for($i=0;$i<$numVS;++$i){
		$key			= mysql_result($resultVS,$i,'id');
		$VSid[$i]		= $key;
		$VSname[$key]	= mysql_result($resultVS,$i,'name');
	}
	
//--DISPLAY MENU PANEL & DIALOG WINDOW
	$dialog				= ($message)? $message : $menuStr[39].$_SESSION['name'].$admin_message;
	
//--DISPLAY SUBMENU
		echo '		<div class="submenu">
			<a href="menu.php?do=games&amp;games=inprogress" class="subitem">'.$menuStr[15].'</a>
			<a href="menu.php?do=games&amp;games=won" class="subitem">'.$menuStr[10].'</a>
			<a href="menu.php?do=games&amp;games=lost" class="subitem">'.$menuStr[11].'</a>
			<a href="menu.php?do=games&amp;games=drawn" class="subitem">'.$menuStr[12].'</a>
			<!--<a href="menu.php?do=games&amp;games=drawn" class="subitem">',$menuStr[42],'</a>-->
			<a href="menu.php?do=games&amp;games=other" class="subitem">',$menuStr[34],'</a>
			<a href="menu.php?do=importpgn" class="subitem">',$menuStr[25],'</a>
		</div>';

//--DISPLAY GAMES: CURRENT, WINS, LOSES, DRAWS
		echo '
		<div class="large-panel">';	
		if($_GET['games'] == 'inprogress' || !$_GET['games']){
			echo'
			<div class="gamesbox">
				<h2>',$name.$menuStr[9].' '.$menuStr[15].'</h2>
				<ul>
					';
			$queryGames			= 'SELECT * FROM '.dbPre.'games WHERE winner="0" AND (whitePlayerID="'.$_SESSION['id'].'" OR blackPlayerID="'.$_SESSION['id'].'") ORDER BY gameID DESC';
			$resultGames		= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (mg-1)</div>');	
			$gamesNum			= mysql_num_rows($resultGames);
			if($gamesNum == 0) echo'<li>( None )</li>';
			$tooOld 			= date(YmdHis, mktime(0, 0, 0, date(m), date(d)-$endDays, date(Y)));
			for($i=0;$i<$gamesNum;++$i){
				unset($turns,$end);
				$gameID			= mysql_result($resultGames,$i,'gameID');
				$blackID		= mysql_result($resultGames,$i,'blackPlayerID');
				$whiteID		= mysql_result($resultGames,$i,'whitePlayerID');
				$nTC			= mysql_result($resultGames,$i,'nextTurnColor');
				$draw			= mysql_result($resultGames,$i,'reqDraw');	
				$undo			= mysql_result($resultGames,$i,'reqUndo');	
				if(mysql_result($resultGames,$i,'gameDate')<$tooOld) $end = true;
				if($gameDate<$tooOld && $gameDate) $end = true;
				if($blackID == $_SESSION['id']){$oppName = $VSname[$whiteID];$playerColor='black';}else{$oppName = $VSname[$blackID];$playerColor='white';}
				if($nTC == $playerColor) $turns = '<span class="note"> <img src="img/go.png" alt="'.$menuStr[26].'" /></span>';
//				if($nTC == $playerColor) $turns = '<span class="note"> &mdash;'.$menuStr[26].'</span>';
				if($undo && $undo !== $_SESSION['id']){
					$turns = '<span class="attn"> <img src="img/undo.png" alt="'.$menuStr[29].'" /></span>'; 
//					$turns = '<span class="attn"> &mdash;'.$menuStr[29].'</span>'; 
				}
				if($draw){ 
					$turns = '<span class="attn"> <img src="img/draw.png" alt="'.$menuStr[28].'" /></span>'; 
//					$turns = '<span class="attn"> &mdash;'.$menuStr[28].'</span>'; 
				}
				if($end && $nTC !== $playerColor && $endDays){ 
//					$turns = '<span class="attn"> &mdash;'.$menuStr[27].'</span>';
					$turns = '<span class="attn"> <img src="img/end.png" alt="'.$menuStr[27].'" /></span>';
				}
				echo '
					<li><a href="game.php?do=display&amp;gameID='.$gameID.'&amp;vs='.(str_replace(' ','_',$oppName)).'" class="gamelink">#'.$gameID.' &#8658; '.$oppName.$turns.'</a></li>';
			}
		}elseif($_GET['games'] == 'won'){
			echo'
			<div class="gamesbox">
				<h2>',$name.$menuStr[9].' '.$menuStr[10].'</h2>
				<ul>
			';
			$queryGames			= 'SELECT * FROM '.dbPre.'games WHERE winner="'.$_SESSION['id'].'" ORDER BY gameID DESC'; 
			$resultGames		= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (mg-2)</div>');	
			$wins				= mysql_num_rows($resultGames);
			if($wins == 0) echo'<li>( None )</li>';
			for($i=0;$i<$wins;++$i){
				$gameID			= mysql_result($resultGames,$i,'gameID');
				$blackID		= mysql_result($resultGames,$i,'blackPlayerID');
				$whiteID		= mysql_result($resultGames,$i,'whitePlayerID');
				$oppName 		= ($blackID == $_SESSION['id'])? $VSname[$whiteID] : $VSname[$blackID];
				echo '
				<li><a href="game.php?do=display&amp;gameID='.$gameID.'&amp;vs='.(str_replace(' ','_',$oppName)).'&amp;status=view" class="gamelink">#'.$gameID.' Vs. '.$oppName.'</a></li>';
			}
		}elseif($_GET['games'] == 'lost'){	
			echo'
			<div class="gamesbox">
				<h2>',$name.$menuStr[9].' '.$menuStr[11].'</h2>
				<ul>
			';
			$queryGames			= 'SELECT * FROM '.dbPre.'games WHERE winner !="'.$_SESSION['id'].'" AND winner !="0" AND winner !="D" AND winner !="X" AND (blackPlayerID='.$_SESSION['id'].' OR whitePlayerID='.$_SESSION['id'].') ORDER BY gameID DESC';
			$resultGames		= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (mg-3)</div>');	
			$loses				= mysql_num_rows($resultGames);
			if($loses == 0) echo'<p>( None )</p>';
			for($i=0;$i<$loses;++$i){
				$gameID			= mysql_result($resultGames,$i,'gameID');
				$blackID		= mysql_result($resultGames,$i,'blackPlayerID');
				$whiteID		= mysql_result($resultGames,$i,'whitePlayerID');
				$oppName 		= ($blackID == $_SESSION['id'])? $VSname[$whiteID] : $VSname[$blackID];
				echo '<li><a href="game.php?do=display&amp;gameID='.$gameID.'&amp;vs='.(str_replace(' ','_',$oppName)).'&amp;status=view" class="gamelink">#'.$gameID.' Vs. '.$oppName.'</a></li>';
			}
		}elseif($_GET['games'] == 'drawn'){	
			echo'
			<div class="gamesbox">
				<h2>',$name.$menuStr[9].' '.$menuStr[12].'</h2>
				<ul>
			';
			$queryGames			= 'SELECT * FROM '.dbPre.'games WHERE winner="D" AND (blackPlayerID='.$_SESSION['id'].' OR whitePlayerID='.$_SESSION['id'].') ORDER BY gameID DESC';
			$resultGames		= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (mg-4)</div>');	
			$draws				= mysql_num_rows($resultGames);
			if($draws == 0) echo'<p>( None )</p>';
			for($i=0;$i<$draws;++$i){
				$gameID			= mysql_result($resultGames,$i,'gameID');
				$blackID		= mysql_result($resultGames,$i,'blackPlayerID');
				$whiteID		= mysql_result($resultGames,$i,'whitePlayerID');
				$oppName 		= ($blackID == $_SESSION['id'])? $VSname[$whiteID] : $VSname[$blackID];
				echo '<li><a href="game.php?do=display&amp;gameID='.$gameID.'&amp;vs='.(str_replace(' ','_',$oppName)).'&amp;status=view" class="gamelink">#'.$gameID.' Vs. '.$oppName.'</a></li>';
			}
		}elseif($_GET['games'] == 'other'){	
			echo'<div class="gamesbox">
				<h2>'.$menuStr[30].'</h2>
				<ul>
					<li><h3>'.$menuStr[31].'</h3>
						<ul>';
			$queryGames			= 'SELECT * FROM '.dbPre.'games WHERE winner="0" AND blackPlayerID !="'.$_SESSION['id'].'" AND whitePlayerID !="'.$_SESSION['id'].'" ORDER BY gameID DESC';
			$resultGames		= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (mg-5)</div>');	
			$otherGames			= mysql_num_rows($resultGames);
			if($otherGames == 0) echo'<p>( None )</p>';
			for($i=0;$i<$otherGames;++$i){
				$gameID			= mysql_result($resultGames,$i,'gameID');
				$blackID		= mysql_result($resultGames,$i,'blackPlayerID');
				$whiteID		= mysql_result($resultGames,$i,'whitePlayerID');
				$whiteName = $VSname[$whiteID];
				$blackName = $VSname[$blackID];
				echo '
							<li><a href="game.php?do=display&amp;gameID='.$gameID.'&amp;status=view" class="gamelink">#'.$gameID.' '.$whiteName.' Vs. '.$blackName.'</a></li>';
			}
			echo'
						</ul>
					</li>
					<li><h3>'.$menuStr[32].'</h3>
						<ul>';
			$queryGames			= 'SELECT * FROM '.dbPre.'games WHERE winner !=="0" AND blackPlayerID !="'.$_SESSION['id'].'" AND whitePlayerID !="'.$_SESSION['id'].'"  ORDER BY gameID DESC';
			$resultGames		= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (mg-6)</div>');	
			$otherGames			= mysql_num_rows($resultGames);
			if($otherGames == 0) echo'<li>( None )</li>';
			for($i=0;$i<$otherGames;++$i){
				$gameID			= mysql_result($resultGames,$i,'gameID');
				$blackID		= mysql_result($resultGames,$i,'blackPlayerID');
				$whiteID		= mysql_result($resultGames,$i,'whitePlayerID');
				$whiteName = $VSname[$whiteID];
				$blackName = $VSname[$blackID];
				echo '
							<li><a href="game.php?do=display&amp;gameID='.$gameID.'&amp;status=view" class="gamelink">#'.$gameID.' '.$whiteName.' Vs. '.$blackName.'</a></li>';
			}
			echo'
						</ul>
					</li>';
/* --THIS IS REDUNDANT AND MEANS MORE LOAD TIME
					<li><h3>'.$menuStr[33].'</h3>
						<ul>';
			$queryGames			= 'SELECT * FROM '.dbPre.'games WHERE blackPlayerID ="'.$_SESSION['id'].'" OR whitePlayerID ="'.$_SESSION['id'].'" ORDER BY gameID DESC';
			$resultGames		= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (mg-7)</div>');	
			$otherGames			= mysql_num_rows($resultGames);
			if($otherGames == 0) echo'<li>( None )</li>';
			for($i=0;$i<$otherGames;++$i){
				unset($whiteName,$blackName);
				$gameID			= mysql_result($resultGames,$i,'gameID');
				$blackID		= mysql_result($resultGames,$i,'blackPlayerID');
				$whiteID		= mysql_result($resultGames,$i,'whitePlayerID');
				$whiteName = $VSname[$whiteID];
				$blackName = $VSname[$blackID];
				if($whiteName || $blackName)echo '
							<li><a href="game.php?do=display&amp;gameID='.$gameID.'&amp;status=view" class="gamelink">#'.$gameID.' Vs. '.$whiteName.$blackName.'</a></li>';
			}
			echo'
						</ul>
					</li>';*/
		}
		echo '
				</ul>
			</div><!--gamesbox-->
		</div><!--display-box-->';		
//--START NEW GAME & USERS ONLINE
	echo'<form action="menu.php" method="post" class="medium-panel">
				<h2>'.$menuStr[0].'</h2>
				<p>'.$menuStr[1].'<select name="vs"><option value=""></option>';
	for($i=0;$i<$numVS;++$i){
		$key	= $VSid[$i];
		if($_SESSION['id'] != $key){
			echo'<option value="'.$key.'">'.$VSname[$key].'</option>';
		}
	}
	echo'</select></p>
				<p>'.$menuStr[2].'<select name="color">
					<option value="random">'.$colorStr[2].'</option>
					<option value="white">'.$colorStr[0].'</option>
					<option value="black">'.$colorStr[1].'</option>
				</select></p>
				<p>'.$menuStr[40].'<select name="gameType">
					<option value="standard">'.$menuStr[41].'</option>
					<option value="random">'.$colorStr[2].' (beta)</option>
				</select></p>
				<p><input type="hidden" name="do" value="newGame" />
				<input type="submit" value="'.$buttStr[0].'" class="butt" /></p>
			</form><!--new game-->
			';
//--SHOW PLAYER QUICK STATS	
		$wins	= mysql_result($resultPlayer,0,'wins');
		$loses	= mysql_result($resultPlayer,0,'loses');
		$draws	= mysql_result($resultPlayer,0,'draws');
		$points	= round(mysql_result($resultPlayer,0,'points'));
		$played	= $wins + $loses + $draws;
		echo'<div class="small-panel righty">
				<h2>',$statsStr[31],'</h2>
				<img src="',$playerImgDir,'/',$_SESSION['pic'],'" alt="user\'s image" />
				<p><span class="stat-column">'.$statsStr[27].':</span>'.$wins.'</p>
				<p><span class="stat-column">'.$statsStr[28].':</span>'.$loses.'</p>
				<p><span class="stat-column">'.$statsStr[29].':</span>'.$draws.'</p>
				<p><span class="stat-column">'.$statsStr[17].':</span>'.$points.'</p>
				<p><span class="stat-column">'.$statsStr[30].':</span>'.$played.'</p>
			</div><!--personal stats-->
			';		
//--PLAYERS THAT ARE ONLINE
		$onNum = 0;
		for($i=0;$i<$numVS;++$i){
			if(mysql_result($resultVS,$i,'online') == 1 && (mysql_result($resultVS,$i,'timeOnline') + 5)>=date(YmdHi)){
				$onliners	.= '<li><a href="players.php?statID='.mysql_result($resultVS,$i,'id').'">'.mysql_result($resultVS,$i,'name').'</a></li>';
				++$onNum;
			}
		}
		if(!$onliners) $onliners	= '<li></li>';
		$online = '
				<h3>'.$menuStr[8].' ('.$onNum.')</h3>
				<ul id="onliners">
					'.$onliners.'
				</ul>';
//--SHOW DIALOG & MESSAGES
		echo'<div id="dialog-window">'.$dialog.' '.$online.'</div>';
?>