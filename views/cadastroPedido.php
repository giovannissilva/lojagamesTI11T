<?php
session_start();
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoPedido.php");
include_once("../models/bancoCliente.php");
include_once("../models/bancoFuncionario.php");
include_once("../models/bancoJogos.php");

$CodUsuFK =  $_SESSION["codigoUsuario"];
$funcionario =listabuscaFunUsu($conexao,$CodUsuFK);
?>

    <div class="row g-3">
    <div class="col-md-3">
      <label for="inputFun" class="form-label">Código</label>
        <input type="text" readonly value="<?php echo($funcionario["codFun"])?>" class="form-control" id="inputFun">
    </div>
  <div class="col-md-8">
     <label for="inputNomeFun" class="form-label">Funcionario</label>
        <input type="text" readonly value="<?php echo($funcionario["nomeFun"])?>"class="form-control" id="inputNomeFun">
    </div>
    <!--COD CLIENTE -->
    <!--COD CLIENTE -->
  <?php
  $codCliente = isset($_POST["codCliente"])?$_POST["codCliente"]:0;
  $clientes = isset($codCliente)?listaTudoClienteCod($conexao, $codCliente):"";
  $_SESSION["codigoCliente"] = isset($clientes["codCli"])?$clientes["codCli"]:"0";
  $_SESSION["nomeCliente"] = isset($clientes["nomeCli"])?$clientes["nomeCli"]:"";

  ?>
    <div class="col-4">
      <label for="inputcodCli" class="form-label">Código</label>
       <form method="post" action="cadastroPedido.php">
          <div class="d-grid gap-3 d-md-flex justify-content-md-end">
            <input type="text" value="<?=$_SESSION["codigoCliente"]?>" name="codCliente" class="form-control" id="inputcodCli" placeholder="1234">
            <button type="submit" require class="btn btn-dark"> Buscar </button>
          </div>

        </form>

    </div>

    <div class="col-7">
      <label for="inputNomeCli" class="form-label">Cliente</label>
       <input type="text" readonly value="<?=$_SESSION['nomeCliente']?>" class="form-control" id="inputNomeCli" placeholder="Vinicius">
    </div>
      <!--COD JOGO -->
      <!--COD JOGO -->
      <?php
        $codJogo = isset($_POST["codJogo"])?$_POST["codJogo"]:0;
      ?>
    <div class="col-4">
      <label for="inputcodCli" class="form-label">Código</label>
       <form method="post" action="cadastroPedido.php">
          <div class="d-grid gap-3 d-md-flex justify-content-md-end">
            <input type="text" value="<?=$codJogo?>" name="codJogo" class="form-control" id="inputcodJog">
            <input type="hidden" value="<?=$_SESSION["codigoCliente"]?>" name="codCliente">
            <input type="hidden" value="<?=$_SESSION["nomeCliente"]?>" name="nomeCliente">
            
            <button type="submit" class="btn btn-dark"> Buscar </button>
          </div>

        </form>

    </div>

    <?php
        $jogos = isset($codJogo)?listaTudoJogosCod($conexao, $codJogo):"";
        $_SESSION["codigoJogo"] = isset($jogos["codJogo"])?$jogos["codJogo"]:"0";
        $_SESSION["nomeJogo"] = isset($jogos["nomeJog"])?$jogos["nomeJog"]:"";
        $_SESSION["precoJogo"] = isset($jogos["precoJog"])?$jogos["precoJog"]:"";
    ?>

    <div class="col-7">
      <label for="inputNomeJog" class="form-label">Funcionario</label>
       <input type="text" readonly value="<?=$_SESSION['nomeJogo']?>" class="form-control" id="inputNomeJog" placeholder="Vinicius">
       </div>
    <div class="col-md-11">
     <label for="inputvalorunitario" class="form-label">Valor Unitario</label>
       <input type="text" readonly value="<?=$_SESSION['precoJogo']?>" class="form-control" id="inputvalorunitario">
    </div>

    <form method="post" action="../controllers/inserirPedido.php">
          <div class="d-grid gap-3 d-md-flex justify-content-md-end">
            <input type="hidden" value="<?=$codJogo?>" name="codJogFK">
            <input type="hidden" value="<?=$_SESSION["codigoCliente"]?>" name="codCliFK">
            <input type="hidden" value=" <?php echo($funcionario["codFun"])?>" name="codFunFK">
            <input type="hidden" value="<?=$_SESSION["precoJogo"]?>" name="valorUnit">
            
            <div class="col-12">
 <button type="submit" class="btn btn-dark">Confirmar</button>
    </div>

        </form>

    </div>
<?php
    include("../views/footer.php");
?> 