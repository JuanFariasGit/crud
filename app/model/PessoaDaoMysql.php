<?php
declare(strict_types=1);

namespace App\Model;

class PessoaDaoMysql implements PessoaDao 
{
    public function create(Pessoa $p) : void
    {
        $sql  = "INSERT INTO pessoa (cpf,nome) VALUES (?,?)";
        $stmt = Conexao::Con()->prepare($sql);
        $stmt->bindValue(1, $p->getCpf());
        $stmt->bindValue(2, $p->getNome());
        $stmt->execute();
    }

    public function findAll(int $inicio, int $limite) : array
    {
        $array = [];

        $sql = "SELECT * FROM pessoa ORDER BY id DESC LIMIT $inicio, $limite";
        $stmt = Conexao::Con()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function numTotalPessoas() : int
    {
        $sql = "SELECT COUNT(*) AS c FROM pessoa";
        $stmt = Conexao::Con()->prepare($sql);
        $stmt->execute();
        
        $num = $stmt->fetch(\PDO::FETCH_ASSOC);
        return intval($num['c']);
    }

    public function findById(string $id) : array
    {
        $array = [];
        
        $sql = "SELECT * FROM pessoa WHERE id = ?";
        $stmt = Conexao::Con()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function update(Pessoa $p) : void
    {
        $sql  = "UPDATE pessoa SET cpf = ?, nome = ? WHERE id = ?";
        $stmt = Conexao::Con()->prepare($sql);
        $stmt->bindValue(1, $p->getCpf());
        $stmt->bindValue(2, $p->getNome());
        $stmt->bindValue(3, $p->getId());
        $stmt->execute();
    }

    public function delete(string $id) : void
    {
        $sql  = "DELETE FROM pessoa WHERE id = ?";
        $stmt = Conexao::Con()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }    
}

