<?php
/**
 * CONSTANTES
 */
define('SEPARATEUR', '<br /><br /><hr /><br />'); // Pour séparer les pages les unes avec les autres

define('RACE_VAMPIRE', 'vampire');
define('RACE_LOUP_GAROUX', 'loup-garoux');
define('RACE_SORCIER', 'sorcier');
define('RACE_ZOMBIE', 'zombie');

/**
 * FONCTIONS
 */

// 5 types principaux disponibles
// int => nombre entier
// float => nombre décimal
// string => chaine de caractères
// array => tableau
// bool => booléen

function forceCourante(int $force, int $soifDeSang): int
{
    $forceSupplementaire = 0;

	// Si la soif de sang est supérieure à 3, alors on gagne 1 pt de force
    if ($soifDeSang > 3) {
        $forceSupplementaire++;
    }

	// Si la soif de sang est supérieure à 6, alors on gagne 2 pts de force
    if ($soifDeSang > 6) {
        $forceSupplementaire++;
    }

	// Si la soif de sang est de 10, alors on gagne 3 pts de force
    if ($soifDeSang === 10) {
        $forceSupplementaire++;
    }

    return $force + $forceSupplementaire;
}

function agiliteCourante($agilite, $soifDeSang)
{
	// Si la soif de sang est supérieure à 4, alors on perd 1 pt d'agilité
	// Si la soif de sang est supérieure à 7, alors on perd 2 pts d'agilité
}

function mechanceteCourante($mechancete, $soifDeSang, $pointsDeVie)
{
	// Si la soif de sang est supérieure à 5, alors on gagne 1 pt de méchanceté
	// Si la soif de sang est supérieure à 8, alors on gagne 2 pts de méchanceté

	// De plus, si les pointsDeVie sont inférieurs à 50, on gagne 1 pt de méchanceté
}

function conversionDollarsEuros($sommeEnDollars)
{
	// 1 Euro = 1.24074 U.S. dollars
	// La banque prend une commission de 1€ sur chaque transaction
}

function conversionPoundsEuros(float $sommeEnPounds): float
{
	// 1 Euro = 0.884473909 British pounds
    $taux = 0.884473909;
    // 1€   0.88
    // X ?  10
    $montantEnEuros = $sommeEnPounds / $taux;

	// La banque prend une commission de 1€ sur chaque transaction
    $commissionBanque = 1;
    $montantEnEuros += $commissionBanque;

    return round($montantEnEuros, 2);
}

function transcriptionDuJournal(array $journal): string
{
	// Parcourir le journal pour créer une chaine de caractères complètes
    $html = '';

    foreach ($journal as $evenement) {

        $html .= '<h2>' . $evenement['date'] . ' - ' . $evenement['ville'] . '</h2>';

        $html .= '<ul>';
        foreach ($evenement['actions'] as $action) {
            $html .= '<li>' . $action . '</li>';
        }
        $html .= '</ul>';

        if ($evenement['artefact']['trouve']) {
            $html .= '<h4>Artefact trouvé : ' . $evenement['artefact']['nom'] . '</h4>';
        }

        $html .= SEPARATEUR;
    }

    return $html;
}

/**
 * INFORMATIONS DU PERSONNAGE
 */
 $race = RACE_VAMPIRE;
 $clan = 'Ferinis';

 $prenom = 'Carmela';
 $age = 99;

 $force = rand(5, 20);
 $agilite = rand(7, 15);
 $mechancete = rand(7, 20);
 $magie = rand(5, 15);
 
 $stockDeSang = 0;
 $soifDeSang = rand(0, 6); // Va de 0 à 10. 0 => Pas en manque. 10 => En manque total
 $pointsDeVie = 100;

 $inventaire = [];
 $euros = 7500;

 $journal = [];
 $artefacts = [];

 /**
  * HISTOIRE : Votre héroïne Vampire vient d'une famille célèbre de vampires.
  * Pour fêter ses 100 ans, elle doit parcourir le monde à la recherche de 3 artefacts
  * Elle ne peut voyager que la nuit.
  * Ses compétences sont altérées par sa soif de sang
  * Elle doit consigner ses faits et gestes dans un journal, avec à chaque fois : 
  *		- date et heure
  * 	- ville
  * 	- action(s) significative(s)
  * 	- artefact trouvé, si oui lequel
  */

 /**
  * NUIT 1 : Paris, le 11 Février 2018
  */

 /**
  * Votre héroïne Vampire quitte son domaine, avant de partir, son frère lui confie 2 doses
  * de sang et 5.000€. Elle monte dans sa voiture et rejoint l'aéroport.
  */
$stockDeSang += 2;
$euros += 5000;

$evenement = [
    'date' => '11/02/2018',
    'ville' => 'Paris',
    'actions' => [
        'Mon frère me confie 2 doses de sang',
        'Mon frère me donne 5.000€'
    ],
    'artefact' => [
        'trouve' => false,
        'nom' => ''
    ]
];

$journal[] = $evenement;

 /**
  * Sur le parking de l'aéroport, elle paye 100€ pour pouvoir y laisser sa voiture 1 mois.
  * Elle tombe sur un sorcier qu'elle connait bien. Celui-ci décide de l'aider dans sa quête
  * et lui donne alors un premier objet :
  * 	- si sa magie est inférieure à 10, alors elle reçoit l'objet : "dague de sorcier"
  *		- si sa magie est égale ou supérieure à 10, alors elle reçoit l'objet : "poil de loup-garou"
  */
  $euros -= 100;
  $actions = ['J\'arrive à l\'aéroport'];

  if ($magie < 10) {
    $inventaire[] = 'dague de sorcier';
    $actions[] = 'On me donne une dague de sorcier';
  } else {
    $inventaire[] = 'poil de loup-garou';
    $actions[] = 'On me donne un poil de loup-garou';
  }

    $evenement = [
        'date' => '11/02/2018',
        'ville' => 'Paris',
        'actions' => $actions,
        'artefact' => [
            'trouve' => false,
            'nom' => ''
        ]
    ];

    $journal[] = $evenement;

 /**
  * Un billet d'avion acheté 150€ et elle s'envole pour Londres
  * Durant le vol, sa soif de sang augmente de 1
  */
  $euros -= 150;
  $actions = [];
  $actions[] = 'J\'achète un billet d\'avion';

  $soifDeSang++;
  
  $evenement = [
    'date' => '11/02/2018',
    'ville' => 'Paris',
    'actions' => $actions,
    'artefact' => [
        'trouve' => false,
        'nom' => ''
    ]
];

$journal[] = $evenement;
  

 /**
  * Elle prend un taxi (10£) pour se rendre au VCoL (Vampire Club of London)
  * C'est un club spécial pour vampire, où on paye en fonction de sa force.
  * Le verre de sang coûte de base 20£.
  *		- Si la force du Vampire est de 10 ou +, il a 5£ de réduction
  *		- Si la force du Vampire est de 15 ou +, il a 5£ de réduction supplémentaire
  * Le verre de sang lui fait descendre sa soif de sang de 1 unité
  */
$coutTaxi = conversionPoundsEuros(10);
$euros -= $coutTaxi;

$actions = [];
$actions[] = 'Je prends un taxi, 10£ ('. $coutTaxi .'€) pour aller au VCoL';


// Gestion du prix du verre de sang
// Définir l'action associée
$verreDeSangEnPounds = 20;
$reductionEnPounds = 5;

if (forceCourante($force, $soifDeSang) >= 10) {
    $verreDeSangEnPounds -= $reductionEnPounds;
}

if (forceCourante($force, $soifDeSang) >= 15) {
    $verreDeSangEnPounds -= $reductionEnPounds;
}

$verreDeSangEnEuros = conversionPoundsEuros($verreDeSangEnPounds);
$euros -= $verreDeSangEnEuros;

$actions = [];

$actions[] = 'Je prends un verre de sang, '. $verreDeSangEnPounds .'£ (' . $verreDeSangEnEuros . '€)' .
             '<br />Pour info, Force = '. $force .' SdS = '. $soifDeSang .
             '<br />Force courante = ' . forceCourante($force, $soifDeSang);


$soifDeSang--;
$actions[] = 'Ma soif de sang diminue de 1, et est donc de ' . $soifDeSang;

$evenement = [
    'date' => '11/02/2018',
    'ville' => 'Londres',
    'actions' => $actions,
    'artefact' => [
        'trouve' => false,
        'nom' => ''
    ]
];


$journal[] = $evenement;


 /**
  * Retour à l'aéroport en taxi, pour 10£.
  * Elle prend un nouvel avion pour Los Angeles, pour 660£.
  * Durant le vol, sa soif de sang augmente de 2
  */


 /**
  * Fin de la journée, remplir le journal
  */

 /**
  * NUIT 2 : Désert du Nevada, le 12 Février 2018
  */

 /**
  * Elle loue une voiture de sport pour se rendre dans le désert du Nevada, coût : 250$
  */

 /**
  * Arrivé dans le désert, elle doit se rendre dans une grotte millénaire.
  * Si son agilité est inférieure à 10, alors elle va mettre + de temps et sa soif 
  * de sang augmente de 1
  */

 /**
  * Dans la grotte, elle est attaquée par un sorcier
  * Le sorcier a les caractéristiques suivantes :
  * 	- Force : rand(3,5)
  * 	- Magie : rand(10,15)
  * 	- Agilité : rand(5,7)
  * 
  * Les points de combats du Sorcier sont égaux à la somme de ces 3 caractéristiques.
  *
  * Pour Carmela, ses points de combats sont égaux à la somme de ses 3 mêmes caractéristiques.
  * 
  * Si PtC du sorcieur > PtC Carmela, alors elle perd autant de points de vie (x5).
  * Exemple : Le sorcier a 21. Si Carmela a 19, alors elle perd 2 x5 => 10pts de vie.
  *
  * Si Carmela a + de point de combat, alors elle le terrasse et gagne l'artefact "Pierre du désert"
  * Si les points de vie tombent à zéro, elle meurt.
  */

 /**
  * Retour à l'aéroport.
  * Elle achète un billet d'avion pour l'Afrique du sud, coût : 700$.
  */

 /**
  * Dans l'avion, son voisin relou n'arrête pas de lui parler...
  * Si sa méchanceté est de 15 ou plus, elle le tue dans les toilettes de l'avion et le vide de son sang.
  * 	Sa soif de sang retombe alors à zéo.
  * Si sa méchanceté est entre 10 et 14. Elle l'assome simplement, et lui prend un peu de sang.
  *		Sa soif de sang tombe de 2 unités.
  *
  * Sinon elle le laisse parler toute la nuit, mais sa soif de sang augmente donc d'1 unité.
  */

 /**
  * Fin de la journée, remplir le journal
  */







  /**
   * RETRANSCRIPTION DU JOURNAL
   */
  echo transcriptionDuJournal($journal);