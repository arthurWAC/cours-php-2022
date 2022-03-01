<?php

class Dresseur
{
    private string $nom;

    private ?Pokemon $pokemon; // "?" => signifie que $pokemon peut aussi être null (nullable)

    public function __construct(string $nom)
    {
        $this->nom = $nom;
        $this->pokemon = null;
    }

    public function setPokemon(Pokemon $pokemon): void
    {
        $this->pokemon = $pokemon;
    }

    public function getPokemon(): ?Pokemon
    {
        return $this->pokemon;
    }

    public function informations(): string
    {
        $html = '';

        // Info du dresseur
        $html .= '<h4>Dresseur</h4>';
            $html .= '<ul>';
            $html .= '<li>Nom : ' . $this->nom . '</li>';
            $html .= '</ul>';

        // Infos du pokemon
        if ($this->pokemon === null) {
            $html .= '<p>Pas encore de Pokemon.</p>';
        } else {
            $html .= $this->pokemon->informations();
        }

        return $html;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPokemonId(): int
    {
        return $this->pokemon->getId();
    }

    // Je veux faire une fonction "hasPokemon" => "a Pokemon"
    // 2 réponses possibles : "oui" ou "non"
    // Cette fonction est utilisée dans un if, donc ça va me renvoyer un booléen
    public function hasPokemon(): bool
    {
        // Si pokemon n'est pas null, c'est que j'ai bien un pokemon
        return ($this->pokemon !== null);
    }
}