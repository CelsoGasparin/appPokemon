<?php
require_once __DIR__."/../controller/PokemonController.php";



isset($_GET['id']) ? $id = $_GET['id'] : header('location:pokeListar.php');

$poke = PokemonController::getById($id);

$poke ? null : header('location:pokeListar.php');


$erro = PokemonController::delete($id);

if(!$erro){
    header('location:pokeListar.php');
    
}else{
    require_once __DIR__."/include/header.php";

    $msgErro = implode('<br>',$erro);
    print "<div style='color: red;'>$msgErro</div>";

    require_once __DIR__."/include/footer.php";
}