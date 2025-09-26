<?php
require_once __DIR__."/../dao/RegiaoDAO.php";

class RegiaoController{


    public static function listar($string = '*'){
        return RegiaoDAO::listar($string);
    }

    public static function getById($id){
       return RegiaoDAO::getById($id);
    }
}