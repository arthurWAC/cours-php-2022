<?php

class Pokemon
{
    private int $id;

    private string $nom;
    private array $types;
    
    private int $hp;

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
        $this->hp = $data['hp'];
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

    public function getId(): int
    {
        return $this->id;
    }
}

