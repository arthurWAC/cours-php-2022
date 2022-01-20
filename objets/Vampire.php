<?php

class Vampire
{
    // public string $race = RACE_VAMPIRE;
    public string $clan;
    public string $prenom;
    public int $age;

    // Pour les évènements
    public string $dateCourante;
    public string $villeCourante;
    public array $actionsCourantes;

    // Valeurs aléatoires, initialisées dans le constructeur
    public int $force;
    public int $agilite;
    public int $mechancete;
    public int $magie;
    public int $soifDeSang; // Va de 0 à 10. 0 => Pas en manque. 10 => En manque total

    // Valeurs fixes 
    public int $pointsDeVie = 100;
    public int $stockDeSang = 0;
    public array $inventaire = [];
    public array $artefacts = [];

    public Banque $banque;

    public Journal $journal;

    public function __construct(string $prenom, string $clan, int $age)
    {
        $this->prenom = $prenom;
        $this->clan = $clan;
        $this->age = $age;

        $this->force = rand(5, 20);
        $this->agilite = rand(7, 15);
        $this->mechancete = rand(7, 20);
        $this->magie = rand(5, 15);
        $this->soifDeSang = rand(0, 6);

        $this->banque = new Banque(7500);
        $this->journal = new Journal();
    }

    //
    // ----- METHODES LIEES AUX EVENEMENTS ET JOURNAL
    //

    public function estLe(string $date): void
    {
        $this->dateCourante = $date;
    }

    public function estA(string $ville): void
    {
        $this->villeCourante = $ville;
    }

    public function raconte(string $action): void
    {
        $this->actionsCourantes[] = $action;
    }

    public function nouvellePage(): void
    {
        $evenement = new Evenement(
            $this->dateCourante,
            $this->villeCourante
        );

        foreach ($this->actionsCourantes as $action) {
            $evenement->ajouteAction($action);
        }

        $this->journal->ajoutEvenement($evenement);

        // Reset
        $this->actionsCourantes = [];
    }
    //
    // ------------------------------------------------------------
    //

    public function augmenteStockDeSang(int $doses): void
    {
        $this->stockDeSang += $doses;
    }

    public function depense(float $montant, string $devise = Banque::DEVISE_EUROS): void
    {
        $this->banque->mouvement(
            $montant,
            Banque::OPERATION_DEBIT,
            $devise
        );
    }

    public function encaisse(float $montant, string $devise = Banque::DEVISE_EUROS): void
    {
        $this->banque->mouvement(
            $montant,
            Banque::OPERATION_CREDIT,
            $devise
        );
    }
}