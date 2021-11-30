<?php
session_start();
$email = isset($_SESSION["emailUsuario"])?$_SESSION["emailUsuario"]:null;

if ($email != null){
    include("../views/header.php");
}
?>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/css/style.css">
<div class="containerUsucolor"> 
    <form method="Post" action="../controllers/inserirUsuario.php">
    <div class="containerUsu01"> 
        <p>email <input type="email" name="emailUsuario"></p>
        <p>senha<input type="password" name="senhaUsuario"></p>
        <p>PIN<input type="text" name="pin"></p>
        <button type="submit" class="btn btn-dark">Salvar</button>
</div>
    </form>
    </div>
<?php
if ($email !=null){
    include("../views/footer.php");
}
?> 