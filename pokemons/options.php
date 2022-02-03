<?php
include 'includes.php';

// Récupération des données présentes en GET
// Variable globale : $_GET (j'y accède partout dans mon code) 

// Vérifications de sécurité
    $erreurs = [];
    
    // Les noms sont présents et font 3+ caractères
    $nom1Present = false;
    $nom2Present = false;
    $nom1AuMoins3Caracteres = false;
    $nom2AuMoins3Caracteres = false;

    // Nom 1
    if (!empty($_GET['nameDresseur1'])) {
        $nom1Present = true;

        if (strlen($_GET['nameDresseur1']) >= 3) {
            $nom1AuMoins3Caracteres = true;
        } else {
            $erreurs[] = 'Le nom du dresseur 1 doit faire au moins 3 caractères.';
        }

    } else {
        $erreurs[] = 'Le nom du dresseur 1 doit être complété.';
    }

    // Nom 2
    if (!empty($_GET['nameDresseur2'])) {
        $nom2Present = true;

        if (strlen($_GET['nameDresseur2']) >= 3) {
            $nom2AuMoins3Caracteres = true;
        } else {
            $erreurs[] = 'Le nom du dresseur 2 doit faire au moins 3 caractères.';
        }

    } else {
        $erreurs[] = 'Le nom du dresseur 2 doit être complété.';
    }

    // Les pokemons sont présents et ont un numéro qui existe
    $pokemon1Present = false;
    $pokemon1Existe = false;
    $pokemon2Present = false;
    $pokemon2Existe = false;

    if ($_GET['pokemonDresseur1'] !== '') {
        $pokemon1Present = true;

        if (Database::check($_GET['pokemonDresseur1'])) {
            $pokemon1Existe = true;
        } else {
            $erreurs[] = 'Le Pokemon 1 n\'existe pas.';
        }

    } else {
        $erreurs[] = 'Il faut choisir un Pokemon 1';
    }

    if ('' !== $_GET['pokemonDresseur2']) {
        $pokemon2Present = true;

        if (Database::check($_GET['pokemonDresseur2'])) {
            $pokemon2Existe = true;
        } else {
            $erreurs[] = 'Le Pokemon 2 n\'existe pas.';
        }

    } else {
        $erreurs[] = 'Il faut choisir un Pokemon 2';
    }

    // Le nombre de tours est compris entre 1 et 10
    $nombreDeTourNumerique = false;
    $nombreDeTourComprisEntre1et10 = false;

    if (is_numeric($_GET['nbTours'])) {
        $nombreDeTourNumerique = true;

        if ($_GET['nbTours'] > 0 && $_GET['nbTours'] <= 10) {
            $nombreDeTourComprisEntre1et10 = true;
        } else {
            $erreurs[] = 'Le nombre de tours doit être compris entre 1 et 10';
        }
    } else {
        $erreurs[] = 'Le nombre de tours doit être complété.';
    }

    $toutesLesSaisiesSontOk = 
                $nom1Present && $nom2Present &&
                $nom1AuMoins3Caracteres && $nom2AuMoins3Caracteres &&
                $pokemon1Present && $pokemon2Present &&
                $pokemon1Existe && $pokemon2Existe &&
                $nombreDeTourNumerique &&
                $nombreDeTourComprisEntre1et10;

    if ($toutesLesSaisiesSontOk === false) {
        // Je mets les erreurs en session pour les envoyer à l'autre page
        $_SESSION['erreurs'] = $erreurs;

        // Je redirige
        header('Location: index.php');
    }
?>
<html>
    <head>
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">

            <h1>Récapitulatif avant Combat</h1>

            <div class="row">
                <div class="col-12 col-md-6">
                    <h3>Dresseur 1</h3>
                    <p>Nom : <?= $_GET['nameDresseur1'] ?></p>
                    <p><b>Détails du Pokemon :</b></p>
                    <?php

                    $pokemon1 = new Pokemon($_GET['pokemonDresseur1']);
                    ?>
                </div>
                <div class="col-12 col-md-6">
                    <h3>Dresseur 2</h3>
                    <p>Nom : <?= $_GET['nameDresseur2'] ?></p>
                    <p><b>Détails du Pokemon :</b></p>
                    <?php

                    $pokemon2 = new Pokemon($_GET['pokemonDresseur2']);


                    ?>
                </div>
            </div>
        </div>
    </body>
</html>