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

    public const COMMISSION = 1;

    public const OPERATION_DEBIT = 'debit';
    public const OPERATION_CREDIT = 'credit';

    private int $euros;

    public function __construct(int $euros)
    {
        $this->euros = $euros;
    }

    public function mouvement(float $montant, string $type, string $devise): void
    {
        // Je veux travailler des euros
        $montantEuros = $montant;

        if ($devise != self::DEVISE_EUROS) {
            // Conversion ...

            // Commission ...
        }

        if ($type === self::OPERATION_DEBIT) {
            $this->euros -= $montantEuros;
        }

        if ($type === self::OPERATION_CREDIT) {
            $this->euros += $montantEuros;
        }
    }
}