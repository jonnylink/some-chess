<?php //--(v2.0rc3)  belongs to: endgame, menuFunc, admin, chat, export, game, index, standard, menu, login, logout, stats, statsFunc

define('errorDBStr', 'HATA! Veritaban�na ba�lan�lamad�');

$mainMenuStr[0]	= 'men�';
$mainMenuStr[1]	= 'yard�m';
$mainMenuStr[2]	= '��k�� yap';

$chatStr[0]	= 'Sohbet';

$buttStr[0]	= 'G�T';
$buttStr[1]	= 'G�ncelle';
$buttStr[2]	= 'Davet et';
$buttStr[3]	= 'S�L';
$buttStr[4]	= '�ek�l';
$buttStr[5]	= 'Berabere';
$buttStr[6]	= 'Bitir';
$buttStr[7]	= $chatStr[0];
$buttStr[8]	= 'Kaydet';
$buttStr[9]	= 'Y�kle';
$buttStr[10]= 'Ger� Al';
$buttStr[11]= 'Ger�';
$buttStr[12]= 'Aktar';

$adminStr[0]	= 'Y�netici Ayarlar�';
$adminStr[1]	= 'Oyuncuyu Sil';
$adminStr[2]	= 'Ayr�cal�k Seviyesini De�i�tir';
$adminStr[3]	= 'Oyuncu silindi';
$adminStr[4]	= 'Hata: Bir isim ve ayr�cal�k seviyesi se�melisiniz';
$adminStr[5]	= 'Oyuncunun Ayr�cal�k Seviyesi de�i�tirildi';
$adminStr[6]	= 'Silmek istiyor musunuz?';
$adminStr[7]	= '�u kullan�c� i�in Ayr�cal�k Seviyesini de�i�tirmek istiyor musunuz: ';
$adminStr[8]	= 'G�ncellemeleri kontrol et';
$adminStr[9]	= $buttStr[3];
$adminStr[10]	= $buttStr[1];
$adminStr[11]	= $buttStr[0];
$adminStr[12]	= 'Bir g�ncelleme mevcut';
$adminStr[13]	= 'buraya t�klay�n';
$adminStr[14]	= 'En son s�r�me sahipsiniz';
$adminStr[15]	= 'Veritaban�n� yedekle';
$adminStr[16]	= 'Ayarlar';
$adminStr[17]	= 'Ayarlar g�ncellendi.';
$adminStr[18]	= 'Ayarlar g�ncellenemedi. config.php dosya izinlerini kontrol edin.';
$adminStr[19]	= '�zg�n�z, config.php dosyan�z yaz�labilir <b>de�il</b>, bu fonksiyonu kullanabilmek i�in dosya izinlerini manuel olarak  rw-rw-rw veya 666 �eklinde de�i�tirmeniz gereklidir';
$adminStr[20]	= 'Some Chess Se�enekleri';  //NEW FOR 2.0b4

$gameFuncStr[1]	= 'Oyundan �ekildiniz';
$gameFuncStr[2]	= 'Bir beraberlik istediniz<p>Arkada��n�z, hamle yaparak bu teklifi reddedebilir</p>';
$gameFuncStr[3]	= 'Beraberli�i kabul ettiniz';
$gameFuncStr[4]	= 'Zaten bir beraberlik teklifi yapt�n�z, l�tfen yan�t�n� bekleyin';
$gameFuncStr[5]	= 'Oyundan ka�t�n�z';
$gameFuncStr[6]	= 'Arkada��n�z oyundan ka�t�';
$gameFuncStr[7]	= 'Oyun bitti';
$gameFuncStr[8]	= '<h2>�ekilmek istedi�inizden emin misiniz?</h2><p>Bu oyun, kaybedilen olarak kay�tlara ge�ecektir</p>';
$gameFuncStr[9]	= '<h2>Beraberlik istiyor musunuz?</h2>';
$gameFuncStr[10]	= '<h2>Bu oyunu bitirmek istedi�inizden emin misiniz?</h2><p>E�er 2\'den fazla hamle yap�lm��sa, son hamleyi yapan puan� alacakt�r</p>';
$gameFuncStr[11]	= '<h2>Arkada��n�za geri alma teklifinizi <u>g�ndermek</u> istiyor musunuz?</h2><p>Arkada��n�z, hamle yaparak bu iste�i reddedebilir</p>';
$gameFuncStr[12]	= '<h2>Arkada��n�z�n son hamlesini geri almas�na izin veriyor musunuz?</h2>';
$gameFuncStr[13]	= '<h2>Geri alma izni verildi</h2>';
$gameFuncStr[14]	= 'Bir geri alma teklifi yapt�n�z, l�tfen di�er oyuncunun yan�t�n� bekleyin';
$gameFuncStr[15]	= '<h2>�zg�n�z, geri alamazs�n�z</h2><p>�ste�inizi hamlenizden sonraki 30 saniye i�erisinde yapmal�s�n�z, "geri al" butonu sadece hatalar i�indir</p>';
$gameFuncStr[16]	= '<h2>Beraberlik teklifini kabul etmek istiyor musunuz?</h2>';
$gameFuncStr[17]	= 'Yeni oyun olu�turuldu';
$gameFuncStr[18]	= 'L�tfen oynamak istedi�iniz bir oyuncu se�in';
$gameFuncStr[19]	= 'Oyun aktar�ld�, ve "Oyunlara Bak" b�l�m�nden g�r�lebilir';
$gameFuncStr[20]	= 'L�tfen, alana PGN yaz�s�n� yap��t�r�n';

$menuStr[0]	= 'Yeni Oyun Ba�lat';
$menuStr[1]	= 'Kime Kar��';
$menuStr[2]	= 'Renginiz';
$menuStr[3]	= 'Bilgilerinizi G�ncelleyin';
$menuStr[4]	= 'Oyuncu Resimleri';
$menuStr[5]	= 'Arkada� Davet Et';
$menuStr[6]	= '�sim';
$menuStr[7]	= 'E-posta';
$menuStr[8]	= '�evrim i�i Oyuncular';
$menuStr[9]	= ' Oyunlar�:';
$menuStr[10]	= 'GAL�B�YET';
$menuStr[11]	= 'MA�LUP';
$menuStr[12]	= 'BERABERE';
$menuStr[13]	= 'Oyuncular';
$menuStr[14]	= 'Rekorunuz';
$menuStr[15]	= 'YARIM';
$menuStr[16]	= 'PROF�L�M';
$menuStr[17]	= 'Davet Et';
$menuStr[18]	= 'Aktar';
$menuStr[19]	= '�sim';
$menuStr[20]	= 'Kullan�c� ad�';
$menuStr[21]	= '�ifre';
$menuStr[22]	= 'Yenileyin';
$menuStr[23]	= 'Yer';
$menuStr[24]	= 'E-posta';
$menuStr[25]	= 'PGN Aktar';
$menuStr[26]	= 'Hamleniz';
$menuStr[27]	= 'Oyunu bitir?';
$menuStr[28]	= 'Beraberlik?';
$menuStr[29]	= 'GER� AL?';
$menuStr[30]	= 'T�m oyunlar';	//MODIFIED FOR 2.0b5
$menuStr[31]	= 'Devam Eden Oyunlar';
$menuStr[32]	= 'Tamamlanan Oyunlar';
$menuStr[33]	= 'Sizin Oyunlar�n�z';
$menuStr[34]	= 'Oyunlara Bak';
$menuStr[35]	= 'Satran�';	//NEW TO 2.0b5
$menuStr[36]	= 'G�venlik Sorusu';	//NEW TO 2.0b5
$menuStr[37]	= 'G�venlik Yan�t�';	//NEW TO 2.0b5
$menuStr[38]	= 'PGN\'yi buraya yap��t�r�n';	//NEW TO 2.0b5
$menuStr[39]	= 'Some Chess\'e Ho�geldiniz, Say�n ';	//NEW TO 2.0b5
$menuStr[40]	= 'Oyun T�r�';	//NEW TO 2.0rc4
$menuStr[41]	= 'standart';	//NEW TO 2.0rc4

$menuFuncStr[1]	= 'L�tfen iki alan� da doldurun';
$menuFuncStr[2]	= '�ifreler e�le�miyor, l�tfen tekrar yaz�n';
$menuFuncStr[3]	= '�ifreniz g�ncellendi';
$menuFuncStr[4]	= 'Profiliniz g�ncellendi';
$menuFuncStr[5]	= 'L�tfen g�ncelleme yapabilmek �zere bilgi yaz�n.';
$menuFuncStr[6]	= 'L�tfen iki alan� da doldurun. E-posta adresleri herhangi bir �ekilde kay�t <b>edilmemektedir</b>.';
$menuFuncStr[7]	= 'Bu, ge�erli bir e-posta gibi g�r�nm�yor, l�tfen tekrar deneyin.<br /> E-posta adresleri herhangi bir �ekilde kay�t <b>edilmemektedir</b>';
$menuFuncStr[8]	= '�zg�n�z, bu kullan�c� ad� al�nm��. L�tfen ba�ka deneyin';
$menuFuncStr[9]	= "Some Chess Oynamaya davet edildiniz";
$menuFuncStr[10]	= 'Bir arkada��n�z sizi Some Chess oynamaya davet etti. Oyundaki ad�: ';
$menuFuncStr[11]	= '. Some Chess e� zamanl� olarak ya da uzatmal� olarak oynan�labilen (yaz��mal� satran� gibi), yeni internet satran� program�d�r. Some Chess, javascript gerektirmez, bu nedenle internete ba�l� olan hemen hemen her bilgisayar taraf�ndan kullan�labilecektir. Hesab�n�z �oktan olu�turuldu :), oturum a�mak i�in a�a��daki bilgileri kullanabilirsiniz:
				
	http://';
$menuFuncStr[12]	= '
	�ifre:	';
$menuFuncStr[13]	= "
	(oturum a�t�ktan sonra de�i�tirebilirsiniz)\n\r\n\r
E�er herhangi bir sorunuz varsa, l�tfen oturum a�t�ktan sonra birka� dakikan�z� yard�m� okumaya ay�r�n (men�n�n sa� �st�nde yer almaktad�r).\n\r\n\r\n\r\n\r
En iyi dileklerimizle,
Some Chess Otomasyon\n\r\n\r
nb- e�er e-posta adresinizin hemen silinip silinmedi�ini merak ediyorsan�z; bir daha, bir arkada��n�z sizi Some Chess'e davet edene kadar bizim ad�m�z� duymayaca��n�z� s�ylemek istiyoruz";
$menuFuncStr[14]	= 'Arkada��n�z davet edildi';
$menuFuncStr[15]	= 'Bir dosya se�melisiniz';
$menuFuncStr[16]	= 'Dosyan�n boyutu s�f�r g�r�n�yor:';
$menuFuncStr[17]	= 'Dosya boyutu �ok fazla en fazla 500 kb olmal�d�r';
$menuFuncStr[18]	= 'Dosyan�z aktar�l�rken hata olu�tu';
$menuFuncStr[19]	= '�zg�n�z �u dosya t�r� kabul edilmiyor:';
$menuFuncStr[20]	= 'Ba�ar�l�! Dosyan�z ba�ar�yla g�nderildi';
$menuFuncStr[21]	= '�zg�n�z, beklenmedik bir hata olu�tu. L�tfen tekrar deneyin';
$menuFuncStr[22]	= '
	Kullan�c� ad�:	';
$menuFuncStr[23]	= '�ifreniz 6-15 aras� uzunlukta olmal�d�r';	//NEW TO 2.0b5
$menuFuncStr[24]	= 'Kullan�c� ad� 5-20 aras� uzunlukta olmal�d�r';	//NEW TO 2.0b5
$menuFuncStr[25]	= 'G�venlik sorusu 90 karakterden fazla olamaz';	//NEW TO 2.0b5
$menuFuncStr[26]	= 'Kullan�c� ad� ve �ifre ayn� olamaz';	//NEW TO 2.0b5

$gameStr[0]	= 'Some Chess iframe kullanmaktad�r. E�er bu yaz�y� g�r�yorsan�z, taray�c�n�z iframe desteklemiyordur.';
$gameStr[1]	= 'Some Chess nesneleri kullanmaktad�r, E�er bu yaz�y� g�r�yorsan�z, taray�c�n�z nesneleri desteklemiyordur.';

$loginStr[0]	= 'Oturum A�';
$loginStr[1]	= $menuStr[6];
$loginStr[2]	= $menuStr[21];
$loginStr[3]	= $menuFuncStr[1];
$loginStr[4]	= 'Sistemde bir hata olu�tu. L�tfen admin\'le irtibata ge�in';
$loginStr[5]	= 'Oturumunuz a��lamad�, l�tfen tekrar deneyin';
$loginStr[6]	= 'Oturumunuz kapat�ld�';
$loginStr[7]	= 'Tekrar Oturum A�mak i�in buraya t�klay�n';
$loginStr[8]	= '�ifremi unuttum';	//NEW TO 2.0b5
$loginStr[9]	= 'Yan�t';	//NEW TO 2.0b5
$loginStr[10]	= 'Kay�t bulunamad�';	//NEW TO 2.0b5
$loginStr[11]	= 'Yeni �ifre (oturum a�t���n�zda bunu de�i�tirin)<br />';	//NEW TO 2.0b5

$statsStr[0]	= '�statistikler';
$statsStr[1]	= $menuStr[13];
$statsStr[2]	= 'G';
$statsStr[3]	= 'M';
$statsStr[4]	= 'B';
$statsStr[5]	= 'hi� kimse';
$statsStr[6]	= 'En Fazla Devam Eden Oyun';
$statsStr[7]	= 'En fazla Oynayan';
$statsStr[8]	= 'En fazla Galibiyet';
$statsStr[9]	= 'En fazla Ma�lubiyet';
$statsStr[10]	= 'En fazla Beraberlik';
$statsStr[11]	= 'En iyi Kazanma %';
$statsStr[12]	= '�ahsi Durumlar';
$statsStr[13]	= 'ger�ek isim';
$statsStr[14]	= $menuStr[23];
$statsStr[15]	= 'Kullan�c�';
$statsStr[16]	= 'Davet eden:';
$statsStr[17]	= 'Puan';	//NEW TO 2.0b5
$statsStr[18]	= 'En Fazla Puan';	//NEW TO 2.0b5
$statsStr[19]	= 'En Son �evrim i�i';	//NEW TO 2.0b5
$statsStr[20]	= 'Kazanma ort.';	//NEW TO 2.0b5
$statsStr[21]	= 'Ma�lubiyet ort.';	//NEW TO 2.0b5
$statsStr[22]	= 'Beraberlik ort.';	//NEW TO 2.0b5
$statsStr[23]	= 'Oynan�lan Oyunlar';	//NEW TO 2.0b5
$statsStr[24]	= 'Oyun IP';	//NEW TO 2.0b5
$statsStr[25]	= 'Yemleme';	//NEW TO 2.0b5
$statsStr[26]	= '�ntikam';	//NEW TO 2.0b5
$statsStr[27]	= 'Galibiyet';	//NEW TO 2.0b5
$statsStr[28]	= 'Ma�lubiyet';	//NEW TO 2.0b5
$statsStr[29]	= 'Beraberlik';	//NEW TO 2.0b5
$statsStr[30]	= $statsStr[23];	//NEW TO 2.0b5
$statsStr[31]	= 'Ki�isel �statistikler';	//NEW TO 2.0b5

$regStr[0]	= 'Kay�t Ol';
$regStr[1]	= 'Kaydol';
$regStr[2]	= 'L�tfen, kullan�c� ad� ve �ifre se�in';
$regStr[3]	= $menuFuncStr[8];
$regStr[4]	= 'Kayd�n�z tamamland�. Some Chess\'in tad�n� ��kar�n<br /><br /> kullan�c� ad�: ';	//MODIFIED FOR 2.0b5
$regStr[5]	= 'Kay�t kodu e�le�miyor, l�tfen tekrar deneyin';
$regStr[6]	= 'Bir hata olu�tu, l�tfen tekrar deneyin';
$regStr[7]	= $menuFuncStr[23];
$regStr[8]	= $menuFuncStr[24];
$regStr[9]	= $menuFuncStr[26];

$indexStr[0]	= 'Veritaban� olu�tururken hata olu�tu. L�tfen manuel olarak olu�turun';
$indexStr[1]	= 'Some Chess tablolar�n� olu�tururken bir hata olu�tu, l�tfen manuel olarak olu�turun';
$indexStr[2]	= 'Some Chess kurulumu Ba�ar�l�!<br /><br /> Kullan�c� ad�: admin<br /> �ifre: admin <br />(oturum a�t���n�zda bunlar� de�i�tirin)';
$indexStr[3]	= 'Some Chess tablolar�n� g�ncelle�tirirken hata olu�tu, l�tfen elle g�ncelleyin';
$indexStr[4]	= 'Some Chess ba�ar�yla g�ncellendi!';

$colorStr[0]	= 'beyaz';	//NEW TO 2.0b4
$colorStr[1]	= 'siyah';	//NEW TO 2.0b4
$colorStr[2]	= 'rasgele';	//NEW TO 2.0rc2
?>