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

$journal = new Journal;

$evenement = new Evenement('11/02/2018', 'Paris');
$evenement->ajouteAction('Je prends un taxi');
$evenement->ajouteAction('');
$evenement->ajouteAction('Je prends une voiture');

$journal->ajoutEvenement($evenement);


echo $journal->transcription();