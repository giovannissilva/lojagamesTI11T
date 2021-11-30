<?php

include("../models/conexao.php");
include("../models/bancoPedido.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(deletarPedido($conexao,$codPedidodeletar)){
    echo("Pedido deletado com sucesso");
}else{
    echo("Pedido não deletado.");
}

include("../views/footer.php");