<?php
require_once('../models/select_model.php');
$select_model = new select_model();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr,
        td {
            border: solid, black, 2px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>ID</td>
            <td>Titulo</td>
            <td>Nome autor</td>
            <td>Sobrenome autor</td>
            <td>Data de cadastro</td>
            <td>Editora</td>
            <td>Corredor</td>
            <td>Estante</td>
            <td>Pratileira</td>
            <td>Genero</td>
            <td>Subgenero</td>
            <td>Ficção</td>
            <td>Estrangeiro</td>
            <td>Quantidade</td>
        </tr>
        <?php
        $livros = $select_model->select_livros();

        foreach ($livros as $dados) {
            $autores = $select_model->select_autores($dados['id']);
            //$generos = $select_model->select_genero_subgenero($dados['id']);
        ?>
            <tr>
                <td><?=$dados['id']?></td>
                <td><?=$dados['titulo_livro']?></td>
                <td><?=$autores['nome_autor']?></td>
                <td><?=$autores['sobrenome_autor']?></td>
                <td><?=$dados['ano_publicacao']?></td>
                <td><?=$dados['editora']?></td>
                <td><?=$dados['corredor']?></td>
                <td><?=$dados['estantes']?></td>
                <td><?=$dados['prateleiras']?></td>
                <td><?=$dados['id_genero']?></td>
                <td><?=$dados['id_subgenero']?></td>
                <td><?php echo $dados['ficcao'] = $dados['ficcao'] == 1 ? 'Sim' : 'Não'?></td>
                <td><?php echo $dados['estrangeiro'] = $dados['estrangeiro'] == 1 ? 'Sim' : 'Não'?></td>
                <td><?=$dados['quantidade']?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>