<?php

class Pokemon
{
    private int $id;

    private string $nom;
    private array $types;
    
    private int $hp;
    private int $hpStart;

    private int $attack;
    private int $defense;
    private int $attackSpecial;
    private int $defenseSpecial;

    private int $speed;

    public function __construct(int $pokemonId)
    {
        $this->id = $pokemonId;

        $data = Database::read($this->id);

        $this->nom = $data[Database::USE_FIELD_NOM];
        $this->types = $data['types'];
        $this->hp = $this->hpStart = $data['hp']; // J'attribue une valeur à mes 2 variables en même temps
        $this->attack = $data['attack'];
        $this->defense = $data['defense'];
        $this->attackSpecial = $data['special_attack'];
        $this->defenseSpecial = $data['special_defense'];
        $this->speed = $data['speed'];
    }

    public function informations(): string
    {
        $html = '';

        // Infos du pokemon
        $html .= '<h4>Pokemon</h4>';
            $html .= '<ul>';
            $html .= '<li>Nom : ' . $this->nom . '</li>';
            $html .= '<li>Types : ' . implode(', ', $this->types) . '</li>';
            $html .= '<li>HP : ' . $this->hp . '</li>';
            $html .= '<li>Attaque : ' . $this->attack . '</li>';
            $html .= '<li>Attaque spéciale : ' . $this->attackSpecial . '</li>';
            $html .= '<li>Défense : ' . $this->defense . '</li>';
            $html .= '<li>Défense spéciale : ' . $this->defenseSpecial . '</li>';
            $html .= '<li>Vitesse : ' . $this->speed . '</li>';
            $html .= '</ul>';

        return $html;
    }

    public function removeHP(int $hpToRemove): void
    {
        $this->hp -= $hpToRemove;
        
        // Les HP ne passent pas sous zéro
        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getTypes(): array
    {
        return $this->types;
    }
    
    public function getHP(): int
    {
        return $this->hp;
    }
    
    public function getHPStart(): int
    {
        return $this->hpStart;
    }
    
    public function getAttack(): int
    {
        return $this->attack;
    }

    public function getAttackSpecial(): int
    {
        return $this->attackSpecial;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function getDefenseSpecial(): int
    {
        return $this->defenseSpecial;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }
}

