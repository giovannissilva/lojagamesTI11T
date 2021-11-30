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
    <form method="Post" action="../controllers/alterarUsuarios.php">
<?php
$CodUsu = $_POST["codUsualterar"];
$usuario = listaTudoUsuarioCod($conexao,$CodUsu);

?>
        <p>Código <input type="text" name="codigo" value="<?=$usuario['codUsu'] ?>"></p>
        <p>email <input type="text" name="email" value="<?=$usuario['emailUsu'] ?>"></p>
        <p>senha<input type="text" name="senha" value="<?=$usuario['senhaUsu'] ?>" ></p>
        <p>PIN<input type="text" name="pin" value="<?=$usuario['pinUsu'] ?>" ></p>
        <button type="submit" class="btn btn-dark">Salvar</button>
    </form>
<?php
include("../views/footer.php");
?>