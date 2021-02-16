<?php

require_once("conexao.php"); 

$id = $_POST['id'];

$pdo->query("DELETE from escolas WHERE id = '$id'");

echo 'Excluído com Sucesso!!';

?>