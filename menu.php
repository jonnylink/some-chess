<?php 
session_start(); 
/********************************************************************************
** "Some Chess" some rights reserved 2007
** Some Chess written by Jon Link
** 
** This program is free software; you can redistribute it and/or
** modify it under the terms of the GNU General Public License 
** as published by the Free Software Foundation; either version 2.1 
** of the License, or (at your option) any later version.
** 
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
** General Public License for more details.
** 
** You should have received a copy of the GNU General Public License 
** along with this program; if not, write to the Free Software Foundation, 
** Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
**
** The images found in the folder alt-pieces [p,r,n,q,k][d,l][d,l].png are GPL, 
** from Wikimedia Commons, see gpl.txt
**
** All other images are (c)Jon Link and may be used freely but only with permission
**
** a small portion of the code to display the chess board 
** was taken from phpChessBoard written by Andreas Stieger
**********************************************************************************/

require_once('config.php');
include_once('languages/'.$lang.'_main.php');
include_once('constants.php');
include_once('standard.php');
$do = ($_POST['do']) ? $_POST['do'] : $_GET['do'];
if($do == 'login' || !$do){
	$userName		= validate($_POST['username']);
	$password		= validate($_POST['password']);
	$add_reg_class = ($allowRegister)? ' reg' : null;
	include('login.php');
	$signin	= login($userName,$password,$loginStr,$add_reg_class);
	if($signin !== true){
		$error		= $signin;
		die(include('index.php'));
	}else{
		$do 		= 'games';
	}
}
require_once('loginon.php');
include('menu_bar.php')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Some Chess</title>
	<link rel="stylesheet" type="text/css" href="somechess.css" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<img src="img/head-right.png" alt="na" id="header-right-corner" />
		<div id="header-title">
			<h1>Some Chess</h1>
		</div><!--header-content-->
		<?php if($do != 'logout') echo $menu; ?>
	</div><!--header-->

	<div id="contents">
<?php
	online(); //--MAKE THE PERSON ACTIVELY ONLINE
//--VERIFY AND INITIATE MENU FUNCTIONS
	if($do == 'logout'){ 
		include('logout.php');
	}elseif($do == 'about'){
		include('about.html');
	}elseif($do == 'newGame'){
		$vs				= validate($_POST['vs']);
		$color		 	= validate($_POST['color']);
		$var			= validate($_POST['gameType']);
		if($color == 'white'){
			$wID = $_SESSION['id'];
			$bID = $vs;
		}elseif($color == 'black'){
			$bID = $_SESSION['id'];
			$wID = $vs;
		}else{
			include('menu_func.php');
			$bID = random_black($_SESSION['id'],$vs);
			$wID = ($bID == $vs)? $_SESSION['id'] : $vs;
		}
		include('game_func.php');
		$message = newGame($wID,$bID,$var,$gameFuncStr);
		unset($do);
	}elseif($do == 'chngInfo'){
		$pass1			= validate($_POST['pass1']);
		$pass2		 	= validate($_POST['pass2']);	
		$username		= validate($_POST['username']);
		$realname		= validate($_POST['realname']);
		$location		= validate($_POST['location']);
		$email			= validate($_POST['email']);
		$secQuestion	= validate($_POST['sec_question']);
		$secAnswer		= md5($_POST['sec_answer']);
		include('menu_func.php');
		$message = chngInfo($username,$pass1,$pass2,$realname,$location,$email,$secQuestion,$secAnswer,$menuFuncStr);
		unset($do);
	}elseif($do == 'invite'){
		$nameInv		= validate($_POST['name']);
		$emailInv		= validate($_POST['email']);
		$friend			= validate($_POST['friend']);
		include('menu_func.php');
		$message =  invite($nameInv,$emailInv,$friend,$domain,$homeFolder,$startPower,$menuFuncStr);
		unset($do);
	}elseif($do == 'resign'){
		$gameID			= validate($_POST['gameID']);
		$confirm		= $_POST['confirm'];
		if(!$confirm){
			echo '<form action="menu.php" method="post" class="dialog">
			<b class="dialog_t"><b class="xb1"></b><b class="xb2"></b><b class="xb3"></b><b class="xb4"></b></b>
			<div class="dialog_content">'.$gameFuncStr[8].'
			<input type="hidden" name="gameID" value="'.$gameID.'" />
			<input type="hidden" name="do" value="resign" />
			<input type="hidden" name="confirm" value="yes" />
			<input type="submit" value="'.$buttStr[4].'" class="butt" />
			</div>
			<b class="dialog_b"><b class="xb4"></b><b class="xb3"></b><b class="xb2"></b><b class="xb1"></b></b>
			</div>
			</form>';
		}else{
			include('game_func.php');
			$message = resign($gameID,$gameFuncStr);
			unset($do);
		}
	}elseif($do == 'draw' || $do == 'drawOK'){
		$gameID			= validate($_POST['gameID']);
		$confirm		= $_POST['confirm'];
		if(!$confirm){
			echo'<form action="menu.php" class="dialog" method="post" class="dialog">
			<b class="dialog_t"><b class="xb1"></b><b class="xb2"></b><b class="xb3"></b><b class="xb4"></b></b>
			<div class="dialog_content">';
			if($do == 'draw'){
				echo$gameFuncStr[9];
			}else{
				echo$gameFuncStr[16];
			}
			echo '
			<input type="hidden" name="gameID" value="'.$gameID.'" />
			<input type="hidden" name="do" value="draw" />
			<input type="hidden" name="confirm" value="yes" />
			<input type="submit" value="'.$buttStr[5].'" class="butt" />
			</div>
			<b class="dialog_b"><b class="xb4"></b><b class="xb3"></b><b class="xb2"></b><b class="xb1"></b></b>
			</form>';		
	
		}else{
			include('game_func.php');
			$message = draw($gameID,$gameFuncStr);
			unset($do);
		}
	}elseif($do == 'undo' || $do == 'undoOK'){
		$gameID			= validate($_POST['gameID']);
		$queryGames		= 'SELECT gameDate FROM '.dbPre.'games WHERE gameID="'.$gameID.'" LIMIT 1';
		$resultGames	= mysql_query($queryGames)or die('<div class="error">'.errorDBStr.' (udm-1)</div>');	
		$gametime		= mysql_result($resultGames,0,'gameDate');
		$tooLate		= (substr($gametime,-2)+30 > 60)? ($gametime+70) : $gametime+30;
		$undoNow		= date(YmdHis);	
		$confirm		= $_POST['confirm'];
		if(!$confirm && (($tooLate>=$undoNow && $do == 'undo') || $do == 'undoOK')){
			echo'<form action="menu.php" method="post" class="dialog">
			<b class="dialog_t"><b class="xb1"></b><b class="xb2"></b><b class="xb3"></b><b class="xb4"></b></b>
			<div class="dialog_content">';
			if($do == 'undo'){
				echo $gameFuncStr[11];
			}else{
				echo $gameFuncStr[12];
			}
			echo '<input type="hidden" name="gameID" value="'.$gameID.'" />
			<input type="hidden" name="do" value="undo" />
			<input type="hidden" name="confirm" value="yes" />
			<input type="submit" value="'.$buttStr[10].'" class="butt" />
			</div>
			<b class="dialog_b"><b class="xb4"></b><b class="xb3"></b><b class="xb2"></b><b class="xb1"></b></b>
			</div>
			</form>';
		}elseif(!$confirm && $tooLate<=$undoNow){
			echo'<form action="menu.php" method="post" class="dialog">
				<b class="dialog_t"><b class="xb1"></b><b class="xb2"></b><b class="xb3"></b><b class="xb4"></b></b>
				<div class="dialog_content">
					'.$timed.$gameFuncStr[15].'
					<input type="hidden" name="do" value="menu" />
					<input type="submit" value="'.$buttStr[11].'" class="butt" />
				</div>
				<b class="dialog_b"><b class="xb4"></b><b class="xb3"></b><b class="xb2"></b><b class="xb1"></b></b>
			</form>';
		}else{
			include('game_func.php');
			$message = undo($gameID,$gameFuncStr);
			unset($do);
		}
	}elseif($do == 'end'){
		$gameID			= validate($_POST['gameID']);
		$confirm		= $_POST['confirm'];	
		if(!$confirm){
			echo '<form action="menu.php" method="post" class="dialog">
			<b class="dialog_t"><b class="xb1"></b><b class="xb2"></b><b class="xb3"></b><b class="xb4"></b></b>
			<div class="dialog_content">
			'.$gameFuncStr[10].'
			<input type="hidden" name="gameID" value="'.$gameID.'" />
			<input type="hidden" name="do" value="end" />
			<input type="hidden" name="confirm" value="yes" />
			<input type="submit" value="'.$buttStr[6].'" class="butt" />
			</div>
			<b class="dialog_b"><b class="xb4"></b><b class="xb3"></b><b class="xb2"></b><b class="xb1"></b></b>
			</form>';
		}else{
			include('game_func.php');
			$message = ended($gameID,$gameFuncStr);
			unset($do);
		}
	}elseif($do == 'importPGN'){
		$pgn	= validate($_POST['pgn']);
		include('game_func.php');
		if($pgn){ 
			$import = parsePGN($pgn,null,2,1,1);
		}else{
			$message = '<div class="error">'.$gameFuncStr[20].'</div>';
		}
		if($import) $message = $gameFuncStr[19];
		unset($do);
	}elseif($do == 'killPlayer' && $_SESSION['power']>3){
		$kill		= validate($_POST['killing']);
		$kill		= explode('|',$kill);
		$killName	= str_replace('_',' ',$kill[1]);
		$confirm	= $_POST['confirm'];
		if(!$confirm){
			echo '
			<form action="menu.php" method="post" class="dialog">
			<b class="dialog_t"><b class="xb1"></b><b class="xb2"></b><b class="xb3"></b><b class="xb4"></b></b>
			<div class="dialog_content">
			<h2>'.$adminStr[6].' ',$killName,'?</h2>
			<input type="hidden" name="killing" value="'.$kill[0].'" />
			<input type="hidden" name="do" value="killPlayer" />
			<input type="hidden" name="confirm" value="yes" />
			<input type="submit" value="'.$buttStr[3].'" class="butt" />
			</div>
			<b class="dialog_b"><b class="xb4"></b><b class="xb3"></b><b class="xb2"></b><b class="xb1"></b></b>
			</form>';
		}else{
			$message = killPlayer($kill[0],$adminStr);
			unset($do);
		}
	}elseif($do == 'chgPower' && $_SESSION['power']>3){
		$newPower	= validate($_POST['newPower']);
		$player		= validate($_POST['player']);
		$player		= explode('|',$player);
		$plyaerName	= str_replace('_',' ',$player[1]);
		$confirm	= $_POST['confirm'];
		if(!$confirm){
			echo '<form action="menu.php" method="post" class="dialog">
			<b class="dialog_t"><b class="xb1"></b><b class="xb2"></b><b class="xb3"></b><b class="xb4"></b></b>
			<div class="dialog_content">
			<h2>'.$adminStr[7].$plyaerName.'</h2>
			<input type="hidden" name="playerID" value="'.$player[0].'" />
			<input type="hidden" name="newPower" value="'.$newPower.'" />
			<input type="hidden" name="do" value="chgPower" />
			<input type="hidden" name="confirm" value="yes" />
			<input type="submit" value="'.$buttStr[1].'" class="butt" />
			</div>
			<b class="dialog_b"><b class="xb4"></b><b class="xb3"></b><b class="xb2"></b><b class="xb1"></b></b>
			</form>';
		}else{
			include('admin.php');
			$playerID	= validate($_POST['playerID']);
			$message 	= chgPower($playerID,$newPower,$adminStr);
			unset($do);
		}
	}elseif($do == 'upload'){
		$file['name'] 		= str_replace(' ','_',$_FILES['image']['name']);
		$file['size'] 		= $_FILES['image']['size'];
		$file['tmpName'] 	= $_FILES['image']['tmp_name'];
		$file['error'] 		= $_FILES['image']['error'];	
		include('menu_func.php');
		$message = upload($file,$playerImgDir,$menuFuncStr);
		unset($do);
	}elseif($do == 'updateOpt' && $_SESSION['power']>3){
		include('admin.php');
		$message = updateOptions($adminStr);
		unset($do,$firstrun);
	}elseif(($do == 'options' && $_SESSION['power']>3) || ($firstrun && $_SESSION['power']>3)){
		include('admin.php');
		include('options.php');
	}elseif($do == 'verCheck' && $_SESSION['power']>3){
		include('admin.php');
		$message = versionCheck($adminStr);
		unset($do);
	}elseif($do == 'backup' && $_SESSION['power']>3){
		include('admin.php');
		include('backup.php');
		$message = '<div class="message">Backup script has run</div>';
		unset($do);
	}
//--DISPLAY WINDOWS
	if(($do=='games' || !$do) && !$firstrun){ 
		include('menu_panel_game.php');
	}else{
		include('menu_panel_other.php');
	}
?>
	
	</div><!--contents-->
</div><!--wrapper-->
<div id="version">v<?php echo version; ?></div>
</body>
</html>