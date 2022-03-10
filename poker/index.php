<?php

include('./includes/Card.php');
include('./includes/Pack.php');
include('./includes/Player.php');
include('./includes/Hand.php');

/**
 * 1. Une carte
 * Une carte est représentée par une valeur, de 2 à 14, et une couleur (pique, coeur, carreau, trefle)
 * Coder la classe Card avec ces propriétés
 * Coder une fonction __toString qui affichera la carte. 
 * A l'affichage : 11 => 'Valet', 12 => 'Dame', 13 => 'Roi', 14 => 'As'
 * Utiliser un peu de CSS pour les couleurs : pique => noir, coeur => rouge, trefle => vert, carreau => bleu
 * 
 * 2. Le paquet de carte
 * Un paquet de carte est constitué de 52 cartes
 * Coder la classe Pack et l'initialisation du paquet
 * Coder le mélange du paquet
 * Coder une fonction __toString qui affiche le paquet de cartes
 * 
 * 3. Le joueur 
 * Le joueur a un nom, et il va recevoir X cartes selon le jeu joué
 * Coder la classe Player avec ces propriétés
 * Coder une fonction __toString qui affiche le joueur, nom et cartes
 * 
 * 4. Distribution
 * Dans index.php, initialisez le paquet, mélangez-le et distribuez 5 cartes à 4 joueurs
 * Les joueurs ne peuvent pas avoir les mêmes cartes
 * Affichez chaque joueur
 * 
 * 5. Analyse des mains
 * La classe Hand va prendre en construction un tableau de cartes
 * Par un ensemble de méthodes, 
 * 
 * 6. Qui gagne la main ?
 * Classer les joueurs selon la hiérarchie des mains
 * 
 * 7. Lancer 10.000 parties
 * Le joueur qui gagne la manche gagne 1pt
 * Qui gagne à la fin des 10.000 parties ?
 * 
 * Référencer les combinaisons reçues par chaque joueur
 * Exemple : Joueur 1 :
 *      1 paire : 3245
 *      2 paires : 654
 *      etc.
 */

// Je sors un paquet neuf
$pack = new Pack;

// Je le mélange
$pack->shuffle();

// 4 joueurs s'assoient autour de la table
$arthur = new Player('Arthur');
$luis = new Player('Luis');
$louise = new Player('Lise');
$gregorie = new Player('Gregorie');

// Je distribue 5 cartes chacun
for ($c = 1; $c <= 5; $c++) {
    $arthur->receiveCard($pack->distribute());
    $luis->receiveCard($pack->distribute());
    $louise->receiveCard($pack->distribute());
    $gregorie->receiveCard($pack->distribute());
}

// echo $arthur;
// echo "\n";
// echo $luis;

// Analyse des mains
$analyseMainArthur = new Hand($arthur->getCards());
$analyseMainLuis = new Hand($luis->getCards());
$analyseMainLouise = new Hand($louise->getCards());
$analyseMainGregorie = new Hand($gregorie->getCards());

$players = [
    'arthur' => $analyseMainArthur->getPoints(),
    'luis' => $analyseMainLuis->getPoints(),
    'louise' => $analyseMainLouise->getPoints(),
    'gregorie' => $analyseMainGregorie->getPoints()
];

arsort($players);

echo '<p>Classement</p>';
$position = 1;
foreach ($players as $name => $points) {

    echo '<p>Position ' . $position . '</p>';
    echo ${$name};

    $analyseMain = 'analyseMain' . ucfirst($name);
    echo ${$analyseMain};

    $position++;
}


// var_dump($analyseMainArthur);

// var_dump($informationsMainArthur);

// echo $arthur;
// echo '<p>Combinaison : ' . $informationsMainArthur['combinaison_name'] . '</p>';
// x4, une fois par joueur

// ----------

// $combinaisons = [];

// for ($i = 1; $i <= 100; $i++) {

//     $pack = new Pack;
//     $pack->shuffle();
//     $joueur = new Player('Joueur');

//     for ($d = 1; $d <= 5; $d++) {
//         $joueur->receiveCard($pack->distribute());
//     }
    
//     $hand = new Hand($joueur->getCards());
//     $informations = $hand->getInformations();

//     $combinaisons[] = $informations['combinaison'];
// }

// $repartition = array_count_values($combinaisons);

// arsort($repartition);

// var_dump($repartition);

// $nbFoisTotal = count($combinaisons);
// <table>
//     <thead>
//         <tr>
//             <th>Combinaison</th>
//             <th>%</th>
//         </tr>
//     </thead>
//     <tbody>
//         <?php foreach ($repartition as $combinaison => $fois) :
//         <tr>
//             <td><?= $hand->getCombinaisonName($combinaison);</td>
//             <td><?= round($fois / $nbFoisTotal * 100, 2)%</td>
//         </tr>
//         <?php endforeach;
//     </tbody>
// </table>


    /**
        high_card
        flush    
        high_card
        high_card
        1_pair   
        2_pairs  
        high_card
        high_card
        1_pair   
        high_card

        high_card => 6 => 60% (6 / 10 * 100)
        1_pair => 2 => 20%
        2_pairs => 1 => 10%
        flush => 1 => 10%
     */