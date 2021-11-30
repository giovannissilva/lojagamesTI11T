<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class= 'alert alert-danger' role='alert'>Você não tem acesso.. Tente novamente.</div>";
    header("Location:../views/Logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoUsuario.php");

?>
<div class="containerClicolor"> 
<div class="container m-5 p-5">
    <form action="cadastroCliente.php" method="POST">
        <div class="row mb-3">
            <label for="inputCodigo" class="col-sm-2 col-form-label">Digite o Código do Cliente: </label>
            <div class="col-sm-3">
                <input type="number" required name="CodUsuario"class="form-control" id="inputCodigo">
            </div>
            <div class="col-sm-3">
            <button type="submit" class="btn btn-dark">Buscar</button>
            </div>

        </div>

    </form>
</div>
<?php
$codUsuario = isset($_POST['CodUsuario'])?$_POST['CodUsuario']:0;
$usuario = listaTudoUsuarioCod($conexao,$codUsuario);
    if($usuario){



?>
<form method="Post" action="../controllers/inserirCliente.php">
<div class="containerCli01"> 
        <p>Código Usuario <input type="text" name="codUsuFK" readonly value="<?=$codUsuario?>"></p>
        <p>Nome<input type="text" name="nomeCli"></p>
        <p>CPF<input type="text" name="cpfCli"></p>
        <p>Fone <input type="text" name="foneCli"></p>
        <p>Data      <input type="date" name="datanasCli"></p>
        <button type="submit" class="btn btn-dark">Salvar</button>
        </div>
        </div>
    </form>
    </div>
<?php
}
?>
<?php
include_once("footer.php");
?>