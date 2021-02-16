<?php

require_once("conexao.php"); 

$id = $_POST['id'];
// DELETAR O ITEM COM O ID

$pdo->query("DELETE from turmas WHERE id = '$id'");

echo 'Excluído com Sucesso!!';

?>