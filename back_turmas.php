<?php 
require_once("conexao.php");
// RECUPERANDO DADOS DO FORMULARIO

$ano = $_POST['ano'];
$nivel = $_POST['nivel'];
$serie = $_POST['serie'];
$turno = $_POST['turno'];
$escola = $_POST['escolas'];
$id_alunos = $_POST['id-turmas'];

// FUNÇÃO PARA INSERIR OU EDITAR DADOS DO MYSQL

if($id_alunos == ""){
	$res = $pdo->prepare("INSERT INTO turma (id, ano, nivel, serie, turno, id_escola) VALUES (:id, :ano, :nivel, :serie, :turno, :id_escola)");
	$res->bindValue(":id", $id_alunos);
}else{
	$res = $pdo->prepare("UPDATE turma SET ano = :ano, nivel = :nivel, serie = :serie, turno = :turno, id_escola = :id_escola WHERE id = :id");
}
	$res->bindValue(":ano", $ano);
	$res->bindValue(":nivel", $nivel);
	$res->bindValue(":serie", $serie);
	$res->bindValue(":turno", $turno);
	$res->bindValue(":id_escola", $escola);
	$res->execute();


echo 'Enviado com Sucesso!';

?>