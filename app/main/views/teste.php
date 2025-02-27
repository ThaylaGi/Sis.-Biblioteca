<?php
// Simulação do modelo (select_model)
class SelectModel {
    public function select_genero() {
        // Simula a busca de gêneros no banco de dados
        return [
            ['generos' => 'Rock'],
            ['generos' => 'Pop'],
            ['generos' => 'Eletrônica'],
        ];
    }

    public function select_subgenero($genero) {
        // Simula a busca de subgêneros no banco de dados com base no gênero
        $subgeneros = [
            'Rock' => [
                ['subgenero' => 'Hard Rock'],
                ['subgenero' => 'Progressive Rock'],
                ['subgenero' => 'Grunge'],
            ],
            'Pop' => [
                ['subgenero' => 'Pop Rock'],
                ['subgenero' => 'Synthpop'],
                ['subgenero' => 'K-Pop'],
            ],
            'Eletrônica' => [
                ['subgenero' => 'Trance'],
                ['subgenero' => 'House'],
                ['subgenero' => 'Dubstep'],
            ],
        ];

        return $subgeneros[$genero] ?? [];
    }
}

// Instância do modelo
$select_model = new SelectModel();

// Busca todos os gêneros
$generos = $select_model->select_genero();

// Verifica se um gênero foi selecionado
$generoSelecionado = $_POST['genero'] ?? null;
$subgeneros = [];

if ($generoSelecionado) {
    // Busca os subgêneros com base no gênero selecionado
    $subgeneros = $select_model->select_subgenero($generoSelecionado);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de Gênero e Subgênero</title>
</head>
<body>
    <form method="POST" action="">
        <!-- Select para Gêneros -->
        <select id="genero" name="genero"
            class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm text-gray-500"
            required onchange="this.form.submit()">
            <option value="" disabled selected>Selecione um gênero</option>
            <?php foreach ($generos as $genero) { ?>
                <option value="<?= $genero['generos'] ?>" <?= ($generoSelecionado == $genero['generos']) ? 'selected' : '' ?>>
                    <?= $genero['generos'] ?>
                </option>
            <?php } ?>
        </select>

        <!-- Select para Subgêneros -->
        <select id="nomesubGenero" name="nomesubGenero"
            class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm text-gray-500"
            required>
            <option value="" disabled selected>Selecione um subgênero</option>
            <?php foreach ($subgeneros as $subgenero) { ?>
                <option value="<?= $subgenero['subgenero'] ?>"><?= $subgenero['subgenero'] ?></option>
            <?php } ?>
        </select>
    </form>
</body>
</html>