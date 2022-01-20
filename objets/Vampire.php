<?php

class Vampire
{
    // public string $race = RACE_VAMPIRE;
    public string $clan;
    public string $prenom;
    public int $age;

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
    public int $euros = 7500;
    public array $artefacts = [];

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
    }

    public function augmenteStockDeSang(int $doses): void
    {
        $this->stockDeSang += $doses;
    }
}