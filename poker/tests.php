<?php

include('./includes/Card.php');
include('./includes/Pack.php');
include('./includes/Player.php');
include('./includes/Hand.php');

/**
 * Tests
 */

// Je recherche une paire
$handAvecRienDedans = [
    new Card(2, Card::COLOR_CLUBS),
    new Card(7, Card::COLOR_SPADE),
    new Card(8, Card::COLOR_CLUBS),
    new Card(Card::VALUE_JACK, Card::COLOR_DIAMOND),
    new Card(Card::VALUE_KING, Card::COLOR_CLUBS),
];

$handAvecUnePaire = [
    new Card(7, Card::COLOR_CLUBS),
    new Card(7, Card::COLOR_SPADE),
    new Card(8, Card::COLOR_CLUBS),
    new Card(Card::VALUE_JACK, Card::COLOR_DIAMOND),
    new Card(Card::VALUE_KING, Card::COLOR_CLUBS),
];

$handAvecDeuxPaires = [
    new Card(7, Card::COLOR_CLUBS),
    new Card(7, Card::COLOR_SPADE),
    new Card(8, Card::COLOR_CLUBS),
    new Card(8, Card::COLOR_DIAMOND),
    new Card(Card::VALUE_KING, Card::COLOR_CLUBS),
];

$handAvecBrelan = [
    new Card(7, Card::COLOR_CLUBS),
    new Card(7, Card::COLOR_SPADE),
    new Card(7, Card::COLOR_HEART),
    new Card(8, Card::COLOR_DIAMOND),
    new Card(Card::VALUE_KING, Card::COLOR_CLUBS),
];

$handAvecFull = [
    new Card(7, Card::COLOR_CLUBS),
    new Card(7, Card::COLOR_SPADE),
    new Card(7, Card::COLOR_HEART),
    new Card(Card::VALUE_KING, Card::COLOR_DIAMOND),
    new Card(Card::VALUE_KING, Card::COLOR_CLUBS),
];

$handAnalyse = new Hand($handAvecRienDedans);

if ($handAnalyse->contentPair() === false) {
    echo "TEST 1 OK \n";
}

$handAnalyse = new Hand($handAvecUnePaire);

if ($handAnalyse->contentPair() === true) {
    echo "TEST 2 OK \n";
}

$handAnalyse = new Hand($handAvecDeuxPaires);

if ($handAnalyse->contentPair() === true) {
    echo "TEST 3 OK \n";
}

// ----------- 2 PAIRES -------------

$handAnalyse = new Hand($handAvecUnePaire);

if ($handAnalyse->contentTwoPair() === false) {
    echo "TEST 4 OK \n";
}

$handAnalyse = new Hand($handAvecDeuxPaires);

if ($handAnalyse->contentTwoPair() === true) {
    echo "TEST 5 OK \n";
}

// ------- BRELAN -----------------

$handAnalyse = new Hand($handAvecUnePaire);

if ($handAnalyse->contentSet() === false) {
    echo "TEST 6 OK \n";
}

$handAnalyse = new Hand($handAvecDeuxPaires);

if ($handAnalyse->contentSet() === false) {
    echo "TEST 7 OK \n";
}

$handAnalyse = new Hand($handAvecBrelan);

if ($handAnalyse->contentSet() === true) {
    echo "TEST 8 OK \n";
}

// ---------- FULL -----------

$handAnalyse = new Hand($handAvecUnePaire);

if ($handAnalyse->contentFull() === false) {
    echo "TEST 9 OK \n";
}

$handAnalyse = new Hand($handAvecDeuxPaires);

if ($handAnalyse->contentFull() === false) {
    echo "TEST 10 OK \n";
}

$handAnalyse = new Hand($handAvecBrelan);

if ($handAnalyse->contentFull() === false) {
    echo "TEST 11 OK \n";
}

$handAnalyse = new Hand($handAvecFull);

if ($handAnalyse->contentFull() === true) {
    echo "TEST 12 OK \n";
}
