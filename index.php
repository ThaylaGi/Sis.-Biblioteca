<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Biblioteca</title> <style> body{
font-family: Arial, Helvetica, sans-serif;

    } 



    </style>
</head>
<body>
      <h1>Catalogação</h1>
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