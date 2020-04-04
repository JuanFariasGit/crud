<?php
include_once "inc/check_login.php";

if($logarDao->checkLogin()):
    include_once "inc/header.php";
    $pessoa    = new App\Model\Pessoa();
    $pessoaDao = new App\Model\PessoaDaoMysql(); 
?>
<form action="./action_pessoa?option=create" method="post">
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
                    <a href="http://<?= $_SERVER['HTTP_HOST']; ?>/crud/edit&id=<?= $p['id']; ?>">Editar</a>
                    <a href="http://<?= $_SERVER['HTTP_HOST']; ?>/crud/action_pessoa?option=delete&id=<?= $p['id']; ?>">Deletar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
else:
    die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud/login"));
endif;     
include_once "inc/footer.php"; 
?>     