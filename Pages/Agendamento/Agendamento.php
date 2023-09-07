<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="./Agendamento.css">
    <title>Aelia Resende</title>
</head>
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.html';
?>
<body>

<div class="modal" id="modalExc">
        <div class="modal-content-exc">
          <span class="close">&times;</span>
            <div class="modal-footer">
                <input type="tel" name="telefone" placeholder="telefone de contato" id="telefone" required><br>
                <button id="tel_button" onclick="">Cadastrar cliente</button>
            </div>      
        </div>
    </div>


    <header>
        <img src="../../assets/logo.png">
    </header>
    <div class="container">
      <form action="../../actions/action_Agendamento.php" method="POST" id="formulario">    
        <input type="text" name="nome" placeholder="nome da cliente" id="nome" pattern="[A-Za-z0-9 ]+" maxlength="30" required><br>
        <input type="time" name="hora_inicio" placeholder="inicio do atendimento" id="hora_inicio" required><br>
        <input type="time" name="hora_final" placeholder="final do atendimento" id="hora_final" required><br>
        <input type="date" name="data" placeholder="data do atendimento" id="data" required><br>
        <input tyle="number" name="valor" placeholder="valor do serviço" id="valor" required><br>
        <input type="text" name="desc" placeholder="descrição" maxlength="150" id="desc" required><br>
        <input type="hidden" name="telefone" placeholder="telefone de contato" id="tel">
        <div class="radio">
          <br>
          <label>
              <input type="radio" name="opcao" value="Dinheiro"  id="opcao1" checked>
              Dinheiro
            </label>
            <label>
              <input type="radio" name="opcao" value="Cartâo" id="opcao2"> 
              Cartão
            </label>
            <label>
              <input type="radio" name="opcao" value="Pix" id="opcao3">Pix
            </label>
        </div>
        <div class="cliente">
          <input type="checkbox" name="opcao_cliente" id="opcao_cliente">  cliente fixo?
        </div>
        <input type="hidden" name="op" id ="op" value=0>
        <div class="sub">
        </form>
          <button type="button" id="agendar" onclick="clienteFixo()">Agendar</button>
        </div>
        <a href="../Home Page/HomePage.php">Voltar ao inicio</a>
    </div>  
</body>
<script>

  function verificarCampos() {
  // Obtém o formulário pelo ID
  var formulario = document.getElementById("formulario");
  
  // Obtém todos os elementos de input dentro do formulário
  var campos = formulario.querySelectorAll("input[required]");
  
  // Define uma variável para rastrear se todos os campos estão preenchidos
  var todosCamposPreenchidos = true;

  // Itera por todos os campos e verifica se estão preenchidos
  for (var i = 0; i < campos.length; i++) {
    if (campos[i].value.trim() === "") {
      todosCamposPreenchidos = false;
      break; // Se encontrar um campo vazio, sai do loop
    }
  }
  return todosCamposPreenchidos;
}

    function clienteFixo(){
      var tel = document.getElementById("opcao_cliente");
      if(tel.checked){
        showModalDelete();
      }
      else{
        var verifica = verificarCampos();
        if(verifica){
          submitFormulario();
        }
        else{
          alert("preenche saporra ai");
        }
      }
    }

    function submitFormulario(){
      var formulario = document.getElementById("formulario"); 
      formulario.submit();
    }

    function showModalDelete(id){
      var modalDelete = document.getElementById("modalExc");
      var spanDel = document.getElementsByClassName("close")[1];

      // Quando o usuário clicar no botão "fechar" ou fora do modal, feche-o

      spanDel.onclick = function() {
        modalDelete.style.display = "none";
      }

      window.onclick = function(event) {
        if (event.target == modalDelete) {
          modalDelete.style.display = "none";
        }

      }

      modalDelete.style.display = "block";
    }

    function TelefoneValor(){
      var tel = document.getElementById("telefone").value;
      document.getElementById("tel").value = tel;
      var formulario = document.getElementById("formulario"); 
      // submitFormulario();
    }
  </script>
</html>