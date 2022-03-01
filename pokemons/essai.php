<?php
include 'classes/Pokemon.php';
$p = new Pokemon;

echo '<pre>';
print_r($p->all());
echo '</pre>';