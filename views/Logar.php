<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/css/style.css">
    <title>Loja Games Sucesso</title>
</head>
<body class="sla">
<div class="container">

  <?php
  session_start();
  $msg = isset($_SESSION["msg"])?$_SESSION["msg"]:"";
  ?>

<form class="formlogin" action="../controllers/credeciasis.php" method="post">

<?php
echo($msg)
?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha </label>
    <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
    </div>
  <button type="submit" class="btn btn-dark">Logar </button>
  <a class="btn btn-danger" href="../views/cadastroUsuario.php">Cadrastrar</a>
</form>
</div>
</body>
</html>