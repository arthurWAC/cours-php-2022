<?php

class Database
{
    private const JSON_DATABASE = './pokemon.json';

    // Les noms des champs dans le JSON
    private const JSON_FIELD_ID = 'id';
    private const JSON_FIELD_NAME = 'name';
    private const JSON_FIELD_NAME_ENGLISH = 'english';
    private const JSON_FIELD_TYPE = 'type';

    // Les noms des champs que j'utilise dans mon code
    private const USE_FIELD_NOM = 'nom';
    private const USE_FIELD_TYPE = 'type';

    /**
     * Cette fonction retournera la liste de tous les pokemons
     * dans un tableau PHP
     * l'index sera l'id du pokemon
     * Il y a aura les clés suivantes :
     *    - nom
     *    - type
     */
    public static function all(): array
    {
        $pokemons = [];

        $json = file_get_contents(self::JSON_DATABASE);
        $pokemonsDatabase = json_decode($json, true);
        
        foreach ($pokemonsDatabase as $pokemon) {

            // Ancienne version
            $nom = '';
            if (isset($pokemon[self::JSON_FIELD_NAME][self::JSON_FIELD_NAME_ENGLISH])) {
                $nom = $pokemon[self::JSON_FIELD_NAME][self::JSON_FIELD_NAME_ENGLISH];
            }

            $pokemons[$pokemon[self::JSON_FIELD_ID]] = [
                self::USE_FIELD_NOM => $nom,
                self::USE_FIELD_TYPE => $pokemon[self::JSON_FIELD_TYPE][0] ?? '' // Remplacé par "??"
            ];
        }

        return $pokemons;
    }

    /**
     * Renvoie vrai ou faux selon la présence du pokemon d'id $pokemonId
     * dans la base de données (= dans le fichier JSON)
     */
    public static function check(int $pokemonId): bool
    {
        // V1, en réutilisant all()

        // V1.1 (à ne pas faire, puisque toujours optimisable)
        // foreach (self::all() as $id => $pokemon) {
        //     if ($id == $pokemonId) {
        //         $pokemonTrouve = true;
        //     }
        // }

        // V1.2
        // foreach (self::all() as $id => $pokemon) {
        //     if ($id == $pokemonId) {
        //         return true;
        //     }
        // }

        // V1.3 sans foreach
        // return array_key_exists($pokemonId, self::all());

        // V2, sans réutiliser all()
        $json = file_get_contents(self::JSON_DATABASE);
        $pokemonsDatabase = json_decode($json, true);
        
        foreach ($pokemonsDatabase as $pokemon) {
            if ($pokemon[self::JSON_FIELD_ID] == $pokemonId) {
                return true;
            }
        }

        return false;
    }

    public static function read(int $pokemonId): array
    {
        foreach (self::getDataFromJson() as $pokemon) {
            if ($pokemon[self::JSON_FIELD_ID] == $pokemonId) {
                
                return [
                    'id' => $pokemon[self::JSON_FIELD_ID],
                    'name' => $pokemon[self::JSON_FIELD_NAME][self::JSON_FIELD_NAME_ENGLISH],
                    'types' => $pokemon['type'],
                    'hp' => $pokemon['base']['HP'],
                    'attack' => $pokemon['base']['Attack'],
                    'defense' => $pokemon['base']['Defense'],
                    'special_attack' => $pokemon['base']['Sp. Attack'],
                    'special_defense' => $pokemon['base']['Sp. Defense'],
                    'speed' => $pokemon['base']['Speed']
                ];
            }
        }
        
        return [];
    }

    private static function getDataFromJson(): array
    {
        return json_decode(
            file_get_contents(self::JSON_DATABASE),
            true
        );
    }
}

