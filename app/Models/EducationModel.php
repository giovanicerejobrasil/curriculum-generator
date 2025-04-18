<?php
namespace App\Models;

use App\core\Database;
use App\core\Model;

class EducationModel extends Model {
    public $id;
    public $graduation;
    public $institute;
    public $date_start;
    public $date_end;
    public $in_progress;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $table = "education";

    // Campos que podem ser preenchidos automaticamente
    protected $fillable = [
        "id",
        "graduation",
        "institute",
        "date_start",
        "date_end",
        "in_progress",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    // Campos obrigatórios na criação e na atualização
    protected $required = [
        "graduation",
        "institute",
        "date_start",
        "created_at",
    ];

    /**
     * Método para criar a tabela 'professional_resume', caso não exista.
     */
    protected static function createTable(): void {
        $db = Database::getInstance()->getConnection();
        $sql = "
        CREATE TABLE IF NOT EXISTS education (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            graduation VARCHAR NOT NULL,
            institute VARCHAR NOT NULL,
            date_start VARCHAR NOT NULL,
            date_end VARCHAR,
            in_progress VARCHAR NOT NULL,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP,
            deleted_at TIMESTAMP
        )";

        $db->exec($sql);
    }
}