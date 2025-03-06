<?php
require_once('../models/main_model.php');
echo "<pre>";
print_r($_POST);
echo "</pre>";
if (
    (isset($_POST['nomesubGenero']) && !empty($_POST['nomesubGenero']) ||
        isset($_POST['nomeGenero']) && !empty($_POST['nomeGenero'])) &&
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['sobrenome']) && !empty($_POST['sobrenome']) &&
    isset($_POST['titulo']) && !empty($_POST['titulo']) &&
    isset($_POST['editora']) && !empty($_POST['editora']) &&
    isset($_POST['edicao']) && !empty($_POST['edicao']) &&
    isset($_POST['data']) && !empty($_POST['data']) &&
    isset($_POST['corredor']) && !empty($_POST['corredor']) &&
    isset($_POST['quantidade']) && !empty($_POST['quantidade']) &&
    isset($_POST['estante']) && !empty($_POST['estante']) &&
    isset($_POST['prateleira']) && !empty($_POST['prateleira'])
) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $editora = $_POST['editora'];
    $edicao = $_POST['edicao'];
    $quantidade = $_POST['quantidade'];
    $corredor = $_POST['corredor'];
    $estante = $_POST['estante'];
    $prateleira = $_POST['prateleira'];
    $genero = $_POST['nomeGenero'] ?? 0;
    $subgenero = $_POST['nomesubGenero'] ?? 0;
    $literatura = $_POST['estrangeiro'] == 0 ? "Brasileira":"Estrangeira";
    $ficcao = $_POST['ficcao'] ?? 0;

    /*$model = new main_model();
    $result = $model->cadastrar_livros($nome, $sobrenome, $titulo, $data, $editora, $edicao, $quantidade, $corredor, $estante, $prateleira, $subgenero, $genero, $literatura, $ficcao);

    switch ($result) {
        case 1:
            header('location:../views/cadastrar_livro.php?true');
            exit();
        case 2:
            header('location:../views/cadastrar_livro.php?false');
            exit();
        case 3:
            header('location:../views/cadastrar_livro.php?ja_cadastrado');
            exit();
        default:
            header('location:../index.php');
            exit();
    }*/
} else if (isset($_POST['genero']) && !empty($_POST['genero']) && isset($_POST['subgenero']) && !empty($_POST['subgenero'])) {

    $genero = $_POST['genero'];
    $subgenero = $_POST['subgenero'];

    $model = new main_model();
    $result = $model->cadastrar_subgenero($genero, $subgenero);

    switch ($result) {

        case 1:
            header('location:../views/inserir_genero.php?true');
            break;
        case 2:
            header('location:../views/inserir_genero.php?false');
            break;
        case 3:
            header('location:../views/inserir_genero.php?ja_cadastrado');
            break;
        default:
            header('location:../index.php');
            exit();
    }
} else if (isset($_POST['novo_genero']) && !empty($_POST['novo_genero'])) {

    $novo_genero = $_POST['novo_genero'];
    $model = new main_model();
    $result = $model->cadastrar_genero($novo_genero);

    switch ($result) {

        case 1:
            header('location:../views/cadastrar_genero.php?true');
            break;
        case 2:
            header('location:../views/cadastrar_genero.php?false');
            break;
        case 3:
            header('location:../views/cadastrar_genero.php?ja_cadastrado');
            break;
        default:
            header('location:../index.php');
            exit();
    }
} /*else {

    header('location:../index.php');
    exit();
}*/
