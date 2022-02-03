<?php
include 'includes.php';

// Tester ma fonction Database::check
$tests = [
    ['input' => -1, 'expected' => false],
    ['input' => 0, 'expected' => false],
    ['input' => 1, 'expected' => true],
    ['input' => 4, 'expected' => true],
    ['input' => 295, 'expected' => true],
    ['input' => 809, 'expected' => true],
    ['input' => 810, 'expected' => false],
    ['input' => 917, 'expected' => false],
];

foreach ($tests as $i => $test) {

    if (Database::check($test['input']) === $test['expected']) {
        echo '<h3 style="color: green">Test ' . $i . ' avec input ' . $test['input'] . ' OK</h3>'; 
    } else {
        echo '<h3 style="color: red">Test ' . $i . ' avec input ' . $test['input'] . ' FAIL</h3>'; 
    }
}


// Tester ma fonction Database::read

$input = 801;
$expected = [
    'id' => 801,
    'name' => 'Magearna',
    'types' => ['Steel', 'Fairy'],
    'hp' => 80,
    'attack' => 95,
    'defense' => 115,
    'special_attack' => 130,
    'special_defense' => 115,
    'speed' => 65
];

if (Database::read($input) === $expected)  {
    echo '<h3 style="color: green">Test OK</h3>'; 
} else {
    echo '<h3 style="color: red">Test FAIL</h3>'; 
}

if (Database::read(1000) === [])  {
    echo '<h3 style="color: green">Test OK</h3>'; 
} else {
    echo '<h3 style="color: red">Test FAIL</h3>'; 
}