<?php
include 'includes.php';

// Sécurité -------------------------------------------------------
if (!Security::controlSignatureCSRF2()) {
    $_SESSION['erreurs'] = ['Erreur de sécurité, recommencez'];

    header('Location: index.php');
}
// ------------------------------------------------------------------

// Là je récupère mes valeurs en toute sécurité
// Un Combat, c'est 2 dresseurs
// Qui ont chacun 1 Pokemon
$dresseur1 = new Dresseur($_POST['nameDresseur1']);
$dresseur1->setPokemon(new Pokemon($_POST['pokemonDresseur1']));

$dresseur2 = new Dresseur($_POST['nameDresseur2']);
$dresseur2->setPokemon(new Pokemon($_POST['pokemonDresseur2']));

$combat = new Combat($dresseur1, $dresseur2, $_POST['nbTours']);

echo '<pre>';
print_r($combat);
echo '</pre>';



// Afficher le vainqueur, celui à qui il reste le + de HP

// Réfléchir à gérer ensuite les avantages de type



echo 'OK GO COMBAT';