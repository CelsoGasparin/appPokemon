<?php

require_once __DIR__."/../util/Connection.php";
require_once __DIR__."/../model/Regiao.php";

class RegiaoDAO{
    

    public static function listar(){
        $sql = "select * from regioes";
        $stm = Connection::getConn()->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return RegiaoDAO::map($result) ;
    }

    public static function getById($id){
        $sql = "select * from regioes where id = ?";
        $stm = Connection::getConn()->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();
        $regiao = array_values(RegiaoDAO::map($result));

        return count($regiao) > 0 ? $regiao[0] : null;
    }

    private static function map($result){
        $regioes = [];

        foreach($result as $key => $value){
            $id   = isset($value['id']) ? $value['id'] : null;
            $nome = isset($value['nome']) ? $value['nome'] : null;


            $regiao = new Regiao($id,$nome);
            $regioes[$regiao->getId()] = $regiao;
        }

        // $regioes = array_combine(range(1,count($regioes)),$regioes);
        return $regioes;
    }
}