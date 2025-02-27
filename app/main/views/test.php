<?php
// Início do PHP
$dadoPHP = ""; // Variável PHP que receberá o valor do JavaScript

// Verifica se a requisição POST foi feita
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dadoPHP'])) {
    // Recebe o valor enviado pelo JavaScript
    $dadoPHP = $_POST['dadoPHP'];

    // Processa o valor (aqui você pode fazer o que quiser com o dado)
    $dadoPHP = "PHP recebeu: " . $dadoPHP;

    // Retorna a resposta para o JavaScript
    echo $dadoPHP;
    exit; // Termina a execução do PHP
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>JavaScript para PHP no mesmo arquivo</title>
</head>
<body>
    <h1>Exemplo de JavaScript para PHP no mesmo arquivo</h1>

    <!-- Local para exibir a resposta do PHP -->
    <p id="resposta"></p>

    <script>
        // JavaScript
        // Variável JavaScript que será enviada para o PHP
        const meuDado = "Olá, PHP!";

        // Enviar o dado para o PHP automaticamente (quando a página carrega)
        fetch(window.location.href, { // Envia para o mesmo arquivo
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'dadoPHP=' + encodeURIComponent(meuDado),
        })
        .then(response => response.text())
        .then(data => {
            // Exibe a resposta do PHP na página
            document.getElementById('resposta').textContent = data;
        });
    </script>
</body>
</html>