<?php

include("../models/conexao.php");
include("../models/bancoUsuario.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(deletarUsuario($conexao,$codUsudeletar)){
    echo("email deletado com sucesso");
}else{
    echo("email não deletado.");
}

include("../views/footer.php");