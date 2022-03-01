<?php

class Validator
{
    private array $erreurs;
    private string $method;
    private array $data;

    public function __construct(string $method)
    {
        $this->erreurs = [];
        $this->method = 'method';

        if ($method === 'POST') {
            $this->data = $_POST;
        }

        if ($method === 'GET') {
            $this->data = $_GET;
        }
    }

    public function valide(string $field, string $validator, array $options = []): void
    {
        if (!method_exists($this, $validator)) {
            throw new Exception ('Ce Validatateur n\existe pas');
        }

        $this->$validator($field, $options);
    }

    private function notEmpty(string $field): void
    {
        if (!empty($this->data[$field])) {
            array_push(
                $this->erreurs,
                'Le champ ' . $field . ' ne doit pas être vide'
            );
        }
    }

    private function length(string $field, array $options)
    {
        // Contrôle de présence de la bonne option
        if (!isset($options['length'])) {
            throw new Exception ('Il manque l\'option length');
        }

        if (strlen($field) < $options['length']) {
            array_push(
                $this->erreurs,
                'Le champ ' . $field . ' doit faire au moins ' . $options['length'] . 'caractères'
            );
        }
    }
}


// Dans l'ordre :
// La classe CSRF ? Une classe Security
// 
// Une petite classe Bootstrap ?
// Le combat, on va utiliser des progress bar Bootstrap


// 