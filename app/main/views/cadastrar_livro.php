<?php
require_once('../models/select_model.php');
$select_model = new select_model();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Biblioteca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
</head>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'ceara-green': '#008C45',
                    'ceara-orange': '#FFA500',
                    'ceara-white': '#FFFFFF',
                    primary: '#4CAF50',
                    secondary: '#FFB74D',

                }
            }
        }
    }
</script>

<body
    class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center p-4 sm:p-6 md:p-8 select-none"
    style="background-image: url('../assets/img/layout.png'); background-opacity: 0.3;">

    <a href="decisão.php"
        class="fixed top-5 left-5 z-50 cursor-pointer hover:scale-110 transition-transform duration-300">
        <i class="fa-solid fa-arrow-left text-2xl text-ceara-green hover:text-ceara-orange"></i>
    </a>

    <div class="flex flex-col items-center w-full">
        <img src="../assets/img/logo1.png"
            class="w-[200px] xs:w-[250px] sm:w-[300px] md:w-[350px] lg:w-[400px] mt-[-40px] sm:mt-[-150px]" alt="Logo">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-4xl px-4 sm:px-6 md:px-8">

            <div class="w-full bg-white rounded-xl shadow-2xl overflow-hidden h-[250px]">
                <div class="bg-[#007A33] p-4 sm:p-6">
                    <h2 class="text-xl sm:text-2xl font-bold text-white text-center">
                        <i class="fas fa-book-open mr-2"></i>Gêneros Bibliográficos
                    </h2>
                </div>

                <div id="genreForm" action="../controllers/main_controller.php" method="post" class="p-4 sm:p-6 space-y-4">
                    <div class="relative">
                        <div class="relative group">
                            <i
                                class="fas fa-book-open absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                            <select id="nomeGenero" name="nomeGenero"
                                class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none appearance-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm"
                                required>
                                <option value="" disabled selected>Gênero</option>
                                <option value="Romance">Romance</option>
                                <option value="Conto">Conto</option>
                                <option value="Crônica">Crônica</option>
                                <option value="Novela">Novela</option>
                                <option value="Ensaio">Ensaio</option>
                                <option value="HQ">Histórias em Quadrinhos</option>
                                <option value="Fábulas">Fábulas</option>
                                <option value="Sermões">Sermões</option>
                                <option value="Poesia">Poesia</option>
                                <option value="Memórias">Memórias</option>
                                <option value="Infantojuvenil">Infantojuvenil</option>
                                <option value="Arte Brasileira">Arte Brasileira</option>
                                <option value="Arte Estrangeira">Arte Estrangeira</option>
                                <option value="Teatro Brasileiro">Teatro Brasileiro</option>
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

                    <div class="relative">
                        <div class="relative group">
                            <i class="fas fa-book-open absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                            <select type="text" id="nomesubGenero" name="nomesubGenero"
                                class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm text-gray-500"
                                placeholder="Subgênero" required>
                                <option value="">Carregando subgêneros...</option>
                            </select>
                        </div>
                    </div>

                    <script>
                        /*
                          $(document).ready(function() {
            // Quando o valor do select mudar
            $('#genero').change(function() {
                var generoId = $(this).val(); // Pega o valor selecionado

                if (generoId) {
                    // Faz uma requisição AJAX para o servidor
                    $.ajax({
                        url: 'buscar_subgeneros.php', // Arquivo PHP que retorna os subgêneros
                        type: 'POST',
                        data: { genero_id: generoId }, // Envia o ID do gênero
                        success: function(response) {
                            // Atualiza a div#subgeneros com a resposta do servidor
                            $('#subgeneros').html(response);
                        },
                        error: function() {
                            $('#subgeneros').html('<p>Erro ao carregar subgêneros.</p>');
                        }
                    });
                } else {
                    $('#subgeneros').html(''); // Limpa a área de subgêneros se nenhum gênero for selecionado
                }
            });
        }); */
                        // Função para carregar os subgêneros via AJAX
                        function carregarSubgeneros() {
                            // Faz a requisição ao endpoint PHP
                            //altera isso aqui em noome de jesus
                            fetch('buscar_subgeneros.php')
                                .then(response => response.json()) // Converte a resposta para JSON
                                .then(data => {
                                    // Seleciona o elemento <select>
                                    const select = document.getElementById("nomesubGenero");

                                    // Limpa as opções atuais
                                    select.innerHTML = '';

                                    // Adiciona uma opção padrão
                                    const optionPadrao = document.createElement("option");
                                    optionPadrao.value = "";
                                    optionPadrao.text = "Selecione um subgênero";
                                    select.add(optionPadrao);

                                    // Preenche o <select> com os dados retornados
                                    data.forEach(subgenero => {
                                        const option = document.createElement("option");
                                        option.value = subgenero.id;
                                        option.text = subgenero.nome;
                                        select.add(option);
                                    });
                                })
                                .catch(error => {
                                    console.error("Erro ao carregar subgêneros:", error);
                                    const select = document.getElementById("nomesubGenero");
                                    select.innerHTML = '<option value="">Erro ao carregar subgêneros</option>';
                                });
                        }

                        // Chama a função para carregar os subgêneros quando a página for carregada
                        document.addEventListener("DOMContentLoaded", carregarSubgeneros);
                    </script>

                </div>
            </div>

            <!-- Formulário de Cadastro de Livros -->
            <div class="w-full bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="bg-[#007A33] p-4 sm:p-6">
                    <h2 class="text-xl sm:text-2xl font-bold text-white text-center">
                        <i class="fas fa-book mr-2"></i>Cadastro de Livros
                    </h2>
                </div>

                <form id="bookForm" action="#" method="post" class="p-4 sm:p-6 space-y-4">
                    <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">


                        <div class="relative">
                            <div class="relative group">
                                <i
                                    class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="nome" name="nome"
                                    class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500 transition-all duration-200 shadow-sm"
                                    placeholder=" Nome " required>
                            </div>
                        </div>


                        <div class="relative">
                            <div class="relative group">
                                <i
                                    class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="sobrenome" name="sobrenome"
                                    class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500 transition-all duration-200 shadow-sm"
                                    placeholder=" Sobrenome " required>
                            </div>
                        </div>


                        <div class="relative">
                            <div class="relative group">
                                <i
                                    class="fas fa-bookmark absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="titulo" name="titulo"
                                    class="w-full pl-10 pr-3 py-2.5 border-2 text-gray-500 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm"
                                    placeholder=" Título" required>
                            </div>
                        </div>


                        <div class="relative">
                            <div class="relative group">
                                <i
                                    class="fas fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="data" name="data"
                                    class="w-full pl-10 pr-3 py-2.5 border-2 text-gray-500 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm"
                                    placeholder="DD/MM/AAAA" required>
                                <span id="dataError" class="text-red-500 text-xs hidden">Data inválida</span>
                            </div>
                        </div>


                        <div class="relative">
                            <div class="relative group">
                                <i
                                    class="fas fa-building absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="editora" name="editora"
                                    class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 text-gray-500 transition-all duration-200 shadow-sm"
                                    placeholder=" Editora" required>
                            </div>
                        </div>


                        <div class="relative">
                            <div class="relative group">
                                <i
                                    class="fas fa-hashtag absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="number" id="quantidade" name="quantidade" min="1"
                                    class="w-full pl-10 pr-3 py-2.5 text-gray-500 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm"
                                    placeholder="Qnt. de livros" required>
                            </div>
                        </div>

                        <script>
                            document.getElementById('quantidade').addEventListener('input', function(e) {
                                this.value = this.value.replace(/[^0-9]/g, '');
                            });
                        </script>


                        <div class="relative">
                            <div class="relative group group-hover:text-[#007A33]">
                                <i
                                    class="fas fa-route absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400  transition-colors duration-200"></i>
                                <select id="corredor" name="corredor"
                                    class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none appearance-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm"
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
                        </div>

                        <div class="relative">
                            <div class="relative group">
                                <i
                                    class="fas fa-layer-group absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <select id="estante" name="estante"
                                    class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none appearance-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm"
                                    required>
                                    <option value="" disabled selected>Estante</option>
                                    <option value="1">Estante 1</option>
                                    <option value="2">Estante 2</option>
                                    <option value="3">Estante 3</option>
                                    <option value="4">Estante 4</option>
                                    <option value="5">Estante 5</option>
                                    <option value="6">Estante 6</option>
                                    <option value="7">Estante 7</option>
                                    <option value="8">Estante 8</option>
                                    <option value="9">Estante 9</option>
                                    <option value="10">Estante 10</option>
                                    <option value="11">Estante 11</option>
                                    <option value="12">Estante 12</option>
                                    <option value="13">Estante 13</option>
                                    <option value="14">Estante 14</option>
                                    <option value="15">Estante 15</option>
                                    <option value="16">Estante 16</option>
                                    <option value="17">Estante 17</option>
                                    <option value="18">Estante 18</option>
                                    <option value="19">Estante 19</option>
                                    <option value="20">Estante 20</option>
                                    <option value="21">Estante 21</option>
                                    <option value="22">Estante 22</option>
                                    <option value="23">Estante 23</option>
                                    <option value="24">Estante 24</option>
                                    <option value="25">Estante 25</option>
                                    <option value="26">Estante 26</option>
                                    <option value="27">Estante 27</option>
                                    <option value="28">Estante 28</option>
                                    <option value="29">Estante 29</option>
                                    <option value="30">Estante 30</option>
                                    <option value="31">Estante 31</option>
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


                        <div class="relative ">
                            <div class="relative group">
                                <i
                                    class="fas fa-bookmark absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <select id="prateleira" name="prateleira"
                                    class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none appearance-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm text-sm sm:text-base"
                                    required>
                                    <option value="" disabled selected class="text-xs sm:text-base  "> Prateleira
                                    </option>
                                    <option value="P1">Prateleira 1</option>
                                    <option value="P2">Prateleira 2</option>
                                    <option value="P3">Prateleira 3</option>
                                    <option value="P4">Prateleira 4</option>
                                    <option value="P5">Prateleira 5</option>
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


                        <div class="relative">
                            <div class="relative group">
                                <i
                                    class="fa-solid fa-book-open absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                                <input type="text" id="edição" name="edição"
                                    class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm"
                                    placeholder=" Edição" required>
                            </div>
                        </div>
                    </div>



                    <?php if (isset($_GET['true'])) { ?>
                        <p>C</p>
                    <?php } ?>


                    <div class="mt-4 sm:mt-6">
                        <button type="submit"
                            class="w-full card-hover bg-[#FFA500] hover:bg-[#FFB74D] text-white font-medium py-2.5 sm:py-3 px-4 rounded-lg transition duration-300 ease-in-out flex items-center justify-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .card-hover {
            transition: transform 0.2s ease-in-out;
        }

        .card-hover:hover {
            transform: translateY(-2px);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('bookForm');
            const dataInput = document.getElementById('data');
            const dataError = document.getElementById('dataError');

            function maskData(input) {
                let value = input.value.replace(/\D/g, '');
                value = value.slice(0, 8);

                let formattedValue = '';
                if (value.length >= 6) {
                    formattedValue = `${value.slice(0, 2)}/${value.slice(2, 4)}/${value.slice(4)}`;
                } else if (value.length >= 4) {
                    formattedValue = `${value.slice(0, 2)}/${value.slice(2)}`;
                } else if (value.length >= 2) {
                    formattedValue = `${value.slice(0, 2)}/${value.slice(2)}`;
                } else {
                    formattedValue = value;
                }

                if (value.length === 0) {
                    formattedValue = '';
                }

                input.value = formattedValue;

                if (formattedValue.length === 10) {
                    const [day, month, year] = formattedValue.split('/').map(Number);
                    const date = new Date(year, month - 1, day);
                    const today = new Date();

                    if (
                        date.getFullYear() !== year ||
                        date.getMonth() + 1 !== month ||
                        date.getDate() !== day ||
                        date > today
                    ) {
                        dataError.classList.remove('hidden');
                        input.classList.add('border-red-500');
                        input.setCustomValidity('Data inválida');
                    } else {
                        dataError.classList.add('hidden');
                        input.classList.remove('border-red-500');
                        input.setCustomValidity('');
                    }
                } else {
                    dataError.classList.add('hidden');
                    input.classList.remove('border-red-500');
                    input.setCustomValidity('');
                }
            }

            dataInput.addEventListener('input', function(e) {
                maskData(this);
            });

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                if (form.checkValidity()) {
                    console.log('Formulário válido, enviando...');

                    alert('Formulário enviado com sucesso!');
                    form.reset();
                }
            });
        });
    </script>
</body>

</html>