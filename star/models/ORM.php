<?php
namespace Model;

use Exception;
use PDO;
use PDOStatement;

/**
 * Passerelle entre les modèles et la base de données
 * Utilisation PDO pour échanger avec ma base de données
 * 
 * Doc intéressante :
 * https://www.php.net/manual/fr/pdostatement.bindvalue
 * 
 * Exemple de code :
 * $calories = 150;
 * $couleur = 'rouge';
 * $sth = $dbh->prepare('SELECT nom, couleur, calories
 *   FROM fruit
 *   WHERE calories < :calories AND couleur = :couleur');
 * $sth->bindValue('calories', $calories, PDO::PARAM_INT);
 * // Les noms peuvent aussi être préfixés par des deux-points ":" (facultatif)
 * $sth->bindValue(':couleur', $couleur, PDO::PARAM_STR);
 * $sth->execute();
 */
class ORM
{
    // Constantes
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASSWORD = 'root';
    private const DB_DATABASE = 'star';

    // Propriétés
    private PDO $database;
    private PDOStatement $query;

    // Pour mes requêtes
    private string $table;
    private array $fieldsForSelect;
    private array $fieldsForWhere;
    private array $fieldsForInsert;

    private string $sql;

    // Constructeur
    public function __construct()
    {
        // Connexion à la base de données
        $this->database = new PDO(
            'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_DATABASE,
            self::DB_USER,
            self::DB_PASSWORD
        );

        // Init
        $this->reset();
    }

    public function reset(): void
    {
        $this->table = '';
        $this->fieldsForSelect = [];
        $this->fieldsForWhere = [];
        $this->fieldsForInsert = [];
        $this->sql = '';
    }

    // Méthodes pour SELECT
    public function select(array $fields): void
    {
        $this->fieldsForSelect = $fields;
    }

    public function from(string $table): void
    {
        $this->table = $table;
    }

    public function where(string $field, $value, int $type = PDO::PARAM_STR): void
    {
        $this->fieldsForWhere[] = [
            'field' => $field,
            'value' => $value,
            'type' => $type
        ];
    }

    // Méthodes pour INSERT
    public function in(string $table): void
    {
        $this->table = $table;
    }

    public function set(string $field, $value, int $type = PDO::PARAM_STR): void
    {
        $this->fieldsForInsert[] = [
            'field' => $field,
            'value' => $value,
            'type' => $type
        ];
    }

    // Récupération des valeurs
    public function values(): array
    {
        // 1. Construire ma requête => 'SELECT id, name FROM stations ..."
        $this->buildSQLSELECT();

        // 2. "Préparer" ma requête, au sens PDO
        $this->prepare();

        // 3. Passer les valeurs (bindValue)
        $this->setValues('WHERE');

        // 4. Executer ma requête
        $this->execute();

        // 5. Retourner les valeurs
        return $this->query->fetchAll();
    }

    // Récupération 1 seule valeur
    public function value(): array
    {
        // 1. Construire ma requête => 'SELECT id, name FROM stations ..."
        $this->buildSQLSELECT();

        // 2. "Préparer" ma requête, au sens PDO
        $this->prepare();

        // 3. Passer les valeurs (bindValue)
        $this->setValues('WHERE');

        // 4. Executer ma requête
        $this->execute();

        // 5. Retourner les valeurs
        return $this->query->fetch();
    }

    // Insertion des valeurs
    public function insert(): void
    {
        // 1. Construire ma requête => 'INSERT"
        $this->buildSQLINSERT();

        // 2. "Préparer" ma requête, au sens PDO
        $this->prepare();

        // 3. Passer les valeurs (bindValue)
        $this->setValues('INSERT');

        // 4. Executer ma requête
        $this->execute();
    }

    // Construction de la requête SQL de type SELECT
    public function buildSQLSELECT(): void
    {
        // SELECT id, name, city, zip FROM stations WHERE city = :city AND zip = :zip
        // Je vais travailler sur $this->sql
        $this->sql = '';

        // SELECT
        $this->sql .= ' SELECT ';

        if ($this->fieldsForSelect !== []) { // ou !empty
            // ['id', 'name', 'city', 'zip'] => 'id, name, city, zip'
            $this->sql .= implode(', ', $this->fieldsForSelect);
        } else {
            // ou  *
            $this->sql .= '*';
        }

        // FROM
        $this->sql .= ' FROM ';

        // stations
        $this->sql .= $this->table;

        // WHERE
        if ($this->fieldsForWhere !== []) {
            $this->sql .= ' WHERE ';

            // city = :city (AND zip = :zip)
            $conditions = [];

            foreach ($this->fieldsForWhere as $where) {
                $conditions[] = $where['field'] . ' = :' . $where['field'];
            }

            $this->sql .= implode(' AND ', $conditions);
        }
    }

    public function buildSQLINSERT(): void
    {
        // INSERT INTO users (firstname, lastname) VALUES (:firstname, :lastname)
        $this->sql = '';

        if ($this->fieldsForInsert === []) {
            throw new Exception('Aucune valeur pour l\'insertion');
        }

        $this->sql .= ' INSERT INTO ';
        $this->sql .= $this->table;

        $this->sql .= '(';
        $this->sql .= implode(
                        ',',
                        array_column($this->fieldsForInsert, 'field')
                    );
        $this->sql .= ')';

        $this->sql .= ' VALUES ';

        $binds = [];
        foreach ($this->fieldsForInsert as $insert) {
            $binds[] = ':' . $insert['field'];
        }

        $this->sql .= '(' . implode(', ', $binds) . ')';
    }

    // Préparation de la requête
    public function prepare(): void
    {
        try {
            $this->query = $this->database->prepare($this->sql);

            if (!$this->query) {
                throw new \Exception($this->database->errorInfo()[2]);
            }
        } catch (\Exception $e) {
            echo 'Erreur SQL PREPARE : ' .   $e->getMessage() . "\n";
            exit;
        }
        
    }

    // Passage des valeurs
    public function setValues($type = 'WHERE'): void
    {   
        $name = 'fieldsFor' . ucfirst(strtolower($type));

        foreach ($this->{$name} as $field) {
            $this->bind(
                $field['field'],
                $field['value'],
                $field['type']
            );
        }
    }

    // Volontairement je ne type pas $value car je peux lui passer des choses différentes
    public function bind(string $field, mixed $value, int $type = PDO::PARAM_STR): void
    {
        $result = $this->query->bindValue(':' . $field, $value, $type);

        if (!$result) {
            throw new \Exception('Erreur Bind : ' . $this->database->errorInfo()[2]);
        }
    }

    // Execution de la requête
    public function execute(): void
    {
        try {
            if ($this->query->execute() === false) {
                throw new \Exception($this->database->errorInfo()[2]);
            }
        } catch (\Exception $e) {
            echo 'Erreur SQL EXECUTE : ' .   $e->getMessage() . "\n";
            exit;
        }
    }
}