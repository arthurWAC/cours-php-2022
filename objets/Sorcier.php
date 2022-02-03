<?php

class Sorcier implements CombatInterface
{
    private int $force;
    private int $magie;
    private int $agilite;

    public function setValues(int $force, int $magie, int $agilite): void
    {
        $this->force = $force;
        $this->magie = $magie;
        $this->agilite = $agilite;
    }

    public function setRandomValues(): void
    {
        $this->force = rand(3, 5);
        $this->magie = rand(10, 15);
        $this->agilite = rand(10, 20);
    }

    public function pointsCombats(): int
    {
        // Les points de combats du Sorcier sont égaux à la somme de ces 3 caractéristiques.
        return $this->force + $this->magie + $this->agilite;
    }
}