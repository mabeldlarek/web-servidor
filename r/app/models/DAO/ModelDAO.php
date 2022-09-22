<?php

namespace app\models;

use PDO;

class ModelDAO
{

    protected PDO $conn;
    protected String $table;

    public function __construct($table)
    {
        $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER);
        $this->table = $table;
    }

    public function close_db(): void
    {
        $this->conn->close();
    }

    // CRUD

    public function create(array $data): void
    {
        $att =  implode(" ', '" , $data);

        $query = $this->conn->prepare(
            "INSERT INTO $this->table VALUES (NULL, '$att')");
        $query->execute();
    }

    public function read(int $id = null): bool|array
    {
        if (isset($id)) {

            $query = $this->conn->prepare("SELECT * FROM $this->table WHERE id_$this->table = $id");
            $query->execute();

            return $query->fetch();
        } else {

            $query = $this->conn->prepare("SELECT * FROM $this->table");
            $query->execute();

            return $query->fetchAll();
        }
    }

    public function update(int $id, array $data): void
    {
        foreach($data as $col => $att) {

            $query = $this->conn->prepare(
                "UPDATE $this->table SET $col = '$att' WHERE id_$this->table = $id");
            $query->execute();
        }
    }

    public function delete(int $id): void
    {
        $query = $this->conn->prepare(
            "DELETE FROM $this->table WHERE id_$this->table = $id");
        $query->execute();
    }

}