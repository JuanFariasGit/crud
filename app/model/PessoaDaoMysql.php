<?php
declare(strict_types=1);

namespace App\Model;

class PessoaDaoMysql implements PessoaDao 
{
    public function create(Pessoa $p) : void
    {
        $query  = "INSERT INTO pessoa (cpf,nome) VALUES (?,?)";
        $stmt = Conexao::Con()->prepare($query);
        $stmt->bindValue(1, $p->getCpf());
        $stmt->bindValue(2, $p->getNome());
        $stmt->execute();
    }

    public function findAll() : array
    {
        $array = [];

        $query = "SELECT * FROM pessoa";
        $stmt = Conexao::Con()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function findById($id) : array
    {
        $array = [];
        
        $query = "SELECT * FROM pessoa WHERE id = ?";
        $stmt = Conexao::Con()->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function update(Pessoa $p) : void
    {
        $query  = "UPDATE pessoa SET cpf = ?, nome = ? WHERE id = ?";
        $stmt = Conexao::Con()->prepare($query);
        $stmt->bindValue(1, $p->getCpf());
        $stmt->bindValue(2, $p->getNome());
        $stmt->bindValue(3, $p->getId());
        $stmt->execute();
    }

    public function delete($id) : void
    {
        $query  = "DELETE FROM pessoa WHERE id = ?";
        $stmt = Conexao::Con()->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
    
}

