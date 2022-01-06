<?php
// Les variables booléennes
$jAiLePermisDeConduire = true;
$jAiLePermisPoidsLourd = false;

$age = 16;
define('AGE_REQUIS_BOITE_DE_NUIT', 18);

if ($age >= AGE_REQUIS_BOITE_DE_NUIT) {
	echo '<p>Je peux rentrer</p>';
} else {
	echo '<p>Je ne peux pas rentrer</p>';
}

// Je stocke le résultat de ma comparaison
$jeRentreEnBoiteDeNuit = ($age >= AGE_REQUIS_BOITE_DE_NUIT);

if ($jeRentreEnBoiteDeNuit) {
	echo '<p>Je peux rentrer</p>';
} else {
	echo '<p>Je ne peux pas rentrer</p>';
}

// Opérations booléennes : ET OU
$jAiDesBaskets = true;

if ($age < AGE_REQUIS_BOITE_DE_NUIT || $jAiDesBaskets) {
	echo '<p>Je ne peux pas rentrer</p>';
} else {
	echo '<p>Je peux rentrer</p>';
}

// OU : || (sur la touche 6 sur Windows)
// ET : && 

// true && true => true
// true && false => false
// false && true => false
// false && false => false
// Multiplication : 1 x 1 x 1 => 1 (true)    1 x 1 x 1 x 0 x 1 x 1 => 0 (false)

// true || true => true
// true || false => true
// false || true => true
// false || false => false
// Addition : 1 + 1 + 1 + 1 => 4 (!= 0) true    0 + 0 + 0 + 1 + 0 + 0 + 0 => 1 (!= 0) true

// Structure switch ?