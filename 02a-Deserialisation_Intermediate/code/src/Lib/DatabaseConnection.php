<?php

namespace Application\Shareplay\Lib;

class DatabaseConnection {
    public ?\SQLite3 $db = null;

    public function __construct(){
        $this->initDb();
    }

    private function initDb()
    {
        $this->db = new \SQLite3("/tmp/saves.db");
        $tablename = 'saves';
        $query = "CREATE TABLE IF NOT EXISTS $tablename(
            id INTEGER PRIMARY KEY,
            save_b64 longtext
            )";
        $this->db->exec($query);
    }

    public function getConnection(): \SQLite3{
        if ($this->db === null){
            $this->initDb();
        }
        return $this->db;
    }
}