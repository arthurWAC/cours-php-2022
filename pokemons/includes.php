<?php
// DEMARRAGE DES SESSIONS
session_start();

// TOUS MES INCLUDES
define('DIR_CLASSES', './classes/');

include DIR_CLASSES . 'Database.php';

include DIR_CLASSES . 'Pokemon.php';
include DIR_CLASSES . 'Dresseur.php';