<?php

//VARIAVEIS BANCO DE DADOS
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'estuda';

//CONECTANDO AO BANCO DE DADOS
date_default_timezone_set('America/Cuiaba');

try{
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario","$senha");
} catch (Exception $e){
    echo "erro ao conectar com banco de dados" .  $e;
}

?>