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
                <!-- formulario -->
                    <div class="form-group">
                        <label >ID</label>
                        <input value="" type="text" class="form-control" id="id-escola" name="id-escola" p>
                    </div>
                    <div class="form-group">
                        <label >NOME</label>
                        <input value="" type="text" class="form-control" id="nome-escola" name="nome-escola" p>
                    </div>
                    <div class="form-group">
                        <label >CEP</label>
                        <input value="" type="text" class="form-control" id="cep" name="cep" p>
                    </div>
                    <div class="form-group">
                        <label >ESTADO</label>
                        <input value="" type="text" class="form-control" id="uf" name="uf" p>
                    </div>
                    <div class="form-group">
                        <label >CIDADE</label>
                        <input value="" type="text" class="form-control" id="cidade" name="cidade" p>
                    </div>
                    <div class="form-group">
                        <label >BAIRRO</label>
                        <input value="" type="text" class="form-control" id="bairro" name="bairro" p>
                    </div>
                    <div class="form-group">
                        <label >RUA</label>
                        <input value="" type="text" class="form-control" id="rua" name="rua" p>
                    </div>
                    <div class="form-group">
                        <label >NUMERO</label>
                        <input value="" type="text" class="form-control" id="numero" name="numero" p>
                    </div>
                    <div class="form-group">
                        <label >data</label>
                        <input value="" type="date" class="form-control" id="numero" name="data" p>
                    </div>
                    <div class="form-group">
                        <label >situação</label>
                        <input value="" type="text" class="form-control" id="numero" name="situação" p>
                    </div>
                    <button>Cancelar</button>
                    <button id="btncaescola" name="btncaescola" >Cadastrar</button>

                    
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

<script>
// API VIACEP
$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#complemento").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#complemento").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#complemento").val("");
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

</script>
<!-- aAJAX DO FOMULARIO -->
<script type="text/javascript">
    $('#btncaescola').click(function(event) {
    event.preventDefault();
    $('#mensagem-i').removeClass('text-success')
    $('#mensagem-i').removeClass('text-danger')
    $('#mensagem-i').addClass('text-info')
     $('#mensagem-i').text('Enviando...')
    $.ajax({
        url:"back_escola.php",
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
