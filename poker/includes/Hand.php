<?php

class Hand
{
    public const COMBINAISON_HIGH_CARD = 'high_card';
    public const COMBINAISON_1_PAIR = '1_pair';
    public const COMBINAISON_2_PAIRS = '2_pairs';
    public const COMBINAISON_SET = 'set';
    public const COMBINAISON_STRAIGHT = 'straight';
    public const COMBINAISON_FLUSH = 'flush';
    public const COMBINAISON_FULL = 'full';
    public const COMBINAISON_QUADS = 'quads';
    public const COMBINAISON_STRAIGHT_FLUSH = 'straight_flush';

    private array $cards;

    public function __construct(array $cards)
    {
        $this->cards = $cards;
    }

    public function getInformations(): array
    {
        /**
         * Combinaison possibles :
         * Carte haute => Aucune combinaison, exemple : As 2 6 7 Valet
         * 1 paire => 2 cartes identiques, exemple : As As 2 6 7
         * 2 paires => 2x2 cartes identiques, exemple : As As 2 2 7
         * brelan => 3 cartes identiques, exemple : 3 3 3 6 7
         * suite => 5 cartes qui se suivent, exemple 6 7 8 9 10 ou 10 Valet Dame Roi As.
         *      Dans un premier temps, on laissera de côté la suite As 2 3 4 5
         *      Pas possible de faire Dame Roi As 2 3
         * couleur => 5 cartes de la même couleur, exemple As 2 6 7 Valet tout à coeur
         * full => brelan + paire, exemple : As As 3 3 3
         * carré => 4 cartes identiques, exemple : Roi Roi Roi Roi 6
         * quinte flush : 5 cartes qui se suivent, de la même couleur, exemple : 6 7 8 9 10 tout à trèfle
         * La meilleure combinaison est une quinte flush jusqu'à l'as (= quinte flush royale)
         * */

         /**
          * Cette fonction doit donc retourner :
          * La combinaison trouvée
          * Les cartes concernées
          * Réfléchir à une notion de score pour hiérarchiser les mains
          */

          /**
           * Allez y combinaison par combinaison, dans l'ordre que vous souhaitez
           * Les suites sont les plus dures à déceler
           * Du code peut être mutualisé dans la recherche des paires, brelan, full, carré
           * 
           * Attention, quand on trouve 2 paires, on trouve aussi une paire. Idem quand on trouve un full, etc.
           */

           /**
            * Vous pouvez avancer vers les points 6 et 7 de l'index.php sans pour autant avoir résolu toutes les combinaisons
            */

            return [];
    }

    /**
     * Suggestions de méthodes, à conserver ou non
     */

    public function contentPair(): bool
    {
        // [Card, Card, Card, Card, Card] => [2, 7, 8, 11, 13] => [2 => 1, 7 => 1, 8 => 1, 11 => 1, 13 => 1]
        // [7, 7, 8, 11, 13] => [7 => 2, 8 => 1, 11 => 1, 13 => 1]

        $occurences = [];

        foreach ($this->cards as $card) {
            $occurences[] = $card->getValue();
        }

        $occurences = array_count_values($occurences);

        return in_array(2, $occurences);
    }

    public function contentTwoPair(): bool
    {
        // [Card, Card, Card, Card, Card] => [7, 7, 8, 8, 13] => [7 => 2, 8 => 2, 13 => 1] => [2 => 2, 1 => 1]

        $occurences = [];

        foreach ($this->cards as $card) {
            $occurences[] = $card->getValue();
        }

        $occurences = array_count_values(array_count_values($occurences));

        // Je recherche précisément [2 => 2] dans occurences car pour 2 paires, j'ai forcément [2 => 2, 1 => 1]
        return (isset($occurences[2]) && $occurences[2] == 2);
    }


}