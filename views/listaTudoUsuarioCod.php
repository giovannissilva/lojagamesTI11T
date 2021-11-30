<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class= 'alert alert-danger' role='alert'>Você não tem acesso.. Tente novamente.</div>";
    header("Location:../views/Logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoUsuario.php");

?>
<div class="container m-5 p-5">
    <form action="listaTudoUsuarioCod.php" method="GET">
        <div class="row mb-3">
            <label for="inputCodigo" class="col-sm-2 col-form-label">Digite o Código do usuario: </label>
            <div class="col-sm-3">
                <input type="number" required name="CodUsu"class="form-control" id="inputCodigo">
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
            <th scope="col">Código</th>
            <th scope="col">email</th>
            <th scope="col">senha</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $CodUsu = isset($_GET['CodUsu'])?$_GET['CodUsu']:0;
     
        if($CodUsu){
            $usuario = listaTudoUsuarioCod($conexao,$CodUsu);
        if($usuario){
        ?>
            <tr>
                <th scope="row"><?=$usuario['codUsu'] ?></th>
                <td><?=$usuario['emailUsu'] ?></td>
                <td><?=$usuario['senhaUsu'] ?></td>
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