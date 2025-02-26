<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Biblioteca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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

<body class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center p-4 sm:p-6 md:p-8"
    style="background-image: url('assets/img/layout.png'); background-opacity: 0.3;">

    <div class="flex flex-col items-center ">

        <img src="assets/img/logo1.png" class="w-[200px] h-[200px]" alt="Logo">



        <div class="w-full max-w-xl h-full bg-white rounded-xl shadow-2xl overflow-hidden my-[]">
            <div class="bg-[#007A33] p-4 sm:p-6">
                <h2 class="text-xl sm:text-2xl font-bold text-white text-center">
                    <i class="fas fa-book mr-2"></i>Cadastro de Livros
                </h2>
            </div>


            <form id="bookForm" action="./controllers/main_controller.php" method="post" class="p-4 sm:p-6 space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div class="relative">

                        <div class="relative group">
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                            <input type="text" id="nome" name="nome"
                                class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm"
                                placeholder=" Nome do autor" required>
                        </div>
                    </div>

             
                    <div class="relative">
                        <div class="relative group">
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                            <input type="text" id="sobrenome" name="sobrenome"
                                class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm"
                                placeholder=" Sobrenome do autor" required>
                        </div>
                    </div>


                    <div class="relative">
                        <div class="relative group">
                            <i class="fas fa-bookmark absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                            <input type="text" id="titulo" name="titulo"
                                class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm"
                                placeholder=" Título" required>
                        </div>
                    </div>

    
                    <div class="relative">
                        <div class="relative group">
                            <i class="fas fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                            <input type="text" id="data" name="data"
                                class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm"
                                placeholder="DD/MM/AAAA" required>
                            <span id="dataError" class="text-red-500 text-xs hidden">Data inválida</span>
                        </div>
                    </div>

                
                    <div class="relative">
                        <div class="relative group">
                            <i class="fas fa-building absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
                            <input type="text" id="editora" name="editora"
                                class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm"
                                placeholder=" Editora" required>
                        </div>
                    </div>

                  
                    <div class="relative">
    <div class="relative group">
        <i class="fas fa-hashtag absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
        <input type="number" id="quantidade" name="quantidade" min="1"
            class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none hover:border-gray-300 transition-all duration-200 shadow-sm"
            placeholder="Quantidade de livros" required>
    </div>
</div>

<script>
    document.getElementById('quantidade').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, ''); 
    });
</script>

                  
                    <div class="relative">
                        <div class="relative group">
                            <i class="fas fa-route absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
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
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="relative group">
                            <i class="fas fa-layer-group absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
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
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

              
                    <div class="relative col-span-2 flex flex-col items-center">
    <div class="relative group w-full sm:w-2/3 md:max-w-xs my-2 sm:my-4 mx-auto">
        <i class="fas fa-bookmark absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-[#007A33] transition-colors duration-200"></i>
        <select id="prateleira" name="prateleira"
            class="w-full pl-10 pr-3 py-2.5 border-2 border-gray-200 text-gray-400 rounded-lg focus:border-[#007A33] focus:ring focus:ring-[#007A33]/20 focus:outline-none appearance-none bg-white hover:border-gray-300 transition-all duration-200 cursor-pointer shadow-sm text-sm sm:text-base"
            required>
            <option value="" disabled selected class="text-xs sm:text-base  "> Prateleira</option>
            <option value="P1">Prateleira 1</option>
            <option value="P2">Prateleira 2</option>
            <option value="P3">Prateleira 3</option>
            <option value="P4">Prateleira 4</option>
            <option value="P5">Prateleira 5</option>
        </select>
        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </div>
</div>
                </div>

              
                <div class="mt-4 sm:mt-6">
                    <button type="submit"
                        class="w-full bg-[#FFA500] hover:bg-[#FFB74D] text-white font-medium py-2.5 sm:py-3 px-4 rounded-lg transition duration-300 ease-in-out flex items-center justify-center">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>

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