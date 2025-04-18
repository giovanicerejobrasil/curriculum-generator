<?php
namespace App\Models;

use App\core\Database;
use App\core\Model;

class SoftModel extends Model {
    public $id;
    public $skill;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $table = "soft_skills";

    // Campos que podem ser preenchidos automaticamente
    protected $fillable = [
        "id",
        "skill",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    // Campos obrigatórios na criação e na atualização
    protected $required = [
        "skill",
        "created_at",
    ];

    /**
     * Método para criar a tabela 'professional_resume', caso não exista.
     */
    protected static function createTable(): void {
        $db = Database::getInstance()->getConnection();
        $sql = "
        CREATE TABLE IF NOT EXISTS soft_skills (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            skill VARCHAR NOT NULL,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP,
            deleted_at TIMESTAMP
        )";

        $db->exec($sql);
    }
}