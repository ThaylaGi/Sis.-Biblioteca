<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">
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

    <nav class="fixed w-full bg-ceara-white/90 backdrop-blur-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl sm:text-3xl font-bold title-glow" style="font-family: 'Anton', serif;">
                        Biblioteca</h1>
                </div>

           
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#features" class="hover:text-ceara-orange transition-colors">
                        <i class="fas fa-tools mr-2"></i>Recursos
                    </a>

                    <a href="#footer" class="hover:text-ceara-orange transition-colors">
                        <i class="fas fa-info-circle mr-2"></i>Sobre
                    </a>

                </div>

               
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-800 p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <div class="flex flex-col space-y-4">
                    <a href="#footer" class="hover:text-ceara-orange transition-colors px-4 py-2">
                        <i class="fas fa-info-circle mr-2"></i>Sobre
                    </a>

                    <a href="#features" class="hover:text-ceara-orange transition-colors px-4 py-2">
                        <i class="fas fa-tools mr-2"></i>Recursos
                    </a>
                </div>
            </div>
        </div>
    </nav>

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
                <a href=""
                    class="inline-block bg-ceara-green px-6 sm:px-8 py-3 sm:py-4 rounded-lg text-base sm:text-lg font-semibold hover:bg-opacity-90 transition-all transform hover:scale-105 text-ceara-white">
                    Manual do usuário
                </a>
            </div>
        </div>
    </section>

    <section id="features" class="py-16 md:py-20 bg-ceara-white/50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 ">
            <h3 class="text-2xl md:text-3xl font-bold text-center mb-12 text-ceara-green">Recursos Principais</h3>

 
            <div class="relative">
                <div
                    class="cards-container flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 overflow-x-auto snap-x snap-mandatory hide-scrollbar">
             
                    <div class="card-hover group min-w-[280px] sm:min-w-[320px] md:min-w-0 flex-shrink-0 snap-center">
                        <div class="bg-ceara-white p-6 rounded-lg h-full shadow-lg">
                            <a href="./views/decisão.php">
                                <div class="flex flex-col items-center text-center ">

                                    <div
                                        class="bg-ceara-green/10 p-4 rounded-full mb-4 group-hover:bg-ceara-green/20 transition-all">
                                        <i class="fas fa-book text-ceara-green text-3xl"></i>
                                    </div>
                                    <h4 class="text-xl font-semibold mb-2">Gerenciamento de Cadastros</h4>
                                    <p class="text-gray-600">Cadastre seus livros de forma eficiente.</p>


                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="card-hover group min-w-[280px] sm:min-w-[320px] md:min-w-0 flex-shrink-0 snap-center">
                        <div class="bg-ceara-white p-6 rounded-lg h-full shadow-lg">
                            <div class="flex flex-col items-center text-center">
                                <div
                                    class="bg-ceara-green/10 p-4 rounded-full mb-4 group-hover:bg-ceara-green/20 transition-all">
                                    <i class="fas fa-users text-ceara-green text-3xl"></i>
                                </div>
                                <h4 class="text-xl font-semibold mb-2">Gerenciamento de Empréstimos</h4>
                                <p class="text-gray-600">Gerencie empréstimos e devoluções de livros.</p>
                            </div>
                        </div>
                    </div>

            
                    <div class="card-hover group min-w-[280px] sm:min-w-[320px] md:min-w-0 flex-shrink-0 snap-center">
                        <div class="bg-ceara-white p-6 rounded-lg h-full shadow-lg">
                        <a href="views/relatorios/relatorios.php">
                            <div class="flex flex-col items-center text-center">
                                <div
                                    class="bg-ceara-green/10 p-4 rounded-full mb-4 group-hover:bg-ceara-green/20 transition-all">
                                    <i class="fas fa-chart-line text-ceara-green text-3xl"></i>
                                    
                                   
                                    
                                </div>
                                <h4 class="text-xl font-semibold mb-2">Relatórios</h4>
                                <p class="text-gray-600">Gere relatórios detalhados para análise.</p>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <footer id="footer" class="bg-ceara-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    
                <div class="flex flex-col items-center md:items-start space-y-4">
                    <h1 class="text-3xl font-bold gradient-text" style="font-family: 'Anton', serif;">
                        Biblioteca
                    </h1>
                    <p class="text-gray-600 text-sm max-w-xs text-center md:text-left leading-relaxed">
                        Simplificando a gestão de bibliotecas com ferramentas eficientes.
                    </p>
                </div>

            </div>

   
            <div class="border-t border-gray-200 mt-8 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-600 text-sm">&copy; 2025 Sistema Biblioteca. Todos os direitos reservados.</p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-gray-600 hover:text-ceara-orange text-sm transition-colors">Termos</a>
                        <span class="text-gray-400">•</span>
                        <a href="#"
                            class="text-gray-600 hover:text-ceara-orange text-sm transition-colors">Privacidade</a>
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