<?php
namespace App\Models;

use App\core\Database;
use App\core\Model;

class CourseCertificationModel extends Model {
    public $id;
    public $course_certification;
    public $institute;
    public $conclusion_year;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $table = "course_certification";

    // Campos que podem ser preenchidos automaticamente
    protected $fillable = [
        "id",
        "course_certification",
        "institute",
        "conclusion_year",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    // Campos obrigatórios na criação e na atualização
    protected $required = [
        "course_certification",
        "institute",
        "conclusion_year",
        "created_at",
    ];

    /**
     * Método para criar a tabela 'professional_resume', caso não exista.
     */
    protected static function createTable(): void {
        $db = Database::getInstance()->getConnection();
        $sql = "
        CREATE TABLE IF NOT EXISTS course_certification (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            course_certification VARCHAR NOT NULL,
            institute VARCHAR NOT NULL,
            conclusion_year TIMESTAMP NOT NULL,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP,
            deleted_at TIMESTAMP
        )";

        $db->exec($sql);
    }
}