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

    /*public function select_livros()
    {
        $sql_livros = $this->connect->query("SELECT * FROM catalogo");
        $livros = $sql_livros->fetchAll(PDO::FETCH_ASSOC);

        $dados = [['id'], ['titulo'], ['nome_autor'], ['sobrenome_autor'], ['data'], ['editora'], ['corredor'], ['estante'], ['pratileira'], ['genero'], ['subgenero'], ['ficcao'], ['estrangeiro'], ['quantidade']];
        $autor = 0;
        foreach ($livros as $livro) {

            $id_livro = $livro['id'];
            $sql_autor_livro = $this->connect->query("SELECT nome_autor, sobrenome_autor FROM autores WHERE id_livro = '$id_livro'");
            $nome_sobrenome = $sql_autor_livro->fetch(PDO::FETCH_ASSOC);
            $nome_autor = $nome_sobrenome['nome_autor'];
            $sobrenome_autor = $nome_sobrenome['sobrenome_autor'];

            $id_genero = $livro['id_genero'];
            $id_subgenero = $livro['id_subgenero'];
            $sql_genero_livro = $this->connect->query("SELECT * FROM genero WHERE id = '$id_genero'");
            $array_id_genero = $sql_genero_livro->fetch(PDO::FETCH_ASSOC);
            $genero = $array_id_genero['generos'];

            $id_genero = $array_id_genero['id'];

            $sql_subgenero_livro = $this->connect->query("SELECT subgenero FROM subgenero WHERE id_genero = '$id_genero'");
            $array_subgenero = $sql_subgenero_livro->fetch(PDO::FETCH_ASSOC);
            $subgenero = $array_subgenero['subgenero'];

            $dados[0] = [$dados, $livro['id'], $livro['titulo'], $nome_autor, $sobrenome_autor, $livro['ano_publicacao'], $livro['editora'], $livro['corredor'], $livro['estante'], $livro['pratileira'], $genero, $subgenero, $livro['ficcao'], $livro['estrangeiro'], $livro['quantidade']];
        }
        return $dados;
    }*/

    public function select_livros()
    {

        $sql_livro = $this->connect->query("SELECT * FROM catalogo");
        $livros = $sql_livro->fetchAll(PDO::FETCH_ASSOC);
        return $livros;
    }
    public function select_autores($id_livro)
    {
        $sql_autor_livro = $this->connect->query("SELECT nome_autor, sobrenome_autor FROM autores WHERE id_livro = 21 ORDER BY id_livro;");

        return $nome_sobrenome = $sql_autor_livro->fetch(PDO::FETCH_ASSOC);
    }

    public function select_genero_subgenero($id_genero)
    {
        $sql_genero_livro = $this->connect->query("SELECT * FROM genero WHERE id = '$id_genero'");
        $array_genero = $sql_genero_livro->fetch(PDO::FETCH_ASSOC);
        $id_genero = $array_genero['id'];
        $genero = $array_genero['generos'];

        $sql_subgenero_livro = $this->connect->query("SELECT subgenero FROM subgenero WHERE id_genero = '$id_genero'");
        $array_subgenero = $sql_subgenero_livro->fetch(PDO::FETCH_ASSOC);
        $subgenero = $array_subgenero['subgenero'];

        $dados = [];
        array_push($dados, $genero);
        array_push($dados, $subgenero);
        return $dados;
    }
}
