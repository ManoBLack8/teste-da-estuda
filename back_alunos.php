<?php 
require_once("conexao.php");
// RECUPERANDO DADOS DO FORMULARIO
$nome_alunos = $_POST['nome-alunos'];
$nasimento = $_POST['nascimento'];
$genero = $_POST['genero'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$escola = $_POST['escolas'];

// FUNÇÃO PARA OBRIGAR PREENCHIMENTO DE CAMPO
if($nome_alunos == ""){
	echo 'Preencha o Campo Nome!';
	exit();
}
if($email == ""){
	echo 'Preencha o Campo Email!';
	exit();
}
// FUNÇÃO PARA INSERIR OU EDITAR DADOS DO MYSQL
$id_alunos = $_POST['id-alunos'];

if($id_alunos == ""){
	$res = $pdo->prepare("INSERT INTO alunos (id, nome, telefone, email, nascimento, genero, escola) VALUES (:id, :nome, :telefone, :email, :nascimento, :genero, :escola)");
	$res->bindValue(":id", $id_alunos);
}else{
	$res = $pdo->prepare("UPDATE alunos SET nome = :nome, telefone = :telefone, email = :email, nascimento = :nascimento, genero = :genero, escola = :escola WHERE id = :id");
	$res->bindValue(":id", $id_alunos);
}
	$res->bindValue(":nome", $nome_alunos);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	$res->bindValue(":nascimento", $nasimento);
	$res->bindValue(":genero", $genero);
	$res->bindValue(":escola", $escola);
	$res->execute();


echo 'Enviado com Sucesso!';

?>