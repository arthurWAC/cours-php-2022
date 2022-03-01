<?php

class Combat
{
    // Un Combat, c'est 2 dresseurs
    private Dresseur $dresseur1;
    private Dresseur $dresseur2;

    // Nombre de tours
    private int $nbTours;

    // On stocke quelque part l'HTML qui "raconte" le combat
    private string $html;
    
    public function __construct(Dresseur $dresseurA, Dresseur $dresseurB, int $nbTours)
    {
        // On démarre et on vérifie que chacun a un Pokemon
        if (!$dresseurA->hasPokemon() || !$dresseurB->hasPokemon()) {
            die('Les dresseurs doivent avoir un Pokemon');
        }

        // Le Pokemon qui a le moins de HP commence à attaquer, (=> dresseur1 commence)
        // En cas d'HP identiques, on prend le Pokemon du premier dresseur
        if ($dresseurA->getPokemon()->getHP() <= $dresseurB->getPokemon()->getHP()) {
            $this->dresseur1 = $dresseurA;
            $this->dresseur2 = $dresseurB;
        } else {
            $this->dresseur1 = $dresseurB;
            $this->dresseur2 = $dresseurA;
        }

        // Autres propriétés
        $this->nbTours = $nbTours;
        $this->html = '';
    }

    public function combat(): void
    {
        // Déroulement d'un combat :

        // Chacun leur tour ils font une attaque de la valeur de attack
        // Le pokemon perd un nombre d'HP égal à attack (Pk1) - défense (Pk2)
        $nombreDeHPPerdusDresseur2 = $this->dresseur1->getPokemon()->getAttack() - $this->dresseur2->getPokemon()->getDefense();
        $this->dresseur2->getPokemon()->removeHP($nombreDeHPPerdusDresseur2);
        
        // Le pokemon perd un nombre d'HP égal à attack (Pk2) - défense (Pk1)
        $nombreDeHPPerdusDresseur1 = $this->dresseur2->getPokemon()->getAttack() - $this->dresseur1->getPokemon()->getDefense();


        // Tous les 3 tours, les pokemons font leur attaque spéciale
        // Ce sont alors les valeurs spéciales qui rentrent en compte
        $nombreDeHPPerdusDresseur2Special = $this->dresseur1->getPokemon()->getAttackSpecial() - $this->dresseur2->getPokemon()->getDefenseSpecial();

        
        $nombreDeHPPerdusDresseur1Special = $this->dresseur2->getPokemon()->getAttackSpecial() - $this->dresseur1->getPokemon()->getDefenseSpecial();
        



        // Le combat s'arrête :
            // Le nombre de tours est atteint
            // Un Pokemon a 0 HP
    }
}