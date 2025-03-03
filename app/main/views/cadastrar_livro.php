<?php
require_once('../models/select_model.php');
$select_model = new select_model();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Biblioteca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
</head>

<body class="min-h-screen bg-cover bg-center bg-no-repeat flex flex-col items-center p-4 sm:p-6 md:p-8 select-none"
    style="background-image: url('../assets/img/layout.png');">

    <a href="decisão.php"
        class="fixed top-5 left-5 z-50 cursor-pointer hover:scale-110 transition-transform duration-300">
        <i class="fa-solid fa-arrow-left text-2xl text-ceara-green hover:text-ceara-orange"></i>
    </a>

    <div class="flex flex-col items-center w-full max-w-5xl mt-4 sm:mt-2 lg:mt-0">
        <img src="../assets/img/logo1.png"
            class="w-[150px] xs:w-[200px] sm:w-[250px] md:w-[300px] lg:w-[350px] mb-2 lg:mb-0" alt="Logo">

        <div class="w-full bg-white rounded-xl shadow-2xl overflow-hidden">
            <div class="bg-[#007A33] p-4 sm:p-6">
                <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-white text-center">
                    <i class="fas fa-book mr-2"></i>Cadastro de Livros
                </h2>
            </div>

            <form id="bookForm" action="../controllers/main_controller.php" method="post" class="p-4 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Box 1: Informações do Livro -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h3
                            class="text-lg font-semibold text-[#007A33] mb-3 border-b border-gray-200 pb-2 sticky top-0 bg-gray-50 z-10">
                            Informações do Livro
                        </h3>
                        <div class="space-y-3 max-h-[300px] overflow-y-auto pr-2">
                            <div class="relative group">
                                <i
                                    class="fas fa-book-open absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33]"></i>
                                <select id="nomesubGenero" name="nomesubGenero"
                                    class="w-full pl-10 pr-8 py-2 border border-gray-300 rounded-lg focus:border-[#007A33] focus:ring-1 focus:ring-[#007A33]/20 focus:outline-none appearance-none bg-white hover:border-gray-400 text-gray-600 placeholder-gray-500 transition-all duration-200 cursor-pointer"
                                    required>
                                    <option value="" disabled selected class="text-gray-500">Subgênero</option>
                                    <?php
                                    $generos = $select_model->select_genero();
                                    foreach ($generos as $genero) {
                                        $subgeneros = $select_model->select_subgenero(genero: $genero['generos']);
                                        ?>
                                        <optgroup label="<?= $genero['generos'] ?>">
                                            <?php foreach ($subgeneros as $subgenero) { ?>
                                                <option value="<?= $subgenero['subgenero'] ?>"><?= $subgenero['subgenero'] ?>
                                                </option>
                                            <?php } ?>
                                        </optgroup>
                                    <?php } ?>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>

                            <div id="authorFields" class="space-y-2">
                                <div class="grid grid-cols-2 gap-3 author-row" data-index="1">
                                    <div class="relative group">
                                        <i class="fas fa-plus cursor-pointer text-[#007A33] hover:text-[#005F27] text-lg transition-colors duration-200 absolute left-2 top-1/2 transform -translate-y-1/2"
                                            id="addAuthor" title="Adicionar autor"></i>
                                        <i
                                            class="fas fa-user absolute left-8 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] hidden sm:block"></i>
                                        <input type="text" id="nome1" name="nome[]"
                                            class="w-full pl-10 sm:pl-14 pr-3 py-2 bg-white border border-gray-300 rounded-lg focus:border-[#007A33] focus:ring-1 focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-400 text-gray-600 placeholder-gray-400 transition-all duration-200"
                                            placeholder="Nome do Autor" required>
                                    </div>
                                    <div class="relative group">
                                        <i
                                            class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] hidden sm:block"></i>
                                        <input type="text" id="sobrenome1" name="sobrenome[]"
                                            class="w-full pl-2 sm:pl-10 pr-3 py-2 bg-white border border-gray-300 rounded-lg focus:border-[#007A33] focus:ring-1 focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-400 text-gray-600 placeholder-gutter-gray-400 transition-all duration-200"
                                            placeholder="Sobrenome" required>
                                    </div>
                                </div>
                            </div>

                            <div class="relative group">
                                <i
                                    class="fas fa-bookmark absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33]"></i>
                                <input type="text" id="titulo" name="titulo"
                                    class="w-full pl-10 pr-3 py-2 bg-white border border-gray-300 rounded-lg focus:border-[#007A33] focus:ring-1 focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-400 text-gray-600 placeholder-gray-400 transition-all duration-200"
                                    placeholder="Título" required>
                            </div>

                            <div class="relative group">
                                <i
                                    class="fas fa-building absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33]"></i>
                                <input type="text" id="editora" name="editora"
                                    class="w-full pl-10 pr-3 py-2 bg-white border border-gray-300 rounded-lg focus:border-[#007A33] focus:ring-1 focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-400 text-gray-600 placeholder-gray-400 transition-all duration-200"
                                    placeholder="Editora" required>
                            </div>

                            <div class="relative group">
                                <i
                                    class="fas fa-building absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33]"></i>
                                <input type="text" id="edicao" name="edicao"
                                    class="w-full pl-10 pr-3 py-2 bg-white border border-gray-300 rounded-lg focus:border-[#007A33] focus:ring-1 focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-400 text-gray-600 placeholder-gray-400 transition-all duration-200"
                                    placeholder="Edição" required>
                            </div>

                            <!-- Checkboxes Estrangeiro e Ficção -->
                            <div class="flex items-center space-x-6">
                                <label class="flex items-center space-x-2 text-gray-700 cursor-pointer">
                                    <input type="checkbox" name="estrangeiro" value="1"
                                        class="h-4 w-4 text-[#007A33] border-gray-300 rounded focus:ring-[#007A33] accent-[#007A33]">
                                    <span>Estrangeiro</span>
                                </label>
                                <label class="flex items-center space-x-2 text-gray-700 cursor-pointer">
                                    <input type="checkbox" name="ficcao" value="1"
                                        class="h-4 w-4 text-[#007A33] border-gray-300 rounded focus:ring-[#007A33] accent-[#007A33]">
                                    <span>Ficção</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Box 2: Localização e Estoque -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-semibold text-[#007A33] mb-4 border-b border-gray-200 pb-2">
                            Localização e Estoque
                        </h3>
                        <div class="space-y-4">
                            <div class="relative group">
                                <i
                                    class="fas fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33]"></i>
                                <input type="text" id="data" name="data"
                                    class="w-full pl-10 pr-3 py-2 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500"
                                    placeholder="DD/MM/AAAA" required>
                                <span id="dataError" class="text-red-500 text-xs hidden">Data inválida</span>
                            </div>

                            <div class="relative group">
                                <i
                                    class="fas fa-route absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33]"></i>
                                <select id="corredor" name="corredor"
                                    class="w-full pl-10 pr-8 py-2 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none appearance-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer"
                                    required>
                                    <option value="" disabled selected>Corredor</option>
                                    <option value="A">Corredor A</option>
                                    <option value="B">Corredor B</option>
                                    <option value="C">Corredor C</option>
                                    <option value="D">Corredor D</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>

                            <div class="relative group">
                                <i
                                    class="fas fa-hashtag absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33]"></i>
                                <input type="number" id="quantidade" name="quantidade" min="1"
                                    class="w-full pl-10 pr-3 py-2 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500"
                                    placeholder="Qnt. de livros" required>
                            </div>

                            <div class="relative group">
                                <i
                                    class="fas fa-layer-group absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33]"></i>
                                <select id="estante" name="estante"
                                    class="w-full pl-10 pr-8 py-2 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none appearance-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer"
                                    required>
                                    <option value="" disabled selected>Estante</option>
                                    <?php for ($i = 1; $i <= 32; $i++) { ?>
                                        <option value="<?= $i ?>">Estante <?= $i ?></option>
                                    <?php } ?>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>

                            <div class="relative group">
                                <i
                                    class="fas fa-bookmark absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33]"></i>
                                <select id="prateleira" name="prateleira"
                                    class="w-full pl-10 pr-8 py-2 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none appearance-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer"
                                    required>
                                    <option value="" disabled selected>Prateleira</option>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <option value="P<?= $i ?>">Prateleira <?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mensagens de Status -->
                <div class="mt-6 space-y-2">
                    <?php if (isset($_GET['true'])): ?>
                        <p
                            class="text-green-600 bg-green-100 border border-green-300 rounded-md p-2 text-center font-medium text-sm sm:text-base">
                            Livro cadastrado com sucesso!
                        </p>
                    <?php endif; ?>

                    <?php if (isset($_GET['false'])): ?>
                        <p
                            class="text-red-600 bg-red-100 border border-red-300 rounded-md p-2 text-center font-medium text-sm sm:text-base">
                            ERRO ao cadastrar livro!
                        </p>
                    <?php endif; ?>

                    <?php if (isset($_GET['ja_cadastrado'])): ?>
                        <p
                            class="text-yellow-600 bg-yellow-100 border border-yellow-300 rounded-md p-2 text-center font-medium text-sm sm:text-base">
                            Livro já cadastrado!
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Botão de Envio -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-[#FFA500] hover:bg-[#FF8C00] text-white font-medium py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-[1.02] flex items-center justify-center text-base shadow-md">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Cadastrar Livro
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const authorFields = document.getElementById('authorFields');
            const addAuthorBtn = document.getElementById('addAuthor');
            let authorCount = 1;

            // Função para adicionar novos campos de autor
            function addAuthor() {
                authorCount++;
                const newAuthorRow = document.createElement('div');
                newAuthorRow.className = 'grid grid-cols-2 gap-3 author-row';
                newAuthorRow.setAttribute('data-index', authorCount);
                newAuthorRow.innerHTML = `
                    <div class="relative group">
                        <i class="fas fa-minus cursor-pointer text-[#FF4444] hover:text-[#CC3333] text-lg transition-colors duration-200 absolute left-2 top-1/2 transform -translate-y-1/2 remove-author" title="Remover autor"></i>
                        <i class="fas fa-user absolute left-8 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] hidden sm:block"></i>
                        <input type="text" id="nome${authorCount}" name="nome[]"
                            class="w-full pl-10 sm:pl-14 pr-3 py-2 bg-white border border-gray-300 rounded-lg focus:border-[#007A33] focus:ring-1 focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-400 text-gray-600 placeholder-gray-400 transition-all duration-200"
                            placeholder="Nome do Autor" required>
                    </div>
                    <div class="relative group">
                        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] hidden sm:block"></i>
                        <input type="text" id="sobrenome${authorCount}" name="sobrenome[]"
                            class="w-full pl-2 sm:pl-10 pr-3 py-2 bg-white border border-gray-300 rounded-lg focus:border-[#007A33] focus:ring-1 focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-400 text-gray-600 placeholder-gray-400 transition-all duration-200"
                            placeholder="Sobrenome" required>
                    </div>
                `;
                authorFields.appendChild(newAuthorRow);

                // Adicionar evento de remoção ao novo botão
                newAuthorRow.querySelector('.remove-author').addEventListener('click', function () {
                    newAuthorRow.remove();
                    authorCount--;
                    updateAuthorIndices();
                });
            }

            // Função para atualizar os índices após remoção
            function updateAuthorIndices() {
                const rows = authorFields.querySelectorAll('.author-row');
                rows.forEach((row, index) => {
                    const newIndex = index + 1;
                    row.setAttribute('data-index', newIndex);
                    const nomeInput = row.querySelector('input[name="nome[]"]');
                    const sobrenomeInput = row.querySelector('input[name="sobrenome[]"]');
                    nomeInput.id = `nome${newIndex}`;
                    sobrenomeInput.id = `sobrenome${newIndex}`;
                });
            }

            // Inicializar o evento do botão de adicionar
            addAuthorBtn.addEventListener('click', addAuthor);

            // Validação de data
            const dataInput = document.getElementById('data');
            const dataError = document.getElementById('dataError');

            dataInput.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, '');
                value = value.slice(0, 8);

                if (value.length >= 5) {
                    value = value.replace(/(\d{2})(\d{2})(\d{0,4})/, '$1/$2/$3');
                } else if (value.length >= 3) {
                    value = value.replace(/(\d{2})(\d{0,2})/, '$1/$2');
                }
                e.target.value = value;

                if (value.length === 10) {
                    const [day, month, year] = value.split('/').map(Number);
                    const date = new Date(year, month - 1, day);
                    const isValid = date.getFullYear() === year &&
                        date.getMonth() === month - 1 &&
                        date.getDate() === day &&
                        date <= new Date();

                    if (!isValid) {
                        dataError.classList.remove('hidden');
                        dataInput.classList.add('border-red-500');
                    } else {
                        dataError.classList.add('hidden');
                        dataInput.classList.remove('border-red-500');
                    }
                }
            });
        });
    </script>

</body>

</html>