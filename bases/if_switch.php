<?php
// 0. Créer une constante BR qui va contenir un saut de ligne HTML
define('BR', '<br />');


// On va raconter une histoire...
$histoire = '';
$nomDuHeros = 'Hector';
$distanceParcourue = 0;

// 1. Racontez comment s'appelle le héros, en complétant la variable $histoire
$histoire .= '<p>Le héros s\'appelle ' . $nomDuHeros . '.</p>';

// On va définir quelques valeurs aléatoirement
$force = rand(1, 10);
$agilite = rand(1, 10);
$piecesDOr = rand(50, 100);

$jourDeLaSemaine = rand(1, 7);


//
// Exercices autour du if
// (Complétez l'histoire à chaque fois qu'il se passe quelque chose)
//

// 2.
// Si la force est supérieure à 8, alors je gagne 1 point d'agilité.
if ($force > 8) {
	// $agilite = $agilite + 1;
	// $agilite += 1;
	$agilite++;

	$histoire .= '<p>Je gagne 1pt de force !</p>';
}


// 3.
// Si ma force est inférieure à 6, je passe par le chemin de gauche, qui fait 500m, sinon je passe par le chemin de droite, qui fait 850m.
// Dans le chemin de droite, je trouve 4 pièces d'or
if ($force < 6) {
	// Chemin de gauche
	$distanceParcourue += 500;

	$histoire .= '<p>Je suis passé par la gauche.</p>';
} else {
	// Chemin de droite
	$distanceParcourue += 850;
	$piecesDOr += 4;

	$histoire .= '<p>Je suis passé par la droite, j\'ai trouvé des pièces d\'or !</p>';
}

// 4.
// Je parcours 150m
// Si j'ai plus de 80 pièces d'or, j'en dépense 30 pour m'offrir 2 points d'agilité
// Si j'en ai moins de 80 et + de 60, j'en dépense 15 pour m'offrir 1 point d'agilité
// Si j'en ai moins de 60, j'en dépense 5 pour m'offrir 1 point de force
$distanceParcourue += 150;

if ($piecesDOr > 80) {
	$piecesDOr -= 30;
	$agilite += 2;

	$histoire .= '<p>2pts d\'agilité contre 30 PO</p>';
} elseif ($piecesDOr > 60) {
	$piecesDOr -= 15;
	$agilite++;

	$histoire .= '<p>1pt d\'agilité contre 15 PO</p>';
} elseif ($piecesDOr >= 5) {
	$piecesDOr -= 5;
	$force++;

	$histoire .= '<p>1pt de force contre 5 PO</p>';
}

$histoire .= '<p>Il me reste ' . $piecesDOr . ' PO.</p>';

// 5. 
// Je parcours 300m
// Si ma force et mon agilité sont supérieures à 6, je gagne 10 pièce d'or
// Si ma force ou mon agilité est inférieure à 3, je perds 10 pièces d'or
// (stockez les conditions dans des variables)
$distanceParcourue += 300;

$conditionPourGagnerDesPiecesDOr = ($force > 6 && $agilite > 6); // && => ET
$conditionPourPerdreDesPiecesDor = ($force < 3 || $agilite < 3); // || => OU

if ($conditionPourGagnerDesPiecesDOr) {
	$piecesDOr += 10;

	$histoire .= '<p>Je gagne 10 PO.</p>';
}

if ($conditionPourPerdreDesPiecesDor) {
	$piecesDOr -= 10;

	$histoire .= '<p>Je perds 10 PO.</p>';
}

if (!$conditionPourGagnerDesPiecesDOr && !$conditionPourPerdreDesPiecesDor) {
	$histoire .= '<p>Il ne se passe rien.</p>';
}

$histoire .= '<p>Il me reste ' . $piecesDOr . ' PO.</p>';
//
// Exercices autour du switch
// (Complétez l'histoire à chaque fois qu'il se passe quelque chose)
//


// 6.
// Indiquez dans l'histoire quel jour nous sommes (1 => lundi, 2 => mardi... 7 => dimanche)

switch ($jourDeLaSemaine) {
	case 1:
		// $jourDeLaSemaineNom = 'Lundi';
		$histoire .= '<p>Lundi</p>';
	break;

	case 2:
		$histoire .= '<p>Mardi</p>';
	break;

	case 3:
		$histoire .= '<p>Mercredi</p>';
	break;

	case 4:
		$histoire .= '<p>Jeudi</p>';
	break;

	case 5:
		$histoire .= '<p>Vendredi</p>';
	break;

	case 6:
		$histoire .= '<p>Samedi</p>';
	break;

	case 7:
		$histoire .= '<p>Dimanche</p>';
	break;
}

// $histoire .= '<p>Nous sommes ' . $jourDeLaSemaineNom . '</p>';

// 7.
// Si je suis en début de semaine (lundi, mardi, mercredi) je me rends à ma destination par un chemin de 740m, et je gagne 1 point de force
// Si je suis en fin de semaine (les autres jours), je me rends à ma destination par un chemin de 1345m, et je perds 1 point d'agilité

switch ($jourDeLaSemaine) {

	case 1: // if ($jourDeLaSemaine == 1
	case 2: // || $jourDeLaSemaine == 2
	case 3: // || $jourDeLaSemaine == 3)
		$distanceParcourue += 740;
		$force++;

		$histoire .= '<p>Début de semaine</p>';
	break;

	default:
		$distanceParcourue += 1345;
		$agilite--;

		$histoire .= '<p>Milieu/Fin de semaine</p>';
	break;
}

// switch ($jourDeLaSemaineNom) {

// 	case 'Lundi':
// 	case 'Mardi':
// 	case 'Mercredi':

// 	// ...
// }

// 8. A l'aide d'un "switch true" déterminer la tranche de 20, dans laquelle se trouve le nombre de pièces d'or (0-20; 21-40; 41-60; jusque 100)
// Gérez le cas où il y aurait plus de 100 pièces également

switch (true) {

	case ($piecesDOr <= 20): // if (true == ($piecesDOr < 20))
		$histoire .= '<p>Je suis dans la tranche 0-20</p>';
		break;

	case ($piecesDOr <= 40):
		$histoire .= '<p>Je suis dans la tranche 21-40</p>';
		break;

	case ($piecesDOr <= 60):
		$histoire .= '<p>Je suis dans la tranche 41-60</p>';
		break;

	case ($piecesDOr <= 80):
		$histoire .= '<p>Je suis dans la tranche 61-80</p>';
		break;

	case ($piecesDOr <= 100):
		$histoire .= '<p>Je suis dans la tranche 81-100</p>';
		break;

	default:
		$histoire .= '<p>Je suis dans la tranche 101+</p>';
		break;
}


echo $histoire;
