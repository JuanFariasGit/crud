<?php
declare(strict_types=1);

namespace App\Model;

class Pessoa 
{
    /** 
     * @var string
     */ 
    private $id;
    /** 
     * @var string  
    */
    private $cpf;
    /** 
     * @var string  
    */
    private $nome;
            
    public function getId() : string
    {
        return $this->id;
    }

    public function getCpf() : string
    {
        return $this->cpf;
    }

    public function getNome() : string
    {
        return $this->nome;
    }

    public function setId(string $id) : void
    {
        $this->id = $id;
    }

    public function setCpf(string $cpf) : void
    {
        $this->cpf = $cpf;
    }

    public function setNome(string $nome) : void
    {
        $this->nome = $nome;
    }

}

interface PessoaDao 
{
    public function create(Pessoa $p) : void;
    public function findAll() : array;
    public function findById($id) : array;
    public function update(Pessoa $p) : void;
    public function delete($id) : void;
}

