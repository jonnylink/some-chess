<?PHP
//		Some Chess, a PHP multi-player chess server.
//		Copyright (C) 2007 Jon Link
	if($do == 'profile'){
//--PROFILE DETAILS
		//--GET USER'S INFO
		$queryPlayer	= 'SELECT * FROM '.dbPre.'players WHERE id="'.$_SESSION['id'].'" LIMIT 1';
		$resultPlayer	= mysql_query($queryPlayer)or die('<div class="error">'.errorDBStr.' (mp-1)</div>');	
		$name			= mysql_result($resultPlayer,0,'name');
		$realname		= mysql_result($resultPlayer,0,'realname');
		$email			= mysql_result($resultPlayer,0,'email');
		$location		= mysql_result($resultPlayer,0,'location');
		echo'		<form action="menu.php" method="post" id="profile" class="one-medium-panel">
			<h2>'.$menuStr[3].'</h2>
			<p>'.$menuStr[19].'<input type="text" name="realname" value="'.$realname.'" class="large-field" /></p>
			<p>'.$menuStr[20].'<input type="text" name="username" value="'.$name.'" class="large-field" /></p>
			<p>'.$menuStr[23].'<input type="text" name="location" value="'.$location.'" class="large-field" /></p>
			<p>'.$menuStr[24].'<input type="text" name="email" value="'.$email.'" class="large-field" /></p>
			<p>'.$menuStr[21].'<input type="password" name="pass1" class="large-field" /></p>
			<p>'.$menuStr[22].'<input type="password" name="pass2" class="large-field" /></p>
			<p>'.$menuStr[36].'<input type="text" name="sec_question" class="large-field" /></p>
			<p>'.$menuStr[37].'<input type="password" name="sec_answer" class="large-field" /></p>
			<p><input type="hidden" name="do" value="chngInfo" />
			<input type="submit" value="'.$buttStr[1].'" class="butt" /></p>
		</form>
		';
//--UPLOAD USER IMAGE
		if($showPlayerImg)echo'<form action="menu.php" method="post" enctype="multipart/form-data" id="upload-user-image" class="one-medium-panel">
			<h2>'.$menuStr[4].'</h2>
			<p><input type="hidden" name="MAX_FILE_SIZE" value="512500" />
			<input type="file" name="image" id="upimage" />
			<input type="hidden" name="do" value="upload" /></p>
			<p class="righty"><input type="submit" value="'.$buttStr[9].'" class="butt" /></p>
		</form>';	
	}elseif($do == 'importpgn'){
//--IMPORT PGN
		echo'		<form action="menu.php" method="post" id="import-pgn" class="huge-panel">
			<h2>'.$menuStr[25].'</h2>
			<h3>'.$menuStr[38].'</h3>
			<p><textarea class="input" name="pgn" cols="10" rows="15"></textarea>
			<input type="hidden" name="do" value="importPGN" />
			<input type="submit" value="'.$buttStr[12].'" class="butt" /></p>
		</form>';
	}elseif($_SESSION['power']>0 && $do == 'invitation'){
//--INVITE A USER
	echo'<form action="menu.php" method="post" id="invite" class="one-medium-panel">
				<h2>'.$menuStr[5].'</h2>
				<p>'.$menuStr[6].'<input type="text" name="name" class="large-field" /></p>
				<p>'.$menuStr[7].'<input type="text" name="email" class="large-field" />
				<input type="hidden" name="friend" value="'.$name.'" />
				<input type="hidden" name="do" value="invite" />
				<input type="submit" value="'.$buttStr[2].'" class="butt" /></p>
			</form>';
	}elseif($_SESSION['power']>3 && $do == 'admin'){
//--ADMIN PANEL
		include('admin.php');
		echo adminPanel($VSid,$VSname,$showBackup,$showUpdate,$adminStr);
	}
?>