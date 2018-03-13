<?php //--(v2.0rc3) files:	board, display, displayMinimal, move, king, queen, bishop, knight, rook, pawn
define('errorDBStr', 'HATA Veritaban�na ba�lan�lamad�');

$infoBoxStr[0]	= 'Hamle Ge�mi�i';
$infoBoxStr[1]	= '�ek�l';
$infoBoxStr[2]	= '1-1';
$infoBoxStr[3]	= 'B�t�r';
$infoBoxStr[4]	= 'Ger�';
$infoBoxStr[5]	= 'Kaydet';
$infoBoxStr[6]	= '�ah �ekildi!';
$infoBoxStr[7]	= 'Beraberlik Teklif Edildi';
$infoBoxStr[8]	= 'Beraberlik teklifine yan�t bekleniyor';
$infoBoxStr[9]	= 'Geri alma istendi';
$infoBoxStr[10]	= 'Geri al yan�t� bekleniyor';
$infoBoxStr[11]	= ' oyunu kazand�';
$infoBoxStr[14]	= 'Ba�lat';
$infoBoxStr[15]	= '';
$infoBoxStr[16]	= ' hareket ettir&hellip;';
$infoBoxStr[17]	= 'Oyunu bitir?';

$boardStr[0]	= 'S�ra <b>sizde</b>';
$boardStr[1]	= 'S�ra <b>';
$boardStr[2]	= ' kullan�c�s�nda';

$movesStr[0]	= '<h3>Hata</h3> Baz� bilgiler eksik, daha sonra tekrar deneyin';
$movesStr[1]	= '<h3>Hatal� hamle</h3> Mat oldunuz';	//MODIFIED FOR 2.0b5
$movesStr[2]	= '<h3>Hatal� hamle</h3> Hareket ettirmek istedi�iniz kare bulunam�yor';
$movesStr[3]	= '<h3>Hatal� hamle</h3> Harekete ba�lamak istedi�iniz kare bulunam�yor';
$movesStr[5]	= '<h3>Hatal� hamle</h3> Rakibinizin ta�lar�n� oynatamazs�n�z';   //MODIFIED FOR 2.0b4
$movesStr[6]	= '<h3>Hatal� hamle</h3> Ta��n�z� ba�ka bir kareye ta��mal�s�n�z';
$movesStr[7]	= '<h3>Hatal� hamle</h3> Kendi ta�lar�n�z� yemeye �al��t�n�z';
$movesStr[8]	= '<h3>Hatal� hamle</h3> Kral�n�z� �ah\'a ilerletemezsiniz';

$kingStr[0]		= '<h3>Hatal� hamle</h3> Kral� hareket ettirdikten sonra rok yapamazs�n�z';
$kingStr[1]		= '<h3>Hatal� hamle</h3> �ahta iken rok yapamazs�n�z';
$kingStr[2]		= '<h3>Hatal� hamle</h3> Hareket ettirilmi� kale taraf�na rok yapamazs�n�z';
$kingStr[3]		= '<h3>Hatal� hamle</h3> Yaln�zca hareket b�lgesi temiz ise rok yapabilirsiniz';
$kingStr[4]		= '<h3>Hatal� hamle</h3> �ah b�lgesinden ge�en alanda rok yapamazs�n�z';
$kingStr[5]		= '<h3>Hatal� hamle</h3> 1 Kral sadece 1 hamle yapabilir (rok haricinde)';

$queenStr[0]	= '<h3>Hatal� hamle</h3> Vezirler ta� �zerinden atlayamaz';
$queenStr[1]	= '<h3>Hatal� hamle</h3> Vezir, yaln�zca �apraz, s�tun ve sat�rlarda hareket edebilir';

$bishopStr[0]	= '<h3>Hatal� hamle</h3> Filler ta� �zerinden atlayamaz';
$bishopStr[1]	= '<h3>Hatal� hamle</h3> Filler sadece �apraz hareket edebilirler';

$knightStr[0]	= '<h3>Hatal� hamle</h3> Atlar sadece iki yukar� ve sol ya da sa�a; veya bir yukar� ve iki sa�a ya da sola hareket edebilirler (L �ekli)';

$rookStr[0]		= '<h3>Hatal� hamle</h3> Kaleler ta�lar�n �zerinden atlayamaz';
$rookStr[1]		= '<h3>Hatal� hamle</h3> Kaleler sadece sat�r ve s�tunlarda hareket edebilirler';

$pawnStr[0]		= '<h3>Hatal� hamle</h3> Piyonlar ta�lar�n �zerinden atlayamazlar';
$pawnStr[1]		= '<h3>Hatal� hamle</h3> Piyonlar sadece �apraz ta� yiyebilir';
$pawnStr[2]		= '<h3>Hatal� hamle</h3> Piyonlar sadece bir ileri hareket edebilirler (ilk hamle hari�. ilk hamlede iki ileri ilerleyebilirler)';

$gameOverStr[0]	= 'Mat';
$gameOverStr[1]	= 'Kazand�n�z!';

$emailStr[0]	= 'Some Chess: sizin hamlenizz';	//NEW FOR 2.0b4
$emailStr[1]	= 'Merhaba ';	//NEW FOR 2.0b4
$emailStr[2]	= ',

Bu e-posta �unlar� bilmeniz i�in g�nderildi: ';
$emailStr[3]	= ' hamlesi: ';  //MODIFIED FOR 2.0b5
$emailStr[4]	= ' oyunlar�n�zdan birinde (oyun numaras�: ';  //NEW FOR 2.0b5

$viewStr[0]		= 'Son hamle:';  //NEW FOR 2.0b4
?>