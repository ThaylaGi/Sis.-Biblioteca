<?php

require_once('../config/connect.php');

class main_model extends connect
{

    //atrivbutos
    private $catalogo;

    function __construct()
    {
        parent::__construct();
        $this->catalogo = "catalogo";
    }

    public function cadastrar_livros($nome, $sobrenome, $titulo, $data, $editora, $edicao, $quantidade, $corredor, $estante, $prateleira, $subgenero, $genero, $estrangeiro, $ficcao)
    {
        $sql_check = $this->connect->prepare("SELECT * FROM catalogo WHERE titulo_livro = :titulo AND ano_publicacao = :ano_publicacao AND editora = :editora AND edicao = :edicao");
        $sql_check->bindValue(':titulo', $titulo);
        $sql_check->bindValue(':ano_publicacao', $data);
        $sql_check->bindValue(':editora', $editora);
        $sql_check->bindValue(':edicao', $edicao);
        $sql_check->execute();
        $check = $sql_check->fetch(PDO::FETCH_ASSOC);

        if (empty($check)) {
            if ($genero == 0) {
                $sql_idsubgenero = $this->connect->query("SELECT id FROM subgenero WHERE subgenero = '$subgenero'");
                $id_subgenero = $sql_idsubgenero->fetch(PDO::FETCH_ASSOC);

                $sql_idgenero = $this->connect->query("SELECT id_genero FROM subgenero WHERE subgenero = '$subgenero'");
                $id_genero = $sql_idgenero->fetch(PDO::FETCH_ASSOC);

                $cadastro_livro = $this->connect->prepare("INSERT INTO $this->catalogo VALUES (null, :titulo_livro, :ano_publicacao, :editora, :edicao, :quantidade, :corredor, :estante, :prateleira, :genero, :subgenero, :ficcao, :estrangeiro)");

                $cadastro_livro->bindValue(':titulo_livro', $titulo);
                $cadastro_livro->bindValue(':ano_publicacao', $data);
                $cadastro_livro->bindValue(':editora', $editora);
                $cadastro_livro->bindValue(':edicao', $edicao);
                $cadastro_livro->bindValue(':quantidade', $quantidade);
                $cadastro_livro->bindValue(':corredor', $corredor);
                $cadastro_livro->bindValue(':estante', $estante);
                $cadastro_livro->bindValue(':prateleira', $prateleira);
                $cadastro_livro->bindValue(':genero', $id_genero['id_genero']);
                $cadastro_livro->bindValue(':subgenero', $id_subgenero['id']);
                $cadastro_livro->bindValue(':ficcao', $ficcao);
                $cadastro_livro->bindValue(':estrangeiro', $estrangeiro);

                $cadastro_livro->execute();


                $sql_id_livro = $this->connect->prepare("SELECT id FROM catalogo WHERE titulo_livro = :titulo AND ano_publicacao = :ano_publicacao AND editora = :editora AND edicao = :edicao");
                $sql_id_livro->bindValue(':titulo', $titulo);
                $sql_id_livro->bindValue(':ano_publicacao', $data);
                $sql_id_livro->bindValue(':editora', $editora);
                $sql_id_livro->bindValue(':edicao', $edicao);
                $sql_id_livro->execute();
                $id_livro = $sql_id_livro->fetch(PDO::FETCH_ASSOC);

                $tamanho_array = count($nome) - 1;
                for ($x = 0; $x <= $tamanho_array; $x++) {

                    $nome_array = $nome[$x];
                    $sobrenome_array = $sobrenome[$x];
                    $sql_autor = $this->connect->prepare("INSERT INTO autores VALUES(NULL, :nome_autor, :sobrenome_autor, :id_livro)");

                    $sql_autor->bindValue(':nome_autor', $nome_array);
                    $sql_autor->bindValue(':sobrenome_autor', $sobrenome_array);
                    $sql_autor->bindValue(':id_livro', $id_livro['id']);
                    $sql_autor->execute();
                }

                if ($cadastro_livro && $sql_autor) {
                    return 1;
                } else {
                    return 2;
                }
            } else if ($subgenero == 0) {
                $sql_id_genero = $this->connect->query("SELECT id FROM genero WHERE generos = '$genero'");
                $id_genero = $sql_id_genero->fetch(PDO::FETCH_ASSOC);

                $cadastro_livro = $this->connect->prepare("INSERT INTO $this->catalogo VALUES (null, :titulo_livro, :ano_publicacao, :editora, :quantidade, :corredor, :estante, :prateleira, :genero, NULL, :ficcao, :estrangeiro)");

                $cadastro_livro->bindValue(':titulo_livro', $titulo);
                $cadastro_livro->bindValue(':ano_publicacao', $data);
                $cadastro_livro->bindValue(':editora', $editora);
                $cadastro_livro->bindValue(':quantidade', $quantidade);
                $cadastro_livro->bindValue(':corredor', $corredor);
                $cadastro_livro->bindValue(':estante', $estante);
                $cadastro_livro->bindValue(':prateleira', $prateleira);
                $cadastro_livro->bindValue(':genero', $id_genero['id']);
                $cadastro_livro->bindValue(':ficcao', $ficcao);
                $cadastro_livro->bindValue(':estrangeiro', $estrangeiro);

                $cadastro_livro->execute();


                $sql_id_livro = $this->connect->prepare("SELECT id FROM catalogo WHERE titulo_livro = :titulo");
                $sql_id_livro->bindValue(':titulo', $titulo);
                $sql_id_livro->execute();
                $id_livro = $sql_id_livro->fetch(PDO::FETCH_ASSOC);

                $tamanho_array = count($nome) - 1;
                for ($x = 0; $x <= $tamanho_array; $x++) {

                    $nome_array = $nome[$x];
                    $sobrenome_array = $sobrenome[$x];
                    $sql_autor = $this->connect->prepare("INSERT INTO autores VALUES(NULL, :nome_autor, :sobrenome_autor, :id_livro)");

                    $sql_autor->bindValue(':nome_autor', $nome_array);
                    $sql_autor->bindValue(':sobrenome_autor', $sobrenome_array);
                    $sql_autor->bindValue(':id_livro', $id_livro['id']);
                    $sql_autor->execute();
                }

                if ($cadastro_livro && $sql_autor) {
                    return 1;
                } else {
                    return 2;
                }
            }
        } else {
            return 3;
        }
    }

    public function cadastrar_subgenero($genero, $subgenero)
    {

        $sql_idgenero = $this->connect->prepare("SELECT id FROM genero WHERE generos = :generos");
        $sql_idgenero->bindValue(':generos', $genero);
        $sql_idgenero->execute();
        $id_genero = $sql_idgenero->fetch(PDO::FETCH_ASSOC);

        $sql_check = $this->connect->prepare("SELECT * FROM subgenero WHERE subgenero = :subgenero AND id_genero = :id_genero");
        $sql_check->bindValue(':subgenero', $subgenero);
        $sql_check->bindValue(':id_genero', $id_genero['id']);
        $sql_check->execute();

        $subgeneros = $sql_check->fetch(PDO::FETCH_ASSOC);
        if (empty($subgeneros)) {

            $sql_genero = $this->connect->prepare("INSERT INTO subgenero VALUES (NULL, :subgenero, :id_genero)");
            $sql_genero->bindValue(':subgenero', $subgenero);
            $sql_genero->bindValue(':id_genero', $id_genero['id']);
            $sql_genero->execute();

            if ($sql_genero) {

                return 1;
            } else {
                return 2;
            }
        } else {

            return 3;
        }
    }

    public function cadastrar_genero($nome_genero)
    {

        $sql_check = $this->connect->prepare("SELECT * FROM genero WHERE  generos = :genero");
        $sql_check->bindValue(':genero', $nome_genero);
        $sql_check->execute();

        $generos = $sql_check->fetch(PDO::FETCH_ASSOC);
        if (empty($generos)) {

            $sql_genero = $this->connect->prepare("INSERT INTO genero VALUES (NULL, :novo_genero)");
            $sql_genero->bindValue(':novo_genero', $nome_genero);
            $sql_genero->execute();

            if ($sql_genero) {

                return 1;
            } else {
                return 2;
            }
        } else {

            return 3;
        }
    }
}
