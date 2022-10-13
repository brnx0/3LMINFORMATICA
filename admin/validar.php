<?php 
require_once ('crudGrupo.php');
require_once ('crudProduto.php');
$produto = new crudProduto();
$grupo = new crudGrupo();



if(isset($_POST['produto']) ){
    $produto->create();
    header("location: ../index.php");
}elseif(isset($_POST['tableGrupo']) ){
    $grupo->create();
    header("location: ../index.php");
}
   
?>