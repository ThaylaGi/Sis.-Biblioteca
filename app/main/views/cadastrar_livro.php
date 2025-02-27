<?php
require_once('../models/select_model.php');
$select_model = new select_model();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulário Biblioteca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
    <style>
        [type='text'],
        [type='number'],
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        body {
            background: url('../assets/img/layout.png') no-repeat center center / cover;
        }

        .card-hover {
            transition: transform 0.2s ease-in-out;
        }

        .card-hover:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'ceara-green': '#008C45',
                    'ceara-orange': '#FFA500',
                    'ceara-white': '#FFFFFF',
                    'primary': '#4CAF50',
                    'secondary': '#FFB74D',
                }
            }
        }
    }
</script>

<body class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center p-4 sm:p-6 md:p-8 select-none">
    <a href="decisão.php" class="fixed top-5 left-5 z-50 cursor-pointer hover:scale-110 transition-transform duration-300">
        <i class="fa-solid fa-arrow-left text-2xl text-ceara-green hover:text-ceara-orange"></i>
    </a>

    <div class="flex flex-col items-center w-full">
        <img src="../assets/img/logo1.png" class="w-[200px] xs:w-[250px] sm:w-[300px] md:w-[350px] lg:w-[400px] mt-[-40px] sm:mt-[-150px]" alt="Logo">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-4xl px-4 sm:px-6 md:px-8">
            <!-- Formulário de Gêneros -->
            <div class="w-full bg-white rounded-xl shadow-2xl overflow-hidden h-[250px]">
                <div class="bg-[#007A33] p-4 sm:p-6">
                    <h2 class="text-xl sm:text-2xl font-bold text-white text-center">
                        <i class="fas fa-book-open mr-2"></i>Gêneros Bibliográficos
                    </h2>
                </div>
                <form id="generoForm" action="../controllers/main_controller.php" method="post" class="p-4 sm:p-6 space-y-4">
                    <div class="relative">
                        <div class="relative group">
                            <i class="fas fa-book-open absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                            <select id="nomeGenero" name="nomeGenero" class="w-full pl-10 pr-8 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm" required>
                                <option value="" disabled selected>Gênero</option>
                                <?php
                                $generos = $select_model->select_genero();
                                foreach ($generos as $genero) {
                                    echo "<option value='" . htmlspecialchars($genero['generos']) . "'>" . htmlspecialchars($genero['generos']) . "</option>";
                                }
                                ?>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="relative group">
                            <i class="fas fa-book-open absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                            <select id="nomesubGenero" name="nomesubGenero" class="w-full pl-10 pr-8 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm" required>
                                <option value="" disabled selected class="text-gray-400">Selecione um subgênero</option>
                                <?php
                                $generos = $select_model->select_genero();
                                foreach ($generos as $genero) {
                                    $subgeneros = $select_model->select_subgenero($genero['generos']);
                                    echo "<optgroup label='" . htmlspecialchars($genero['generos']) . "' class='w-full pl-10 pr-8 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm'>";
                                    foreach ($subgeneros as $subgenero) {
                                        echo "<option value='" . htmlspecialchars($subgenero['subgenero']) . "' class='text-gray-700 hover:bg-[#007A33]/10 transition-colors'>" . htmlspecialchars($subgenero['subgenero']) . "</option>";
                                    }
                                    echo "</optgroup>";
                                }
                                ?>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>



                </form>
            </div>

            <!-- Formulário de Cadastro de Livros -->
            <div class="w-full bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="bg-[#007A33] p-4 sm:p-6">
                    <h2 class="text-xl sm:text-2xl font-bold text-white text-center">
                        <i class="fas fa-book mr-2"></i>Cadastro de Livros
                    </h2>
                </div>
                <form id="bookForm" action="../controllers/main_controller.php" method="post" class="p-4 sm:p-6 space-y-4">
                    <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
                        <div class="relative">
                            <div class="relative group">
                                <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="nome" name="nome" class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500 transition-all duration-200 shadow-sm" placeholder="Nome" required>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative group">
                                <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="sobrenome" name="sobrenome" class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500 transition-all duration-200 shadow-sm" placeholder="Sobrenome" required>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative group">
                                <i class="fas fa-bookmark absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="titulo" name="titulo" class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500 transition-all duration-200 shadow-sm" placeholder="Título" required>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative group">
                                <i class="fas fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="data" name="data" class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500 transition-all duration-200 shadow-sm" placeholder="DD/MM/AAAA" required>
                                <span id="dataError" class="text-red-500 text-xs hidden">Data inválida</span>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative group">
                                <i class="fas fa-building absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="editora" name="editora" class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500 transition-all duration-200 shadow-sm" placeholder="Editora" required>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative group">
                                <i class="fas fa-hashtag absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="number" id="quantidade" name="quantidade" min="1" class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500 transition-all duration-200 shadow-sm" placeholder="Qnt. de livros" required>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative group">
                                <i class="fas fa-route absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <select id="corredor" name="corredor" class="w-full pl-10 pr-8 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm" required>
                                    <option value="" disabled selected>Corredor</option>
                                    <option value="A">Corredor A</option>
                                    <option value="B">Corredor B</option>
                                    <option value="C">Corredor C</option>
                                    <option value="D">Corredor D</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative group">
                                <i class="fas fa-layer-group absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <select id="estante" name="estante" class="w-full pl-10 pr-8 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm" required>
                                    <option value="" disabled selected>Estante</option>
                                    <?php for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?php echo $i; ?>">Estante <?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative group">
                                <i class="fas fa-bookmark absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <select id="prateleira" name="prateleira" class="w-full pl-10 pr-8 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm" required>
                                    <option value="" disabled selected>Prateleira</option>
                                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <option value="P<?php echo $i; ?>">Prateleira <?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative group">
                                <i class="fa-solid fa-book-open absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="edição" name="edição" class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500 transition-all duration-200 shadow-sm" placeholder="Edição" required>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($_GET['true'])) { ?>
                        <p class="text-green-500">Livro cadastrado com sucesso!</p>
                    <?php } elseif (isset($_GET['false'])) { ?>
                        <p class="text-red-500">ERRO ao cadastrar livro!</p>
                    <?php } elseif (isset($_GET['ja_cadastrado'])) { ?>
                        <p class="text-yellow-500">Livro já cadastrado!</p>
                    <?php } ?>

                    <div class="mt-4 sm:mt-6">
                        <button type="submit" class="w-full card-hover bg-[#FFA500] hover:bg-[#FFB74D] text-white font-medium py-2.5 sm:py-3 px-4 rounded-lg transition duration-300 ease-in-out flex items-center justify-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataInput = document.getElementById('data');
            const dataError = document.getElementById('dataError');
            const quantidadeInput = document.getElementById('quantidade');

            if (dataInput) {
                dataInput.addEventListener('input', function(e) {
                    let value = this.value.replace(/\D/g, '').slice(0, 8);
                    let formattedValue = '';
                    if (value.length > 4) {
                        formattedValue = `${value.slice(0,2)}/${value.slice(2,4)}/${value.slice(4)}`;
                    } else if (value.length > 2) {
                        formattedValue = `${value.slice(0,2)}/${value.slice(2)}`;
                    } else {
                        formattedValue = value;
                    }
                    this.value = formattedValue;

                    if (formattedValue.length === 10) {
                        const [day, month, year] = formattedValue.split('/').map(Number);
                        const date = new Date(year, month - 1, day);
                        const today = new Date();
                        if (isNaN(date.getTime()) || date > today) {
                            dataError.classList.remove('hidden');
                            this.classList.add('border-red-500');
                            this.setCustomValidity('Data inválida');
                        } else {
                            dataError.classList.add('hidden');
                            this.classList.remove('border-red-500');
                            this.setCustomValidity('');
                        }
                    } else {
                        dataError.classList.add('hidden');
                        this.classList.remove('border-red-500');
                        this.setCustomValidity('');
                    }
                });
            }

            if (quantidadeInput) {
                quantidadeInput.addEventListener('input', function(e) {
                    this.value = this.value.replace(/\D/g, '');
                });
            }
        });
    </script>
</body>

</html>