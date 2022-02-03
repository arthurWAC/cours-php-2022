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
}