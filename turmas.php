<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="100";url="index.php">
    <title>Estda.com</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/jquery.scrollUp.min.css" type="text/css">
</head>


<body>
<div class="container">
<div class="row">
<!-- BOTÕES PARA CADASTRO -->
    <a type="button" class="" href="turmas-cadastro.php">NOVA TURMA</a>
    
</div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                   <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    require_once("conexao.php");
                   $query = $pdo->query("SELECT * FROM turma order by id desc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      $ano = $res[$i]['ano'];
                      $id = $res[$i]['id'];

                      ?>


                    <tr>
                        <td><?php echo $ano ?></td>
                        <td>
                             <a href="turmas-cadastro.php?funcao=editar&id=<?php echo $id ?>" ><i class='fa fa-edit'></i></a>
                             <a href="turmas-cadastro.php?funcao=excluir&id=<?php echo $id ?>"class="ml-2 text-danger" ><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>
                <?php } ?>





                </tbody>
            </table>

    </div>
</body>

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>