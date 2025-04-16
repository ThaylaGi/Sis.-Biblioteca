
<?php
include_once("../../models/select_model.php");

$result = new select_model();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios Biblioteca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
        .btn-gradient {
            background: linear-gradient(45deg, #008C45, #FFA500);
            transition: all 0.4s ease;
        }
        .btn-gradient:hover {
            background: linear-gradient(45deg, #006633, #FF8C00);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 140, 69, 0.3);
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            padding: 0.75rem;
            background-color: #fff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #374151;
        }
        input:focus, select:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 140, 69, 0.2);
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
<body class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center p-6 sm:p-8 md:p-12 select-none"
    style="background-image: url('../../assets/img/layout.png');">
    <a href="decisao.php" class="fixed top-5 left-5 z-50 group flex items-center space-x-2 bg-white/80 rounded-full px-4 py-2 shadow-lg hover:bg-ceara-green transition-all duration-300">
        <i class="fa-solid fa-arrow-left text-ceara-green group-hover:text-white"></i>
        <span class="text-ceara-green group-hover:text-white font-medium">Voltar</span>
    </a>
    <div class="glass-effect rounded-2xl shadow-2xl p-10 w-full max-w-lg transform transition-all duration-300 card-hover">
        <div class="text-center mb-10">
            <div class="mb-6">
                <i class="fas fa-book-reader text-5xl gradient-text"></i>
            </div>
            <h1 class="text-4xl font-bold mb-3 tracking-tight gradient-text">
                Gerar QRCode
            </h1>
            <p class="text-gray-600 text-lg">
                Sistema de Gerenciamento de QRCode
            </p>
        </div>
        <!-- Mensagens de erro -->
        <?php if (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
            <div class="flex items-center p-4 mb-4 text-red-800 border-l-4 border-red-500 bg-red-50 rounded-md" role="alert">
                <i class="fas fa-exclamation-circle text-xl mr-3"></i>
                <span class="text-sm font-medium">Por favor, selecione um tipo de relatório!</span>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['erro']) && $_GET['erro'] == 2): ?>
            <div class="flex items-center p-4 mb-4 text-red-800 border-l-4 border-red-500 bg-red-50 rounded-md" role="alert">
                <i class="fas fa-exclamation-circle text-xl mr-3"></i>
                <span class="text-sm font-medium">Tipo de relatório inválido!</span>
            </div>
        <?php endif; ?>
        <form action="../../controllers/main_controller.php" method="post" class="space-y-6" id="qrForm">
            <div id="livrosContainer" class="space-y-4">
                <!-- Primeiro conjunto de campos -->
                <div class="livro-group flex flex-col space-y-4">
                    <div class="relative">
                        <label for="titulo_0" class="block text-sm font-medium text-gray-700 mb-1">
                            Nome do Livro
                        </label>
                        <select id="titulo_0" name="titulo[]" class="js-example-basic-single w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-ceara-green focus:border-ceara-green bg-white text-gray-700 shadow-sm transition-all duration-300" required>
                            <option value="" disabled selected>Selecione um livro</option>
                            <?php
                            $nomes = $result->select_nome_livro();
                            foreach ($nomes as $nome) {
                            ?>
                                <option value="<?= htmlspecialchars($nome['titulo_livro']) ?>"><?= htmlspecialchars($nome['titulo_livro']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="relative">
                        <label for="quantidade_0" class="block text-sm font-medium text-gray-700 mb-1">
                            Quantidade
                        </label>
                        <input type="number" id="quantidade_0" name="quantidade[]" min="1" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-ceara-green focus:border-ceara-green bg-white text-gray-700 shadow-sm transition-all duration-300" placeholder="Digite a quantidade" required>
                    </div>
                </div>
            </div>
            <!-- Botão para adicionar mais livros -->
            <button type="button" id="addLivro" class="w-full bg-ceara-green text-white py-2 rounded-lg font-medium flex items-center justify-center space-x-2 hover:bg-ceara-orange transition-all duration-300">
                <i class="fas fa-plus"></i>
                <span>Adicionar outro livro</span>
            </button>
            <!-- Botão de submissão -->
            <button type="submit" class="w-full btn-gradient text-white py-3 rounded-lg font-medium flex items-center justify-center space-x-2 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-file-alt"></i>
                <span>Gerar QR Code</span>
            </button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            // Inicializar Select2 nos selects existentes
            $('.js-example-basic-single').select2();

            // Contador para IDs únicos
            let livroCount = 1;

            // Adicionar novo conjunto de campos
            $('#addLivro').click(function() {
                const livroGroup = `
                    <div class="livro-group flex flex-col space-y-4 mt-4">
                        <div class="relative">
                            <label for="titulo_${livroCount}" class="block text-sm font-medium text-gray-700 mb-1">
                                Nome do Livro
                            </label>
                            <select id="titulo_${livroCount}" name="titulo[]" class="js-example-basic-single w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-ceara-green focus:border-ceara-green bg-white text-gray-700 shadow-sm transition-all duration-300" required>
                                <option value="" disabled selected>Selecione um livro</option>
                                <?php
                                $nomes = $result->select_nome_livro();
                                foreach ($nomes as $nome) {
                                ?>
                                    <option value="<?= htmlspecialchars($nome['titulo_livro']) ?>"><?= htmlspecialchars($nome['titulo_livro']) ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="relative">
                            <label for="quantidade_${livroCount}" class="block text-sm font-medium text-gray-700 mb-1">
                                Quantidade
                            </label>
                            <input type="number" id="quantidade_${livroCount}" name="quantidade[]" min="1" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-ceara-green focus:border-ceara-green bg-white text-gray-700 shadow-sm transition-all duration-300" placeholder="Digite a quantidade" required>
                        </div>
                        <button type="button" class="remove-livro text-red-500 hover:text-red-700 flex items-center space-x-1">
                            <i class="fas fa-trash"></i>
                            <span>Remover</span>
                        </button>
                    </div>`;
                $('#livrosContainer').append(livroGroup);
                // Inicializar Select2 no novo select
                $(`#titulo_${livroCount}`).select2();
                livroCount++;
            });

            // Remover conjunto de campos
            $(document).on('click', '.remove-livro', function() {
                $(this).closest('.livro-group').remove();
            });
        });
    </script>
</body>
</html>