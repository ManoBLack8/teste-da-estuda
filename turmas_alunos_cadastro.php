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
            <form id="form" method="POST">
                <div class="modal-body">
                <?php 
                require_once("conexao.php");
                if (@$_GET['funcao'] == 'turma') {
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM turmas where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $id_turma = $res[0]['id'];
                    $ano2 = $res[0]['ano'];
                    $nivel2 = $res[0]['nivel'];
                    $serie2 = $res[0]['serie'];
                    $turno2 = $res[0]['turno'];
                    $idescola2 = $res[0]['id_escola'];

                    






                                        

                } else {
                    $titulo = "Inserir Registro";

                }


                ?>

                        <input list="browsers" name="escolas" id="browser">

                    <div class="form-group">        
                        <datalist id="browsers">
                            <?php
                             $query = $pdo->query("SELECT * FROM escolas order by id desc ");
                             $res = $query->fetchAll(PDO::FETCH_ASSOC);

                             for ($i=0; $i < count($res); $i++) { 
                             foreach ($res[$i] as $key => $value) {
                             }
                            
                             $nome_escola = $res[$i]['nome'];

                            ?>


                            <option value="<?php echo $nome_escola ?>">
                            <?php } ?>
                        </datalist>
                    </div>                   

                    <div id="mensagem-i"></div>
                    <button>Cancelar</button>
                    <button id="btncaturma" name="btncaescola" >Cadastrar</button>
                    

                    
            </form>


    
    
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

<script type="text/javascript">
    $('#btncaturma').click(function(event) {
    event.preventDefault();
    $('#mensagem-i').removeClass('text-success')
    $('#mensagem-i').removeClass('text-danger')
    $('#mensagem-i').addClass('text-info')
     $('#mensagem-i').text('Enviando...')
    $.ajax({
        url:"back_turmas.php",
        method:"post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(msg) {
            if (msg.trim() === 'Enviado com Sucesso!') {
                $('#mensagem-i').removeClass('text-info')
                $('#mensagem-i').addClass('text-success')
                $('#mensagem-i').text(msg);
                $('#nomecontato').val('');
                $('#emailcontato').val('');
                $('#msgcontato').val('');
            }

            else{
                $('#mensagem-i').text(msg)

            }
        }
    })

})
</script>