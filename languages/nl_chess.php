<?php //--(v2.0rc3) files:	board, display, displayMinimal, move, king, queen, bishop, knight, rook, pawn
define('errorDBStr', 'FOUT: probleem met het verbinden van de database');

$infoBoxStr[0]	= 'Gedane zetten';
$infoBoxStr[1]	= 'Opgeven';
$infoBoxStr[2]	= 'Remise';
$infoBoxStr[3]	= 'Einde';
$infoBoxStr[4]	= 'Herstellen';
$infoBoxStr[5]	= 'Exporteren';
$infoBoxStr[6]	= 'U staat schaak!';
$infoBoxStr[7]	= 'Remise voorgesteld';
$infoBoxStr[8]	= 'Wacht op antwoord op het voorstel tot remise';
$infoBoxStr[9]	= 'Verzoek tot herstellen gedaan';
$infoBoxStr[10]	= 'Wacht op antwoord op het verzoek tot herstellen';
$infoBoxStr[11]	= ' heeft dit spel gewonnen';
$infoBoxStr[14]	= 'Starten';
$infoBoxStr[15]	= 'zetten ';
$infoBoxStr[16]	= ' naar&hellip;';
$infoBoxStr[17]	= 'Einde partij?';

$boardStr[0]	= 'Het is uw beurt';
$boardStr[1]	= 'Het is <b>';
$boardStr[2]	= '\'s</b> beurt';

$movesStr[0]	= '<h3>Fout</h3> Niet alle informatie is aanwezig, probeer opnieuw';
$movesStr[1]	= '<h3>Foutieve zet</h3> U staat schaakmat';	//MODIFIED FOR 2.0b5
$movesStr[2]	= '<h3>Foutieve zet</h3> Het vak waarnaar u probeert te zetten bestaat niet';
$movesStr[3]	= '<h3>Foutieve zet</h3> Het vak waarvan u probeert te zetten bestaat niet';
$movesStr[5]	= '<h3>Foutieve zet</h3> U kunt geen stukken van de tegenspeler verplaatsen';   //MODIFIED FOR 2.0b4
$movesStr[6]	= '<h3>Foutieve zet</h3> U moet een zet doen';
$movesStr[7]	= '<h3>Foutieve zet</h3> U probeert een stuk van uzelf te slaan';
$movesStr[8]	= '<h3>Foutieve zet</h3> U kunt uw eigen koning niet schaak zetten';

$kingStr[0]		= '<h3>Foutieve zet</h3> U mag niet meer rokeren als u uw koning heeft verplaatst';
$kingStr[1]		= '<h3>Foutieve zet</h3> U kunt niet rokeren als u schaak staat';
$kingStr[2]		= '<h3>Foutieve zet</h3> U kunt niet rokeren als de toren al verplaatst is';
$kingStr[3]		= '<h3>Foutieve zet</h3> U kunt alleen rokeren als er geen stukken tussen staan';
$kingStr[4]		= '<h3>Foutieve zet</h3> U mag niet rokeren als u daardoor schaak komt te staan';
$kingStr[5]		= '<h3>Foutieve zet</h3> De koning kan maar 1 vak worden verplaatst (behalve bij rokeren)';

$queenStr[0]	= '<h3>Foutieve zet</h3> De koningin kan niet over andere stukken heen springen';
$queenStr[1]	= '<h3>Foutieve zet</h3> De koningin kan alleen diagonaal, horizontaal en vertikaal bewegen';

$bishopStr[0]	= '<h3>Foutieve zet</h3> Lopers kunnen niet over andere stukken heen springen';
$bishopStr[1]	= '<h3>Foutieve zet</h3> Lopers kunnen alleen diagonaal worden verplaatst';

$knightStr[0]	= '<h3>Foutieve zet</h3> Paarden kunnen alleen 2 vakken vooruit en 1 opzij of 1 vooruit en 2 opzij worden verplaatst';

$rookStr[0]		= '<h3>Foutieve zet</h3> Torens kunnen niet over andere stukken heen worden verplaatst';
$rookStr[1]		= '<h3>Foutieve zet</h3> Torens kunnen alleen horizontaal of vertikaal verplaatst worden';

$pawnStr[0]		= '<h3>Foutieve zet</h3> Pionnen kunnen niet over andere stukken worden verplaatst';
$pawnStr[1]		= '<h3>Foutieve zet</h3> Pionnen kunnen andere stukken alleen diagonaal vooruit slaan';
$pawnStr[2]		= '<h3>Foutieve zet</h3> Pionnen kunnen alleen maar 1 vak vooruit worden verplaatst (behalve bij de eerste zet)';

$gameOverStr[0]	= 'Schaakmat';
$gameOverStr[1]	= 'U hebt gewonnen!';

$emailStr[0]	= 'Some Chess: het is uw zet';	//NEW FOR 2.0b4
$emailStr[1]	= 'Hallo ';	//NEW FOR 2.0b4
$emailStr[2]	= ',

Met deze email laten we u weten dat ';
$emailStr[3]	= ' zet ';  //MODIFIED FOR 2.0b5
$emailStr[4]	= ' in een van uw spellen (spel nummer: ';  //NEW FOR 2.0b5

$viewStr[0]		= 'Laatste zet:';  //NEW FOR 2.0b4
?>