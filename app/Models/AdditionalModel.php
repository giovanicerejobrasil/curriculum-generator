<?php
namespace App\Models;

use App\core\Database;
use App\core\Model;

class AdditionalModel extends Model {
    public $id;
    public $information;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $table = "additional_information";

    // Campos que podem ser preenchidos automaticamente
    protected $fillable = [
        "id",
        "information",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    // Campos obrigatórios na criação e na atualização
    protected $required = [
        "information",
        "created_at",
    ];

    /**
     * Método para criar a tabela 'professional_resume', caso não exista.
     */
    protected static function createTable(): void {
        $db = Database::getInstance()->getConnection();
        $sql = "
        CREATE TABLE IF NOT EXISTS additional_information (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            information VARCHAR NOT NULL,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP,
            deleted_at TIMESTAMP
        )";

        $db->exec($sql);
    }
}