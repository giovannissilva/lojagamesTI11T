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
    <form method="Post" action="../controllers/alterarCliente.php">
<?php
$codCli = $_POST["codClienteAlterar"];
$Cliente = listaTudoClienteCod($conexao,$codCli);
$codUsua = $Cliente['codUsuFK'];
$usuario = listaClienteUsuario($conexao,$codUsua);

?>
        <p>Codigo Cliente <input type="text" name="codigoCli" readonly value="<?=$Cliente['codCli'] ?>"></p>

        <p>Codigo Usuario <input type="text" name="codigo" readonly value="<?=$Cliente['codUsuFK'] ?>"></p>

        <p>Email <input type="text" name="emailUsu" readonly value="<?=$usuario['emailUsu'] ?>"></p>

        <p>Nome <input type="text" name="nomeCli" value="<?=$Cliente['nomeCli'] ?>" ></p>

        <p>CPF <input type="text" name="cpfCli" value="<?=$Cliente['cpfCli'] ?>"></p>

        <p>Fone <input type="text" name="FoneCli" value="<?=$Cliente['foneCli'] ?>"></p>

        <p>Data de Nascimento <input type="date" name="dataCli" value="<?=$Cliente['datanasCli'] ?>"></p>

        <button type="submit">Alterar</button>
    </form>
<?php
include("../views/footer.php");
?>