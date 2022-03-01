<?php

class Pack implements \Stringable
{
    // Va contenir que des objets Card
    private array $cards;

    public function __construct()
    {
        // Il faut construire le paquet de cartes
            $this->cards = [];

            // Pour chaque couleur, je dois mettre les cartes de valeur 2 à 14
            foreach (Card::COLORS as $color) { // 4 itérations (car 4 couleurs)
                for ($v = 2; $v <= 14; $v++) { // 13 itérations (2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14)
                    // => 4 * 13 => 52 cartes
                    array_push($this->cards, new Card($v, $color));
                }
            }
    }

    // Le mélange
    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    public function distribute(): Card
    {
        // Je distribue la "carte du dessus" = "la première carte" du paquet
        $topCard = $this->cards[array_key_first($this->cards)];
        unset($this->cards[array_key_first($this->cards)]); // La carte est retirée du paquet

        return $topCard;
    }

    // Affichage
    public function __toString(): string
    {
        $out = '<ul>';

        foreach ($this->cards as $card) {
            $out .= '<li>' . $card . '</li>';
        }

        $out .= '</ul>';

        return $out;
    }
}
