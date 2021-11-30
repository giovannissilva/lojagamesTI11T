<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class= 'alert alert-danger' role='alert'>Você não tem acesso.. Tente novamente.</div>";
    header("Location:../views/Logar.php");
}
    include_once("header.php");
    include_once("../models/conexao.php");
    include_once("../models/bancoFuncionario.php");
?>  
    <form method="Post" action="../controllers/alterarFuncionario.php">
<?php
$codFun = $_POST["codFunalterar"];
$Fun = listaTudoFuncionarioCod($conexao,$codFun);

?>
        <p>Código Usuario <input type="text" name="codigo" value="<?=$Fun['codUsuFK'] ?>"></p>
        <p>Nome <input type="text" name="nome" value="<?=$Fun['nomeFun'] ?>"></p>
        <p>Função do funcionario<input type="text" name="funcao" value="<?=$Fun['funcaoFun'] ?>" ></p>
        <p>Fone <input type="text" name="Fone" value="<?=$Fun['foneFun'] ?>"></p>
        <p>Data De Nascimento <input type="text" name="Data" value="<?=$Fun['datanasFun'] ?>"></p>
        <button type="submit" class="btn btn-dark">Salvar</button>
    </form>
<?php
include("../views/footer.php");
?>