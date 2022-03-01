<?php

class Player implements Stringable
{
    private string $name;
    private array $cards;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->cards = [];
    }

    public function receiveCard(Card $card)
    {
        array_push($this->cards, $card);
    }

    public function __toString(): string
    {
        $out = '<p>' . $this->name . '</p>';

        $out .= '<ul>';

        foreach ($this->cards as $card) {
            $out .= '<li>' . $card . '</li>';
        }

        $out .= '</ul>';

        return $out;
    }

    public function getCards(): array
    {
        return $this->cards;
    }
}