<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class= 'alert alert-danger' role='alert'>Você não tem acesso.. Tente novamente.</div>";
    header("Location:../views/Logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoUsuario.php");
include_once("../models/bancoFuncionario.php");

?>
<div class="containerFuncolor"> 
<div class="container m-5 p-5">
    <form action="cadastroFuncionario.php" method="POST">
        <div class="row mb-5">
            <label for="inputCodigo" class="col-sm-2 col-form-label">Digite o Código do usuário: </label>
            <div class="col-sm-5">
                <input type="number" required name="CodUsuario"class="form-control" id="inputCodigo">
            </div>
            <div class="col-sm-5">
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
<form method="Post" action="../controllers/inserirFuncionario.php">
<div class="containerFun01"> 
        <p>Código Usuario <input type="text" name="codUsuFK" readonly value="<?=$codUsuario?>"></p>
        <p>Nome<input type="text" name="nomeFun"></p>
        <p>Função<input type="text" name="funcaoFun"></p>
        <p>Fone <input type="text" name="foneFun"></p>
        <p>Data De Nascimento<input type="date" name="datanasFun"></p>
        <button type="button" class="btn btn-dark">Salvar</button>
</div>        
    </form>
    </div> 
<?php
}
?>
<?php
include_once("footer.php");
?>