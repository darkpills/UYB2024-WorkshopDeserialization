<?php

namespace Application\Shareplay\Model;

use Application\Shareplay\Lib\DatabaseConnection;

class Game
{
    static private $initialized = false;
    private $saves;
    private $entities;
    private $items;
    private $shops;
    private $command;
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
        $this->entities = [];
    }

    public function __destruct()
    {
        if (count($this->entities)) {
            for ($i = 0; $i < count($this->entities); $i++) {
                $command = $this->command;
                if (isset($this->entities[$i]))
                {
                    $this->entities[$i]->save($command);
                }
            }
        }
        unset($this->connection);
    }

    public function initWorld()
    {
        $this->saves = [];
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, save_b64 FROM saves;"
        );
        $result = $statement->execute();

        $save = null;
        while ($row = $result->fetchArray(SQLITE3_ASSOC)){
            $save = base64_decode($row['save_b64']);
            $this->saves[$row['id']] = $save;
        }

        Game::$initialized = true;
    }

    public function getAllGames()
    {
        if (!Game::$initialized){
            $this->initWorld();
        }
        return $this->saves;
    }

    public function getGame($id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, save_b64 FROM saves WHERE id=:id;"
        );
        $statement->bindParam(":id", $id, SQLITE3_INTEGER);
        $result = $statement->execute();

        $game = null;
        if ($result){
            $row = $result->fetchArray(SQLITE3_ASSOC);
            $game = base64_decode($row['save_b64']);
        }

        return $game;
    }

    public function addGame($save_b64){
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO saves(save_b64) VALUES(:save_b64);"
        );
        $statement->bindParam(":save_b64", $save_b64);
        $result = $statement->execute();

        if (!$result) {
            return false;
        }

        return true;
    }

    public function deleteGame($id) {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM saves WHERE id=:id;"
        );
        $statement->bindParam(":id", $id);
        $result = $statement->execute();

        if (!$result){
            return false;
        }
        return true;
    }

}