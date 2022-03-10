<?php

use Model\Car;
use Model\User;
use Faker\Factory;
use Model\Travel;

require_once 'vendor/autoload.php';

$faker = Factory::create();
// generate data by calling methods
echo $faker->name();

$user = new User;

$car = new Car;

$travel = new Travel;