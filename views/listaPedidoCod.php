<?php
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoPedido.php");

?>
<div class="container m-5 p-5">
    <form action="listaPedidoCod.php" method="GET">
        <div class="row mb-3">
            <label for="inputCodigo" class="col-sm-2 col-form-label">Digite o Código do Pedido: </label>
            <div class="col-sm-3">
                <input type="number" required name="Codped"class="form-control" id="inputCodigo">
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
        <th scope="col">Codigo do Pedido</th>      
      <th scope="col">Codigo do Cliente</th>
      <th scope="col">Codigo do Funcionario</th>
      <th scope="col">Codigo do Jogo</th>
      <th scope="col">Valor Unitario</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $Codped = isset($_GET['Codped'])?$_GET['Codped']:0;
     
        if($Codped > 0){
            $Pedido = listaPedidoCod($conexao,$Codped);
        if($Pedido){
        ?>
            <tr>
                <th scope="row"><?=$Pedido['codPed'] ?></th>
                <td><?=$Pedido['codCliFK'] ?></td>
                <td><?=$Pedido['codFunFK'] ?></td>
                <td><?=$Pedido['codJogFK'] ?></td>
                <td><?=$Pedido['valorUnit'] ?></td>
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