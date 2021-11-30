<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class= 'alert alert-danger' role='alert'>Você não tem acesso.. Tente novamente.</div>";
    header("Location:../views/Logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoCliente.php");

?>
<div class="container m-5 p-5">
    <form action="listaTudoClienteNome.php" method="GET">
        <div class="row mb-3">
            <label for="inputNome" class="col-sm-2 col-form-label">Digite o Nome do Usuario: </label>
            <div class="col-sm-3">
                <input type="text" required name="NomeCliente"class="form-control" id="inputNome">
            </div>
            <div class="col-sm-3">
            <button type="submit" class="btn btn-dark">Buscar</button>
            </div>
        </div>
    </form>
</div>
<table class="table table-dark table-hover">
    <thead>
        <tr>
      <th scope="col">Código</th>
      <th scope="col">Código Usuario</th>
      <th scope="col">Cliente</th>    
      <th scope="col">CPF</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Deletar</th>
      <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomeCliente = isset($_GET['NomeCliente'])?$_GET['NomeCliente']:"";
     
        if($nomeCliente != ""){
            $Cliente = listaTudoClienteNome($conexao,$nomeCliente);
        if($Cliente){
            foreach($Cliente as $Clientes) :
        ?>
            <tr>
                <th scope="row"><?=$Clientes['codCli'] ?></th>
                <td><?=$Clientes['codUsuFK'] ?></td>
                <td><?=$Clientes['nomeCli'] ?></td>
                <td><?=$Clientes['cpfCli'] ?></td>
                <td><?=$Clientes['foneCli'] ?></td>
                <td><?=$Clientes['datanasCli'] ?></td>
                <td>
             <form action="../controllers/deletarCliente.php" method="Post">
          <input type="hidden" name="codClientedeletar" value="<?=$Clientes['codCli']?>">
          <button type="submit" class="btn-small btn-danger"> X </button>
        </form>
      </td>
      <td>
        <form action="formAlterarCliente.php" method="Post">
          <input type="hidden" name="codClienteAlterar" value="<?=$Clientes['codCli']?>">
          <button type="submit" class="btn-small btn-danger"> Alterar</button>
        </form>        
        </td>
        </tr>
    </tbody>
    <?php
     endforeach;
    }
    }
    ?>
</table>
<?php
include_once("footer.php");
?>