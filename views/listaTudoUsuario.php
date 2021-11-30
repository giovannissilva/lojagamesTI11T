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

<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">email</th>
      <th scope="col">senha</th>
      <th scope="col">Deletar</th>
      <th scope="col">Alterar</th>
    </tr>
  </thead>
  <tbody>
<?php 
$usuarios = listaTudoUsuario($conexao);
foreach($usuarios as $usuario):
?>
  <tr>
      <th scope="row"><?=$usuario['codUsu']?></th>
      <td><?=$usuario['emailUsu']?></td>
      <td><?=$usuario['senhaUsu']?></td>
      <td>
        <form action="../controllers/deletarUsuario.php" method="Post">
          <input type="hidden" name="codUsudeletar" value="<?=$usuario['codUsu']?>">
          <button type="submit" class="btn-small btn-danger"> X </button>
        </form>
      </td>
      <td>
        <form action="formAlterarUsuario.php" method="Post">
          <input type="hidden" name="codUsualterar" value="<?=$usuario['codUsu']?>">
          <button type="submit" class="btn-small btn-danger"> Alterar</button>
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