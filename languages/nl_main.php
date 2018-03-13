<?php //--(v2.0rc3)  belongs to: endgame, menuFunc, admin, chat, export, game, index, standard, menu, login, logout, stats, statsFunc

define('errorDBStr', 'FOUT bij het verbinden met de database');

$mainMenuStr[0]	= 'menu';
$mainMenuStr[1]	= '?';
$mainMenuStr[2]	= 'afloggen';

$chatStr[0]	= 'Chat';

$buttStr[0]	= 'Uitvoeren';
$buttStr[1]	= 'Update';
$buttStr[2]	= 'Uitnodigen';
$buttStr[3]	= 'Verwijderen';
$buttStr[4]	= 'Opgeven';
$buttStr[5]	= 'Gelijk spel';
$buttStr[6]	= 'Einde';
$buttStr[7]	= $chatStr[0];
$buttStr[8]	= 'Export';
$buttStr[9]	= 'Upload';
$buttStr[10]= 'Ongedaan maken';
$buttStr[11]= 'Terug';
$buttStr[12]= 'Import';

$adminStr[0]	= 'Beheerders opties';
$adminStr[1]	= 'Speler verwijderen';
$adminStr[2]	= 'Spelersrechten aanpassen';
$adminStr[3]	= 'De speler is verwijderd';
$adminStr[4]	= 'Fout: u dient een speler en een spelersrecht te selecteren';
$adminStr[5]	= 'De rechten van de speler zijn aangepast';
$adminStr[6]	= 'Weet u zeker dat u wilt verwijderen';
$adminStr[7]	= 'Weet u zeker dat u de rechten wil aanpassen van: ';
$adminStr[8]	= 'Zoeken naar updates';
$adminStr[9]	= $buttStr[3];
$adminStr[10]	= $buttStr[1];
$adminStr[11]	= $buttStr[0];
$adminStr[12]	= 'Er is een update beschikbaar';
$adminStr[13]	= 'hier klikken';
$adminStr[14]	= 'U heeft de laatste versie';
$adminStr[15]	= 'Backup Database';
$adminStr[16]	= 'Opties';
$adminStr[17]	= 'De opties zijn aangepast.';
$adminStr[18]	= 'De opties zijn NIET aangepast. Check de rechten van het config.php bestand.';
$adminStr[19]	= 'Sorry, maar uw config.php bestand heeft <b>geen</b> schrijfrechten, om deze optie te gebruiken dient u de rechten handmatig aan te passen naar rw-rw-rw of 666';
$adminStr[20]	= 'Some Chess Opties';  //NEW FOR 2.0b4

$gameFuncStr[1]	= 'U verlaat de partij';
$gameFuncStr[2]	= 'U stelt een remise voor<p>Uw tegenspeler kan uw voorstel tot remise weigeren door een nieuwe zet te doen</p>';
$gameFuncStr[3]	= 'U accepteert remise';
$gameFuncStr[4]	= 'U heeft al remise voorgesteld, wacht de reactie van uw tegenspeler af';
$gameFuncStr[5]	= 'U heeft de partij opgegeven';
$gameFuncStr[6]	= 'Uw tegenspeler heeft de partij opgegeven';
$gameFuncStr[7]	= 'De partij is ten einde';
$gameFuncStr[8]	= '<h2>Weet u zeker dat u wil opgeven?</h2><p>Deze partij zal als verloren meetellen</p>';
$gameFuncStr[9]	= '<h2>Weet u zeker dat u remise voorstelt?</h2>';
$gameFuncStr[10]	= '<h2>Weet u zeker dat u wilt stoppen?</h2><p>Als er meer dan 2 zetten zijn geweest, wint degene die de laatste zet heeft gedaan</p>';
$gameFuncStr[11]	= '<h2>Weet u zeker dat u een <u>verzoek</u> tot ongedaan maken van de laatste zet aan uw tegenspeler wilt doen?</h2><p>Uw tegenspeler kan het verzoek weigeren door een nieuwe zet te doen</p>';
$gameFuncStr[12]	= '<h2>Weet u zeker dat u het verzoek tot ongedaan maken van de laatste zet van uw tegenspeler wilt honoreren?</h2>';
$gameFuncStr[13]	= '<h2>Ongedaan maken is toegestaan</h2>';
$gameFuncStr[14]	= 'U heeft een verzoek tot ongedaan maken van de laatste zet ingediend, wacht op de reactie van uw tegenspeler';
$gameFuncStr[15]	= '<h2>Helaas kunt u de laatste zet niet meer ongedaan maken</h2><p>U dient dit verzoek binnen 30 seconden te doen, de functie ongedaan maken is alleen bedoeld om typefoutjes te herstellen</p>';
$gameFuncStr[16]	= '<h2>Weet u zeker dat u het voorstel tot remise accepteert?</h2>';
$gameFuncStr[17]	= 'Er is een nieuw spel aangemaakt';
$gameFuncStr[18]	= 'Selecteer een tegenspeler';
$gameFuncStr[19]	= 'Het spel is geïmporteerd en is beschikbaar onder "Partijen bekijken"';
$gameFuncStr[20]	= 'Gebruik "plakken" om het gehele PNG bestand in het veld te kopieeren';

$menuStr[0]	= 'Nieuwe partij beginnen';
$menuStr[1]	= 'Tegen';
$menuStr[2]	= 'Uw kleur';
$menuStr[3]	= 'Uw info updaten';
$menuStr[4]	= 'Speler afbeelding';
$menuStr[5]	= 'Speler uitnodigen';
$menuStr[6]	= 'Naam';
$menuStr[7]	= 'Email';
$menuStr[8]	= 'Spelers Online';
$menuStr[9]	= '\'s partijen';
$menuStr[10]	= 'Gewonnen';
$menuStr[11]	= 'Verloren';
$menuStr[12]	= 'Remise';
$menuStr[13]	= 'Spelers';
$menuStr[14]	= 'Uw record is';
$menuStr[15]	= 'Bezig';
$menuStr[16]	= 'Profiel';
$menuStr[17]	= 'Uitnodigen';
$menuStr[18]	= 'Import';
$menuStr[19]	= 'Naam';
$menuStr[20]	= 'Gebruikersnaam';
$menuStr[21]	= 'Wachtwoord';
$menuStr[22]	= 'Nogmaals';
$menuStr[23]	= 'Lokatie';
$menuStr[24]	= 'Email';
$menuStr[25]	= 'Import PGN';
$menuStr[26]	= 'Uw zet';
$menuStr[27]	= 'Einde partij?';
$menuStr[28]	= 'Remise?';
$menuStr[29]	= 'Ongedaan maken?';
$menuStr[30]	= 'Alle partijen';	//MODIFIED FOR 2.0b5
$menuStr[31]	= 'Partijen in uitvoering';
$menuStr[32]	= 'Afgesloten partijen';
$menuStr[33]	= 'Uw partijen';
$menuStr[34]	= 'Partijen bekijken';
$menuStr[35]	= 'Schaak';	//NEW TO 2.0b5
$menuStr[36]	= 'Veiligheidsvraag';	//NEW TO 2.0b5
$menuStr[37]	= 'Veiligheidsantwoord';	//NEW TO 2.0b5
$menuStr[38]	= 'Hieronder PGN bestand "plakken"';	//NEW TO 2.0b5
$menuStr[39]	= 'Welkom bij Some Chess, ';	//NEW TO 2.0b5
$menuStr[40]	= 'Partij type';	//NEW TO 2.0rc4
$menuStr[41]	= 'standaard';	//NEW TO 2.0rc4

$menuFuncStr[1]	= 'U dient beide velden in te vullen';
$menuFuncStr[2]	= 'De wachtwoorden komen niet overeen';
$menuFuncStr[3]	= 'Uw wachtwoord is aangepast';
$menuFuncStr[4]	= 'Uw profiel is aangepast';
$menuFuncStr[5]	= 'U dient iets in te vullen voordat de gegevens kunnen worden aangepast';
$menuFuncStr[6]	= 'U dient beide velden in te vullen, het e-mailadres wordt <b>niet</b> bewaard';
$menuFuncStr[7]	= 'Het e-mailadres is niet geldig, probeer opnieuw<br /> het e-mailadres wordt <b>niet</b> bewaard';
$menuFuncStr[8]	= 'Helaas, deze naam is al in gebruik; gelieve een andere te kiezen';
$menuFuncStr[9]	= 'U bent uitgenodigd voor een partijtje schaak over het Internet';
$menuFuncStr[10]	= 'Een kennis heeft u uitgenodigd voor een partijtje schaak over het Internet. Zijn/haar naam op de Internet site is ';
$menuFuncStr[11]	= '. Some Chess is een Internet schaakprogramma waar u in \'real-time\' kunt spelen of over een langere periode verdeeld. Some Chess gebruikt geen \'add-in\'s\' en werkt op bijna elke computer met een Internet verbinding. Uw toegangscode (account) is al aangemaakt, u kunt de onderstaande informatie gebruiken om aan te loggen:				
	http://';
$menuFuncStr[12]	= '
	Wachtwoord:	';
$menuFuncStr[13]	= "
	(U kunt deze gegevens aanpassen nadat u bent aangelogd)\n\r\n\r
Indien u vragen heeft kunt u terecht op de help-pagina (boven in het menu).\n\r\n\r\n\r\n\r
Veel succes,
Some Chess automatische mail\n\r\n\r
ps: in geval u zich afvraagt wat er met uw e-mailadres gebeurd, dit is niet opgeslagen en alleen voor deze uitnodiging gebruikt. Totdat iemand u opnieuw uitnodigt zult u geen mail meer ontvangen van \'some chess\'";
$menuFuncStr[14]	= 'Uw kennis is uitgenodigd';
$menuFuncStr[15]	= 'U dient een bestand te kiezen';
$menuFuncStr[16]	= 'Het bestand lijkt leeg te zijn:';
$menuFuncStr[17]	= 'Het bestand is te groot, het kan maximaal 500kb zijn';
$menuFuncStr[18]	= 'Er heeft zich een fout voorgedaan met uw bestand';
$menuFuncStr[19]	= 'Helaas, het gebruikte type bestand kan niet worden gebruikt:';
$menuFuncStr[20]	= 'Het bestand is met succes geüploaded';
$menuFuncStr[21]	= 'Helaas, er heeft zich een fout voorgedaan, probeer opnieuw';
$menuFuncStr[22]	= '
	Gebruikersnaam:	';
$menuFuncStr[23]	= 'Het wachtwoord dient minimaal 6 en maximaal 15 tekens lang te zijn';	//NEW TO 2.0b5
$menuFuncStr[24]	= 'De gebruikersnaam dient minimaal 5 en maximaal 20 tekens lang te zijn';	//NEW TO 2.0b5
$menuFuncStr[25]	= 'De veiligheidsvraag kan maximaal 90 tekens lang zijn';	//NEW TO 2.0b5
$menuFuncStr[26]	= 'Het wachtwoord en de gebruikersnaam mogen niet hetzelfde zijn';	//NEW TO 2.0b5

$gameStr[0]	= 'Some Chess gebruikt een iframe, als u deze melding kunt zien dan ondersteund uw verkenner (browser) geen iframes';
$gameStr[1]	= 'Some Chess gebruikt een object, als u deze melding kunt zien dan ondersteund uw verkenner (browser) geen objecten';

$loginStr[0]	= 'Inloggen';
$loginStr[1]	= $menuStr[6];
$loginStr[2]	= $menuStr[21];
$loginStr[3]	= $menuFuncStr[1];
$loginStr[4]	= 'Er heeft zich een fout voorgedaan, neem contact op met de beheerder';
$loginStr[5]	= 'U kunt niet aanloggen, probeer opnieuw';
$loginStr[6]	= 'U bent afgelogd';
$loginStr[7]	= 'Hier klikken om opnieuw aan te loggen';
$loginStr[8]	= 'Wachtwoord vergeten';	//NEW TO 2.0b5
$loginStr[9]	= 'Antwoord';	//NEW TO 2.0b5
$loginStr[10]	= 'Geen gegevens gevonden';	//NEW TO 2.0b5
$loginStr[11]	= 'Nieuw wachtwoord (dit dient u te veranderen als u bent aangelogd)<br />';	//NEW TO 2.0b5

$statsStr[0]	= 'Statistieken';
$statsStr[1]	= $menuStr[13];
$statsStr[2]	= 'W';
$statsStr[3]	= 'V';
$statsStr[4]	= 'R';
$statsStr[5]	= 'niemand';
$statsStr[6]	= 'Meeste lopende partijen';
$statsStr[7]	= 'Meeste gespeeld';
$statsStr[8]	= 'Meeste gewonnen';
$statsStr[9]	= 'Meeste verloren';
$statsStr[10]	= 'Meeste remises';
$statsStr[11]	= 'Beste win %';
$statsStr[12]	= 'Individuele statistieken';
$statsStr[13]	= 'echte naam';
$statsStr[14]	= $menuStr[23];
$statsStr[15]	= 'Actief sinds';
$statsStr[16]	= 'Uitgenodigd door';
$statsStr[17]	= 'Punten';	//NEW TO 2.0b5
$statsStr[18]	= 'Meeste punten';	//NEW TO 2.0b5
$statsStr[19]	= 'Laatst Online';	//NEW TO 2.0b5
$statsStr[20]	= 'Win gemiddelde';	//NEW TO 2.0b5
$statsStr[21]	= 'Verloren gemiddelde';	//NEW TO 2.0b5
$statsStr[22]	= 'Remise gemiddelde';	//NEW TO 2.0b5
$statsStr[23]	= 'Partijen gespeeld';	//NEW TO 2.0b5
$statsStr[24]	= 'Open partijen';	//NEW TO 2.0b5
$statsStr[25]	= 'Slechtste tegenstander';	//NEW TO 2.0b5
$statsStr[26]	= 'Beste tegenstander';	//NEW TO 2.0b5
$statsStr[27]	= 'Gewonnen';	//NEW TO 2.0b5
$statsStr[28]	= 'Verloren';	//NEW TO 2.0b5
$statsStr[29]	= 'Remises';	//NEW TO 2.0b5
$statsStr[30]	= $statsStr[23];	//NEW TO 2.0b5
$statsStr[31]	= 'Persoonlijke statistieken';	//NEW TO 2.0b5

$regStr[0]	= 'Registreren';
$regStr[1]	= 'Inschrijven';
$regStr[2]	= 'Gelieve terug te gaan en een gebruikersnaam en wachtwoord kiezen';
$regStr[3]	= $menuFuncStr[8];
$regStr[4]	= 'U bent geregistreerd; veel plezier bij het schaakspel<br /><br /> gebruikersnaam: ';	//MODIFIED FOR 2.0b5
$regStr[5]	= 'De registratiecode klopt niet; gelieve terug te gaan en opnieuw te proberen';
$regStr[6]	= 'Er heeft zich een fout voorgedaan, gelieve terug te gaan en opnieuw te proberen';
$regStr[7]	= $menuFuncStr[23];
$regStr[8]	= $menuFuncStr[24];
$regStr[9]	= $menuFuncStr[26];

$indexStr[0]	= 'Er heeft zich een fout voorgedaan bij het automatisch aanmaken van de database, probeer het handmatig';
$indexStr[1]	= 'Er heeft zich een fout voorgedaan bij het aanmaken van de tabellen, probeer het handmatig';
$indexStr[2]	= 'Installatie van Some Chess was Succesvol!<br /><br /> Gebruikersnaam: admin<br /> wachtwoord: admin <br />(Dit dient u te veranderen nadat u bent aangelogd)';
$indexStr[3]	= 'Er heeft zich een probleem voorgedaan bij het updaten van de tabellen, probeer het handmatig';
$indexStr[4]	= 'Some Chess was succesvol geüpdated!';

$colorStr[0]	= 'wit';	//NEW TO 2.0b4
$colorStr[1]	= 'zwart';	//NEW TO 2.0b4
$colorStr[2]	= 'willekeurig';	//NEW TO 2.0rc2
?>