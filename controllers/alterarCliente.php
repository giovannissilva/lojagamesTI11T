<?php

include("../models/conexao.php");
include("../models/bancoCliente.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(alterarCliente($conexao,$codigoCli,$codigo,$nomeCli,$cpfCli,$FoneCli,$dataCli)){
    echo("Cliente Alterado com sucesso");
}else{
    echo("Cliente não Alterado.");
}

include("../views/footer.php");