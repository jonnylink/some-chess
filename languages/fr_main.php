<?php //--(v2.0rc3)  belongs to: endgame, menuFunc, admin, chat, export, game, index, standard, menu, login, logout, stats, statsFunc
define('errorDBStr', 'ERREUR lors de la connexion &agrave; la base : ');

$mainMenuStr[0]	= 'menu';
$mainMenuStr[1]	= '?';
$mainMenuStr[2]	= 'd&eacute;connecter';

$chatStr[0]	= 'Clavardage';

$buttStr[0]	= 'Aller';
$buttStr[1]	= 'Actualisation';
$buttStr[2]	= 'Inviter';
$buttStr[3]	= 'Enlever';
$buttStr[4]	= 'Renoncer';
$buttStr[5]	= 'Match Nul';
$buttStr[6]	= 'Finir';
$buttStr[7]	= $chatStr[0];
$buttStr[8]	= 'Export';
$buttStr[9]	= 'T&eacute;l&eacute;charger';
$buttStr[10]= 'D&eacute;faire';
$buttStr[11]= 'Rendre';
$buttStr[12]= 'Importer';

$adminStr[0]	= 'Admin Options';
$adminStr[1]	= 'Delete Player';
$adminStr[2]	= 'Change Privilege Level';
$adminStr[3]	= 'Le joueur a &egrave;t&egrave; supprim&egrave;';
$adminStr[4]	= 'Erreur : vous devez choisir un nom et un niveau d\'autorisations pour l\'utilisateur';
$adminStr[5]	= 'Le niveau d\'autorisation du joueur a &egrave;t&egrave; modifi&egrave;';
$adminStr[6]	= 'Etes-vous certain(e) de vouloir le supprimer&nbsp;?';
$adminStr[7]	= 'Etes-vous certain(e) de vouloir changer le niveau d\'autorisations de&nbsp;: ';
$adminStr[8]	= 'Rechercher les mises &agrave; jour...';
$adminStr[9]	= $buttStr[3];
$adminStr[10]	= $buttStr[1];
$adminStr[11]	= $buttStr[0];
$adminStr[12]	= 'Une mise &agrave; jour est disponible';
$adminStr[13]	= 'Cliquez ici';
$adminStr[14]	= 'Vous poss&egrave;dez d&egrave;j&agrave; la version la plus r&egrave;cente';
$adminStr[15]	= 'Base de donn&egrave;es de sauvegarde';
$adminStr[16]	= 'Options';
$adminStr[17]	= 'Les options ont &egrave;t&egrave; mises &agrave; jour.';
$adminStr[18]	= 'Les options N\'ONT PAS &egrave;t&egrave; mises &agrave; jour. Veuillez v&egrave;rifier les permissions associ&egrave;es au fichier config.php.';
$adminStr[19]	= 'D&egrave;sol&egrave;, mais votre fichier config.php <b>n\'est pas</b> accessible en &egrave;criture. Pour pouvoir utiliser cette fonction, vous devrez changer les autorisations du fichier manuellement en rw-rw-rw or 666';
$adminStr[20]	= 'Options de Some Chess';

$gameFuncStr[1]	= 'Vous avez abandonn&egrave;';
$gameFuncStr[2]	= 'Vous avez propos&egrave; une partie nulle.<p>Votre partenaire peut rejeter cette offre en jouant un nouveau coup.</p>';
$gameFuncStr[3]	= 'La partie nulle a &egrave;t&egrave; accept&egrave;e.';
$gameFuncStr[4]	= 'Vous avez d&egrave;j&agrave; propos&egrave; de conclure &agrave; la nullit&egrave; de cette partie, merci de bien vouloir attendre la r&egrave;ponse de votre partenaire.';
$gameFuncStr[5]	= 'Vous avez d&egrave;clar&egrave; forfait.';
$gameFuncStr[6]	= 'You\'re friend has forfeited the game';
$gameFuncStr[7]	= 'The game has been ended';
$gameFuncStr[8]	= '<h2>Etes-vous sûr(e) de vouloir abandonner&nbsp;?</h2><p>Cette partie sera consid&egrave;r&egrave;e comme une d&egrave;faite.</p>';
$gameFuncStr[9]	= '<h2>Etes-vous sûr(e) de vouloir accepter la nullit&egrave; de cette partie&nbsp;?</h2>';
$gameFuncStr[10]	= '<h2>Etes-vous sûr(e) de vouloir d&egrave;j&agrave; mettre fin &agrave; cette partie&nbsp;?</h2><p>Dans un tel cas, lorsque plus de deux mouvements ont &egrave;t&egrave; enregistr&egrave;s, la victoire se voit attribu&egrave;e &agrave; l\'auteur du dernier mouvement.</p>';
$gameFuncStr[11]	= '<h2>Etes-vous sûr(e) de vouloir <u>supplier</u>votre partenaire pour qu\'il accepte que vous puissiez rejouer votre dernier coup&nbsp;?</h2><p>Il pourra rejeter votre requ&ecirc;te en jouant un nouveau coup.</p>';
$gameFuncStr[12]	= '<h2>Etes-vous sûr(e) de vouloir permettre &agrave; votre partenaire de rejouer son dernier coup&nbsp;?</h2>';
$gameFuncStr[13]	= '<h2>L\'annulation de votre dernier coup a &egrave;t&egrave; gracieusement accord&egrave;e.</h2>';
$gameFuncStr[14]	= 'Vous avez requis l\'annulation de votre dernier coup, please wait for the other player to respond';
$gameFuncStr[15]	= '<h2>D&egrave;sol&egrave;, vous n\'avez plus le droit de demander l\'annulation de votre dernier coup</h2><p>PLus de 30 secondes se sont &egrave;coul&egrave;es apr&egrave;s votre dernier mouvement&nbsp;: il est trop tard pour en demander l\'annulation.</p>';
$gameFuncStr[16]	= '<h2>Etes-vous sûr(e) de vouloir accepter la partie nulle propos&egrave;e&nbsp;?</h2>';
$gameFuncStr[17]	= 'Une nouvelle partie a &egrave;t&egrave; lanc&egrave;e';
$gameFuncStr[18]	= 'Veuillez choisir un partenaire';
$gameFuncStr[19]	= 'La partie a &egrave;t&egrave; import&egrave;e. Choisissez "Voir les parties" pour la retrouver';
$gameFuncStr[20]	= 'Veuillez coller l\'int&egrave;gralit&egrave; du contenu du fichier PNG &agrave; l\'int&egrave;rieur du champ';

$menuStr[0]	= 'Commencer une nouvelle partie';
$menuStr[1]	= 'Adversaire';
$menuStr[2]	= 'Votre couleur';
$menuStr[3]	= 'Mise &agrave; jour Votre Info';
$menuStr[4]	= 'Repr&eacute;sentation du joueur';
$menuStr[5]	= 'Inviter un ami';
$menuStr[6]	= 'Nom';
$menuStr[7]	= 'Courriel';
$menuStr[8]	= 'Joueurs connect&eacute;s';
$menuStr[9]	= '\'s Jeux';
$menuStr[10]	= 'Gagn&eacute;';
$menuStr[11]	= 'Perdu';
$menuStr[12]	= $buttStr[5];
$menuStr[13]	= 'Joueurs';
$menuStr[14]	= 'Votre Disque';
$menuStr[15]	= 'En Cours ';
$menuStr[16]	= 'Profil';
$menuStr[17]	= 'Inviter';
$menuStr[18]	= $buttStr[12];
$menuStr[19]	= $menuStr[6];
$menuStr[20]	= 'Nom d\'utilisateur';
$menuStr[21]	= 'Mot de passe';
$menuStr[22]	= 'Encore';
$menuStr[23]	= 'Se Trouve';
$menuStr[24]	= 'Courriel';
$menuStr[25]	= 'Importer PGN';
$menuStr[26]	= 'Votre Mouvement';
$menuStr[27]	= 'Terminer la partie&nbsp;?';
$menuStr[28]	= 'Match nul&nbsp;?';
$menuStr[29]	= 'Voulez-vous annuler&nbsp;?';
$menuStr[30]	= 'Tout Jeux';
$menuStr[31]	= 'Partie en cours';
$menuStr[32]	= 'Fini Jeux';
$menuStr[33]	= 'Votre partie';
$menuStr[34]	= 'Vue Jeux';
$menuStr[35]	= '&Eacute;checs';
$menuStr[36]	= 'Question de s&eacute;curit&eacute;';
$menuStr[37]	= 'R&eacute;ponse de s&eacute;curit&eacute;';
$menuStr[38]	= 'Coller le contenu du fichier PGN ci-dessous';
$menuStr[39]	= 'Bienvenue dans Some Chess, ';

$menuFuncStr[1]	= 'Veuillez remplir les deux champs';
$menuFuncStr[2]	= 'Les mots de passe ne correspondent pas. Veuillez les ressaisir';
$menuFuncStr[3]	= 'Votre mot de passe a &egrave;t&egrave; mis &agrave; jour';
$menuFuncStr[4]	= 'Votre profile a &egrave;t&egrave; mis &agrave; jour';
$menuFuncStr[5]	= 'Veuillez saisir les informations &agrave; modifier';
$menuFuncStr[6]	= 'Veuillez remplir correctement les deux champs m&ecirc;me si, par la suite, les adresses de courriel <b>ne sont pas</b> conserv&egrave;es.';
$menuFuncStr[7]	= 'L\'adresse de courriel semble erron&egrave;e. Merci de la ressaisir m&ecirc;me si, par la suite, les adresses de courriel <b>ne sont pas</b> conserv&egrave;es';
$menuFuncStr[8]	= 'D&egrave;sol&egrave;, ce nom est d&egrave;j&agrave; utilis&egrave;. Merci de bien vouloir choisir un autre nom ';
$menuFuncStr[9]	= "Vous &egrave;tes invit&egrave;(e) &agrave; participer &agrave; une partie de Some Chess";
$menuFuncStr[10]	= 'Un(e) ami(e) vient de vous inviter &agrave; jouer &agrave; Some Chess. Son nom de joueur Some Chess est ';
$menuFuncStr[11]	= '. Si vous ne le savez pas encore : Some Chess est un nouveau programme de jeu d\'&egrave;chec sur internet. Les parties peuvent se d&egrave;rouler en temps r&egrave;el ou sur une longue p&egrave;riode (&agrave; la mani&egrave;re des partie par correspondance). Some Chess n\'a pas besoin de javascript pour fonctionner. Un simple navigateur web graphique (Firefox, Internet Explorer...) et une connexion &agrave; internet devraient &ecirc;tre suffisants. Votre compte ayant d&egrave;j&agrave; &egrave;t&egrave; cr&egrave;&egrave;, vous pouvez aussitôt utiliser les informations de connexion situ&egrave;es ci-dessous pour entrer en jeu &agrave; l\'adresse suivante :
				
	http://';
$menuFuncStr[12]	= '
	Mot de passe :	';
$menuFuncStr[13]	= "
	(ces donn&egrave;es pourront &ecirc;tre modifi&egrave;es apr&egrave;s connexion au jeu)\n\r\n\r
Si vous avez des questions, n\'h&egrave;sitez pas, pour commencer, &agrave; consulter la page d\'informations disponible &agrave; partir du menu sup&egrave;rieur qui appara&icirc;t apr&egrave;s connexion au jeu...\n\r\n\r\n\r\n\r
Meilleurs voeux,
L\'automate Some Chess\n\r\n\r
P.-S. : n'\ayez pas d\'inqui&egrave;tude : votre adresse de courriel n\'est jamais conserv&egrave;e apr&egrave;s utilisation. En dehors des personnes qui vous inviteront &agrave; jouer une partie de Some Chess avec elles, en faisant &agrave; chaque fois l\'effort de saisisr votre adresse pour lancer l\'invitation, vous ne recevrez jamais la moindre information de Some Chess.";
$menuFuncStr[14]	= 'Votre ami(e) a &egrave;t&egrave; invit&egrave;(e)';
$menuFuncStr[15]	= 'Vous devez choisir un fichier';
$menuFuncStr[16]	= 'Le fichier semble vide&nbsp;:';
$menuFuncStr[17]	= 'Le fichier est bien trop volumineux, il devrait peser moins de 500ko';
$menuFuncStr[18]	= 'Ce fichier est source d\'erreurs';
$menuFuncStr[19]	= 'D&egrave;sol&egrave;, ce type de fichier ne peut pas &ecirc;tre utilis&egrave;&nbsp;:';
$menuFuncStr[20]	= 'Bravo ! Le fichier a bien &egrave;t&egrave; transf&egrave;r&egrave;.';
$menuFuncStr[21]	= 'D&egrave;sol&egrave;, un probl&egrave;me inopin&egrave; est survenu. Veuillez r&egrave;essayer';
$menuFuncStr[22]	= '
	Username:	';
$menuFuncStr[23]	= 'Le mot de passe doit comporter de 6 &agrave; 15 caract&egrave;res';
$menuFuncStr[24]	= 'Le nom d\'utilisateur doit comporter de 5 &agrave; 20 caract&egrave;res';
$menuFuncStr[25]	= 'Security Questions can not be more than 90 characters long';
$menuFuncStr[26]	= 'Le mot de passe et le nom d\'utilisateur doivent &ecirc;tre diff&egrave;rents';

$gameStr[0]	= 'Techniquement parlant, Some Chess utilise un iframe. Si vous voyez appara&icirc;tre cette phrase dans votre navigateur il faut en d&egrave;duire que votre navigateur internet ne supporte malheureusement pas cette technologie et qu\'il ne peut donc pas vous permettre de jouer &agrave; Some Chess. Veuillez essayer avec un autre navigateur.';
$gameStr[1]	= 'Some Chess fait usage d\'objets informatiques particuliers pour fonctionner. Si vous voyez cette phrase appara&icirc;tre dans votre navigateur, il faut en d&egrave;duire que votre navigateur internet ne supporte malheureusement pas ces objets et qu\'il ne peut donc pas &ecirc;tre utilis&egrave; pour jour &agrave; Some Chess. Veuillez essayer avec un autre navigateur.';


$loginStr[0]	= 'Entrer';
$loginStr[1]	= $menuStr[6];
$loginStr[2]	= $menuStr[21];
$loginStr[3]	= $menuFuncStr[1];
$loginStr[4]	= 'Une erreur a &egrave;t&egrave; rencontr&egrave;e. Veuillez contacter l\'administrateur du site.';
$loginStr[5]	= 'La connexion n\'a pas pu &ecirc;tre &egrave;tablie. Veuillez r&egrave;essayer';
$loginStr[6]	= 'Vous &ecirc;tes sorti(e) du jeu';
$loginStr[7]	= 'Cliquez ici pour revenir au jeu';
$loginStr[8]	= 'Mot de passe oubli&egrave;';
$loginStr[9]	= 'Question';
$loginStr[10]	= 'Aucun enregistrement trouv&egrave;';
$loginStr[11]	= 'Nouveau mot de passe (modifiable apr&egrave;s connexion)<br />';

$statsStr[0]	= 'Statistiques';
$statsStr[1]	= $menuStr[13];
$statsStr[2]	= '<abbr title="Victoire.">V</abbr>';
$statsStr[3]	= '<abbr title="D&egrave;faite.">D</abbr>';
$statsStr[4]	= '<abbr title="Partie nulle.">N</abbr>';
$statsStr[5]	= 'aucune';
$statsStr[6]	= 'Parties en cours';
$statsStr[7]	= 'Parties termin&egrave;es';
$statsStr[8]	= 'Victoires';
$statsStr[9]	= 'D&egrave;faites';
$statsStr[10]	= 'Partie nulles';
$statsStr[11]	= 'Best Win %';
$statsStr[12]	= 'Statistiques individuelles';
$statsStr[13]	= 'Nom r&egrave;el';
$statsStr[14]	= $menuStr[23];
$statsStr[15]	= 'Utilisateur depuis';
$statsStr[16]	= 'Invit&egrave; par';
$statsStr[17]	= 'Points';
$statsStr[18]	= 'Record en points';
$statsStr[19]	= 'connect&egrave; dernier';
$statsStr[20]	= 'Moyenne des victoires';
$statsStr[21]	= 'Moyenne des d&egrave;faites';
$statsStr[22]	= 'Moyennes des parties nulles';
$statsStr[23]	= 'Parties termin&egrave;es';
$statsStr[24]	= 'Parties en cours';
$statsStr[25]	= 'Chair &agrave; Canon';
$statsStr[26]	= 'Nemisis';
$statsStr[27]	= 'Victoires';
$statsStr[28]	= 'D&egrave;faites';
$statsStr[29]	= 'Parties nulles';
$statsStr[30]	= $statsStr[23];
$statsStr[31]	= 'Statistiques personnelles';

$regStr[0]	= 'S\'enregistrer';
$regStr[1]	= 'Entrer en jeu';
$regStr[2]	= 'Veuillez revenir &agrave; la page pr&egrave;c&egrave;dente et communiquer votre nom d\'utilisateur et son mot de passe.';
$regStr[3]	= $menuFuncStr[8];
$regStr[4]	= 'L\'enregistrement a &egrave;t&egrave; effectu&egrave;. Vous pouvez d&egrave;s maintenant jouer &agrave; Some Chess<br /><br /> nom d\'utilisateur&nbsp;: ';
$regStr[5]	= 'Les donn&egrave;es communiqu&egrave;es ne correspondent pas &agrave; nos enregistrements. Veuillez revenir &agrave; la page pr&egrave;c&egrave;dente et les ressaisir';
$regStr[6]	= 'Une erreur est survenue. Veuillez revenir &agrave; la page pr&egrave;c&egrave;dente et faire un nouvel essai.';
$regStr[7]	= $menuFuncStr[23];
$regStr[8]	= $menuFuncStr[24];
$regStr[9]	= $menuFuncStr[26];

$indexStr[0]	= 'La cr&egrave;ation de la base de donn&egrave;e a &egrave;chou&egrave;. Merci de bien vouloir tenter de la cr&egrave;er manuellement';
$indexStr[1]	= 'La cr&egrave;ation des tables Some Chess a &egrave;chou&egrave;. Merci de bien vouloir tenter de la cr&egrave;er manuellement dans la base de donn&egrave;e.';
$indexStr[2]	= 'L\'installation de Some Chess a r&egrave;ussi&nbsp;!<br /> Nom d\'utilisateur&nbsp;: admin mot de passe&nbsp;: admin (&agrave; modifier imp&egrave;rativement lors de votre premi&egrave;re connexion)';
$indexStr[3]	= 'La mise &agrave; jour des tables Some Chess a &egrave;chou&egrave;. Merci de bien vouloir tenter de la r&egrave;aliser manuellement.';
$indexStr[4]	= 'La mise &agrave; jour de Some Chess a r&egrave;ussi&nbsp;!';

$colorStr[0]	= 'Blanc';
$colorStr[1]	= 'Noir';	
$colorStr[2]	= 'Al&eacute;atoire';
?>