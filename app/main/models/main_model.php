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

    public function cadastrar_livros($nome, $sobrenome, $titulo, $data, $editora, $quantidade, $corredor, $estante, $prateleira, $subgenero)
    {
        $sql_check = $this->connect->prepare("SELECT * FROM $this->catalogo WHERE titulo_livro = :titulo_livro");

        $sql_check->bindValue(':titulo_livro', $titulo);
        $sql_check->execute();

        $livros = $sql_check->fetch(PDO::FETCH_ASSOC);
        if (empty($livros)) {

            $sql_idsubgenero = $this->connect->query("SELECT id FROM subgenero WHERE subgenero = '$subgenero'");
            $id_subgenero = $sql_idsubgenero->fetch(PDO::FETCH_ASSOC);

            $sql_idgenero = $this->connect->query("SELECT id_genero FROM subgenero WHERE subgenero = '$subgenero'");
            $id_genero= $sql_idgenero->fetch(PDO::FETCH_ASSOC);


            $cadastro_livro = $this->connect->prepare("INSERT INTO $this->catalogo VALUES (null, :sobrenome_autor, :nome_autor, :titulo_livro, :ano_publicacao, :editora, :quantidade, :corredor, :estante, :prateleira, :genero, :subgenero)");

            $cadastro_livro->bindValue(':sobrenome_autor', $sobrenome);
            $cadastro_livro->bindValue(':nome_autor', $nome);
            $cadastro_livro->bindValue(':titulo_livro', $titulo);
            $cadastro_livro->bindValue(':ano_publicacao', $data);
            $cadastro_livro->bindValue(':editora', $editora);
            $cadastro_livro->bindValue(':quantidade', $quantidade);
            $cadastro_livro->bindValue(':corredor', $corredor);
            $cadastro_livro->bindValue(':estante', $estante);
            $cadastro_livro->bindValue(':prateleira', $prateleira);
            $cadastro_livro->bindValue(':genero', $id_genero['id_genero']);
            $cadastro_livro->bindValue(':subgenero', $id_subgenero['id']);

            $cadastro_livro->execute();

            if ($cadastro_livro) {
                return 1;
            } else {
                return 2;
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

    public function cadastrar_genero($nome_genero){

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
