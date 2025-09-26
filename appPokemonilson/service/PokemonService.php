<?php
require_once __DIR__."/../model/Pokemon.php";
require_once __DIR__."/../controller/RegiaoController.php";
require_once __DIR__."/../controller/TipoController.php";

class PokemonService{

    static public function validarPokemon(Pokemon $pokemon){

        $erros = [];

        // Valida o nome
        if($pokemon->getNome()==null){
            $erros['nome'] = "Escolha um nome!";
        }elseif(@get_headers("https://pokeapi.co/api/v2/pokemon/". $pokemon->getNome())[0]!="HTTP/1.1 200 OK"){
            $erros['nome'] = "O Nome do Pokemon não é um nome válido!"; 
        }

        // Valida o Level
        $lvl = $pokemon->getLvl();
        if($lvl==null){
            $erros['lvl'] = "Defina o Level do Pokemon!";
        }elseif($lvl>100 || $lvl < 1){
            $erros['lvl'] = "O Level precisa ser maior que 0 e menor-igual a 100!";
        }

        // Valida a Regiao
        $idReg = $pokemon->getRegiao()->getId();
        if(!RegiaoController::getById($idReg)){
            $erros['regiao'] = "Escolha uma Região Válida!";
        }

        // Valida o Tipo1
        $tipo1 = $pokemon->getTipo1()->getId();
        if(!TipoController::getById($tipo1)){
            $erros['tipo1'] = "Escolha um Primeiro Tipo Válido!";
        }

        // Valida o Tipo2
        $oTipo2 = $pokemon->getTipo2();
        if($oTipo2!=null){
            if(!TipoController::getById($oTipo2->getId())){
                $erros['tipo2'] = "Escolha um Segundo Tipo Válido!";
            }
        }

        // Valida o Sprite
        $img = $pokemon->getSprite();
        if($img==null){
            $erros['sprite'] = "Escolha uma Imagem!";
        }elseif(@!getimagesize($img)){
            $erros['sprite'] = "Insira uma Imagem Válida!";
        }


        // Valida os Stats
        $stats = ['Hp','Attack','Defense',
                  'SpAttack','SpDefense',
                  'Speed'];
        foreach($stats as $stat){
            $get = 'get'.$stat;
            if(!$pokemon->$get()){
                $erros[$stat] = "Defina um Valor no Campo ".$stat."!";
            }elseif($pokemon->$get() < 1 || $pokemon->$get() > 600){
                $erros[$stat] = "O Valor do Campo ". $stat ." deve ser maior que 0 e menor-igual que 600!";
            }
        }

        

        return $erros;
    }
}