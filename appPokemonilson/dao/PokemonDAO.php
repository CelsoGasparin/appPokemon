<?php
require_once __DIR__."/../util/Connection.php";
require_once __DIR__."/../model/Pokemon.php";
require_once __DIR__."/../controller/TipoController.php";
require_once __DIR__."/../controller/RegiaoController.php";

class PokemonDAO{
    
    static public function insert(Pokemon $pokemon){
        try{
            $sql = "insert into pokemons(nome,lvl,sprite,hp,attack,defense,spAttack,spDefense,speed,ivHp,ivAttack,ivDefense,ivSpAttack,ivSpDefense,ivSpeed,tipo1,tipo2,idRegiao) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = Connection::getConn()->prepare($sql);
            $idTipo2 = $pokemon->getTipo2()!==null ? $pokemon->getTipo2()->getId() : null;       
            $stm->execute([$pokemon->getNome(),$pokemon->getLvl(),$pokemon->getSprite(),$pokemon->getHp(),$pokemon->getAttack(),$pokemon->getDefense(),$pokemon->getSpAttack(),
            $pokemon->getSpDefense(),$pokemon->getSpeed(),$pokemon->getIvHp(),$pokemon->getIvAttack(),$pokemon->getIvDefense(),$pokemon->getIvSpAttack(),$pokemon->getIvSpDefense(),
            $pokemon->getIvSpeed(),$pokemon->getTipo1()->getId(),$idTipo2,$pokemon->getRegiao()->getId()]);
            return null;
        }catch(Exception $e){
            return $e;
        }
    }
    static public function update(Pokemon $pokemon){
        try{
            $sql = "UPDATE pokemons SET nome = ? ,lvl = ? ,sprite = ? ,hp = ? ,attack = ? ,defense = ? ,spAttack = ? ,spDefense = ? ,speed = ? ,tipo1 = ? ,tipo2 = ? ,idRegiao = ? WHERE id = ?";
            $stm = Connection::getConn()->prepare($sql);
            $idTipo2 = $pokemon->getTipo2()!==null ? $pokemon->getTipo2()->getId() : null;
            $stm->execute([$pokemon->getNome(),$pokemon->getLvl(),$pokemon->getSprite(),$pokemon->getHp(),$pokemon->getAttack(),$pokemon->getDefense(),$pokemon->getSpAttack(),
            $pokemon->getSpDefense(),$pokemon->getSpeed(),$pokemon->getTipo1()->getId(),$idTipo2,$pokemon->getRegiao()->getId(),$pokemon->getId()]);
            return null;
        }catch(Exception $e){
            return $e;
        }
    }

    static public function listar(){
        $sql = "SELECT * FROM pokemons";
        $stm = Connection::getConn()->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return PokemonDAO::map($result);
    }

    static public function getById($id){
        $sql = "SELECT * FROM pokemons WHERE id = ?";
        $stm = Connection::getConn()->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();
        $pokemon = array_values(PokemonDAO::map($result));

        return count($pokemon) > 0 ? $pokemon[0] : null;
    }

    static public function delete($id){
        
        try{
            $sql = "DELETE FROM pokemons WHERE id = ?";
            $stm = Connection::getConn()->prepare($sql);
            $stm->execute([$id]);
            return null;    
        }catch(Exception $e){
            return $e;
        }

    }

    static private function map($result){
        $pokemons = [];

        foreach($result as $key => $value){
            $id          = isset($value['id']) ? $value['id'] : null;
            $nome        = isset($value['nome']) ? $value['nome'] : null;
            $lvl         = isset($value['lvl']) ? $value['lvl'] : null;
            $sprite      = isset($value['sprite']) ? $value['sprite'] : null;
            $hp          = isset($value['hp']) ? $value['hp'] : null;
            $attack      = isset($value['attack']) ? $value['attack'] : null;
            $defense     = isset($value['defense']) ? $value['defense'] : null;
            $spAttack    = isset($value['spAttack']) ? $value['spAttack'] : null;
            $spDefense   = isset($value['spDefense']) ? $value['spDefense'] : null;
            $speed       = isset($value['speed']) ? $value['speed'] : null;
            $tipo1       = isset($value['tipo1']) ? TipoController::getById($value['tipo1']) : null;
            $tipo2       = isset($value['tipo2']) ? TipoController::getById($value['tipo2']) : null;
            $regiao      = isset($value['idRegiao']) ? RegiaoController::getById($value['idRegiao']): null;
            $ivHp        = isset($value['ivHp']) ? $value['ivHp'] : null;
            $ivAttack    = isset($value['ivAttack']) ? $value['ivAttack'] : null;
            $ivDefense   = isset($value['ivDefense']) ? $value['ivDefense'] : null;
            $ivSpAttack  = isset($value['ivSpAttack']) ? $value['ivSpAttack'] : null;
            $ivSpDefense = isset($value['ivSpDefense']) ? $value['ivSpDefense'] : null;
            $ivSpeed     = isset($value['ivSpeed']) ? $value['ivSpeed'] : null;

            $pokemon = new Pokemon($id,$nome,$lvl,$sprite,$hp,$attack,$defense,$spAttack,$spDefense,$speed,$tipo1,
                                $tipo2,$regiao,$ivHp,$ivAttack,$ivDefense,$ivSpAttack,$ivSpDefense,$ivSpeed);
            $pokemons[$pokemon->getId()] = $pokemon;
        }

        return $pokemons;
    }
}

