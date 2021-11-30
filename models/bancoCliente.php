<?php

function inserirCliente($conexao,$codUsuFK,$nomeCli,$cpfCli,$foneCli,$datanasCli){

    $query="insert into tbclientes(codUsuFK,nomeCli,cpfCli,foneCli,datanasCli)values('{$codUsuFK}','{$nomeCli}','{$cpfCli}','{$foneCli}','{$datanasCli}')";

    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}

function listaTudoCliente($conexao){
    
    $query = "Select * From tbclientes";

    $resultados = mysqli_query($conexao,$query);
    return $resultados;
} 

function listaTudoClienteCod($conexao,$codCli){
    $query = "Select * from tbclientes where codUsuFk={$codCli}";
    $resultados = mysqli_query($conexao,$query);
    $resul= mysqli_fetch_array($resultados);
    return $resul;
}

function listaClienteUsuario($conexao,$codUsuarios){
    $query = "Select * from tbusuarios where codUsu={$codUsuarios}";
    $resultados = mysqli_query($conexao,$query);
    $resul= mysqli_fetch_array($resultados);
    return $resul;
}

function alterarCliente($conexao,$codCli,$codUsuFK,$nomeCli,$cpfCli,$foneCli,$datanasCli){

    $query = "update tbclientes set 
    codUsuFK = '{$codUsuFK}', 
    nomeCli = '{$nomeCli}', 
    cpfCli = '{$cpfCli}', 
    foneCli = '{$foneCli}', 
    datanasCli = '{$datanasCli}' where codCli = $codCli";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;

}

function deletarCliente($conexao,$codClideletar){
    $query = "delete from tbclientes where codCli = $codClideletar";
    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}
function listaTudoClienteNome($conexao,$nomeCliente){
    $query = "Select * from tbclientes where nomeCli like '%{$nomeCliente}%'";
    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}
?>