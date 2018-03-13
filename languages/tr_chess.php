<?php //--(v2.0rc3) files:	board, display, displayMinimal, move, king, queen, bishop, knight, rook, pawn
define('errorDBStr', 'HATA Veritabanýna baðlanýlamadý');

$infoBoxStr[0]	= 'Hamle Geçmiþi';
$infoBoxStr[1]	= 'ÇekÝl';
$infoBoxStr[2]	= '1-1';
$infoBoxStr[3]	= 'BÝtÝr';
$infoBoxStr[4]	= 'GerÝ';
$infoBoxStr[5]	= 'Kaydet';
$infoBoxStr[6]	= 'Þah çekildi!';
$infoBoxStr[7]	= 'Beraberlik Teklif Edildi';
$infoBoxStr[8]	= 'Beraberlik teklifine yanýt bekleniyor';
$infoBoxStr[9]	= 'Geri alma istendi';
$infoBoxStr[10]	= 'Geri al yanýtý bekleniyor';
$infoBoxStr[11]	= ' oyunu kazandý';
$infoBoxStr[14]	= 'Baþlat';
$infoBoxStr[15]	= '';
$infoBoxStr[16]	= ' hareket ettir&hellip;';
$infoBoxStr[17]	= 'Oyunu bitir?';

$boardStr[0]	= 'Sýra <b>sizde</b>';
$boardStr[1]	= 'Sýra <b>';
$boardStr[2]	= ' kullanýcýsýnda';

$movesStr[0]	= '<h3>Hata</h3> Bazý bilgiler eksik, daha sonra tekrar deneyin';
$movesStr[1]	= '<h3>Hatalý hamle</h3> Mat oldunuz';	//MODIFIED FOR 2.0b5
$movesStr[2]	= '<h3>Hatalý hamle</h3> Hareket ettirmek istediðiniz kare bulunamýyor';
$movesStr[3]	= '<h3>Hatalý hamle</h3> Harekete baþlamak istediðiniz kare bulunamýyor';
$movesStr[5]	= '<h3>Hatalý hamle</h3> Rakibinizin taþlarýný oynatamazsýnýz';   //MODIFIED FOR 2.0b4
$movesStr[6]	= '<h3>Hatalý hamle</h3> Taþýnýzý baþka bir kareye taþýmalýsýnýz';
$movesStr[7]	= '<h3>Hatalý hamle</h3> Kendi taþlarýnýzý yemeye çalýþtýnýz';
$movesStr[8]	= '<h3>Hatalý hamle</h3> Kralýnýzý þah\'a ilerletemezsiniz';

$kingStr[0]		= '<h3>Hatalý hamle</h3> Kralý hareket ettirdikten sonra rok yapamazsýnýz';
$kingStr[1]		= '<h3>Hatalý hamle</h3> Þahta iken rok yapamazsýnýz';
$kingStr[2]		= '<h3>Hatalý hamle</h3> Hareket ettirilmiþ kale tarafýna rok yapamazsýnýz';
$kingStr[3]		= '<h3>Hatalý hamle</h3> Yalnýzca hareket bölgesi temiz ise rok yapabilirsiniz';
$kingStr[4]		= '<h3>Hatalý hamle</h3> Þah bölgesinden geçen alanda rok yapamazsýnýz';
$kingStr[5]		= '<h3>Hatalý hamle</h3> 1 Kral sadece 1 hamle yapabilir (rok haricinde)';

$queenStr[0]	= '<h3>Hatalý hamle</h3> Vezirler taþ üzerinden atlayamaz';
$queenStr[1]	= '<h3>Hatalý hamle</h3> Vezir, yalnýzca çapraz, sütun ve satýrlarda hareket edebilir';

$bishopStr[0]	= '<h3>Hatalý hamle</h3> Filler taþ üzerinden atlayamaz';
$bishopStr[1]	= '<h3>Hatalý hamle</h3> Filler sadece çapraz hareket edebilirler';

$knightStr[0]	= '<h3>Hatalý hamle</h3> Atlar sadece iki yukarý ve sol ya da saða; veya bir yukarý ve iki saða ya da sola hareket edebilirler (L þekli)';

$rookStr[0]		= '<h3>Hatalý hamle</h3> Kaleler taþlarýn üzerinden atlayamaz';
$rookStr[1]		= '<h3>Hatalý hamle</h3> Kaleler sadece satýr ve sütunlarda hareket edebilirler';

$pawnStr[0]		= '<h3>Hatalý hamle</h3> Piyonlar taþlarýn üzerinden atlayamazlar';
$pawnStr[1]		= '<h3>Hatalý hamle</h3> Piyonlar sadece çapraz taþ yiyebilir';
$pawnStr[2]		= '<h3>Hatalý hamle</h3> Piyonlar sadece bir ileri hareket edebilirler (ilk hamle hariç. ilk hamlede iki ileri ilerleyebilirler)';

$gameOverStr[0]	= 'Mat';
$gameOverStr[1]	= 'Kazandýnýz!';

$emailStr[0]	= 'Some Chess: sizin hamlenizz';	//NEW FOR 2.0b4
$emailStr[1]	= 'Merhaba ';	//NEW FOR 2.0b4
$emailStr[2]	= ',

Bu e-posta þunlarý bilmeniz için gönderildi: ';
$emailStr[3]	= ' hamlesi: ';  //MODIFIED FOR 2.0b5
$emailStr[4]	= ' oyunlarýnýzdan birinde (oyun numarasý: ';  //NEW FOR 2.0b5

$viewStr[0]		= 'Son hamle:';  //NEW FOR 2.0b4
?>