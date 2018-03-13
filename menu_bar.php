<?php
$menu = '<div id="menu">
				<a href="menu.php?do=games" class="menu-link">'.$mainMenuStr[3].'</a>
				<a href="menu.php?do=profile" class="menu-link">'.$mainMenuStr[4].'</a>';
if($_SESSION['power']>0) $menu .='
				<a href="menu.php?do=invitation" class="menu-link">'.$mainMenuStr[5].'</a>';
if($showStats == 1) $menu .='
				<a href="players.php?do=players" class="menu-link">'.$mainMenuStr[7].'</a>';
if($_SESSION['power']>3) $menu .='
				<a href="menu.php?do=admin" class="menu-link">'.$mainMenuStr[6].'</a>';
$menu .='
				<a href="menu.php?do=logout" class="menu-link">'.$mainMenuStr[2].'</a>
				<a href="menu.php?do=about" class="menu-link">'.$mainMenuStr[1].'</a>
			</div><!--menu-->
'; 
?>