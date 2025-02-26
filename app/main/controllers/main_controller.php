<?php
require_once('../models/main_model.php');

if (
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['sobrenome']) && !empty($_POST['sobrenome']) &&
    isset($_POST['titulo']) && !empty($_POST['titulo']) &&
    isset($_POST['data']) && !empty($_POST['data']) &&
    isset($_POST['editora']) && !empty($_POST['editora']) &&
    isset($_POST['quantidade']) && !empty($_POST['quantidade']) &&
    isset($_POST['corredor']) && !empty($_POST['corredor']) &&
    isset($_POST['estante']) && !empty($_POST['estante']) &&
    isset($_POST['prateleira']) && !empty($_POST['prateleira'])&&
    isset($_POST['genero']) && !empty($_POST['genero'])&&
    isset($_POST['subgenero']) && !empty($_POST['subgenero'])
) {

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $editora = $_POST['editora'];
    $quantidade = $_POST['quantidade'];
    $corredor = $_POST['corredor'];
    $estante = $_POST['estante'];
    $prateleira = $_POST['prateleira'];
    $genero = $_POST['genero'];
    $subgenero = $_POST['subgenero'];

    $model = new main_model();
    $result = $model->cadastrar_livros($nome, $sobrenome, $titulo, $data, $editora, $quantidade, $corredor, $estante, $prateleira, $genero, $subgenero);

    switch($result){
         case 1:
            header('location:../index.php?true');
            exit();
        case 2:
            header('location:../index.php?false');
            exit();
        case 3:
            header('location:../index.php?ja_cadastrado');
            exit();
    }

}else if(isset($_POST['genero']) && !empty($_POST['genero']) && isset($_POST['subgenero']) && !empty($_POST['subgenero'])){

    $genero = $_POST['genero'];
    $subgenero = $_POST['subgenero'];

    $model = new main_model();
    $result = $model->cadastrar_subgenero($genero, $subgenero);

    switch($result){

        
    }

}else{

    header('location:../index.php');
    exit();
}
