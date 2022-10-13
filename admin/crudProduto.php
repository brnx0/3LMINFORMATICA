<?php
require_once('connect.php');



    class crudProduto extends connect {
        private $stmt;
        private $result;
        private $res;

        public function create(){
            $this->stmt=$this->getConnection()->prepare('INSERT INTO produtos (descricao,codBarra,saldo,undMedida,tipo,grupo) VALUES (:DESCRICAO, :CODBARRAS, :SALDO, :UND, :TIPO, :GRUPO)');
            $this->stmt->bindParam(':DESCRICAO', $_POST['descricao']);
            $this->stmt->bindParam(':CODBARRAS', $_POST['codBarras']);
            $this->stmt->bindParam(':SALDO', $_POST['saldo']);
            $this->stmt->bindParam(':UND', $_POST['und']);
            $this->stmt->bindParam(':TIPO', $_POST['tipo']);
            $this->stmt->bindParam(':GRUPO', $_POST['grupo']);
            $this->stmt->execute();
        }

        public function read(){
                $this->stmt = $this->getConnection()->prepare('SELECT * FROM  produtos');
                $this->stmt->execute();
                $this->result = $this->stmt->fetchALL(PDO::FETCH_ASSOC);
                return $this->result;
            

        }
        public function select ($id){/**Function pra trazer o nome do grupo de acordo com o ID relacionado na FK */
            $this->stmt = $this->getConnection()->prepare('SELECT * FROM grupos WHERE id=:ID');
            $this->stmt->bindParam(':ID',$id);
            $this->stmt->execute(); 
            $this->res = $this->stmt->fetchALL(PDO::FETCH_ASSOC);
            return $this->res;
        }
        
    }
    
    
    
