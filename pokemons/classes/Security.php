<?php
/**
 * Classe qui contient les fonctions et autres éléments permettant 
 * de sécuriser mon application :
 * formulaire, contrôle des données, etc.
 */
class Security
{
    private const KEY = 'qiuhr;vi345243?uaeiu345234,5aer';
    private const HASH_ALGORITHM = 'sha256';

    /**
     * Générer la signature CSRF
     */
    public static function generateSignatureCSRF(array $data): string
    {
        $signature = implode('+', $data);

        // Clé pour sécuriser
        $signature .= self::KEY;

        // Date pour sécuriser une transaction sur la journée courante
        $signature .= date('dmY');

        // Mon algorithme de hash
        return hash(self::HASH_ALGORITHM, $signature);
    }

    /**
     * Contrôler la signature CSRF, V1 avec des paramètres
     */
    public static function controlSignatureCSRF1(array $data, string $signature): bool
    {
        // 1. Je dois reconstruire une signature à partir de $data
        $signatureToCompare = self::generateSignatureCSRF($data);

        // 2. Comparer cette signature avec $signature
        if ($signatureToCompare === $signature) {
            return true;
        }

        // Programmation défensive, je return false par défaut
        return false;

        // Sinon, en 1 ligne :
        return $signature === self::generateSignatureCSRF($data);
    }

    /**
     * Contrôler la signature CSRF, V2 sans paramètre
     */
    public static function controlSignatureCSRF2(): bool
    {
        /**
         * On va travailler sur $_POST directement (car c'est une variable globale)
         * 
         * Structure de $_POST :
         * [
         *  "field1" => "value1",
         *  "field2" => "value2",
         *  ...
         *  "signature" => "zepiferoifheoobieugreureou"
         * ]
         */
        
        // 0. Vérification que la signature est présente
        if (!isset($_POST['signature'])) {
            return false;
        }

        // 1. Récupérer la "signature"
        $signature = $_POST['signature'];

        // 2. Retirer la "signature" de $_POST
        unset($_POST['signature']);

        // 3. Je construis ma signature avec tout ce qu'il y a dans $_POST
        $signatureToCompare = self::generateSignatureCSRF($_POST);

        // 4. Je compare les signatures
        if ($signatureToCompare === $signature) {
            return true;
        }

        // Programmation défensive, je return false par défaut
        return false;
    }
}