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

$handAvecCarre = [
    new Card(7, Card::COLOR_CLUBS),
    new Card(7, Card::COLOR_SPADE),
    new Card(7, Card::COLOR_HEART),
    new Card(Card::VALUE_KING, Card::COLOR_DIAMOND),
    new Card(7, Card::COLOR_DIAMOND),
];

$handAvecCouleur = [
    new Card(2, Card::COLOR_CLUBS),
    new Card(3, Card::COLOR_CLUBS),
    new Card(7, Card::COLOR_CLUBS),
    new Card(Card::VALUE_KING, Card::COLOR_CLUBS),
    new Card(10, Card::COLOR_CLUBS),
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

// ---- CARRE ---------------------

$handAnalyse = new Hand($handAvecBrelan);

if ($handAnalyse->contentQuads() === false) {
    echo "TEST 13 OK \n";
}

$handAnalyse = new Hand($handAvecFull);

if ($handAnalyse->contentQuads() === false) {
    echo "TEST 14 OK \n";
}

$handAnalyse = new Hand($handAvecCarre);

if ($handAnalyse->contentQuads() === true) {
    echo "TEST 15 OK \n";
}

// ---- COULEUR ---------------------


$handAnalyse = new Hand($handAvecCarre);

if ($handAnalyse->contentFlush() === false) {
    echo "TEST 16 OK \n";
}

$handAnalyse = new Hand($handAvecCouleur);

if ($handAnalyse->contentFlush() === true) {
    echo "TEST 17 OK \n";
}

// --- SUITE ----------

$handAvecSuite = [
    new Card(2, Card::COLOR_CLUBS),
    new Card(3, Card::COLOR_CLUBS),
    new Card(4, Card::COLOR_DIAMOND),
    new Card(6, Card::COLOR_CLUBS),
    new Card(5, Card::COLOR_HEART),
];


$handSansSuite = [
    new Card(2, Card::COLOR_CLUBS),
    new Card(3, Card::COLOR_CLUBS),
    new Card(4, Card::COLOR_DIAMOND),
    new Card(7, Card::COLOR_CLUBS),
    new Card(5, Card::COLOR_HEART),
];

$handAnalyse = new Hand($handAvecSuite);

if ($handAnalyse->contentStraight() === true) {
    echo "TEST 18 OK \n";
}

$handAnalyse = new Hand($handSansSuite);

if ($handAnalyse->contentStraight() === false) {
    echo "TEST 19 OK \n";
}

$handAnalyse = new Hand($handAvecCouleur);

if ($handAnalyse->contentStraight() === false) {
    echo "TEST 20 OK \n";
}


// -----
// ----------------
// -----


$handAvecStraightFlush = [
    new Card(2, Card::COLOR_CLUBS),
    new Card(3, Card::COLOR_CLUBS),
    new Card(4, Card::COLOR_CLUBS),
    new Card(6, Card::COLOR_CLUBS),
    new Card(5, Card::COLOR_CLUBS),
];

$handAnalyse = new Hand($handAvecStraightFlush);
$informations = $handAnalyse->getInformations();

if ($informations['combinaison'] === Hand::COMBINAISON_STRAIGHT_FLUSH) {
    echo "TEST 100 OK \n";
} else {
    echo $informations['combinaison'] . "\n";
}
