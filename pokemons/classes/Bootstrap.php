<?php

class Bootstrap
{
    // https://getbootstrap.com/docs/5.1/components/progress/
    public static function progressHP(int $hpCurrent, int $hpTotal): string
    {
        // Calculs
        $pourcentage = $hpCurrent / $hpTotal * 100;
        $pourcentage = round($pourcentage);

        // Bornes
        $class = 'bg-danger';

        if ($pourcentage >= 21) {
            $class = 'bg-warning';
        }
        
        if ($pourcentage >= 41) {
            $class = 'bg-info';
        }
        
        if ($pourcentage >= 61) {
            $class = 'bg-success';
        }

        // Label
        $label = $hpCurrent . ' HP';

        return '<div class="progress">
        <div class="progress-bar '. $class .'" role="progressbar" style="width: '. $pourcentage .'%;" aria-valuenow="'. $pourcentage .'" aria-valuemin="0" aria-valuemax="100">'. $label .'</div>
        </div>';
    }
}

/**
 * PROGRESS BAR
 * <div class="progress">
 *   <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
 * </div>
 * 
 * Je veux afficher une progress bar bleue, remplie à 50%, avec comme label "234 HP"
 * Je veux afficher une progress bar verte, remplie à 80%, avec comme label "600 HP"
 * 
 * 0-20% => rouge
 * 21-40% => orange
 * 41-60% => bleu
 * 61%+ => vert
 */