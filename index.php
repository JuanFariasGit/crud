<?php
$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
$url = explode('/',$url);

$file = $url[0].'.php';
if(is_file($file)){
    require $file;
} else {
    require '404.php';
}