<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class= 'alert alert-danger' role='alert'>Você não tem acesso.. Tente novamente.</div>";
    header("Location:../views/Logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoFuncionario.php");

?>
<div class="container m-5 p-5">
    <form action="listaTudoFuncionarioCod.php" method="GET">
        <div class="row mb-3">
            <label for="inputCodigo" class="col-sm-2 col-form-label">Digite o Código do Funcionario: </label>
            <div class="col-sm-3">
                <input type="number" required name="codFun"class="form-control" id="inputCodigo">
            </div>
            <div class="col-sm-3">
            <button type="submit" class="btn btn-dark">Buscar</button>
            </div>
        </div>

    </form>
</div>


<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th scope="col">Código do funcionario</th>
            <th scope="col">Código do funcionario</th>
            <th scope="col">Nome </th>
            <th scope="col">Função</th>
            <th scope="col">Fone</th>
            <th scope="col">Data</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $codFun = isset($_GET['codFun'])?$_GET['codFun']:0;
     
        if($codFun){
            $Fun = listaTudoFuncionarioCod($conexao,$codFun);
        if($Fun){
        ?>
            <tr>
                <th scope="row"><?=$Fun['codFun'] ?></th>
                <td><?=$Fun['codUsuFK'] ?></td>
                <td><?=$Fun['nomeFun'] ?></td>
                <td><?=$Fun['funcaoFun'] ?></td>
                <td><?=$Fun['foneFun'] ?></td>
                <td><?=$Fun['datanasFun'] ?></td>
            </tr>
        <?php
    }
    }
        ?>
    </tbody>
</table>



<?php
include_once("footer.php");
?>