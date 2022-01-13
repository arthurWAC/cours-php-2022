<?php

//
// Exercices autour des tableaux
//

// 1.
// Créer un tableau vide.
// Remplissez ce tableau avec les valeurs de 1 à 1000.
$tableau = [];

for ($i = 1; $i <= 1000; $i++) {
	$tableau[] = $i;
}

// echo '<pre>';
// print_r($tableau);
// echo '</pre>';


// a) En parcourant le tableau, affichez tous les multiples de 3.
// b) En parcourant le tableau, affichez les nombres multiples de 3 ET de 5.  Et compter combien il y en a.

$nbDoublesMultiples = 0;

foreach ($tableau as $nombre) {

	if ($nombre%3 === 0) {
		echo '<p>'. $nombre .' est multiple de 3</p>';
	}

	if ($nombre%3 === 0 && $nombre%5 === 0) {
		echo '<p>'. $nombre .' est multiple de 3 ET de 5</p>';
		$nbDoublesMultiples++;
	}
}

echo '<p>Il y a ' . $nbDoublesMultiples . ' multiples de 3 ET de 5</p>';


// 2.
// Créer un tableau de 5 prénoms masculins.
// Créer un tableau de 5 prénoms féminins.
// Créer un tableau de 5 aliments.
// Créer un tableau de 5 villes.
// Générer 50 phrases aléatoires du genre « Arthur et Pauline mangent une Pomme à Paris.

$prenomsMasculins = ['Arthur', 'Anatole', 'Pierre', 'Louis', 'Adrien'];
$prenomsFeminins = ['Pauline', 'Amélie', 'Martine', 'Catherine', 'Caroline'];
$aliments = ['Pomme', 'Poire', 'Salade', 'Pates', 'Pain'];
$villes = ['Paris', 'Rome', 'Berlin', 'Madrid', 'Londres'];

define('MAX_PHRASES', 50);
$nbPhrases = 0;

foreach ($prenomsMasculins as $prenomsMasculin) {
	foreach ($prenomsFeminins as $prenomsFeminin) {
		foreach ($aliments as $aliment) {
			foreach ($villes as $ville) {
				echo '<p>' . ($nbPhrases + 1) . ') ' . $prenomsMasculin . ' et ' . $prenomsFeminin . ' mangent une '. $aliment .' à '. $ville .'</p>';

				$nbPhrases++;
				if ($nbPhrases >= MAX_PHRASES) {
					break 4; // 4 boucles à casser
				}
			}
		}	
	}
}


// for ($p = 0; $p < 50; $p++) {

// 	$prenomMasculinAleatoire = $prenomsMasculins[rand(0, 4)];
// 	$prenomFemininAleatoire = $prenomsFeminins[rand(0, 4)];
// 	$alimentAleatoire = $aliments[rand(0, 4)];
// 	$villeAleatoire = $villes[rand(0, 4)];

// 	echo '<p>' . $prenomMasculinAleatoire . ' et ' . $prenomFemininAleatoire . ' mangent une '. $alimentAleatoire .' à '. $villeAleatoire .'</p>';
// }


// 3.
// Créer un tableau de 10 valeurs comprises entre 0 et 100 aléatoirement.
// Trouver la valeur maximum  et la valeur minimum à chaque exécution du code.
// (sans utiliser les fonctions min et max)