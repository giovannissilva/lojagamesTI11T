<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class= 'alert alert-danger' role='alert'>Você não tem acesso.. Tente novamente.</div>";
    header("Location:../views/Logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoJogos.php");

?>
<div class="container m-5 p-5">
    <form action="listaTudoJogosCod.php" method="GET">
        <div class="row mb-3">
            <label for="inputCodigo" class="col-sm-2 col-form-label">Digite o Código do Jogo: </label>
            <div class="col-sm-3">
                <input type="number" required name="CodJog"class="form-control" id="inputCodigo">
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
            <th scope="col">Jogo</th>
            <th scope="col">Console</th>
            <th scope="col">Preço</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $codJogo = isset($_GET['CodJog'])?$_GET['CodJog']:0;
     
        if($codJogo > 0){
            $jogo = listaTudoJogosCod($conexao,$codJogo);
        if($jogo){
        ?>
            <tr>
                <th scope="row"><?=$jogo['codJog'] ?></th>
                <td><?=$jogo['nomeJog'] ?></td>
                <td><?=$jogo['consoleJog'] ?></td>
                <td><?=$jogo['precoJog'] ?></td>
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