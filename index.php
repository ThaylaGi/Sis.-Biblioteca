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
            justify-content: center;
            align-items: center;
            display: flex;
            height: 100vh;
            margin: auto;
            background-color: #F5F5F5;
        }

        #h1 {
            text-align: start;
            font-size: 33px;
            color: #333333;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            justify-content: center;
            align-items: center;
            position: relative;
            margin-left: 10%;

            
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
            background-color:  #007A33;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4CAF50;
        }
    </style>



    </style>
</head>
<body>
    <div id="h1">Catalogação</div>
      <form action="#" method="post">
        <label for="sobrenome">Sobrenome do Autor:</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br><br>

        <label for="nome">Nome do Autor:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="titulo">Título do Livro:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>
    </form>
    <form action="#" method="post">
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