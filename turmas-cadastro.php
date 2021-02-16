<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
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
                if (@$_GET['funcao'] == 'editar') {
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

                    <div class="form-group">
                        <label >ID</label>
                        <input value="<?php echo @$id_turma ?>" type="text" class="form-control" id="id-turmas" name="id-turmas" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label >ANO</label>
                        <input value="<?php echo @$ano2 ?>" type="text" class="form-control" id="nome-turmas" name="ano" placeholder="Nome">
                    </div>
                    <div class="form-group">
                    <select id="nivel" name="nivel">
                        <option value="Nivel de ensino:">Nivel de ensino:</option> 
                        <option value="Ensino fundamental">Ensino fundamental</option>
                        <option value="Ensino medio">Ensino medio</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label>SERIE</label>
                        <input value="<?php echo @$serie2 ?>" type="text" class="form-control" id="cidade" name="serie" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label >TURNO</label>
                        <input value="<?php echo @$turno2 ?>" type="text" class="form-control" id="bairro" name="turno" placeholder="Nome">
                    </div>
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