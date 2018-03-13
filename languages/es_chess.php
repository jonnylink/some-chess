<?php //--(v2.0rc3) files:	board, display, displayMinimal, move, king, queen, bishop, knight, rook, pawn
define('errorDBStr', 'ERROR problema al conectar con la base de datos: ');

$infoBoxStr[0]	= 'Tabla de Movimientos';
$infoBoxStr[1]	= 'Dimitir';
$infoBoxStr[2]	= 'Tabla';
$infoBoxStr[3]	= 'Fianalizar';
$infoBoxStr[4]	= 'Deshacer';
$infoBoxStr[5]	= 'Exportar';
$infoBoxStr[6]	= 'Estas en jacke!';
$infoBoxStr[7]	= 'Te proponen tabla';
$infoBoxStr[8]	= 'Esperando respuesta al ofrecimiento de Tabla';
$infoBoxStr[9]	= 'Deshacer solicitado';
$infoBoxStr[10]	= 'Esperando respuesta a la solicitud de deshacer';
$infoBoxStr[11]	= 'has ganado este juego';
$infoBoxStr[14]	= 'Empezar';
$infoBoxStr[15]	= 'mover ';
$infoBoxStr[16]	= ' a&hellip;';
$infoBoxStr[17]= 'Finalizar Juego?';

$boardStr[0]	= 'Es <b>tú</b> turno';
$boardStr[1]	= 'Turno de <b>';
$boardStr[2]	= '</b>';

$movesStr[0]	= '<h3>Error</h3> Alguna informaci&ucirc;n falta, porfavor intenta nuevamente';
$movesStr[1]	= '<h3>Movimiento Ilegal</h3> No es tu turno';
$movesStr[2]	= '<h3>Movimiento Ilegal</h3> Movimiento Ilegal';
$movesStr[3]	= '<h3>Movimiento Ilegal</h3> La casilla de la que desea moverse, no existe';
$movesStr[5]	= '<h3>Movimiento Ilegal</h3> Ha intentado mover la pieza del otro jugador';
$movesStr[6]	= '<h3>Movimiento Ilegal</h3> Tiene que mover una pieza a una casilla nueva';
$movesStr[7]	= '<h3>Movimiento Ilegal</h3> Ha intentado capturar una pieza propia';
$movesStr[8]	= '<h3>Movimiento Ilegal</h3> No puede mover su rey y hacerse auto jaque';

$kingStr[0]		= '<h3>Movimiento Ilegal</h3> No puede hacer enroque despues de haber movido el Rey';
$kingStr[1]		= '<h3>Movimiento Ilegal</h3> No puede hacer enroque en jaque';
$kingStr[2]		= '<h3>Movimiento Ilegal</h3> No puede hacer enroque hacia este lado si la Torre ha sido movida';
$kingStr[3]		= '<h3>Movimiento Ilegal</h3> Solo puede hacer enroque cuando el carril esta despejado';
$kingStr[4]		= '<h3>Movimiento Ilegal</h3> No puede hacer enroque a traves de una linea de jaque';
$kingStr[5]		= '<h3>Movimiento Ilegal</h3> El Rey solo puede moverse un espacio (excepto en enroques)';

$queenStr[0]	= '<h3>Movimiento Ilegal</h3> La Reina no puede saltar otras piezas';
$queenStr[1]	= '<h3>Movimiento Ilegal</h3> La Reina solo puede moverse en filas, columnas y en diagonal';

$bishopStr[0]	= '<h3>Movimiento Ilegal</h3> El Alfil no puede saltar otras piezas';
$bishopStr[1]	= '<h3>Movimiento Ilegal</h3> El Alfil solo puede moverse en diagonales';

$knightStr[0]	= '<h3>Movimiento Ilegal</h3> El Caballo solo puede moverse dos cuadros adelante y uno al costado (o al reves)';

$rookStr[0]		= '<h3>Movimiento Ilegal</h3> La Torre no puede saltar otras piezas';
$rookStr[1]		= '<h3>Movimiento Ilegal</h3> La Torre solo se puede mover en filas y en columnas';

$pawnStr[0]		= '<h3>Movimiento Ilegal</h3> Los Peones no pueden saltar otras piezas';
$pawnStr[1]		= '<h3>Movimiento Ilegal</h3> Los Peones solo pueden capturar en diagonal (un espacio)';
$pawnStr[2]		= '<h3>Movimiento Ilegal</h3> Los Peones solo pueden moverse un espacio hacia adelante (excepto su primer movimiento)';

$gameOverStr[0]	= 'Jaque Mate!';
$gameOverStr[1]	= 'Eres el Vencedor!';

$emailStr[0]	= 'Some Chess: it is your move';	//requires translation
$emailStr[1]	= 'Hola ';
$emailStr[2]	= ',

This is an email to let you know that the move: ';  //requires translation
$emailStr[3]	= ' has moved ';  //requires translation
$emailStr[4]	= ' in one of your games (game number: ';  //requires translation

$viewStr[0]		= 'Last Move:';  //requires translation
?>