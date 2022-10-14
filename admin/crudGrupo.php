<?php
require_once('connect.php');



    class crudGrupo extends connect {
        private $stmt;
        private $result;
        

        public function create(){
            $this->stmt=$this->getConnection()->prepare('INSERT INTO grupos (grupo) VALUES (:GRUPO)');
            $this->stmt->bindParam(':GRUPO', $_POST['grupo']);
            $this->stmt->execute();
        }

        public function read(){
                $this->stmt = $this->getConnection()->prepare('SELECT * FROM  grupos');
                $this->stmt->execute();
                $this->result = $this->stmt->fetchALL(PDO::FETCH_ASSOC);
                return $this->result;
            

        }
        public function delete(){
            $this->stmt = $this->getConnection()->prepare('DELETE FROM  grupos WHERE id = :idGrupo');
            $this->stmt->bindParam(':idGrupo', $_POST['idGrupo']);
            $this->stmt->execute();
            

    
        }
       
    }

   
    
 
?>