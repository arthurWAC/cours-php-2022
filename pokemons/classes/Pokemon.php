<?php

class Pokemon
{
    private int $id;

    public function __construct(int $pokemonId)
    {
        $this->id = $pokemonId;

        $data = Database::read($this->id);

        print_r($data);
    }
}

