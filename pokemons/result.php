<?php

// Je récrée la signature, en concaténant DANS LE MEME ORDRE
$signature = $_POST['nameDresseur1'] . 
             $_POST['nameDresseur2'] .
             $_POST['pokemonDresseur1'] .
             $_POST['pokemonDresseur2'] .
             $_POST['nbTours'];

// LE CLE EST IDENTIQUE
$signature .= 'zliSFRz45FFaizrgfaz24523562zefzre';
$signature .= date('dmY');

// L'ALGO EST IDENTIQUE
$signature = hash('sha256', $signature);

// VERIFICATION DE MON TOKEN
if ($signature !== $_POST['signature']) {
    $_SESSION['erreurs'] = ['Erreur de sécurité, recommencez'];

    header('Location: index.php');
}

echo 'OK GO COMBAT';