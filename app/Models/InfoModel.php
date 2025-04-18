<?php

namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class InfoModel extends Model
{
    public $id;
    public $fullname;
    public $email;
    public $phone;
    public $city;
    public $state;
    public $linkedin;
    public $website;
    public $portfolio;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $table = "personal_information";

    // Campos que podem ser preenchidos automaticamente
    protected $fillable = [
        "id",
        "fullname",
        "city",
        "state",
        "phone",
        "email",
        "linkedin",
        "website",
        "portfolio",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    // Campos obrigatórios na criação e na atualização
    protected $required = [
        "fullname",
        "city",
        "state",
        "phone",
        "email",
        "created_at",
    ];

    /**
     * Método para criar a tabela 'personal_information', caso não exista.
     */
    public static function createTable(): void
    {
        $db = Database::getInstance()->getConnection();
        $sql = "
        CREATE TABLE IF NOT EXISTS personal_information (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            fullname TEXT NOT NULL,
            city VARCHAR NOT NULL,
            state VARCHAR NOT NULL,
            phone VARCHAR NOT NULL,
            email VARCHAR NOT NULL,
            linkedin TEXT NULL,
            website TEXT NULL,
            portfolio TEXT NULL,
            created_at TIMESTAMP NOT NULL,
            updated_at TIMESTAMP,
            deleted_at TIMESTAMP
        )";

        $db->exec($sql);
    }
}
