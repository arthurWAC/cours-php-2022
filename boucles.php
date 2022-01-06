<?php
// Répéter des instructions

// Je veux un tableau avec les 1000 premiers nombres

// Boucle for
$tableauMillePremiersNombres = []; // Initialisation
for ($nombre = 1; $nombre <= 1000; $nombre++) {
	$tableauMillePremiersNombres[] = $nombre;
}

echo $nombre; // 1001

echo '<pre>';
print_r($tableauMillePremiersNombres); // Indexé de 0 à 999
echo '</pre>';

// $nombre = 1 => initialisation
// $nombre <= 1000 => Condition d'arrêt
// $nombre++ => pas


// Boucle while => On verra dans les challenges
// while(true) avec break

// Boucle foreach
// Parcourir les éléments d'un tableau
$mots = ['Bonjour', 'M.', 'Arthur'];

// Foreach simple
$phrase = '';
foreach ($mots as $mot) {
	$phrase .= $mot;
}

// Foreach "compliqué", avec les clés
$phrase = '';
$nbMots = count($mots);
foreach ($mots as $index => $mot) {
	$phrase .= $mot;

	if ($index + 1 < $nbMots) {
		$phrase .= ' ';
	} else {
		$phrase .= '.';
	}
}

echo '<p>' . $phrase . '</p>';

// Continue
$phrase = '';
$nbMots = count($mots);
foreach ($mots as $index => $mot) {
	$phrase .= $mot;

	if ($index + 1 < $nbMots) {
		$phrase .= ' ';
		continue; // Directement passé à l'itération suivante
		// Donc le code en dessous ne s'executera pas
	}
	
	$phrase .= '.';
}

echo '<p>' . $phrase . '</p>';

// break
$objets = ['stylo', 'tasse', 'telephone', 'montre', 'boite', 'cahier'];

define('OBJET_RECHERCHE', 'montre');
$jAiUneMontre = false; // Initialisation

foreach ($objets as $objet) {

	if ($objet === OBJET_RECHERCHE) {
		$jAiUneMontre = true;
		break; // Je "casse" = termine la boucle, les itérations restantes ne sont pas effectuées
	}
}

if ($jAiUneMontre) {
	echo '<p>J\'ai bien une '. OBJET_RECHERCHE .'</p>';
} else {
	echo '<p>Je n\'ai pas de '. OBJET_RECHERCHE .'</p>';
}