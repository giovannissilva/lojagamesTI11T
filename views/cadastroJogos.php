<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class= 'alert alert-danger' role='alert'>Você não tem acesso.. Tente novamente.</div>";
    header("Location:../views/Logar.php");
}
    include("../views/header.php");
?>  
<div class="containerJogcolor"> 
    <form method="Post" action="../controllers/inserirJogos.php">
    <div class="containerJog01"> 
        <p>Jogo <input type="text" name="jogo"></p>
        <p>Tamanho do jogo<input type="text" name="tamanho"></p>
        <p>Preço <input type="text" name="preco"></p>
        <p>Requisitos <input type="text" name="requisitos"></p>
        <p>Console <input type="text" name="console"></p>
        <p>Classificação<input type="text" name="classificacao"></p>
        <p>Avaliação <input type="text" name="avaliacao"></p>
        <button type="submit" class="btn btn-dark">Salvar</button>
</div>
    </form>
    </div>
<?php
include("../views/footer.php");
?>