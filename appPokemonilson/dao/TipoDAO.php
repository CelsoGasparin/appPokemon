<?php

require_once __DIR__."/../util/Connection.php";
require_once __DIR__."/../model/Tipo.php";


class TipoDAO{
    


    static public function listar(){
        $sql = "select * from tipos";
        $stm = Connection::getConn()->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return TipoDAO::map($result);
    }

    static public function getById($id){
        $sql = 'SELECT * FROM tipos WHERE id = ?';
        $stm = Connection::getConn()->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();
        $tipo = array_values(TipoDAO::map($result));

        return count($tipo) > 0 ? $tipo[0] : null;
    }

    static private function map($result){
        $tipos = [];

        foreach($result as $key => $value) {
            $id      = isset($value['id']) ? $value['id'] : null;
            $nome    = isset($value['nome']) ? $value['nome'] : null;
            $attack  = isset($value['attack']) ? $value['attack'] : null;
            $defense = isset($value['defense']) ? $value['defense'] : null;

            $tipo = new Tipo($id,$nome,$attack,$defense);
            $tipos[$tipo->getId()] = $tipo;
        }

        // $tipos = array_combine(range(1,count($tipos)),$tipos);
        
        return $tipos;
    }
}