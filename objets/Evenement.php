<?php

class Evenement
{
    public string $date;
    public string $ville;

    // Valeur par défaut : [] => tableau vide
    public array $actions = [];
    public int $nbActions = 0;

    public bool $artefactTrouve = false;
    public string $artefactNom = '';

    // Constructeur
    // On ne type pas le constructeur
    public function __construct(string $date, string $ville)
    {
        $this->date = $date;
        $this->ville = $ville;
    }

    public function ajouteAction(string $action): void
    {
        if ($action == '') {
            return; // return rien, donc respecte le type "void"
        }

        $this->nbActions++;
        $this->actions[] = $action;
    }

    public function trouveArtefact(string $nom): void
    {
        $this->artefactTrouve = true;
        $this->artefactNom = $nom;
    }
}

// $journal = new Journal;

// $evenement = new Evenement('11/02/2018', 'Paris');
// $evenement->ajouteAction('Je prends un taxi');
// $evenement->ajouteAction('Je loue une voiture');

// echo '<pre>';
// print_r($evenement);
// echo '</pre>';

// $evenement->trouveArtefact('Mini Pyramide');

// echo '<pre>';
// print_r($evenement);
// echo '</pre>';

// $evenement = [
//     'date' => '11/02/2018',
//     'ville' => 'Paris',
//     'actions' => [
//         'Mon frère me confie 2 doses de sang',
//         'Mon frère me donne 5.000€'
//     ],
//     'artefact' => [
//         'trouve' => false,
//         'nom' => ''
//     ]
// ];