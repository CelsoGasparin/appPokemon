<?php
require_once __DIR__."/../dao/TipoDAO.php";

class TipoController{
    
    static public function listar(){
        return TipoDAO::listar();
    }
    static public function getById($id){
        return TipoDAO::getById($id);
    }
}