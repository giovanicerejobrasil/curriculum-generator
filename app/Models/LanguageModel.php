<?php
namespace App\Models;

use App\core\Database;
use App\core\Model;

class LanguageModel extends Model {
    public $id;
    public $language;
    public $proficiency;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $table = "language";

    // Campos que podem ser preenchidos automaticamente
    protected $fillable = [
        "id",
        "language",
        "proficiency",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    // Campos obrigatórios na criação e na atualização
    protected $required = [
        "language",
        "proficiency",
        "created_at",
    ];

    /**
     * Método para criar a tabela 'professional_resume', caso não exista.
     */
    protected static function createTable(): void {
        $db = Database::getInstance()->getConnection();
        $sql = "
        CREATE TABLE IF NOT EXISTS language (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            language VARCHAR NOT NULL,
            proficiency VARCHAR NOT NULL,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP,
            deleted_at TIMESTAMP
        )";

        $db->exec($sql);
    }
}