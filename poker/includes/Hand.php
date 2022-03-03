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

    public const NAMES = [
        self::COMBINAISON_HIGH_CARD => 'Carte Haute',
        self::COMBINAISON_1_PAIR => 'une Paire',
        self::COMBINAISON_2_PAIRS => 'deux Paires',
        self::COMBINAISON_SET => 'un Brelan',
        self::COMBINAISON_STRAIGHT => 'une Suite',
        self::COMBINAISON_FLUSH => 'une Couleur',
        self::COMBINAISON_FULL => 'un Full',
        self::COMBINAISON_QUADS => 'un Carré',
        self::COMBINAISON_STRAIGHT_FLUSH => 'une Straight Flush',
    ];

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

            // Combinaison de départ
            $combinaison = self::COMBINAISON_HIGH_CARD;

            // Chercher la combinaison (dans le désordre)
            // Dès que je trouve une combinaison je m'arrête
            // Assemblage, des if, des switch ou autre...

            // V1 avec des if et un flag
            // $combinaisonFinded = false;

            // if (!$combinaisonFinded && $this->contentStraightFlush()) {
            //     $combinaison = self::COMBINAISON_STRAIGHT_FLUSH;
            //     $combinaisonFinded = true;
            // }

            // if (!$combinaisonFinded && $this->contentQuads()) {
            //     $combinaison = self::COMBINAISON_QUADS;
            //     $combinaisonFinded = true;
            // }

            // if (!$combinaisonFinded && $this->contentFull()) {
            //     $combinaison = self::COMBINAISON_FULL;
            //     $combinaisonFinded = true;
            // }

            // if (!$combinaisonFinded && $this->contentFlush()) {
            //     $combinaison = self::COMBINAISON_FLUSH;
            //     $combinaisonFinded = true;
            // }

            // if (!$combinaisonFinded && $this->contentStraight()) {
            //     $combinaison = self::COMBINAISON_STRAIGHT;
            //     $combinaisonFinded = true;
            // }

            // if (!$combinaisonFinded && $this->contentSet()) {
            //     $combinaison = self::COMBINAISON_SET;
            //     $combinaisonFinded = true;
            // }

            // if (!$combinaisonFinded && $this->contentTwoPair()) {
            //     $combinaison = self::COMBINAISON_2_PAIRS;
            //     $combinaisonFinded = true;
            // }

            // if (!$combinaisonFinded && $this->contentPair()) {
            //     $combinaison = self::COMBINAISON_1_PAIR;
            //     $combinaisonFinded = true;
            // }

            // V2 switch
            switch (true) {

                case $this->contentStraightFlush():
                    $combinaison = self::COMBINAISON_STRAIGHT_FLUSH;
                break;

                case $this->contentQuads():
                    $combinaison = self::COMBINAISON_QUADS;
                break;

                case $this->contentFull():
                    $combinaison = self::COMBINAISON_FULL;
                break;

                case $this->contentFlush():
                    $combinaison = self::COMBINAISON_FLUSH;
                break;

                case $this->contentStraight():
                    $combinaison = self::COMBINAISON_STRAIGHT;
                break;

                case $this->contentSet():
                    $combinaison = self::COMBINAISON_SET;
                break;

                case $this->contentTwoPair():
                    $combinaison = self::COMBINAISON_2_PAIRS;
                break;

                case $this->contentPair():
                    $combinaison = self::COMBINAISON_1_PAIR;
                break;

                default:
                    $combinaison = self::COMBINAISON_HIGH_CARD;
                break;
            }

            return [
                'combinaison' => $combinaison,
                'combinaison_name' => $this->getCombinaisonName($combinaison)
            ];
    }

    public function getCombinaisonName(string $combinaison): string
    {
        return self::NAMES[$combinaison] ?? '';
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

    public function contentSet(): bool
    {
        // [Card, Card, Card, Card, Card] => [7, 7, 7, 11, 13] => [7 => 3, 11 => 1, 13 => 1]

        $occurences = [];

        foreach ($this->cards as $card) {
            $occurences[] = $card->getValue();
        }

        $occurences = array_count_values($occurences);

        return in_array(3, $occurences);
    }

    public function contentFull(): bool
    {
        return $this->contentPair() && $this->contentSet();
    }

    public function contentQuads(): bool
    {
        // [Card, Card, Card, Card, Card] => [7, 7, 7, 13, 7] => [7 => 4, 13 => 1]

        $occurences = [];

        foreach ($this->cards as $card) {
            $occurences[] = $card->getValue();
        }

        $occurences = array_count_values($occurences);

        return in_array(4, $occurences);
    }

    public function contentFlush(): bool
    {
        // [Card, Card, Card, Card, Card] => ['clubs','clubs','clubs','clubs','clubs' ] => ['clubs']
        // [Card, Card, Card, Card, Card] => ['clubs','clubs','heart','clubs','clubs' ] => ['clubs', 'heart']

        $occurences = [];

        foreach ($this->cards as $card) {
            $occurences[] = $card->getColor();
        }

        $occurences = array_unique($occurences);

       return (count($occurences) === 1);
    }

    public function contentStraight(): bool
    {
        // [Card, Card, Card, Card, Card] => [2, 3, 4, 5, 6] => [2, 3, 4, 5, 6] => true
        // [Card, Card, Card, Card, Card] => [2, 6, 5, 3, 4] => [2, 3, 4, 5, 6] => true
        // [Card, Card, Card, Card, Card] => [2, 8, 5, 3, 4] => [2, 3, 4, 5, 8] => false
        // [Card, Card, Card, Card, Card] => [8, 9, 11, 10, 12] => [8, 9, 10, 11, 12] => true

        // Etape 1 : [Card, Card, Card, Card, Card] => [2, 3, 4, 5, 6]
        $occurences = [];

        foreach ($this->cards as $card) {
            $occurences[] = $card->getValue();
        }

        // Etape 2 : [2, 6, 5, 3, 4] => [2, 3, 4, 5, 6]
        sort($occurences); // Fonctionne "par référence" pas de $occurences =

        // Etape 3 : [2, 3, 4, 5, 6] => true
        $start = $occurences[0]; // => 2

        // V1 : avec la fonction range => https://www.php.net/manual/fr/function.range.php
        $straight = range($start, $start + 4); // [2, 3, 4, 5, 6]
        return ($occurences === $straight);

        // V2 : avec un petit Algo
        foreach ($occurences as $value) {

            if ($value - $start > 1) {
                return false;
            }

            $start = $value;
        }

        return true;
    }

    public function contentStraightFlush()
    {
        return $this->contentStraight() && $this->contentFlush();
    }


}