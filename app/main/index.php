<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Sistema Biblioteca</title>
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
                    },
                },
            },
        };
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');



        .gradient-text {
            background: linear-gradient(45deg, #008C45, #FFA500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .footer-link {
            transition: all 0.3s ease;
        }

        .footer-link:hover {
            color: #FFA500;
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-ceara-white to-gray-100 text-gray-800 min-h-screen select-none">

    <!-- Navbar -->
    <nav class="fixed w-full bg-ceara-white/90 backdrop-blur-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl sm:text-3xl font-bold title-glow" style="font-family: 'Anton', serif;">Biblioteca</h1>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#features" class="hover:text-ceara-orange transition-colors">
                        <i class="fas fa-tools mr-2"></i>Recursos
                    </a>
                    <a href="#manual" class="hover:text-ceara-orange transition-colors">
                        <i class="fas fa-book-open mr-2"></i>Manual
                    </a>
                    <a href="#footer" class="hover:text-ceara-orange transition-colors">
                        <i class="fas fa-info-circle mr-2"></i>Sobre
                    </a>



                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-800 p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <div class="flex flex-col space-y-4">
                    <a href="#footer" class="hover:text-ceara-orange transition-colors px-4 py-2">
                        <i class="fas fa-info-circle mr-2"></i>Sobre
                    </a>
                    <a href="#manual" class="hover:text-ceara-orange transition-colors px-4 py-2">
                        <i class="fas fa-book-open mr-2"></i>Manual
                    </a>
                    <a href="#features" class="hover:text-ceara-orange transition-colors px-4 py-2">
                        <i class="fas fa-tools mr-2"></i>Recursos
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-24 md:pt-32 pb-16 md:pb-20 px-4">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="lg:w-1/2 text-center lg:text-left space-y-6">
                <h2 class="text-4xl sm:text-5xl lg:text-7xl font-bold gradient-text"
                    style="font-family: 'Anton', serif;">
                    GERENCIE SUA BIBLIOTECA
                </h2>
                <p class="text-base sm:text-lg text-gray-600 font-light max-w-xl mx-auto lg:mx-0"
                    style="font-family: 'Poppins', sans-serif;">
                    Organize livros, gerencie empréstimos e simplifique a administração da sua biblioteca.
                </p>
                <a href="./views/decisão.php"
                    class="inline-block bg-ceara-green px-6 sm:px-8 py-3 sm:py-4 rounded-lg text-base sm:text-lg font-semibold hover:bg-opacity-90 transition-all transform hover:scale-105 text-ceara-white">
                    Começar Agora
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 md:py-20 bg-ceara-white/50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-2xl md:text-3xl font-bold text-center mb-12 text-ceara-green">Recursos Principais</h3>

            <!-- Cards Container -->
            <div class="relative">
                <div class="cards-container flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 overflow-x-auto snap-x snap-mandatory hide-scrollbar">
                    <!-- Card 1: Gerenciamento de Livros -->
                    <div class="card-hover group min-w-[280px] sm:min-w-[320px] md:min-w-0 flex-shrink-0 snap-center">
                        <div class="bg-ceara-white p-6 rounded-lg h-full shadow-lg">
                            <div class="flex flex-col items-center text-center">
                                <div class="bg-ceara-green/10 p-4 rounded-full mb-4 group-hover:bg-ceara-green/20 transition-all">
                                    <i class="fas fa-book text-ceara-green text-3xl"></i>
                                </div>
                                <h4 class="text-xl font-semibold mb-2">Gerenciamento de Livros</h4>
                                <p class="text-gray-600">Organize e gerencie seu acervo de livros de forma eficiente.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Controle de Empréstimos -->
                    <div class="card-hover group min-w-[280px] sm:min-w-[320px] md:min-w-0 flex-shrink-0 snap-center">
                        <div class="bg-ceara-white p-6 rounded-lg h-full shadow-lg">
                            <div class="flex flex-col items-center text-center">
                                <div class="bg-ceara-green/10 p-4 rounded-full mb-4 group-hover:bg-ceara-green/20 transition-all">
                                    <i class="fas fa-users text-ceara-green text-3xl"></i>
                                </div>
                                <h4 class="text-xl font-semibold mb-2">Controle de Empréstimos</h4>
                                <p class="text-gray-600">Gerencie empréstimos e devoluções de livros.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Relatórios -->
                    <div class="card-hover group min-w-[280px] sm:min-w-[320px] md:min-w-0 flex-shrink-0 snap-center">
                        <div class="bg-ceara-white p-6 rounded-lg h-full shadow-lg">
                            <div class="flex flex-col items-center text-center">
                                <div class="bg-ceara-green/10 p-4 rounded-full mb-4 group-hover:bg-ceara-green/20 transition-all">
                                    <i class="fas fa-chart-line text-ceara-green text-3xl"></i>
                                </div>
                                <h4 class="text-xl font-semibold mb-2">Relatórios</h4>
                                <p class="text-gray-600">Gere relatórios detalhados para análise.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="manual" class="py-20 bg-ceara-white/50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-ceara-white rounded-xl p-8 lg:p-12 shadow-lg">
                <h3 class="text-3xl font-bold mb-8 text-center text-ceara-green">Manual do Sistema</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

                    <div class="flex justify-center">
                        <img src="https://i.postimg.cc/Zqh5yxqF/d5d74f48-13df-4fc8-864b-d9cae42b29d2.jpg"
                            alt="Interface do Sistema"
                            class="w-64 h-64 md:w-80 md:h-80" />
                    </div>


                    <div class="space-y-6">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <ol class="space-y-6 text-gray-600">
                                <li class="space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-plug text-ceara-green text-xl"></i>
                                        <strong class="font-semibold">1. Inicialização:</strong>
                                    </div>
                                    <p class="ml-8">Clique em <span class="bg-ceara-green text-white px-2 py-1 rounded">Começar agora</span> </p>
                                </li>

                                <li class="space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-tasks text-ceara-green text-xl"></i>
                                        <strong class="font-semibold">2. Seleção de Ação:</strong>
                                    </div>
                                    <p class="ml-8">Escolha entre:</p>
                                    <ul class="ml-12 space-y-3">
                                        <li>• <span class="font-medium">Cadastrar Gênero</span></li>
                                        <li>• <span class="font-medium">Cadastrar Livro</span></li>
                                    </ul>
                                </li>

                                <li class="space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-tag text-ceara-green text-xl"></i>
                                        <strong class="font-semibold">Cadastrar Gênero:</strong>
                                    </div>
                                    <ol class="ml-8 list-decimal space-y-2">
                                        <li>Selecione o gênero principal</li>
                                        <li>Insira o subgênero desejado</li>
                                        <li>Clique em <span class="bg-ceara-green text-white px-2 py-1 rounded text-sm">Cadastrar</span></li>
                                    </ol>
                                </li>

                                <li class="space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-book-open text-ceara-green text-xl"></i>
                                        <strong class="font-semibold">Cadastrar Livro:</strong>
                                    </div>
                                    <ol class="ml-8 list-decimal space-y-2">
                                        <li>Selecione o gênero e subgênero correspondentes</li>
                                        <li>Preencha todos os dados do livro</li>
                                        <li>Clique em <span class="bg-ceara-green text-white px-2 py-1 rounded text-sm">Enviar</span></li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    </section>



    <!-- Footer -->
    <footer id="footer" class="bg-ceara-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Logo e Descrição -->
                <div class="flex flex-col items-center md:items-start space-y-4">
                    <h1 class="text-3xl font-bold gradient-text" style="font-family: 'Anton', serif;">
                        Biblioteca
                    </h1>
                    <p class="text-gray-600 text-sm max-w-xs text-center md:text-left leading-relaxed">
                        Simplificando a gestão de bibliotecas com ferramentas eficientes.
                    </p>
                </div>

                <!-- Contato -->

            </div>

            <!-- Direitos Autorais -->
            <div class="border-t border-gray-200 mt-8 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-600 text-sm">&copy; 2025 Sistema Biblioteca. Todos os direitos reservados.</p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-gray-600 hover:text-ceara-orange text-sm transition-colors">Termos</a>
                        <span class="text-gray-400">•</span>
                        <a href="#" class="text-gray-600 hover:text-ceara-orange text-sm transition-colors">Privacidade</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>