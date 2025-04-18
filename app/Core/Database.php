<?php
namespace App\core;

use SQLite3;
use App\Helpers\Assets;

class Database {
    private static $instance = null;
    private $connection;

    // Construtor privado para o singleton
    private function __construct($dbFile) {
        $this->connection = new SQLite3($dbFile);
    }

    /**
     * Retorna a instância única da conexão com o SQLite.
     * 
     * @param string $dbFile Caminho para o arquivo do banco de dados.
     * @return Database Instância da classe Database.
     */
    public static function getInstance(?string $dbFile = null) {
        if (is_null($dbFile)) {
            $dbFile = Assets::db("database");
        }

        if (self::$instance === null) {
            self::$instance = new self($dbFile);
        }
        return self::$instance;
    }

     /**
     * Retorna a conexão com o banco de dados.
     *
     * @return SQLite3
     */
    public function getConnection() {
        return $this->connection;
    }

    
}