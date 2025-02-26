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

    public function cadastrar_livros($nome, $sobrenome, $titulo, $data, $editora, $quantidade, $corredor, $estante, $prateleira)
    {

        $sql_check = $this->connect->prepare("SELECT * FROM $this->catalogo WHERE sobrenome_autor = :sobrenome_autor AND nome_autor = :nome_autor AND titulo_livro = :titulo_livro");

        $sql_check->bindValue(':sobrenome_autor', $sobrenome);
        $sql_check->bindValue(':nome_autor', $nome);
        $sql_check->bindValue(':titulo_livro', $titulo);
        $sql_check->execute();

        $livros = $sql_check->fetch(PDO::FETCH_ASSOC);
        if (count($livros) > 0) {

            $cadastro_livro = $this->connect->prepare("INSERT INTO $this->catalogo VALUES (NULL, :sobrenome_autor, :nome_autor, :titulo_livro, :ano_publicacao, :editora, :quantidade, :corredor, :estante, :prateleira)");

            $cadastro_livro->bindValue(':sobrenome_autor', $sobrenome);
            $cadastro_livro->bindValue(':nome_autor', $nome);
            $cadastro_livro->bindValue(':titulo_livro', $titulo);
            $cadastro_livro->bindValue(':ano_publicacao', $data);
            $cadastro_livro->bindValue(':editora', $editora);
            $cadastro_livro->bindValue(':quantidade', $quantidade);
            $cadastro_livro->bindValue(':corredor', $corredor);
            $cadastro_livro->bindValue(':estante', $estante);
            $cadastro_livro->bindValue(':prateleira', $prateleira);

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
}
