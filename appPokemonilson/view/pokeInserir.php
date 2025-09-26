<?php
require_once __DIR__."/../controller/TipoController.php";
require_once __DIR__."/../controller/RegiaoController.php";
require_once __DIR__."/../controller/PokemonController.php";
require_once __DIR__."/../service/PokemonService.php";

$poke = null;
$titulo = "Inserir Pokemon";
$ivs = false;
$nome      = null;
$lvl       = null;
$regiao    = null; 
$hp        = null;
$attack    = null; 
$defense   = null;
$spAttack  = null;
$spDefense = null;
$speed     = null;
$sprite    = null;
$tipo1     = null;
$tipo2     = null;
$erros = [];
$erroMsg = "";


if($_POST!==[]){
    $nome      = trim($_POST['nome']) ? ucfirst(trim($_POST['nome']))  : null;
    $lvl       = is_numeric($_POST['lvl']) ? $_POST['lvl'] : null;
    $regiao    = is_numeric($_POST['regiao']) ? $_POST['regiao'] : null;
    $oRegiao = RegiaoController::getById($regiao);
    $regiaoNome = $oRegiao ? $oRegiao->getNome() : null;
    if($_POST['auto']==1){
        $hp        = is_numeric($_POST['hp']) ? $_POST['hp'] : null;
        $attack    = is_numeric($_POST['attack']) ? $_POST['attack'] : null;
        $defense   = is_numeric($_POST['defense']) ? $_POST['defense'] : null;
        $spAttack  = is_numeric($_POST['spAttack']) ? $_POST['spAttack'] : null;
        $spDefense = is_numeric($_POST['spDefense']) ? $_POST['spDefense'] : null;
        $speed     = is_numeric($_POST['speed']) ? $_POST['speed'] : null;
        $sprite    = trim($_POST['sprite']) ? $_POST['sprite'] : null;
        $tipo1     = is_numeric($_POST['tipo1']) ? $_POST['tipo1'] : null;
        $tipo2     = is_numeric($_POST['tipo2']) ? $_POST['tipo2'] : null;
    }elseif($_POST['auto']==2){
        if(@get_headers("https://pokeapi.co/api/v2/pokemon/$nome-$regiaoNome")[0]=="HTTP/1.1 200 OK"){
            $pokeapi = file_get_contents("https://pokeapi.co/api/v2/pokemon/$nome-$regiaoNome");
            $tpokeapi = json_decode($pokeapi,true);
            $hp        = $tpokeapi['stats'][0]['base_stat'];
            $attack    = $tpokeapi['stats'][1]['base_stat'];
            $defense   = $tpokeapi['stats'][2]['base_stat'];
            $spAttack  = $tpokeapi['stats'][3]['base_stat'];
            $spDefense = $tpokeapi['stats'][4]['base_stat'];
            $speed     = $tpokeapi['stats'][5]['base_stat'];
            $sprite    = $tpokeapi['sprites']['other']['official-artwork']['front_default'];
            $tipo1     = $tpokeapi['types'][0]['type']['name'];
            $tipo2     = isset($tpokeapi['types'][1]) ? $tpokeapi['types'][1]['type']['name'] : null;

            foreach(TipoController::listar() as $key => $value){
                switch(strtolower($value->getNome())){
                    case strtolower($tipo1):
                        $tipo1 = $value->getId();
                    break;

                    case @strtolower($tipo2):
                        $tipo2 = $value->getId();
                    break;
                    
                    default:
                    
                    break;
                }
            }
        }elseif(@get_headers("https://pokeapi.co/api/v2/pokemon/$nome")[0]=="HTTP/1.1 200 OK"){
            $pokeapi = file_get_contents("https://pokeapi.co/api/v2/pokemon/$nome");
            $tpokeapi = json_decode($pokeapi,true);
            $hp        = $tpokeapi['stats'][0]['base_stat'];
            $attack    = $tpokeapi['stats'][1]['base_stat'];
            $defense   = $tpokeapi['stats'][2]['base_stat'];
            $spAttack  = $tpokeapi['stats'][3]['base_stat'];
            $spDefense = $tpokeapi['stats'][4]['base_stat'];
            $speed     = $tpokeapi['stats'][5]['base_stat'];
            $sprite    = $tpokeapi['sprites']['other']['official-artwork']['front_default'];
            $tipo1     = $tpokeapi['types'][0]['type']['name'];
            $tipo2     = isset($tpokeapi['types'][1]) ? $tpokeapi['types'][1]['type']['name'] : null;

            foreach(TipoController::listar() as $key => $value){
                switch(strtolower($value->getNome())){
                    case strtolower($tipo1):
                        $tipo1 = $value->getId();
                    break;

                    case @strtolower($tipo2):
                        $tipo2 = $value->getId();
                    break;
                    
                    default:
                    
                    break;
                }
            }
        }
        
    }
    


    // Cria os Objetos Tipo
    $oTipo1 = new Tipo($tipo1,null,null,null);
    $oTipo2 = $tipo2 != null ? new Tipo($tipo2,null,null,null) : null;
    
    // Cria o Objeto Regiao
    $oRegiao = new Regiao($regiao,null);
    
    // Cria o Objeto Pokemon
    $oPokemon = new Pokemon(null,$nome,$lvl,$sprite,$hp,$attack,$defense,$spAttack,$spDefense,$speed,$oTipo1,$oTipo2,$oRegiao);
    
    
    $erros = PokemonController::insert($oPokemon);
    
    if($erros===[]){
        header("location:pokeListar.php");
    }else{
        $erroMsg = implode("<br>",$erros);
    }

}







require_once __DIR__."/include/form.php";


?>



