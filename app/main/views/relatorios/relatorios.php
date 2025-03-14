

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios Biblioteca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
    <style>
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
        
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .gradient-text {
            background: linear-gradient(45deg, #008C45, #FFA500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
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
                    primary: '#4CAF50',
                    secondary: '#FFB74D',
                }
            }
        }
    }
</script>
<body class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center p-4 sm:p-6 md:p-8 select-none" 
    style="background-image: url('../../assets/img/layout.png');">
    

    <a href="../../index.php" class="fixed top-5 left-5 z-50 group flex items-center space-x-2 bg-white/80 rounded-full px-4 py-2 shadow-lg hover:bg-ceara-green transition-all duration-300">
        <i class="fa-solid fa-arrow-left text-ceara-green group-hover:text-white"></i>
        <span class="text-ceara-green group-hover:text-white font-medium">Voltar</span>
    </a>


    <div class="glass-effect rounded-2xl shadow-2xl p-8 w-full max-w-lg transform transition-all duration-300 card-hover">

        <div class="text-center mb-10">
            <div class="mb-6">
                <i class="fas fa-book-reader text-5xl gradient-text"></i>
            </div>
            <h1 class="text-4xl font-bold mb-3 tracking-tight gradient-text">
                Relatórios Biblioteca
            </h1>
            <p class="text-gray-600 text-lg">
                Sistema de Gerenciamento de Relatórios
            </p>
        </div>

        <!-- Seletor de Relatório -->
        <div class="space-y-5">
            <div class="relative">
                <select id="relatorioSelect" 
                    class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-ceara-green focus:border-ceara-green appearance-none bg-white text-gray-700 cursor-pointer shadow-sm transition-all duration-300 ">
                    <option value="">Selecione o tipo de relatório</option>
                    <option value="./relatorio_acervo.php">Relatório de Acervos</option>
                </select>
                <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                    <i class="fas fa-chevron-down text-gray-400"></i>
                </div>
            </div>

           
        </div>

   
    </div>

  
    <script>
        document.getElementById('relatorioSelect').addEventListener('change', function() {
            if (this.value) {
                window.location.href = this.value;
            }
        });
    </script>
</body>
</html>