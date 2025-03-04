<?php

require_once('../config/connect.php');

class select_model extends connect
{

    private $catalogo;

    function __construct()
    {
        parent::__construct();
        $this->catalogo = "catalogo";
    }

    public function select_subgenero($genero)
    {

        $sql_idgenero = $this->connect->query("SELECT id FROM genero WHERE generos = '$genero'");
        $id_generos = $sql_idgenero->fetch(PDO::FETCH_ASSOC);
        $id_genero = $id_generos['id'];
        $select_subgenero = $this->connect->query("SELECT subgenero FROM subgenero WHERE id_genero = '$id_genero'");
        $nome_subgenero = $select_subgenero->fetchAll(PDO::FETCH_ASSOC);

        return $nome_subgenero;
    }

    public function select_genero()
    {
        $sql_genero = $this->connect->query("SELECT generos FROM genero");
        $generos = $sql_genero->fetchAll(PDO::FETCH_ASSOC);

        return $generos;
    }
    public function select_livros()
    {

        $sql_livro = $this->connect->query("SELECT * FROM catalogo");
        $livros = $sql_livro->fetchAll(PDO::FETCH_ASSOC);
        return $livros;
    }
    public function select_autores($id_livro)
    {
        //$sql_autor_livro = $this->connect->query("SELECT nome_autor, sobrenome_autor FROM autores WHERE id_livro = 21 ORDER BY id_livro;");
        $sql_autor_livro = $this->connect->query("SELECT nome_autor, sobrenome_autor FROM autores WHERE id_livro = '$id_livro'");
        $nome_sobrenome = $sql_autor_livro->fetch(PDO::FETCH_ASSOC);

        return $nome_sobrenome;
    }

    public function select_genero_subgenero($id_genero)
    {
        $sql_genero_livro = $this->connect->query("SELECT * FROM genero WHERE id = '$id_genero'");
        $array_genero = $sql_genero_livro->fetchAll(PDO::FETCH_ASSOC);
        $dados = [];
        foreach ($array_genero as $genero) {
            $id_genero = $genero['id'];
            $genero = $genero['generos'];

            $sql_subgenero_livro = $this->connect->query("SELECT subgenero FROM subgenero WHERE id_genero = '$id_genero'");
            $array_subgenero = $sql_subgenero_livro->fetch(PDO::FETCH_ASSOC);
            $subgenero = $array_subgenero['subgenero'];
            array_push($dados, $genero);
            array_push($dados, $subgenero);
        }
        return $dados;
    }
}
