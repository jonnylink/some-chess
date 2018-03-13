<?PHP
//		Some Chess, a PHP multi-player chess server.
//		Copyright (C) 2007 Jon Link
function installCheck(){
	$query 		= 'SELECT 1 FROM '.dbPre.'players LIMIT 0';
	$result 	= @mysql_query($query);
	if($result) return true;
	return false;
}
function updateCheck(){
	$query 		= 'SELECT optionValue FROM '.dbPre.'options WHERE id="0" LIMIT 1';
	$result 	= @mysql_query($query);
	$curVer		= @mysql_result($result,0,'optionValue');
	if(!$curVer) $curVer = '2.0a9'; //if there is no version number assume it is old
	if(ver2num($curVer) >= ver2num(shortVer)) return true;
	return false;
}
function ver2num($ver){
	if(strpos($ver,'a')){
		$ver	= preg_replace('/[a-z]*/','',$ver);
		$ver	= $ver + 10;
	}elseif(strpos($ver,'b')){
		$ver	= preg_replace('/[a-z]*/','',$ver);
		$ver	= $ver + 20;	
	}elseif(strpos($ver,'rc')){
		$ver	= preg_replace('/[a-z]*/','',$ver);
		$ver 	= $ver + 30;	
	}else{
		$ver	= $ver + 40;	
	}
	$nums 		= explode('.',$ver);
	$ver		= $nums[0] + $nums[1];
	return $ver;
}
function install($database,$indexStr){
	include('config.php');
	$instlFile		= 'MYSQL';
	$databaseQuery	= 'CREATE DATABASE IF NOT EXISTS '.$database;
	@mysql_query($databaseQuery)or die('<div class="error">'.$indexStr[0].' (in-1)</div></body></html>');	
	$tableSQL	 	= file_get_contents($instlFile);
	$tableSQL		= explode(';',$tableSQL);
	$SQLCount		= count($tableSQL);
	for($i=0;$i<$SQLCount;++$i){
		if(strpos($tableSQL[$i],'--') === false && $tableSQL[$i] !=='') $install = @mysql_query(addPrefix($tableSQL[$i],dbPre))or die('<div class="error">'.$indexStr[1].' (in-2.'.$i.')</div></body></html>');
	}
	$dbInfo = array(5 => $host, 10 => $dbUser, 15 => $dbPass, 20 => $database, 25 => dbPre);	
	for($i=1;$i<6;++$i){
		$configQuery = 'UPDATE '.dbPre.'options SET optionValue = "'.$dbInfo[$i*5].'" WHERE id='.$i*5;
		$install = @mysql_query($configQuery)or die('<div class="error">'.$indexStr[1].' (in-3.'.$i.')</div></body></html>');
	}
	if($install) return $indexStr[2];
	return false;
}
function update($indexStr){
	$update			= false;
	$updtFile		= 'MYSQL_UPDATE';
	$tableSQL	 	= file_get_contents($updtFile);
	$tableSQL		= explode(';',$tableSQL);
	$SQLCount		= count($tableSQL);
	for($i=0;$i<$SQLCount;++$i){
		if(strpos($tableSQL[$i], 'added') !== false && !$update){
			$version = preg_replace('/--added [\d.]* \(v/','',$tableSQL[$i]);
			$version = trim(str_replace(')','',$version));
			if(version_compare($version,shortVer) == 0) $update = true;		
		}
		if($update) if(strpos($tableSQL[$i],'--') === false && $tableSQL[$i] !=='') $updated = @mysql_query(addPrefix($tableSQL[$i],dbPre))or die('<div class="error">'.$indexStr[3].' (up-1.'.$i.') '.$tableSQL[$i].'</div></body></html>');
	}
	if(ver2num(shortVer) <= ver2num('2.0b5')) $updated = updateStats($indexStr[3]);
	if($updated) return $indexStr[4];
	return false;
}

//--update to fill in the current wins, loses, draws (when upgrading from version > 2.0b5 only)
function updateStats($error){
	$queryPlayer		= 'SELECT id FROM '.dbPre.'players';
	$resultPlayer		= @mysql_query($queryPlayer)or die('<div class="error">'.$error.' (us-1)</div></body></html>');
	$numPlayer			= @mysql_num_rows($resultPlayer);
	$queryGames			= 'SELECT winner, whitePlayerID, blackPlayerID FROM '.dbPre.'games WHERE winner!="0"';
	$resultGames		= @mysql_query($queryGames)or die('<div class="error">'.$error.' (us-2)</div></body></html>');
	$numGames			= @mysql_num_rows($resultGames);
	for($i=0;$i<$numPlayer;++$i){
		unset($wins,$loses,$draws);	
		$playerID = @mysql_result($resultPlayer,$i,'id');
		for($x=0;$x<$numGames;++$x){
			if(@mysql_result($resultGames,$x,'winner') == $playerID) ++$wins;
			if(@mysql_result($resultGames,$x,'winner') == 'D' && (@mysql_result($resultGames,$x,'whitePlayerID') == $playerID || @mysql_result($resultGames,$x,'blackPlayerID') == $playerID)) ++$draws;
			if(@mysql_result($resultGames,$x,'winner') != $playerID && @mysql_result($resultGames,$x,'winner') != 'D' && @mysql_result($resultGames,$x,'winner') != 'X' && (@mysql_result($resultGames,$x,'whitePlayerID') == $playerID || @mysql_result($resultGames,$x,'blackPlayerID') == $playerID)) ++$loses;
		}
		$points			= $wins + ($draws/2);
		$query 			= 'UPDATE '.dbPre.'players SET wins="'.$wins.'", loses="'.$loses.'", draws="'.$draws.'", points="'.$points.'" WHERE id="'.$playerID.'"';
		@mysql_query($query)or die('<div class="error">'.$error.' (us-3.'.$i.')</div></body></html>');
	}
	return true;
}
function addPrefix($dbStr,$dbPre){
	$search		= array('chat (','complete (','games (','moves (','players (','options (','options VALUES');
	$replace	= array($dbPre.'chat (', $dbPre.'complete (', $dbPre.'games (', $dbPre.'moves (', $dbPre.'players (', $dbPre.'options (', $dbPre.'options VALUES');
	$dbStr		= str_replace($search,$replace,$dbStr);
	return $dbStr;
}
function versionCompare(){
	$contents	= file_get_contents('http://somechess.org/web/version.rss');
	$newVer		= preg_replace('/[\W\S\.]*<description>/','',$contents);
	$newVer		= preg_replace('/<\/description>[\W\S\.]*/','',$newVer);	
	if(ver2num(shortVer) < ver2num($newVer)){
		return $adminStr[12].': <a href="http://somechess.org/web/" target="_NEW">'.$newVer.' ('.$adminStr[13].')</a>';
	}else{
		return $adminStr[14].': '.shortVer;
	}
}
?>