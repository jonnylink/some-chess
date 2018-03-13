<?php //--(v2.0rc3) belongs to:	board, display, displayMinimal, move, king, queen, bishop, knight, rook, pawn
define('errorDBStr', 'ERREUR lors de la connexion &agrave; la base : ');
$infoBoxStr[0]	= 'Historique des mouvements';
$infoBoxStr[1]	= 'Abandon';
$infoBoxStr[2]	= 'Partie nulle';
$infoBoxStr[3]	= 'Terminer';
$infoBoxStr[4]	= 'Annuler le coup';
$infoBoxStr[5]	= 'Exporter';
$infoBoxStr[6]	= 'Vous &ecirc;tes en &egrave;chec&nbsp;!';
$infoBoxStr[7]	= 'Partie nulle propos&egrave;e';
$infoBoxStr[8]	= 'Attente de r&egrave;ponse &agrave; la proposition de partie nulle';
$infoBoxStr[9]	= 'Annulation demand&egrave;e';
$infoBoxStr[10]	= 'Attente de r&egrave;ponse &agrave; la demande d\'annulation';
$infoBoxStr[11]	= ' a gagn&egrave; la partie';
$infoBoxStr[14]	= 'Commencer';
$infoBoxStr[15]	= 'D&egrave;placer ';
$infoBoxStr[16]	= ' vers&hellip;';
$infoBoxStr[17]	= 'Terminer la partie&nbsp;?';

$boardStr[0]	= '&agrave; <b>vous</b> de jouer';
$boardStr[1]	= '&agrave; <b>';
$boardStr[2]	= '</b> de jouer';

$movesStr[0]	= '<h3>Erreur</h3> Informations incompl&egrave;tes : veuillez r&egrave;essayer';
$movesStr[1]	= '<h3>Mouvement impossible</h3> Vous &ecirc;tes &egrave;chec et mat';
$movesStr[2]	= '<h3>Mouvement impossible</h3> Vous voulez vous rendre sur une case qui n\'existe pas';
$movesStr[3]	= '<h3>Mouvement impossible</h3> Vous voulez partir d\'une case qui n\'existe pas';
$movesStr[5]	= '<h3>Mouvement interdit</h3> Vous ne pouvez pas d&egrave;placer un pion de votre adversaire';
$movesStr[6]	= '<h3>Mouvement &agrave; d&egrave;finir</h3> La pi&egrave;ce ne peut &ecirc;tre replac&egrave;e au m&ecirc;me endroit';
$movesStr[7]	= '<h3>Mouvement interdit</h3> Vous ne pouvez pas capturer vos propres pi&egrave;ces';
$movesStr[8]	= '<h3>Mouvement interdit</h3> Vous ne pouvez pas mettre votre roi en &egrave;chec';

$kingStr[0]		= '<h3>Mouvement interdit</h3> Le roque n\'est plus autoris&egrave; puisque le roi a d&egrave;j&agrave; &egrave;t&egrave; d&egrave;plac&egrave; au moins une fois.';
$kingStr[1]		= '<h3>Mouvement interdit</h3> Le roi ne doit pas &ecirc;tre en &egrave;chec pour que le roque puisse &ecirc;tre autoris&egrave;.';
$kingStr[2]		= '<h3>Mouvement interdit</h3> Vous ne pouvez pas se retrancher &#224; ce c&#244;t&egrave; si le freux s\'est d&egrave;j&#224; d&egrave;plac&egrave;';
$kingStr[3]		= '<h3>Mouvement interdit</h3> Pour pouvoir roquer, aucune pi&egrave;ce ne doit s\'interposer entre le roi et la tour.';
$kingStr[4]		= '<h3>Mouvement interdit</h3> Roquer n\'est pas autoris&egrave; en pr&egrave;sence d\'une ligne d\'&egrave;chec.';
$kingStr[5]		= '<h3>Mouvement interdit</h3> En dehors du roque, le roi ne peut pas se d&egrave;placer de plus d\'une case';

$queenStr[0]	= '<h3>Mouvement interdit</h3> La reine ne peut pas passer par-dessus une autre pi&egrave;ce';
$queenStr[1]	= '<h3>Mouvement interdit</h3> La reine peut seulement se d&egrave;placer en ligne droite, le long des rang&egrave;es, des colonnes ou des diagonales';

$bishopStr[0]	= '<h3>Mouvement interdit</h3> Les fous ne peuvent pas passer par-dessus une pi&egrave;ce';
$bishopStr[1]	= '<h3>Mouvement interdit</h3> Les fous peuvent seulement se d&egrave;placer le long des diagonales';

$knightStr[0]	= '<h3>Mouvement interdit</h3> Les cavaliers avancent, en empruntant colonnes et rang&egrave;es, d\'abord d\'une case puis, perpendiculairement, de deux autres cases ou d\'abord de deux cases puis, perpendiculairement, d\'une seule case';

$rookStr[0]		= '<h3>Mouvement interdit</h3> Les tours ne peuvent pas passer par-dessus une pi&egrave;ce';
$rookStr[1]		= '<h3>Mouvement interdit</h3> Les tours peuvent seulement se d&egrave;placer en ligne droite, le long des rang&egrave;es et des colonnes';

$pawnStr[0]		= '<h3>Mouvement interdit</h3> Les pions ne peuvent pas passer par-dessus une pi&egrave;ce';
$pawnStr[1]		= '<h3>Mouvement interdit</h3> Les pions peuvent seulement capturer une pi&egrave;ce espac&egrave;e d\'une case en diagonale';
$pawnStr[2]		= '<h3>Mouvement interdit</h3> Les pions ne peuvent pas avancer de plus d\'une case, except&egrave; lors de leur premier mouvement';

$gameOverStr[0]	= '&egrave;chec et mat';
$gameOverStr[1]	= 'Vous avez gagn&egrave; !';

$emailStr[0]	= 'Some Chess : &agrave; vous de jouer';
$emailStr[1]	= 'Bonjour ';
$emailStr[2]	= ',

Ce courriel simplement pour vous apprendre que ';
$emailStr[3]	= " vient de jouer une nouveau coup ";
$emailStr[4]	= ' dans une partie qui l\'oppose &agrave; vous (partie num&egrave;ro : ';

$viewStr[0]		= ' Son dernier coup :';
?>