<?php 

header('location:/view/pokeListar.php');
// require_once __DIR__."/model/Pokemon.php";
// require_once __DIR__."/model/Tipo.php";
// require_once __DIR__."/controller/TipoController.php";
// require_once __DIR__."/controller/PokemonController.php";
// require_once __DIR__."/controller/RegiaoController.php";
// // $tipos = TipoController::listar();
// $regioes = RegiaoController::listar();
// $poke = new Pokemon(null,'Rai',rand(1,100),'oi',108,130,95,85,80,102,$tipos[rand(1,18)],null,$regioes[rand(1,10)]);

// print_r($poke->getActualDefensesTexto());
// print implode(', ',array_fill(0,count(explode(',','nome,lvl,sprite,hp,attack,defense,spAttack,spDefense,speed,speed,ivHp,ivAttack,ivDefense,ivSpAttack,ivSpDefense,ivSpeed,tipo1,tipo2,idRegiao')),'?'));
// PokemonController::insert($poke);

// PokemonController::insert($poke);

// if($poke->getTipo2()!==null){
//     print "wababou";
// }

// exit;
// require_once __DIR__."/dao/TipoDAO.php";

// $nome = 'arcanine';
// $regiao = 'hisui';

// if(@get_headers("https://pokeapi.co/api/v2/pokemon/$nome-$regiao")[0]=="HTTP/1.1 200 OK"){
//     // print $regiao; 
// }else{
//     // print $nome;
// }

// // try {
//     $pokeapi = file_get_contents("https://pokeapi.co/api/v2/pokemon/$nome-$regiao");
//     $tpokeapi = json_decode($pokeapi,true);
//     print_r($tpokeapi['types'][0]['type']['name']);
//     // print $regiao;
// } catch (Exception $ignore) {
    // $pokeapi = file_get_contents("https://pokeapi.co/api/v2/pokemon/$nome");
    // $tpokeapi = json_decode($pokeapi,true);
// print_r(TipoDAO::listar('nome,attack,defense'));

    // foreach($tpokeapi['moves'] as $key => $value){
    //     print $value['move']['name']."\n";
    // }
    
// }
// if(@get_headers("https://pokeapi.co/api/v2/pokemon/$nome-$regiao")){
//     print 'wababoi';
// }
