<?php

class Vampire implements CombatInterface
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
    private array $inventaire = [];
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

    public function soldeBanque(): string
    {
        // Le solde de mon compte en euros ?
        // (la propriété $euros de l'objet Banque)
        // Il faut que j'aille voir à la Banque ($this->banque)
        $solde = $this->banque->getEuros();

        // Arrondi du solde
        $solde = round($solde, 2); // 2 => 2 chiffres après la virgule

        // Si j'ai un solde positif :
        if ($solde >= 0) {
            return '+' . $solde . ' €';
        }
        
        // (Sinon) j'ai un solde négatif :
        return '-' . $solde . ' €';
    }

    //
    // GESTION INVENTAIRE
    //

    public function ajouteObjet(string $objet): void
    {   
        array_push($this->inventaire, $objet);
    }

    public function aLObjetDansLInventaire(string $objet): bool
    {
        return in_array($objet, $this->inventaire);
    }

    public function forceCourante(): int
    {
        $forceSupplementaire = 0;

        // Si la soif de sang est supérieure à 3, alors on gagne 1 pt de force
        if ($this->soifDeSang > 3) {
            $forceSupplementaire++;
        }

        // Si la soif de sang est supérieure à 6, alors on gagne 2 pts de force
        if ($this->soifDeSang > 6) {
            $forceSupplementaire++;
        }

        // Si la soif de sang est de 10, alors on gagne 3 pts de force
        if ($this->soifDeSang === 10) {
            $forceSupplementaire++;
        }

        return $this->force + $forceSupplementaire;
    }

    public function agiliteCourante(): int
    {
        $agiliteMalus = 0;
        // Si la soif de sang est supérieure à 4, alors on perd 1 pt d'agilité
        // (Alternative au if pour une incrémentation de 1)
        $agiliteMalus += (int) ($this->soifDeSang > 4);
            // ($soifDeSang > 4) => true ou false
            // (int) true ou false => 1 ou 0
            // += 0 => rien a + 0 = a    +=1 => ++
    
        // Si la soif de sang est supérieure à 7, alors on perd 2 pts d'agilité
        $agiliteMalus += (int) ($this->soifDeSang > 7);
    
        return $this->agilite - $agiliteMalus;
    }
    
    public function mechanceteCourante(): int
    {
        $mechanceteSupplementaire = 0;
    
        // Pas de break, parce que je peux faire toutes les opérations :
        // si soifDeSang = 10 et pointsDeVie = 40, je passe dans les 3 opérations
        switch (true) {
            // Si la soif de sang est supérieure à 5, alors on gagne 1 pt de méchanceté
            case ($this->soifDeSang > 5):
                $mechanceteSupplementaire++;
    
            // Si la soif de sang est supérieure à 8, alors on gagne 2 pts de méchanceté
            case ($this->soifDeSang > 8):
                $mechanceteSupplementaire++;
    
            // De plus, si les pointsDeVie sont inférieurs à 50, on gagne 1 pt de méchanceté
            case ($this->pointsDeVie < 50):
                $mechanceteSupplementaire++;
        }
        
       return $this->mechancete + $mechanceteSupplementaire;
    }

    public function pointsCombats(): int
    {
        return $this->forceCourante() + 
               $this->magie + 
               $this->agiliteCourante();
    }
}