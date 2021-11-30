<?php
    function inserirPedido($conexao,$codCliFK,$codFunFK,$codJogFK,$valorUnit){
        $query="insert into tbpedidos(codCliFK,codFunFK,codJogFK,valorUnit)values
        ('{$codCliFK}','{$codFunFK}','{$codJogFK}','{$valorUnit}')";
    
        $resultados = mysqli_query($conexao,$query);
        return $resultados;
    }

function listaPedido($conexao){
    $query = "Select * From tbpedidos";
    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}

function listaPedidoCod($conexao,$Codped){
    $query = "Select * from tbpedidos where codPed={$Codped}";
    $resultados = mysqli_query($conexao,$query);
    $resul= mysqli_fetch_array($resultados);
    return $resul;
}
function deletarPedido($conexao,$codPedidodeletar){
    $query = "delete from tbpedidos where codPed = $codPedidodeletar";
    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}
?>