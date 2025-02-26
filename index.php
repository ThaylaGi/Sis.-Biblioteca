<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Biblioteca</title>
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

<body>

    <form action="#" method="post" class="" class="items-center justify-center justify-items-center">

        <div class=" bg-[#007A33] w-[500px] h-[450px]  rounded-xl  flex  grid grid-cols-2 gap-2 ">


          


            <input type="text" id="nome" name="nome" class="border-gray-200 border-2 w-[200px] h-[30px] m-4 focus:outline-none" placeholder="Nome completo" required>


            <input type="text" id="titulo" name="titulo" class="border-gray-200 border-2 w-[200px] h-[30px] my-[-40px] m-4 focus:outline-none" placeholder="Titulo" required>



            <input type="text" id="ano" name="ano" class="border-gray-200 border-2 w-[200px] h-[30px] my-[-40px] m-4 focus:outline-none " placeholder="Data atual" required>


            <input type="text" id="editora" name="editora" class="border-gray-200 border-2 w-[200px] h-[30px] my-[-40px] m-4 focus:outline-none" placeholder="Editora" required>


            <input type="number" id="quantidade" name="quantidade" min="1" class="border-gray-200 border-2 w-[200px] h-[30px] my-[-40px] m-4 focus:outline-none" placeholder="Quantidade de livros" required>

            <button type="submit" class="w-[200px] rounded-xl h-[40px] bg-[#FFA500] hover:bg-[#FFB74D] transition ease-in-out 300ms items-center justify-center flex text-center"><i class="fa-solid fa-right-to-bracket mx-4 text-center"></i> Enviar</button>

        </div>



    </form>



</body>

</html>