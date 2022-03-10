<?php

use Model\Car;
use Model\ORM;
use Model\User;
use Model\Travel;
use Faker\Factory;

require_once 'vendor/autoload.php';

// $faker = Factory::create();
// // generate data by calling methods
// echo $faker->name();

// $orm = new ORM;

// $orm->prepare('SELECT id, name, city, zip FROM stations WHERE city = :city AND zip = :zip');
// $orm->set('city', 'Rennes');
// $orm->set('zip', '35000');
// $orm->execute();

// $stations = $orm->values();

// $orm = new ORM;
// $orm->select(['id', 'name', 'city', 'zip']);
// $orm->from('stations');
// $orm->where('city', 'Rennes');
// $orm->where('zip', '35000');

// $stations = $orm->values();

// echo '<pre>';
// print_r($orm);
// print_r($stations);
// echo '</pre>';

// ------------
// $orm->reset(); // On vide toutes les propriétés servant à faire une requête
// ------------

// INSERT INTO users (firstname, lastname) VALUES (:firstname, :lastname)

// $orm->in('users');
// $orm->set('subscription_id', 0, PDO::PARAM_INT);
// $orm->set('firstname', 'Arthur');
// $orm->set('lastname', 'Weill');
// $orm->set('date_of_birth', '1987-01-22');
// $orm->set('address', '4 allée du Batiment');
// $orm->set('zip', '35000');
// $orm->set('city', 'Rennes');
// $orm->set('count_travels', 0, PDO::PARAM_INT);

// $orm->insert();

// ---------

$user = new User(100);

echo '<pre>';
print_r($user->firstname);
echo '</pre>';
