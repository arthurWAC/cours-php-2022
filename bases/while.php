<?php

//
// Exercices autour du while
//


// 1.
// L'énigme de l'escargot
// Un mur fait 20 mètres de haut.
// Tous les jours l’escargot grimpe 6 mètres.
// Mais la nuit, il redescend de 4 mètres, en glissant dans son sommeil.
// En combien de jours arrive t-il en haut ?



// 2. 
// Trouver toutes les valeurs entre 1 et 10
// Déterminer combien de fois il faut lancer la fonction rand(1,10) pour obtenir au moins 1 fois chaque valeur  (Ce nombre va bien sûr changer à chaque lancement du code)

// 1 et 4 ?
$face1 = false;
$face2 = false;
$face3 = false;
$face4 = false;

// F et F et F et F => Faux => ! => Vrai => Mon while "tourne"
// F et F et V et F => Faux => ! => Vrai => Mon while "tourne"
// F et V et V et F => Faux => ! => Vrai => Mon while "tourne"
// V et V et V et F => Faux => ! => Vrai => Mon while "tourne"
// V et V et V et V => Vrai => ! => Faux => Mon while "s'arrête"

$nbLancers = 0;

$bloqueur = 0;
while ( !($face1 && $face2 && $face3 && $face4) ) {

	$lancer = rand(1, 4);
	$nbLancers++;

	switch ($lancer) {
		case 1:
			$face1 = true;
			break;
			
		case 2:
			$face2 = true;
			break;

		case 3:
			$face3 = true;
			break;

		case 4:
			$face4 = true;
			break;
	}

	$bloqueur++;
	if ($bloqueur > 1000) {
		break;
	}
}


echo '<p>Il a fallu ' . $nbLancers . ' lancés pour trouver toutes les valeurs</p>';

$lancers = ['Non', 'Non', 'Non', 'Non'];
// Indexé :   0      1      2      3

$nbLancers = 0;

$bloqueur = 0;
while ( in_array('Non', $lancers) ) { // in_array => Pour vérifier la présence d'un élement (needle) dans un tableau (haystack)

	$lancer = rand(1, 4);
	$nbLancers++;

	$lancers[$lancer - 1] = 'Oui';

	$bloqueur++;
	if ($bloqueur > 1000) {
		break;
	}
}

echo '<p>Il a fallu ' . $nbLancers . ' lancés pour trouver toutes les valeurs</p>';

// 3. 
// Recommencer l'exercice 2 en intégrant un "bloqueur" fixé à 20. C'est à dire que vous ne pourrez pas réaliser + de 20 itérations. Indiquez le résultat trouvé.
