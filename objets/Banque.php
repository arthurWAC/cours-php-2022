<?php

class Banque
{
    public const DEVISE_EUROS = 'EUROS';
    public const DEVISE_POUNDS = 'POUNDS';
    public const DEVISE_DOLLARS = 'DOLLARS';

    public const TAUX = [
        self::DEVISE_POUNDS => 0.884473909,
        self::DEVISE_DOLLARS => 1.24074
    ];

    // La banque prend une commission de 1€ sur chaque transaction
    public const COMMISSION = 1;

    public const OPERATION_DEBIT = 'debit';
    public const OPERATION_CREDIT = 'credit';

    private float $euros;

    public function __construct(float $euros)
    {
        $this->euros = $euros;
    }

    public function mouvement(float $montant, string $type, string $devise): void
    {
        // Je veux travailler des euros
        $montantEuros = $montant;

        if ($devise != self::DEVISE_EUROS) {
            // Conversion selon le taux
            $tauxUtilise = self::TAUX[$devise];
            $montantEuros = $montant / $tauxUtilise;

            // Commission bancaire
            $montantEuros += self::COMMISSION;
        }

        if ($type === self::OPERATION_DEBIT) {
            $this->euros -= $montantEuros;
        }

        if ($type === self::OPERATION_CREDIT) {
            $this->euros += $montantEuros;
        }
    }

    // getteur pour ma propriété privée
    public function getEuros(): float
    {
        return $this->euros;
    }
}