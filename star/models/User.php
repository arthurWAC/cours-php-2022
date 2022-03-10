<?php
namespace Model;

class User extends ORM
{
    // Constantes
    private const TABLE = 'users';

    // Propriétés spécifiques

    // Constructeur
    public function __construct(int $userId = null)
    {
        parent::__construct(); // Lance le constructeur de l'ORM

        if ($userId !== null) {
            $this->get($userId);
        }
    }

    /**
     * Récupérer un User
     */
    public function get(int $userId): void
    {
        $this->reset();

        // je veux récupérer le user qui a id = $userId
        $this->from(self::TABLE);
        $this->where('id', $userId);

        $user = $this->value();

        // 2. Je vais "populate" mon objet
        // => Je vais créer à la volée des propriétés correspondantes à mes champs
        // $user->first_name  ou  $user->count_travels
        foreach ($user as $field => $value) {

            // Je passe les "0" => 12
            if (is_numeric($field)) {
                continue;
            }

            // Je garde que les "id" => 12
            $this->{$field} = $value;
        }
    }

    /**
     * Création d'un faux User
     */
    public function insertFake()
    {
        $this->reset();

        $faker = \Faker\Factory::create('fr_FR');

        $this->in(self::TABLE);
        $this->set('subscription_id', 0, \PDO::PARAM_INT);
        $this->set('firstname', $faker->firstName);
        $this->set('lastname', $faker->lastName);
        $this->set('date_of_birth', $faker->date);
        $this->set('address', $faker->streetAddress);
        $this->set('zip', $faker->postcode);
        $this->set('city', $faker->city);
        $this->set('count_travels', $faker->randomNumber(2), \PDO::PARAM_INT);

        $this->insert();
    }
}