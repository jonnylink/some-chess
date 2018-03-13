<?php //--(v2.0rc3)  belongs to: endgame, menuFunc, admin, chat, export, game, index, standard, menu, login, logout, stats, statsFunc

define('errorDBStr', 'HATA! Veritabanýna baðlanýlamadý');

$mainMenuStr[0]	= 'menü';
$mainMenuStr[1]	= 'yardým';
$mainMenuStr[2]	= 'çýkýþ yap';

$chatStr[0]	= 'Sohbet';

$buttStr[0]	= 'GÝT';
$buttStr[1]	= 'Güncelle';
$buttStr[2]	= 'Davet et';
$buttStr[3]	= 'SÝL';
$buttStr[4]	= 'ÇekÝl';
$buttStr[5]	= 'Berabere';
$buttStr[6]	= 'Bitir';
$buttStr[7]	= $chatStr[0];
$buttStr[8]	= 'Kaydet';
$buttStr[9]	= 'Yükle';
$buttStr[10]= 'GerÝ Al';
$buttStr[11]= 'GerÝ';
$buttStr[12]= 'Aktar';

$adminStr[0]	= 'Yönetici Ayarlarý';
$adminStr[1]	= 'Oyuncuyu Sil';
$adminStr[2]	= 'Ayrýcalýk Seviyesini Deðiþtir';
$adminStr[3]	= 'Oyuncu silindi';
$adminStr[4]	= 'Hata: Bir isim ve ayrýcalýk seviyesi seçmelisiniz';
$adminStr[5]	= 'Oyuncunun Ayrýcalýk Seviyesi deðiþtirildi';
$adminStr[6]	= 'Silmek istiyor musunuz?';
$adminStr[7]	= 'Þu kullanýcý için Ayrýcalýk Seviyesini deðiþtirmek istiyor musunuz: ';
$adminStr[8]	= 'Güncellemeleri kontrol et';
$adminStr[9]	= $buttStr[3];
$adminStr[10]	= $buttStr[1];
$adminStr[11]	= $buttStr[0];
$adminStr[12]	= 'Bir güncelleme mevcut';
$adminStr[13]	= 'buraya týklayýn';
$adminStr[14]	= 'En son sürüme sahipsiniz';
$adminStr[15]	= 'Veritabanýný yedekle';
$adminStr[16]	= 'Ayarlar';
$adminStr[17]	= 'Ayarlar güncellendi.';
$adminStr[18]	= 'Ayarlar güncellenemedi. config.php dosya izinlerini kontrol edin.';
$adminStr[19]	= 'Üzgünüz, config.php dosyanýz yazýlabilir <b>deðil</b>, bu fonksiyonu kullanabilmek için dosya izinlerini manuel olarak  rw-rw-rw veya 666 þeklinde deðiþtirmeniz gereklidir';
$adminStr[20]	= 'Some Chess Seçenekleri';  //NEW FOR 2.0b4

$gameFuncStr[1]	= 'Oyundan çekildiniz';
$gameFuncStr[2]	= 'Bir beraberlik istediniz<p>Arkadaþýnýz, hamle yaparak bu teklifi reddedebilir</p>';
$gameFuncStr[3]	= 'Beraberliði kabul ettiniz';
$gameFuncStr[4]	= 'Zaten bir beraberlik teklifi yaptýnýz, lütfen yanýtýný bekleyin';
$gameFuncStr[5]	= 'Oyundan kaçtýnýz';
$gameFuncStr[6]	= 'Arkadaþýnýz oyundan kaçtý';
$gameFuncStr[7]	= 'Oyun bitti';
$gameFuncStr[8]	= '<h2>Çekilmek istediðinizden emin misiniz?</h2><p>Bu oyun, kaybedilen olarak kayýtlara geçecektir</p>';
$gameFuncStr[9]	= '<h2>Beraberlik istiyor musunuz?</h2>';
$gameFuncStr[10]	= '<h2>Bu oyunu bitirmek istediðinizden emin misiniz?</h2><p>Eðer 2\'den fazla hamle yapýlmýþsa, son hamleyi yapan puaný alacaktýr</p>';
$gameFuncStr[11]	= '<h2>Arkadaþýnýza geri alma teklifinizi <u>göndermek</u> istiyor musunuz?</h2><p>Arkadaþýnýz, hamle yaparak bu isteði reddedebilir</p>';
$gameFuncStr[12]	= '<h2>Arkadaþýnýzýn son hamlesini geri almasýna izin veriyor musunuz?</h2>';
$gameFuncStr[13]	= '<h2>Geri alma izni verildi</h2>';
$gameFuncStr[14]	= 'Bir geri alma teklifi yaptýnýz, lütfen diðer oyuncunun yanýtýný bekleyin';
$gameFuncStr[15]	= '<h2>Üzgünüz, geri alamazsýnýz</h2><p>Ýsteðinizi hamlenizden sonraki 30 saniye içerisinde yapmalýsýnýz, "geri al" butonu sadece hatalar içindir</p>';
$gameFuncStr[16]	= '<h2>Beraberlik teklifini kabul etmek istiyor musunuz?</h2>';
$gameFuncStr[17]	= 'Yeni oyun oluþturuldu';
$gameFuncStr[18]	= 'Lütfen oynamak istediðiniz bir oyuncu seçin';
$gameFuncStr[19]	= 'Oyun aktarýldý, ve "Oyunlara Bak" bölümünden görülebilir';
$gameFuncStr[20]	= 'Lütfen, alana PGN yazýsýný yapýþtýrýn';

$menuStr[0]	= 'Yeni Oyun Baþlat';
$menuStr[1]	= 'Kime Karþý';
$menuStr[2]	= 'Renginiz';
$menuStr[3]	= 'Bilgilerinizi Güncelleyin';
$menuStr[4]	= 'Oyuncu Resimleri';
$menuStr[5]	= 'Arkadaþ Davet Et';
$menuStr[6]	= 'Ýsim';
$menuStr[7]	= 'E-posta';
$menuStr[8]	= 'Çevrim içi Oyuncular';
$menuStr[9]	= ' Oyunlarý:';
$menuStr[10]	= 'GALÝBÝYET';
$menuStr[11]	= 'MAÐLUP';
$menuStr[12]	= 'BERABERE';
$menuStr[13]	= 'Oyuncular';
$menuStr[14]	= 'Rekorunuz';
$menuStr[15]	= 'YARIM';
$menuStr[16]	= 'PROFÝLÝM';
$menuStr[17]	= 'Davet Et';
$menuStr[18]	= 'Aktar';
$menuStr[19]	= 'Ýsim';
$menuStr[20]	= 'Kullanýcý adý';
$menuStr[21]	= 'Þifre';
$menuStr[22]	= 'Yenileyin';
$menuStr[23]	= 'Yer';
$menuStr[24]	= 'E-posta';
$menuStr[25]	= 'PGN Aktar';
$menuStr[26]	= 'Hamleniz';
$menuStr[27]	= 'Oyunu bitir?';
$menuStr[28]	= 'Beraberlik?';
$menuStr[29]	= 'GERÝ AL?';
$menuStr[30]	= 'Tüm oyunlar';	//MODIFIED FOR 2.0b5
$menuStr[31]	= 'Devam Eden Oyunlar';
$menuStr[32]	= 'Tamamlanan Oyunlar';
$menuStr[33]	= 'Sizin Oyunlarýnýz';
$menuStr[34]	= 'Oyunlara Bak';
$menuStr[35]	= 'Satranç';	//NEW TO 2.0b5
$menuStr[36]	= 'Güvenlik Sorusu';	//NEW TO 2.0b5
$menuStr[37]	= 'Güvenlik Yanýtý';	//NEW TO 2.0b5
$menuStr[38]	= 'PGN\'yi buraya yapýþtýrýn';	//NEW TO 2.0b5
$menuStr[39]	= 'Some Chess\'e Hoþgeldiniz, Sayýn ';	//NEW TO 2.0b5
$menuStr[40]	= 'Oyun Türü';	//NEW TO 2.0rc4
$menuStr[41]	= 'standart';	//NEW TO 2.0rc4

$menuFuncStr[1]	= 'Lütfen iki alaný da doldurun';
$menuFuncStr[2]	= 'Þifreler eþleþmiyor, lütfen tekrar yazýn';
$menuFuncStr[3]	= 'Þifreniz güncellendi';
$menuFuncStr[4]	= 'Profiliniz güncellendi';
$menuFuncStr[5]	= 'Lütfen güncelleme yapabilmek üzere bilgi yazýn.';
$menuFuncStr[6]	= 'Lütfen iki alaný da doldurun. E-posta adresleri herhangi bir þekilde kayýt <b>edilmemektedir</b>.';
$menuFuncStr[7]	= 'Bu, geçerli bir e-posta gibi görünmüyor, lütfen tekrar deneyin.<br /> E-posta adresleri herhangi bir þekilde kayýt <b>edilmemektedir</b>';
$menuFuncStr[8]	= 'Üzgünüz, bu kullanýcý adý alýnmýþ. Lütfen baþka deneyin';
$menuFuncStr[9]	= "Some Chess Oynamaya davet edildiniz";
$menuFuncStr[10]	= 'Bir arkadaþýnýz sizi Some Chess oynamaya davet etti. Oyundaki adý: ';
$menuFuncStr[11]	= '. Some Chess eþ zamanlý olarak ya da uzatmalý olarak oynanýlabilen (yazýþmalý satranç gibi), yeni internet satranç programýdýr. Some Chess, javascript gerektirmez, bu nedenle internete baðlý olan hemen hemen her bilgisayar tarafýndan kullanýlabilecektir. Hesabýnýz çoktan oluþturuldu :), oturum açmak için aþaðýdaki bilgileri kullanabilirsiniz:
				
	http://';
$menuFuncStr[12]	= '
	Þifre:	';
$menuFuncStr[13]	= "
	(oturum açtýktan sonra deðiþtirebilirsiniz)\n\r\n\r
Eðer herhangi bir sorunuz varsa, lütfen oturum açtýktan sonra birkaç dakikanýzý yardýmý okumaya ayýrýn (menünün sað üstünde yer almaktadýr).\n\r\n\r\n\r\n\r
En iyi dileklerimizle,
Some Chess Otomasyon\n\r\n\r
nb- eðer e-posta adresinizin hemen silinip silinmediðini merak ediyorsanýz; bir daha, bir arkadaþýnýz sizi Some Chess'e davet edene kadar bizim adýmýzý duymayacaðýnýzý söylemek istiyoruz";
$menuFuncStr[14]	= 'Arkadaþýnýz davet edildi';
$menuFuncStr[15]	= 'Bir dosya seçmelisiniz';
$menuFuncStr[16]	= 'Dosyanýn boyutu sýfýr görünüyor:';
$menuFuncStr[17]	= 'Dosya boyutu çok fazla en fazla 500 kb olmalýdýr';
$menuFuncStr[18]	= 'Dosyanýz aktarýlýrken hata oluþtu';
$menuFuncStr[19]	= 'Üzgünüz þu dosya türü kabul edilmiyor:';
$menuFuncStr[20]	= 'Baþarýlý! Dosyanýz baþarýyla gönderildi';
$menuFuncStr[21]	= 'Üzgünüz, beklenmedik bir hata oluþtu. Lütfen tekrar deneyin';
$menuFuncStr[22]	= '
	Kullanýcý adý:	';
$menuFuncStr[23]	= 'Þifreniz 6-15 arasý uzunlukta olmalýdýr';	//NEW TO 2.0b5
$menuFuncStr[24]	= 'Kullanýcý adý 5-20 arasý uzunlukta olmalýdýr';	//NEW TO 2.0b5
$menuFuncStr[25]	= 'Güvenlik sorusu 90 karakterden fazla olamaz';	//NEW TO 2.0b5
$menuFuncStr[26]	= 'Kullanýcý adý ve Þifre ayný olamaz';	//NEW TO 2.0b5

$gameStr[0]	= 'Some Chess iframe kullanmaktadýr. Eðer bu yazýyý görüyorsanýz, tarayýcýnýz iframe desteklemiyordur.';
$gameStr[1]	= 'Some Chess nesneleri kullanmaktadýr, Eðer bu yazýyý görüyorsanýz, tarayýcýnýz nesneleri desteklemiyordur.';

$loginStr[0]	= 'Oturum Aç';
$loginStr[1]	= $menuStr[6];
$loginStr[2]	= $menuStr[21];
$loginStr[3]	= $menuFuncStr[1];
$loginStr[4]	= 'Sistemde bir hata oluþtu. Lütfen admin\'le irtibata geçin';
$loginStr[5]	= 'Oturumunuz açýlamadý, lütfen tekrar deneyin';
$loginStr[6]	= 'Oturumunuz kapatýldý';
$loginStr[7]	= 'Tekrar Oturum Açmak için buraya týklayýn';
$loginStr[8]	= 'þifremi unuttum';	//NEW TO 2.0b5
$loginStr[9]	= 'Yanýt';	//NEW TO 2.0b5
$loginStr[10]	= 'Kayýt bulunamadý';	//NEW TO 2.0b5
$loginStr[11]	= 'Yeni þifre (oturum açtýðýnýzda bunu deðiþtirin)<br />';	//NEW TO 2.0b5

$statsStr[0]	= 'Ýstatistikler';
$statsStr[1]	= $menuStr[13];
$statsStr[2]	= 'G';
$statsStr[3]	= 'M';
$statsStr[4]	= 'B';
$statsStr[5]	= 'hiç kimse';
$statsStr[6]	= 'En Fazla Devam Eden Oyun';
$statsStr[7]	= 'En fazla Oynayan';
$statsStr[8]	= 'En fazla Galibiyet';
$statsStr[9]	= 'En fazla Maðlubiyet';
$statsStr[10]	= 'En fazla Beraberlik';
$statsStr[11]	= 'En iyi Kazanma %';
$statsStr[12]	= 'Þahsi Durumlar';
$statsStr[13]	= 'gerçek isim';
$statsStr[14]	= $menuStr[23];
$statsStr[15]	= 'Kullanýcý';
$statsStr[16]	= 'Davet eden:';
$statsStr[17]	= 'Puan';	//NEW TO 2.0b5
$statsStr[18]	= 'En Fazla Puan';	//NEW TO 2.0b5
$statsStr[19]	= 'En Son Çevrim içi';	//NEW TO 2.0b5
$statsStr[20]	= 'Kazanma ort.';	//NEW TO 2.0b5
$statsStr[21]	= 'Maðlubiyet ort.';	//NEW TO 2.0b5
$statsStr[22]	= 'Beraberlik ort.';	//NEW TO 2.0b5
$statsStr[23]	= 'Oynanýlan Oyunlar';	//NEW TO 2.0b5
$statsStr[24]	= 'Oyun IP';	//NEW TO 2.0b5
$statsStr[25]	= 'Yemleme';	//NEW TO 2.0b5
$statsStr[26]	= 'Ýntikam';	//NEW TO 2.0b5
$statsStr[27]	= 'Galibiyet';	//NEW TO 2.0b5
$statsStr[28]	= 'Maðlubiyet';	//NEW TO 2.0b5
$statsStr[29]	= 'Beraberlik';	//NEW TO 2.0b5
$statsStr[30]	= $statsStr[23];	//NEW TO 2.0b5
$statsStr[31]	= 'Kiþisel Ýstatistikler';	//NEW TO 2.0b5

$regStr[0]	= 'Kayýt Ol';
$regStr[1]	= 'Kaydol';
$regStr[2]	= 'Lütfen, kullanýcý adý ve þifre seçin';
$regStr[3]	= $menuFuncStr[8];
$regStr[4]	= 'Kaydýnýz tamamlandý. Some Chess\'in tadýný çýkarýn<br /><br /> kullanýcý adý: ';	//MODIFIED FOR 2.0b5
$regStr[5]	= 'Kayýt kodu eþleþmiyor, lütfen tekrar deneyin';
$regStr[6]	= 'Bir hata oluþtu, lütfen tekrar deneyin';
$regStr[7]	= $menuFuncStr[23];
$regStr[8]	= $menuFuncStr[24];
$regStr[9]	= $menuFuncStr[26];

$indexStr[0]	= 'Veritabaný oluþtururken hata oluþtu. Lütfen manuel olarak oluþturun';
$indexStr[1]	= 'Some Chess tablolarýný oluþtururken bir hata oluþtu, lütfen manuel olarak oluþturun';
$indexStr[2]	= 'Some Chess kurulumu Baþarýlý!<br /><br /> Kullanýcý adý: admin<br /> þifre: admin <br />(oturum açtýðýnýzda bunlarý deðiþtirin)';
$indexStr[3]	= 'Some Chess tablolarýný güncelleþtirirken hata oluþtu, lütfen elle güncelleyin';
$indexStr[4]	= 'Some Chess baþarýyla güncellendi!';

$colorStr[0]	= 'beyaz';	//NEW TO 2.0b4
$colorStr[1]	= 'siyah';	//NEW TO 2.0b4
$colorStr[2]	= 'rasgele';	//NEW TO 2.0rc2
?>