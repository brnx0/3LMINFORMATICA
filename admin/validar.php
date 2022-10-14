<?php 
require_once ('crudGrupo.php');
require_once ('crudProduto.php');

$produto = new crudProduto();
$grupo = new crudGrupo();



if(isset($_POST['inserir'])){
    try {
        if($_POST['inserir']== "produto" ){
            $produto->create();
            header("location: ../index.php");
        }elseif($_POST['inserir'] == "grupo"){
            $grupo->create();
            header("location: ../index.php");
        }
    } catch (\Throwable $th) {
        echo "Não é permitido inserir registros iguais <br>";
        echo '<button>  <a href="../index.php"> Voltar</a> </button>' ;
    }
    
}

if(isset($_POST['delete'])){
    try {
        if($_POST['delete']=="produto"){
            $produto->delete();
            header("location: ../index.php");
        }elseif($_POST['delete'] == "grupo"){
          
            $grupo->delete();
            header("location: ../index.php");
            
        }
        //code...
    } catch (\Throwable $th) {
        echo "Não é permitido excluir grupo que possui algum produto associado. <br>";
        echo '<button>  <a href="../index.php"> Voltar</a> </button>' ;
    }
    
    
    
    
    
}

   
?>


