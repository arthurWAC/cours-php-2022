<?php
// Mémo, liste des mots clés objets :
// class => pour définir un objet, une classe
// new => pour créer/instancier un nouvel objet
// public => "visibilité" (protected, private)
// $this pour accéder à l'intérieur de l'objet, attribut ou une méthode
// ->  - > naviguer entre les attributs et les méthodes
// $this->
// const

class Journal
{
    // Constantes
    public const SEPARATEUR = '<hr /><br />'; // Les constantes ne sont pas typées

    // Attributs
    // (variables propres à l'objet, on peut en avoir autant qu'on veut)
    public array $evenements;
   
    // Méthodes
    // (fonctions propres à l'objet, on peut en avoir autant qu'on veut)
    
    // Type void => "pas de return"
    public function ajoutEvenement(Evenement $evenement): void
    {
        $this->evenements[] = $evenement;
    }

    public function transcription(): string
    {
        $html = '';

        foreach ($this->evenements as $evenement) {
            $html .= '<h2>' . $evenement->date . ' - ' . $evenement->ville . '</h2>';

            $html .= '<ul>';
            foreach ($evenement->actions as $action) {
                $html .= '<li>' . $action . '</li>';
            }
            $html .= '</ul>';

            if ($evenement->artefactTrouve) {
                $html .= '<h4>Artefact trouvé : ' . $evenement->artefactNom . '</h4>';
            }

            $html .= self::SEPARATEUR; // self:: pour appeler une constante
        }

        return $html;
    }
    // Méthodes peuvent interagir avec les attributs
}


// $journal = new Journal;

// $evenement = new Evenement('11/02/2018', 'Paris');
// $evenement->ajouteAction('Je prends un taxi');

// $journal->ajoutEvenement($evenement);


// $journal[]= $evenement;