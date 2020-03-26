<?php
require_once "vendor/autoload.php";

$pessoa    = new App\Model\Pessoa;
$pessoaDao = new App\Model\PessoaDaoMysql;

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $pessoa->setId($_REQUEST['id']);
    $pessoa->setCpf($_REQUEST['cpf']);
    $pessoa->setNome($_REQUEST['nome']);

    $pessoaDao->update($pessoa);
    
    die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud"));
}
?>

<?php include_once "inc/header.php"; ?>
    <form method="post">
        <div class="container">
            <h1>CADASTRO DE PESSOA</h1>
            <?php foreach($pessoaDao->findById($_REQUEST['id']) as $p): ?>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="<?= $p['cpf']; ?>">
            <label for="nome">NOME:</label>
            <input type="text" name="nome" id="nome" value="<?= $p['nome']; ?>">
            <?php endforeach; ?>
            <input type="submit" value="SALVAR">
        </div>    
    </form>
<?php include_once "inc/footer.php"; ?>    