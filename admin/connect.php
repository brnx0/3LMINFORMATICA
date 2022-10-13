<?php 

class connect{
    private $connection; 

    private function setConection(){
        try{
            $this->connection = new PDO('mysql:host=localhost;dbname=3lm', 'root','');   
        }
        catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    function getConnection(){
        return $this->connection;
    }


        /**Construtor */
    function __construct(){
        $this->setConection();  
    }  
}

?>