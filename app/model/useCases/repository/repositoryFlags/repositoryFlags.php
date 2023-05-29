<?php

class RepositoryFlags implements RepositoryFlagsInterface{

    private $conn;

    public function __construct() {
        $this->conn = new Connect();
    }

    public function save(Flags $object){
        $query = "INSERT INTO flags (dangerLevels, Color) 
        VALUES (:dangerLevels, :color)";

        try {
            
            $query = $this->conn->getConn()->prepare($query);

            $query->bindValue(":dangerLevels", $object->getDeagerLeaves());
            $query->bindValue(":color", $object->getColor());

            $query->execute();

        } catch (PDOException $e) {

            echo"flags Insert Error: " . $e->getMessage();
        }

    }
    public function delete(Flags $object){

        $query = "DELETE FROM flags WHERE dangerLevels = :dangerLevels and Color = :color";

        try {
            
            $query = $this->conn->getConn()->prepare($query);

            $query->bindValue(":dangerLevels", $object->getDeagerLeaves());
            $query->bindValue(":color", $object->getColor());

            $query->execute();

        } catch (PDOException $e) {

            echo"flags update Error: " . $e->getMessage();
        }
        
    }
    public function update(Flags $object){

        $query = "UPDATE flags Set color = :color where dangerLevels = :dangerLevels";

        try {
            
            $query = $this->conn->getConn()->prepare($query);

            $query->bindValue(":dangerLevels", $object->getDeagerLeaves());
            $query->bindValue(":color", $object->getColor());

            $query->execute();

        } catch (PDOException $e) {

            echo"flags get Error: " . $e->getMessage();
        }

    }
    public function getByColor(string $color){

        $query = "SELECT * FROM flags WHERE color = :color";

        try {
            
            $query = $this->conn->getConn()->prepare($query);

            $query->bindValue(":color", $color);

            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            echo"flags get Error: " . $e->getMessage();
        }


    }
    public function getByDangerLevels(int $dangerLevels){

        $query = "SELECT * FROM flags WHERE dangerLevels = :dangerLevels";

        try {
            
            $query = $this->conn->getConn()->prepare($query);

            $query->bindValue(":dangerLevels", $dangerLevels);

            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            echo"flags update Error: " . $e->getMessage();
        }

    }

}

?>