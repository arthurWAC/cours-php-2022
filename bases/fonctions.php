<?php
/**
 * Exercice sur les fonctions
 */
include('starwars.php');

// --- Travail dans $arrayShips -------

// 1.
// Faire une fonction qui permet de compter le nombre de vaisseau + petit qu'une certaine longueur
// Elle prend en paramètre le tableau complet et une longueur
// Retourne une valeur entière 




// 2. 
// Faire une fonction qui permet de compter le nombre de vaisseau fabriqué par un manufacturer donné
// On prend en paramètre le tableau complet
// Retourne une valeur entière




// 3.
// Faire une fonction qui permet de trier le tableau $arrayShips
// On prend en paramètre le tableau complet et un cout en crédit
// La fonction doit retourner les vaisseaux qui ont un cout + élevé (dans un tableau)



// 4.
// En réutilisant les fonctions ci-dessus, trouvez le nombre de vaisseau du manufacturer "Incom corporation" qui ont un cout de crédit supérieur à 10000





// --- Travail dans $arraySpecies -------

// 5.
// Faire une fonction qui permet de retourner l'age moyen d'une classification donnée
// On prend en paramètre le tableau complet et une classification
// Retourne une valeur arrondi à 1 chiffre après la virgule





// 6. 
// Faire une fonction qui permet de connaitre combien d'espece ont une langue qui se nomme de la même manière que l'espèce, par exemple :
// "Mon Calamari" = "Mon Calamari"
// Mais "Gungan" # "Gungan Basic"
// On passera en paramètre le tableau complet, puis le premier champ à tester (ici "name"), puis le second (ici "language")




// --- Travail dans $arrayPeople ---------


// 7. 
// Dessiner un personnage
// Un personnage ressemble à ça :
//    __________
//   |          |
//   |__________|
//   |__________|
//	 |			|
//	 |			|
// 	 |			|
//	 |__________|
//
//		 Nom
//
// Avec les blocs, du haut vers le bas, cheveux, yeux et peaux, de la bonne couleur
// S'il y a 2 couleurs, en choisir 1 aléatoirement
// Faire un rendu HTML, à base de div et de CSS inline
// Si des éléments sont inconnus, utiliser la peau




// 8. Créez une fonction qui retire du tableau principal un gender passé en paramètre, et qui retourne donc un nouveau tableau



// --- Travail dans les $arrayPlanets -------

// 9. Créer une fonction pour ranger les planètes, soit par "climate", soit par "terrain"
// C'est à dire que je dois retourner un tableau de tableaux, du genre :
/*
[
	'temperate' => ['Planet 1', 'Planet 2', ...],
	'hot' => ['Planet 3', 'Planet 5', ...]
]
*/

// 9. bis, rajouter un paramètre pour ne pas avoir de doublon, c'est le premier élément trouvé qui sera utilisé
