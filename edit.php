<?php
include_once "inc/header.php";
if($logarDao->checkLogin()):
    $pessoa    = new App\Model\Pessoa();
    $pessoaDao = new App\Model\PessoaDaoMysql(); 
?>
<form action="./action_pessoa?option=2" method="post">
    <div class="container">
        <h1>CADASTRO DE PESSOA</h1>
        <?php foreach($pessoaDao->findById($_REQUEST['id']) as $p): ?>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?= $p['cpf']; ?>">
        <label for="nome">NOME:</label>
        <input type="text" name="nome" id="nome" value="<?= $p['nome']; ?>">
        <input type="hidden" name="id" value="<?= $_REQUEST['id'];?>">
        <?php endforeach; ?>
        <input type="submit" value="SALVAR">
    </div>    
</form>
<?php
else:
    die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud/login"));
endif;     
include_once "inc/footer.php"; 
?>    