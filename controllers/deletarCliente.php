<?php

include("../models/conexao.php");
include("../models/bancoCliente.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(deletarCliente($conexao,$codClideletar)){
    echo("Cliente deletado com sucesso");
}else{
    echo("Cliente não deletado.");
}

include("../views/footer.php");