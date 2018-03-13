<!--
/********************************************************************************
** "Some Chess" some rights reserved 2007
** Some Chess written by Jon Link
** 
** This library is free software; you can redistribute it and/or
** modify it under the terms of the GNU General Public License 
** as published by the Free Software Foundation; either version 2.1 
** of the License, or (at your option) any later version.
** 
** This library is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
** Lesser General Public License for more details.
** 
** You should have received a copy of the GNU Lesser General Public
** License along with this library; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
**
** The images found in the folder alt-pieces [p,r,n,q,k][d,l][d,l].png are GPL, 
** from Wikimedia Commons, see gpl.txt
**
** All other images are ©Jon Link and may be used freely but only with permission
**
** a small portion of the code to display the chess board 
** was taken from phpChessBoard written by Andreas Stieger
**********************************************************************************/
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Some Chess</title>
	<link rel="stylesheet" type="text/css" href="index.css" />
</head>
<body>
<?php 
$config_error	= '<div id="config-error" class="error">
	<p>please enter MySQL connection info in the config.php file</p>
	<p>veuillez écrire l\'information de raccordement de MySQL dans le dossier de config.php </p>
	<p>MySQL Anschlußinfo in die config.php Akte bitte eintragen</p>
	<p>fornire prego il collegamento Info di MySQL nella lima di config.php</p>
	<p>incorporar por favor la conexión Info de MySQL al archivo de config.php </p>
	<p>введите соединение информация в файле config.php</p>
	<p>incorporar por favor a conexão info de MySQL à lima de config.php</p>
	<p>config.php 파일에 있는 MySQL 연결 정보에 들어가십시오</p>
	<p>config.phpファイルにMySQLの関係インフォメーションを書き入れなさい</p>
	<p>进入MySQL的连接信息,请在config.php文件</p>
</div>';
if(!file_exists('config.php')){echo $config_error; die;}
require_once('config.php');
$add_reg_class = ($allowRegister)? ' reg' : null;
if(!$host || !$dbUser || !$dbPass || !$database){echo $config_error; die;} 
include_once('languages/'.$lang.'_main.php');
include_once('constants.php');
//--LOGIN FORM
$loginForm = '<form action="menu.php" method="post" id="login">
	<div>
		<p>'.$loginStr[1].' <input type="text" name="username" /></p>
		<p>'.$loginStr[2].' <input type="password" name="password" />
		<input type="submit" value="'.$loginStr[0].'" class="butt" />
		<input type="hidden" name="do" value="login" /></p>
	</div>
	<p><a href="index.php?help=lost" id="lostpass">'.$loginStr[8].'</a></p>
</form>
';
//--INSTALL OR UPDATE
if(file_exists('install.php')){
	include('install.php');
	$installed 	= installCheck();
	$updated	= updateCheck();
	if(!$installed){
		$install = install($database,$indexStr);
		if($install) echo '<div class="message'.$add_reg_class.'">'.$install.'</div>';
	}elseif(!$updated){
		$udpate = update($indexStr);
		if($udpate) echo '<div class="message'.$add_reg_class.'">'.$udpate.'</div>';
	}
}
//--RESET PASSWORD
$help = ($_POST['help']) ? $_POST['help'] : $_GET['help'];
if($help === 'lost'){
echo'<form action="index.php" method="post" id="lost">
	<div>
		<p>'.$loginStr[1].' <input type="text" name="username" />
		<input type="submit" value="'.$buttStr[0].'" class="butt" />
		<input type="hidden" name="help" value="lost2" /></p>
	</div>
</form>';
}elseif($help === 'lost2'){
	include_once('login.php');
	$name 		= $_POST['username'];
	$question	= requestQuestion($name,$loginStr);
	if(!$question){
		echo $loginForm.'<div class="error">'.$loginStr[10].'</div>';
	}else{
echo'<form action="index.php" method="post" id="lost">
	<div>
		<p style="margin-left:2em;text-align:left">'.$question.'</p>
		<p>'.$loginStr[9].' <input type="password" name="answer" />
		<input type="submit" value="'.$buttStr[0].'" class="butt" />
		<input type="hidden" name="name" value="'.$name.'" />
		<input type="hidden" name="help" value="lost3" /></p>
	</div>
</form>';
	}
}elseif($help === 'lost3'){
	include('login.php');
	$lost_message = requestPass($_POST['name'],$_POST['answer'],$loginStr,$add_reg_class);
}
if(!$help || $help == 'lost3'){
//--ECHO STANDARD LOGIN FORM
	echo $loginForm.$lost_message;
}
//--REGISTER FORM
if($allowRegister){ 
	echo'<form action="register.php" method="post" id="regBox">
	<h3>'.$regStr[0].'</h3>
	<div>
		<p>'.$loginStr[1].' <input type="text" name="username" /></p>
		<p>'.$loginStr[2].' <input type="password" name="password" /></p>
	';
	if($verifyReg) echo'	<p>Verification <input type="text" name="code" class="input" /></p>
		<img src="register_image.php" alt="validation image" />';
	echo'
		<p><input type="submit" value="'.$regStr[1].'" class="butt" /></p>
	</div>
</form>';
}
echo'
<div id="ver">
	 <a href="http://somechess.org/web/">Some Chess</a> Version '.version.'
</div>';
echo $error;
?>

</body>
</html>