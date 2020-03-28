<?php
    session_start();
    require_once "vendor/autoload.php";
    
    $logar = new App\Model\Logar();
    $logarDao = new App\Model\LogarDaoMysql();
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $logar->setEmail($_REQUEST['email']);
        $logar->setSenha($_REQUEST['senha']);
        
        if($logarDao->login($logar)) {
            die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud"));
        } else {
            die(header("Location: http://".$_SERVER['HTTP_HOST']."/crud/login"));
        }
    }
    
    $logarDao->logout();
?>

<?php include_once "inc/header.php"; ?>
    <form method="POST">
        <div class="container">
            <label for="email">E-MAIL:</label>
            <input type="text" name="email" id="email">
            <label for="senha">SENHA:</label>
            <input type="password" name="senha" id="senha">
            <input type="submit" value="ENTRAR">
        </div>
    </form>
<?php include_once "inc/footer.php"; ?>