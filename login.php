<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST']; ?>/crud/assets/css/style.css">
    <title>PHP Da Maneira Certa - CRUD</title>
</head>
<body>
    <form action="./action_login" method="post">
        <div class="container">
            <label for="email">E-MAIL:</label>
            <input type="text" name="email" id="email">
            <label for="senha">SENHA:</label>
            <input type="password" name="senha" id="senha">
            <input type="submit" value="ENTRAR">
        </div>
    </form>
    </body>
</html>