<?php
class Score{
    private $conn;
    private $table ='game_score';

    public $id; 
    public $score;
    public $updated; 

    public function __construct($db){
        $this->conn = $db; 
    }

    public function read(){
        $query = 'SELECT
                id,
                score,
                updated
            FROM
                '.$this->table;


        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    public function create(){
        $query = 'INSERT INTO '.$this->table.'
            SET
                score = :score,
                updated = NOW()';
 
            $stmt = $this->conn->prepare($query);
        
            $this->score = htmlspecialchars(intval($this->score));

            $stmt->bindParam(':score', $this->score);
        
            if ( $stmt->execute() ) {
                return  $this->conn->lastInsertId();
            }
        
            return false;
    }
    public function update(){
        $query = 'UPDATE '.$this->table.'
            SET
                score = :score,
                updated = NOW()
            WHERE
                id = :id';  
            $stmt = $this->conn->prepare($query);
        
            $this->score = htmlspecialchars(strip_tags($this->score));
            $this->id = htmlspecialchars(intval($this->id));

            $stmt->bindParam(':score', $this->score);
            $stmt->bindParam(':id', $this->id);
        
            if ( $stmt->execute() ) {
                return true;
            }
        
            return false;
    }


}