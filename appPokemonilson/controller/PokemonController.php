<?php
require_once __DIR__."/../dao/PokemonDAO.php";
require_once __DIR__."/../service/PokemonService.php";

class PokemonController{
    static public function insert(Pokemon $pokemon){
        $erros = [];
        $erros = PokemonService::validarPokemon($pokemon);
        
        if($erros!==[]){
            return $erros;
        }

        $insertErro = PokemonDAO::insert($pokemon);
        if($insertErro){
            $erros[] = "Erro ao Salvar Pokemon!";
            AMB_DEV ? $erros[] = $insertErro->getMessage() : null;
        }
        return $erros;
    }
    static public function update(Pokemon $pokemon){
        $erros = [];
        $erros = PokemonService::validarPokemon($pokemon);
        
        if($erros!==[]){
            return $erros;
        }

        $updateErro = PokemonDAO::update($pokemon);
        if($updateErro){
            $erros[] = "Erro ao Atualizar Pokemon!";
            AMB_DEV ? $erros[] = $updateErro->getMessage() : null;
        }
        return $erros;
    }

    static public function listar(){
        return PokemonDao::listar();
    }

    static public function delete($id){
        $erros = [];
        $erro = PokemonDAO::delete($id);

        if($erro){
            $erros[] = "Erro ao Deletar o Pokemon";
            AMB_DEV ? $erros[]=$erro->getMessage() : null;
        }   

        return $erros;
    }

    static public function getById($id){
        return PokemonDAO::getById($id);
    }
}
