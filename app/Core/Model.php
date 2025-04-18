<?php
namespace App\Core;

use App\Core\Database;

abstract class Model {
    protected $db;
    protected $table;

    // Lista de campos que podem ser preenchidos em massa
    protected $fillable = array();

    // Lista de campos obrigatórios
    protected $required = array();

    // Obtém a conexão do banco
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Popula as propriedades do modelo com um array associativo
     * 
     * @param array $data
     * @return void
     */
    public function fill(array $data): void {
        foreach ($data as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Realiza o insert ou o update caso exista o "id"
     * 
     * @return bool
     */
    public function save(): bool {
        if (isset($this->id)) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    /**
     * Realiza a inserção de um novo registro.
     *
     * @return bool
     */
    public function insert(): bool {
        $fields = $values = $placeholders = array();

        if (!$this->isTableExists($this->table)) {
            $this::createTable();
        }
        
        foreach ($this->fillable as $field) {
            if (isset($this->$field)) {
                $this->$field = $this->removeScripts($this->$field);

                $fields[] = $field;
                $values[$field] = $this->$field;
                $placeholders[] = ':' . $field;
            }
        }

        $sql = "
            INSERT INTO {$this->table}
            (" . implode(',', $fields) . ") VALUES 
            (" . implode(",", $placeholders) . ") ";
        
        $stmt = $this->db->prepare($sql);

        foreach ($values as $field => $value) {
            $stmt->bindValue(':' . $field, $value, SQLITE3_TEXT);
        }

        $result = $stmt->execute();

        if ($result) {
            $this->id = $this->db->lastInsertRowId();
            return true;
        }

        return false;
    }

    /**
     * Atualiza um registro existente (requer propriedade "id").
     *
     * @return bool
     */
    public function update(): bool {
        $fields = [];
        $values = [];

        if (!$this->isTableExists($this->table)) {
            $this::createTable();
        }
        
        foreach ($this->fillable as $field) {
            if (isset($this->$field)) {
                if (
                    in_array($field, $this->required) &&
                    empty($this->$field)
                ) {
                    return false;
                }

                $this->$field = $this->removeScripts($this->$field);

                $fields[] = $field . ' = :' . $field;
                $values[$field] = $this->$field;
            }
        }
        
        $sql = "
            UPDATE {$this->table} SET "
            . implode(',', $fields) . " WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);

        foreach ($values as $field => $value) {
            $stmt->bindValue(":". $field, $value, SQLITE3_TEXT);
        }

        $stmt->bindValue(":id", $this->id, SQLITE3_INTEGER);
        $result = $stmt->execute();

        return $result ? true : false;
    }

     /**
     * Busca um registro pelo id.
     *
     * @param int $id
     * @return static|null
     */
    public static function findById($id): ?self {
        $instance = new static();

        if (!$instance->isTableExists($instance->table)) {
            $instance::createTable();
        }
        
        $sql = "SELECT * FROM {$instance->table} WHERE id = :id";
        
        $stmt = $instance->db->prepare($sql);
        $stmt->bindValue(":id", $id, SQLITE3_INTEGER);
        $result = $stmt->execute();

        $data = $result->fetchArray(SQLITE3_ASSOC);
        if ($data) {
            $instance->fill($data);
            $instance->id = $data["id"];

            return $instance;
        }
        return null;
    }

    /**
     * Retorna todos os registros da tabela.
     *
     * @return array
     */
    public static function all($limit = null, $offset = null, ?array $order = null): array {
        $instance = new static();

        if (!$instance->isTableExists($instance->table)) {
            $instance::createTable();
        }

        $sql = "
        SELECT * FROM {$instance->table} " . 
        (!is_null($order) ? "ORDER BY " . implode(' ', $order) : '') . " " .
        (!is_null($limit) ? "LIMIT {$limit}" : '') . " " .
        (!is_null($offset) ? "OFFSET {$offset}" : '');
        
        $result = $instance->db->query($sql);
        $records = [];
        
        while ($data = $result->fetchArray(SQLITE3_ASSOC)) {
            $model = new static();
            $model->fill($data);
            $model->id = $data['id'];
            $records[] = $model;
        }

        return $records;
    }

    public static function where(array $data) {
        $instance = new static();
        $where = [];

        if (!$instance->isTableExists($instance->table)) {
            $instance::createTable();
        }

        foreach ($data as $value) {
            $where[] = implode(' ', $value);
        }

        $sql = "
            SELECT * FROM {$instance->table}
            WHERE " . implode(' ', $where);
        
        $result = $instance->db->query($sql);
        $records = [];
        
        while ($data = $result->fetchArray(SQLITE3_ASSOC)) {
            $model = new static();
            $model->fill($data);
            $model->id = $data['id'];
            $records[] = $model;
        }

        return $records;
    }

    protected function isTableExists(string $table): bool {
        $sql = "
            SELECT name 
            FROM sqlite_master
            WHERE type='table'
            AND name='{$table}'
        ";
        
        return $this->db->query($sql)->fetchArray() > 0;
    }

    protected static function createTable(): void {
    }

    private function removeScripts($data) {
        if (is_array($data)) {
            return array_map("removeScripts", $data);
        }

        $data = strip_tags($data, '<br>');
        $data = htmlspecialchars($data, ENT_QUOTES,"UTF-8");

        return $data;
    }
}