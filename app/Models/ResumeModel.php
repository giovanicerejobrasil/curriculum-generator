<?php
namespace App\Models;

use App\core\Database;
use App\core\Model;

class ResumeModel extends Model {
    public $id;
    public $resume;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $table = "professional_resume";

    // Campos que podem ser preenchidos automaticamente
    protected $fillable = [
        "id",
        "resume",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    // Campos obrigatórios na criação e na atualização
    protected $required = [
        "resume",
        "created_at",
    ];

    /**
     * Método para criar a tabela 'professional_resume', caso não exista.
     */
    protected static function createTable(): void {
        $db = Database::getInstance()->getConnection();
        $sql = "
        CREATE TABLE IF NOT EXISTS professional_resume (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            resume TEXT NOT NULL,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP,
            deleted_at TIMESTAMP
        )";
        
        $db->exec($sql);
    }
}