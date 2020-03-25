<?php
namespace App\Model;

class Pessoa 
{
    private $id;
    private $cpf;
    private $nome;

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function getId() 
    {
        return $this->id;
    }

    public function setCpf($cpf) 
    {
        $this->cpf = $cpf;
    }

    public function getCpf() 
    {
        return $this->cpf;
    }

    public function setNome($nome) 
    {
        $this->nome = $nome;
    }

    public function getNome() 
    {
        return $this->nome;
    }
    
}

interface PessoaDao {
    public function create(Pessoa $p);
    public function findAll();
    public function findById($id);
    public function update(Pessoa $p);
    public function delete($id);
}

