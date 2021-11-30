<?php
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class= 'alert alert-danger' role='alert'>Você não tem acesso.. Tente novamente.</div>";
    header("Location:../views/Logar.php");
}
include("../models/conexao.php");
include("../models/bancoUsuario.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);
if(inserirUsuario($conexao,$emailUsuario,$senhaUsuario,$pin)){
    echo("entrada com sucesso");
}else{
    echo("não foi conectado com email");
}

include("../views/footer.php");