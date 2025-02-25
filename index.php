<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Biblioteca</title>  
    <style>
        /* Estilos para centralizar o conteúdo */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: initial;
            font-size: 24px;
            color: #666;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type="text"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>



    </style>
</head>
<body>
    <header>
      <h1>Catalogação</h1>
    </header>
      <form action="#" method="post">
        <label for="sobrenome">Sobrenome do Autor:</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br><br>

        <label for="nome">Nome do Autor:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="titulo">Título do Livro:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="ano">Ano de Publicação:</label>
        <input type="date" id="ano" name="ano" required><br><br>

        <label for="editora">Editora:</label>
        <input type="text" id="editora" name="editora" required><br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" min="1" required><br><br>

        <button type="submit">Enviar</button>
    </form>
      
</body>
</html>