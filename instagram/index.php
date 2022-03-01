<?php
// Veuillez bien suivre les numéros : [0], [1], [2]...
// -------------------------------------------------

// Appel des fichiers
// [0] Appeler le fichier "Account.php"
include './includes/Account.php';
include './includes/Picture.php';

// -------------------------------------------------

$picture = new Picture('image.jpg', 'moon');

// Code et affichage

// [2] Initialisez l'objet Account dans une variable en choisissant un nom pour votre compte
$monCompte = new Account('Arthur35');

// [4] Ajoutez 3 followers à votre compte et 5 comptes suivis. Choisissez les noms comme vous voulez
$monCompte->addFollower('Pierre');
$monCompte->addFollower('Paul');
$monCompte->addFollower('Paul');
$monCompte->addFollower('Jacques');

$monCompte->addFollow('MDS_Rennes');
$monCompte->addFollow('MDS_Caen');
$monCompte->addFollow('Pierre');
$monCompte->addFollow('Allocine');
$monCompte->addFollow('Stade_Rennais');

// [6] Ajoutez 5 photos à votre compte
$monCompte->addPhoto('https://images.unsplash.com/photo-1645334710996-0d59a16768e4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1675&q=80', 'moon', '2022-02-18');
$monCompte->addPhoto('https://images.unsplash.com/photo-1645069258059-6f5a71256c4a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1776&q=80', 'moon', '2022-02-19');
$monCompte->addPhoto('https://images.unsplash.com/photo-1511400115664-f37053398dd4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80', 'juno', '2022-02-22');
$monCompte->addPhoto('https://images.unsplash.com/photo-1645450618478-94a2b68d1d81?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80', 'moon', '2022-02-24');

// [8] Faites des essais avec les 3 méthodes créées au point 7.


// [10] Affichez votre compte au format HTML
// Pour cela, ré utilisez le code déjà créé autour de Bootstrap
// Importez le proprement dans ce projet
// Créez de nouvelles méthodes si nécessaire

// echo '<pre>';
// print_r($monCompte);
// echo '</pre>';


// --------

// Objet Picture.php
// [12] Créer un fichier Picture.php
// Une photo sera donc un objet et non plus un tableau
// Mettez à jour le code partout où cela est nécessaire
?>

<html>
    <head>
        <link href="./assets/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h1><?= $monCompte->accountName; ?></h1>

                    <button type="button" class="btn btn-success">
                        Followers <span class="badge bg-success"><?= $monCompte->nbFollowers ?></span>
                    </button>

                    <button type="button" class="btn btn-success">
                        Follows <span class="badge bg-success"><?= $monCompte->nbFollows ?></span>
                    </button>

                    <button type="button" class="btn btn-danger">
                        Photos <span class="badge bg-danger"><?= $monCompte->nbPictures ?></span>
                    </button>

                    <br /><br />

                    <div class="row">
                        <div class="col-6">
                            <h6>Followers :</h6>
                            <ul>
                            <?php foreach ($monCompte->followers as $follower): ?>
                                <li><?= $follower ?></li>
                            <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="col-6">
                            <h6>Follows :</h6>
                            <ul>
                            <?php foreach ($monCompte->follows as $follow): ?>
                                <li><?= $follow ?></li>
                            <?php endforeach ?>
                            </ul>
                        </div>
                    </div>

                    <hr />

                    <?php

                    echo implode($monCompte->pictures);

                    // foreach ($monCompte->pictures as $picture) {
                    //     // echo '<p class="mb-0"><img src="'. $picture->getUrl() .'" class="img-fluid img-thumbnail" /></p>';
                    //     // echo '<p><small>Filtre <b>'. $picture->getFilter() .'</b> le ' . $picture->getDate('d/m/Y') . '</small></p>';
                    
                    //     // à 
                    //     // echo $picture->getHtmlImg();
                    //     // echo $picture->getHtmlLabel();

                    //     // à 
                    //     echo $picture;  // __toString
                    
                    // }
                    
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>