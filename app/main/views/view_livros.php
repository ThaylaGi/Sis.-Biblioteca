<?php
require_once('../models/select_model.php');
$select_model = new select_model();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .sim {
            color: green;
            font-weight: bold;
        }

        .nao {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Lista de Livros</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Nome Autor</th>
                <th>Sobrenome Autor</th>
                <th>Data de Cadastro</th>
                <th>Editora</th>
                <th>Corredor</th>
                <th>Estante</th>
                <th>Prateleira</th>
                <th>Gênero</th>
                <th>Subgênero</th>
                <th>Ficção</th>
                <th>Estrangeiro</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $livros = $select_model->select_livros();

            foreach ($livros as $dados) {
                $autores = $select_model->select_autores($dados['id']);

            ?>
                <tr>
                    <td><?= $dados['id'] ?></td>
                    <td><?= $dados['titulo_livro'] ?></td>
                    <td><?= $autores['nome_autor'] ?></td>
                    <td><?= $autores['sobrenome_autor'] ?></td>
                    <td><?= $dados['ano_publicacao'] ?></td>
                    <td><?= $dados['editora'] ?></td>
                    <td><?= $dados['corredor'] ?></td>
                    <td><?= $dados['estantes'] ?></td>
                    <td><?= $dados['prateleiras'] ?></td>
                    <td><?= $dados['id_genero'] ?></td>
                    <td><?= $dados['id_subgenero'] == NULL ? "Sem subgenero" : $dados['id_subgenero'] ?></td>
                    <td class="<?= $dados['ficcao'] == 1 ? 'sim' : 'nao' ?>"><?= $dados['ficcao'] == 1 ? 'Sim' : 'Não' ?></td>
                    <td class="<?= $dados['estrangeiro'] == 1 ? 'sim' : 'nao' ?>"><?= $dados['estrangeiro'] == 1 ? 'Sim' : 'Não' ?></td>
                    <td><?= $dados['quantidade'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>