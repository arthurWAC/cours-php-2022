<?php

// Typage

// 5 types principaux disponibles
// int => nombre entier
// float => nombre décimal
// string => chaine de caractères
// array => tableau
// bool => booléen

// Dès que je crée ma fonction, je définis les types des paramètres, 
// et le type de retour

// "Contrat", "Plan" de la fonction

function transcription(array $journal): string
{
    $html = '';

    return $html;
}

// Type void, une fonction, une méthode qui n'a pas de retour
// Donc pas d'instruction return

// 2 grandes familles de type :
// Les types qui sont natifs à PHP, sur des choses + techniques
// Les objets

class Journal
{

}


function transcription2(Journal $journal): string
{
    
}
