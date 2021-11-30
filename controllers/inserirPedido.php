<?php

include("../models/conexao.php");
include("../models/bancoPedido.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(inserirPedido($conexao,$codCliFK,$codFunFK,$codJogFK,$valorUnit)){
    echo("Pedido cadastrado com sucesso");
}else{
    echo("Pedido não cadastrado.");

include("../views/footer.php");