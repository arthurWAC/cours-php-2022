<?php

include './includes/Account.php';

$monCompte = new Account('Arthur35');

// Ajouter un nouveau follower
$monCompte->addFollower('MDS_Ker_Lann');

if ($monCompte->nbFollowers == 1) {
    echo '<p>TEST 1 OK</p>';
}

if ($monCompte->followers == ['MDS_Ker_Lann']) {
    echo '<p>TEST 2 OK</p>';
}


$monCompte->addFollower('MDS_Caen');

if ($monCompte->nbFollowers == 2) {
    echo '<p>TEST 3 OK</p>';
}

if ($monCompte->followers == ['MDS_Ker_Lann', 'MDS_Caen']) {
    echo '<p>TEST 4 OK</p>';
}

$monCompte->addFollower('MDS_Caen');

if ($monCompte->nbFollowers == 2) {
    echo '<p>TEST 5 OK</p>';
}

if ($monCompte->followers == ['MDS_Ker_Lann', 'MDS_Caen']) {
    echo '<p>TEST 6 OK</p>';
}