<?php 
require_once("conexao.php");
// RECUPERANDO DADOS DO FORMULARIO

$nome_escola = $_POST['nome-escola'];
$cep = $_POST['cep'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$id_escola = $_POST['id-escola'];
$situ = $_POST['situação'];
$data = $_POST['data'];

// FUNÇÃO PARA OBRIGAR PREENCHIMENTO DE CAMPO

if($data == ""){
	echo 'Preencha o Campo data!';
	exit();
}if($situ == ""){
	echo 'Preencha o Campo Situação!';
	exit();
}
// FUNÇÃO PARA INSERIR OU EDITAR DADOS DO MYSQL

if($id_escola == ""){
	$res = $pdo->prepare("INSERT INTO escolas (id, nome, cep, estado, cidade, bairro, rua, numero, situ, dataa ) VALUES (:id, :nome, :cep, :estado, :cidade, :bairro, :rua, :numero, :situ, :dataa)");
	$res->bindValue(":id", $id_escola);
}else{
	$res = $pdo->prepare("UPDATE escolas SET nome = :nome, cep = :cep, estado = :estado, cidade = :cidade, bairro = :bairro, rua = :rua, numero = :numero, situ = :situ, dataa = :dataa  WHERE id = :id");
}
	$res->bindValue(":nome", $nome_escola);
	$res->bindValue(":cep", $cep);
	$res->bindValue(":estado", $uf);
	$res->bindValue(":cidade", $cidade);
	$res->bindValue(":bairro", $bairro);
	$res->bindValue(":rua", $rua);
	$res->bindValue(":numero", $numero);
	$res->bindValue(":situ", $situ;
	$res->bindValue(":dataa", $data);
	$res->execute();


echo 'Enviado com Sucesso!';

?>