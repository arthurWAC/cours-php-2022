<?php
/**
 * 1. Une carte
 * Une carte est représentée par une valeur, de 2 à 14, et une couleur (pique, coeur, carreau, trefle)
 * Coder la classe Card avec ces propriétés
 * Coder une fonction __toString qui affichera la carte. 
 * A l'affichage : 11 => 'Valet', 12 => 'Dame', 13 => 'Roi', 14 => 'As'
 * Utiliser un peu de CSS pour les couleurs : pique => noir, coeur => rouge, trefle => vert, carreau => bleu
 */
 
class Card implements \Stringable
{
    // Constantes
    public const COLOR_SPADE = 'spade';
    public const COLOR_DIAMOND = 'diamond';
    public const COLOR_HEART = 'heart';
    public const COLOR_CLUBS = 'clubs';

    public const COLORS = [
        self::COLOR_SPADE,
        self::COLOR_DIAMOND,
        self::COLOR_HEART,
        self::COLOR_CLUBS
    ];

    public const COLORS_COLORS = [
        self::COLOR_SPADE => 'black',
        self::COLOR_DIAMOND => 'blue',
        self::COLOR_HEART => 'red',
        self::COLOR_CLUBS => 'green'
    ];

    public const VALUE_JACK = 11;
    public const VALUE_QUEEN = 12;
    public const VALUE_KING = 13;
    public const VALUE_ACE = 14;

    public const NAMES = [
        self::VALUE_JACK => 'Jack',
        self::VALUE_QUEEN => 'Queen',
        self::VALUE_KING => 'King',
        self::VALUE_ACE => 'Ace'
    ];

    // Une carte est représentée par une valeur, de 2 à 14
    private int $value;

    // Une carte est représentée par une couleur (pique, coeur, carreau, trefle)
    private string $color;

    public function __construct(int $value, string $color)
    {
        // Contrôle mes valeurs
        
        // Est ce que value est bien entre 2 et 14
        if ($value < 2 || $value > 14) {
            die('Valeur incorrecte pour la Card');
        }

        // Est ce que je suis en présence d'une couleur valide
        if (!in_array($color, self::COLORS)) {
            die('Couleur incorrecte pour la Card');
        }

        $this->value = $value;
        $this->color = $color;
    }

    public function valueToName(): string
    {
        if ($this->value <= 10) {
            return (string) $this->value;
        }

        return self::NAMES[$this->value];
    }

    public function colorToColor(): string
    {
        return self::COLORS_COLORS[$this->color];
    }

    public function __toString(): string
    {
        return '<span style="color: '. $this->colorToColor() .';">'. $this->valueToName() .' of '. $this->color .'</span>';
    }

    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }
}