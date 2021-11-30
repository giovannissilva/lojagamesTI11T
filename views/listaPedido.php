<?php

include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoPedido.php");

?>

<table class="table table-dark table-hover">
  <thead>
    <tr>

      <th scope="col">Codigo do Pedido</th>      
      <th scope="col">Codigo do Cliente</th>
      <th scope="col">Codigo do Funcionario</th>
      <th scope="col">Codigo do Jogo</th>
      <th scope="col">Valor Unitario</th>
      <th scope="col">Deletar</th>

    </tr>
  </thead>
  <tbody>
<?php 
$pedido = listaPedido($conexao);
foreach($pedido as $pedidos):
?>
  <tr>
      <th scope="row"><?=$pedidos['codPed']?></th>
      <td><?=$pedidos['codCliFK']?></td>
      <td><?=$pedidos['codFunFK']?></td>
      <td><?=$pedidos['codJogFK']?></td>
      <td><?=$pedidos['valorUnit']?></td>
      <td>
        <form action="../controllers/deletarPedido.php" method="Post">
          <input type="hidden" name="codPedidodeletar" value="<?=$pedidos['codPed']?>">
          <button type="submit" class="btn-small btn-danger"> X </button>
        </form>
      </td>
    </tr>
<?php
endforeach;
?>
  </tbody>
</table>





<?php
include_once("footer.php");
?>