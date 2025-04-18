<?php
namespace App\Models;

use App\core\Database;
use App\core\Model;

class ExperienceModel extends Model {
    public $id;
    public $job_position;
    public $company_name;
    public $date_start;
    public $date_end;
    public $in_progress;
    public $observation;
    public $resume;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $table = "professional_experiences";

    // Campos que podem ser preenchidos automaticamente
    protected $fillable = [
        "id",
        "job_position",
        "company_name",
        "date_start",
        "date_end",
        "in_progress",
        "observation",
        "resume",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    // Campos obrigatórios na criação e na atualização
    protected $required = [
        "job_position",
        "company_name",
        "date_start",
        "in_progress",
        "observation",
        "resume",
        "created_at",
    ];

    /**
     * Método para criar a tabela 'professional_resume', caso não exista.
     */
    protected static function createTable(): void {
        $db = Database::getInstance()->getConnection();

        $sql = "
        CREATE TABLE IF NOT EXISTS professional_experiences (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            job_position VARCHAR NOT NULL,
            company_name VARCHAR NOT NULL,
            date_start DATETIME NOT NULL,
            date_end DATETIME,
            in_progress VARCHAR NOT NULL,
            observation VARCHAR,
            resume TEXT NOT NULL,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP,
            deleted_at TIMESTAMP
        )";

        $db->exec($sql);
    }
}