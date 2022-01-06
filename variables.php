<?php
// Variables textuelles, pour des chaines de caractères
$mot = 'Bonjour';
$lettre = 'a';
$vide = ''; // Chaine de caractères vide
$espace = ' '; // Juste un espace

// Pour nommer une variable :
// Pas de caractères spéciaux : é à ...
// Un nom explicite, on évitera $a, $b, $var, $foo, $bar
// Les noms des variables en camelCase => On commence par une minuscule, et chaque nouveau terme prend une majuscule

$prenomDuProfesseur = 'Arthur';
// $pprof = 'Arthur'; => On ne nomme pas les variables comme ça

echo $mot;

// Une variable, elle peut changer de valeur

$mot = 'Au revoir';
echo $mot;

echo '<br />'; // Saut de ligne HTML
echo $mot;

// Concaténation = Coller les chaines de caractères
// L'opérateur de concaténation c'est le point .
$phrase = $mot . ' M. ' . $prenomDuProfesseur;

echo '<br />'; // Saut de ligne HTML
echo $phrase;

// Opérateur condensé de concaténation .=
$phrase = $mot; // Initialisation de ma phrase avec un premier mot
$phrase = $phrase . ' M. '; // "Colle" un mot
$phrase = $phrase . $prenomDuProfesseur; // "Colle" un mot

echo '<br />'; // Saut de ligne HTML
echo $phrase;

$phrase = $mot; // Initialisation qui ne change pas, "="
$phrase .= ' M. '; // ".="
$phrase .= $prenomDuProfesseur; // ".="

echo '<br />'; // Saut de ligne HTML
echo $phrase;

$phrase = ''; // Initialisation avec une chaine vide
$phrase .= $mot; // ".="
$phrase .= ' M. '; // ".="
$phrase .= $prenomDuProfesseur; // ".="

echo '<br />'; // Saut de ligne HTML
echo $phrase;