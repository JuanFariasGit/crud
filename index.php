<?php
require_once "vendor/autoload.php";

$pessoa    = new App\Model\Pessoa;
$pessoaDao = new App\Model\PessoaDaoMysql;

if($_SERVER['REQUEST_METHOD'] == "POST"):

    $pessoa->setCpf($_REQUEST['cpf']);
    $pessoa->setNome($_REQUEST['nome']);

    $pessoaDao->create($pessoa);
    
    header("Location: index.php");

endif
?>

<?php include_once "inc/header.php"; ?>
    <form method="post">
        <div class="container">
            <h1>CADASTRO DE PESSOA</h1>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf">
            <label for="nome">NOME:</label>
            <input type="text" name="nome" id="nome">
            <input type="submit" value="CADASTRAR">
        </div>    
    </form>
    <div class="container-table">
        <table width="100%">
            <thead>
                <tr>
                    <th scope="col">CPF</th>
                    <th scope="col">NOME</th>
                    <th scope="col">AÇÕES</th>
                </tr>    
            </thead>
            <tbody>
                <?php foreach($pessoaDao->findAll() as $p): ?>
                <tr>
                    <td><?= $p['cpf']; ?></td>
                    <td><?= $p['nome']; ?></td>
                    <td>
                        <a href="<?= BASE_URL; ?>edit.php?id=<?= $p['id'];?>">Editar</a>
                        <a href="<?= BASE_URL; ?>del.php?id=<?= $p['id'];?>">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php include_once "inc/footer.php"; ?>    