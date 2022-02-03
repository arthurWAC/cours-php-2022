<?php
// Includes
include('./CombatInterface.php');
include('./Journal.php');
include('./Evenement.php');
include('./Vampire.php');
include('./Banque.php');
include('./Sorcier.php');

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

$vampire->estA('Londres');
$vampire->depense(10, BANQUE::DEVISE_DOLLARS);
$vampire->raconte('Je dépense 10£');
$vampire->raconte('Il me reste donc '. $vampire->soldeBanque() .' sur mon compte');
$vampire->nouvellePage();

// Nouvel objet dans l'inventaire
$vampire->ajouteObjet('dague de sorcier');
$vampire->raconte('Je récupère la dague de sorcier');

if ($vampire->aLObjetDansLInventaire('dague de sorcier')) {
    $vampire->raconte('Je possède bien la dague de sorcier');
}

$vampire->nouvellePage();

$vampire->raconte('Je me prépare au combat');
$vampire->raconte('Voici ma force courante : ' . $vampire->forceCourante());
$vampire->raconte('Voici mon agilité courante : ' . $vampire->agiliteCourante());
$vampire->raconte('Voici ma méchanceté courante : ' . $vampire->mechanceteCourante());

$vampire->nouvellePage();

$sorcier = new Sorcier;
$sorcier->setRandomValues();


// echo '<pre>';
// print_r($vampire);
// echo '</pre>';

echo $vampire->journal->transcription();