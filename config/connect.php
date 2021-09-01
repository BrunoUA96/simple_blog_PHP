<?php 

$db = 'simple_blog_PHP';
$host = 'localhost';
$user = 'root';
$pass = '';

$connect = mysqli_connect($host, $user, $pass, $db);

if (!$connect) {
    echo 'Erro a conectar o DB';
}