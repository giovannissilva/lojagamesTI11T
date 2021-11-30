<?php

include("../models/conexao.php");
include("../models/bancoUsuario.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(alterarUsuario($conexao,$codigo,$email,$senha,)){
    echo("email Alterado com sucesso");
}else{
    echo("email não Alterado.");
}

include("../views/footer.php");