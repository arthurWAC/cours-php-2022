<?php

// Tableaux simples
$tableau = [1, 2, 3, 4, 5];
$tableauDesChainesDeCaracteres = ['a', 'b', 'c', 'd'];
// On stockera les mêmes types de variables
// On ne fait pas => $tableauBizare = [1, 'a', 2, 'b'];

// Lecture d'un tableau
// echo ça ne fonctionne plus
print_r($tableau);

// Pour avoir un affichage + agréable dans le navigateur
echo '<pre>';
print_r($tableau);
echo '</pre>';

// Accès à une valeur, on utilise les "index"
// Dans un tableau, le premier index, c'est 0
echo $tableau[0]; // 1
echo '<br />';
echo $tableauDesChainesDeCaracteres[2]; // c

// Remplir un tableau
$tableau[]= 6;
$tableau[]= 7;

echo '<pre>';
print_r($tableau);
echo '</pre>';

// Tableaux de tableaux, "multi dimensions"
$tableauDe2Dimensions = [
	[1, 2, 3],
	[4, 5, 6],
	[7, 8, 9]
];

echo $tableauDe2Dimensions[1][1]; // 5
echo $tableauDe2Dimensions[2][0]; // 7

// Tableaux associatifs
// On va créer les index nous même, avec des chaines de caractères
// Ces chaines de caractères sont écrites en snake_case, tout en minuscules, avec des underscores pour séparer les termes

$professeur = [
	'prenom' => 'Arthur',
	'nom' => 'Weill',
	'age' => 35
];

$phrase = '';
$phrase .= 'Le professeur s\'appelle ';
$phrase .= $professeur['prenom'] . ' ';
$phrase .= $professeur['nom'] . ' ';
$phrase .= ' et il a ' . $professeur['age'] . ' ans';

echo '<p>' . $phrase . '</p>';