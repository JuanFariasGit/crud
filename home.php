<?php
include_once "inc/check_login.php";

if($logarDao->checkLogin()):
    include_once "inc/header.php";
    $pessoa    = new App\Model\Pessoa();
    $pessoaDao = new App\Model\PessoaDaoMysql(); 
?>
<div style="display: flex; justify-content: space-around; align-items: center">
    <h2>GRUD</h2>
    <a href="http://<?= $_SERVER['HTTP_HOST'].'/'.explode('/', $_SERVER['REQUEST_URI'])[1]; ?>/action_login/logout">Sair</a>
</div>    
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
<div id="lista_pessoas" class="container-table"></div>
<?php
else:
    die(header("Location: http://".$_SERVER['HTTP_HOST']."/".explode('/', $_SERVER['REQUEST_URI'])[1]."/login"));
endif;     
include_once "inc/footer.php"; 
?>     