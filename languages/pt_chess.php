<?php //--(v2.0rc3) files:	board, display, displayMinimal, move, king, queen, bishop, knight, rook, pawn
define('errorDBStr', 'ERRO na conex&atilde;o &Agrave; base de dados');

$infoBoxStr[0]	= 'Hist&oacute;rico de movimentos';
$infoBoxStr[1]	= 'Desistir';
$infoBoxStr[2]	= 'Empatar';
$infoBoxStr[3]	= 'Terminar';
$infoBoxStr[4]	= 'Voltar atr&aacute;s';
$infoBoxStr[5]	= 'Exportar';
$infoBoxStr[6]	= 'Voc&ecirc; est&aacute; em cheque!';
$infoBoxStr[7]	= 'Proposta de empate';
$infoBoxStr[8]	= '&Agrave; espera de resposta para empate';
$infoBoxStr[9]	= 'Voltar atr&aacute;s requisitado';
$infoBoxStr[10]	= '&Agrave; espera de resposta para voltar atr&aacute;s';
$infoBoxStr[11]	= ' ganhou este jogo';
$infoBoxStr[14]	= 'Iniciar';
$infoBoxStr[15]	= 'mover ';
$infoBoxStr[16]	= ' to&hellip;';
$infoBoxStr[17]	= 'Terminar jogo?';

$boardStr[0]	= 'Esta &eacute; a <b>sua</b> vez';
$boardStr[1]	= 'Esta &eacute; a vez de <b>';
$boardStr[2]	= '</b>';

$movesStr[0]	= '<h3>Erro</h3> Faltam algumas informa&ccedil;&otilde;es, por favor tente novamente';
$movesStr[1]	= '<h3>Movimento Ilegal</h3> Est&aacute; numa situa&ccedil;&atilde;o de chequemate';
$movesStr[2]	= '<h3>Movimento Ilegal</h3> aquele quadrante que voce quer mover nao existe';
$movesStr[3]	= '<h3>Movimento Ilegal</h3> aquele quadrante que voce quer mover nao existe';
$movesStr[5]	= '<h3>Movimento Ilegal</h3> Est&aacute; a tentar mover as pe&ccedil;as de outro jogador';
$movesStr[6]	= '<h3>Movimento Ilegal</h3> Deve mover uma pe&ccedil;a para uma nova casa';
$movesStr[7]	= '<h3>Movimento Ilegal</h3> Est&aacute; a tentar capturar uma das suas pr&oacute;prias pe&ccedil;as';
$movesStr[8]	= '<h3>Movimento Ilegal</h3> N&atilde;o pode mover o seu Rei para cheque';

$kingStr[0]		= '<h3>Movimento Ilegal</h3> N&atilde;o pode efectuar o roque se j&aacute; moveu o rei';
$kingStr[1]		= '<h3>Movimento Ilegal</h3> N&atilde;o pode efectuar o roque enquanto estiver em cheque';
$kingStr[2]		= '<h3>Movimento Ilegal</h3> N&atilde;o pode efectuar o roque se a torre ja tiver sido movida';
$kingStr[3]		= '<h3>Movimento Ilegal</h3> S&oacute; pode efectuar o roque quando as casas pelo meio estiverem limpas';
$kingStr[4]		= '<h3>Movimento Ilegal</h3> N&atilde;o pode efectuar o roque em linha de cheque';
$kingStr[5]		= '<h3>Movimento Ilegal</h3> O rei s&oacute; se pode mover 1 casa (excepto no roque)';

$queenStr[0]	= '<h3>Movimento Ilegal</h3> Movimento errado da rainha';
$queenStr[1]	= '<h3>Movimento Ilegal</h3> Movimento errado da rainha';

$bishopStr[0]	= '<h3>Movimento Ilegal</h3> Movimento errado do bispo';
$bishopStr[1]	= '<h3>Movimento Ilegal</h3> Movimento errado do bispo';

$knightStr[0]	= '<h3>Movimento Ilegal</h3> Movimento errado do cavalo';

$rookStr[0]		= '<h3>Movimento Ilegal</h3> Movimento errado da torre';
$rookStr[1]		= '<h3>Movimento Ilegal</h3> Movimento errado da torre';

$pawnStr[0]		= '<h3>Movimento Ilegal</h3> Movimento errado do pe&atilde;o';
$pawnStr[1]		= '<h3>Movimento Ilegal</h3> Movimento errado do pe&atilde;o';
$pawnStr[2]		= '<h3>Movimento Ilegal</h3> Movimento errado do pe&atilde;o';

$gameOverStr[0]	= 'chequemate';
$gameOverStr[1]	= 'Voc&ecirc; Ganhou!';

$emailStr[0]	= '&eacute; a sua vez de jogar';
$emailStr[1]	= 'Ol&aacute; ';
$emailStr[2]	= ', Isto &eacute; um email para o informar que ';
$emailStr[3]	= ' moveu uma pe&ccedil;a '; 
$emailStr[4]	= ' num dos seus jogos (nr. do jogo: ';

$viewStr[0]		= 'Último lance:';
?>