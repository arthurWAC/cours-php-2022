<?php

//
// Exercices autour du for
//

// 1.
// Ecrivez 100 fois : « Je ne copierais pas le code PHP de mon voisin »
$phrase = '<p>Je ne copierais pas le code PHP de mon voisin</p>';

for ($i = 1; $i <= 100; $i++) {
	// echo $phrase;
}

// $i = 1; $i < 100; $i++ => 99 tours
// $i = 1; $i <= 100; $i++ => 100 tours
// $i = 0; $i < 100; $i++ => 100 tours
// $i = 0; $i <= 100; $i++ => 101 tours

// 2.
// Ecrivez 150 fois : « Je ne copierais pas le code PHP de mon voisin » en affichant chaque numéro de ligne : 
// 1)
// 2)
// etc.
for ($i = 1; $i <= 150; $i++) {
	// echo '<p>' . $i . ') Je ne copierais pas le code PHP de mon voisin</p>';
}


// 3.
// Trouver la somme des 100 premiers nombres : 1 + 2 + 3 + … + 100 = ?
$somme = 0;
for ($i = 1; $i <= 100; $i++) {
	$somme += $i;

	// echo '<p>+' . $i . ' => ' . $somme . '</p>';
}


// 4.
// Trouver la somme des 100 premiers nombres pairs : 2 + 4 + 6 + … + 200 = ?
$somme = 0;
// $i++ => $i = $i + 1 => $i += 1
for ($i = 0; $i <= 200; $i+=2) {
	$somme += $i;

	echo '<p>+' . $i . ' => ' . $somme . '</p>';
}

$somme = 0;
for ($i = 0; $i <= 200; $i++) {

	if ($i%2 == 0) {
		$somme += $i;
		echo '<p>+' . $i . ' => ' . $somme . '</p>';
	}
}

// 5.
// Trouver la différence entre la somme des carrés des 100 premiers nombres et le carré de la somme des 100 premiers nombres :
// (1^2 + 2^2 + 3^2 + … + 100^2) - (1 + 2 + 3 + … + 100)^2
$somme = 0;
$sommeDesCarres = 0;
// 3² = 3x3
for ($i = 1; $i <= 100; $i++) {

	$carre = $i * $i;
	// $carre = pow($i, 2);

	$sommeDesCarres += $carre;

	$somme += $i;
}

$carreDeLaSomme = $somme * $somme;

$difference = $sommeDesCarres - $carreDeLaSomme;
echo '<p>Calcul différence : ' . $difference . '</p>';

// 6. 
// Vérifier la répartition de la fonction rand
// Nous allons vérifier si la répartition des valeurs de rand est « correcte », c’est à dire que toutes les valeurs sont équitablement proposées.
// On va tester rand(1,5).
// Regarder la répartition dans une boucle de 10 distributions, puis 100, puis 1000, puis 10000.


