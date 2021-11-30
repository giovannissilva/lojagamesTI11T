<?php

include("../models/conexao.php");
include("../models/bancoFuncionario.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(deletarUsuario($conexao,$codUsudeletar)){
    echo("Funcionario deletado com sucesso");
}else{
    echo("Funcionario não deletado.");
}

include("../views/footer.php");