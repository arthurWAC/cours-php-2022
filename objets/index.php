<?php
// Includes
include('./Journal.php');
include('./Evenement.php');
include('./Vampire.php');
include('./Banque.php');

// Mémo, liste des mots clés objets :
// class => pour définir un objet, une classe
// new => pour créer/instancier un nouvel objet
// public => "visibilité" (protected, private)
// $this pour accéder à l'intérieur de l'objet, attribut ou une méthode
// ->  - > naviguer entre les attributs et les méthodes
// $this->
// const pour déclarer des constantes
// self:: pour appeler une constante


echo '<h1>Histoire Vampire en objets</h1>';

$vampire = new Vampire('Carmela', 'Ferinis', 99);

$vampire->estLe('11/02/2018');
$vampire->estA('Paris');

// echo '<pre>';
// print_r($vampire);
// echo '</pre>';

$vampire->augmenteStockDeSang(2);
$vampire->raconte('Mon frère me confie 2 doses de sang');

$vampire->encaisse(5000);
$vampire->raconte('Mon frère me donne 5.000€');

$vampire->nouvellePage();


$vampire->raconte('Je prends le taxi');
$vampire->depense(10);
$vampire->raconte('Je dépense 10€');

$vampire->nouvellePage();

// echo '<pre>';
// print_r($vampire);
// echo '</pre>';

echo $vampire->journal->transcription();