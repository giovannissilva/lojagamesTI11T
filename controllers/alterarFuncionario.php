<?php

include("../models/conexao.php");
include("../models/bancoFuncionario.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(alterarFuncionario($conexao,$codigo,$nome,$funcao,$Fone,$Data)){
    echo("Funcionario Alterado com sucesso");
}else{
    echo("Funcionario não Alterado.");
}

include("../views/footer.php");