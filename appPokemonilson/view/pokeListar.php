<?php
require_once __DIR__."/../controller/PokemonController.php";
$pks = PokemonController::listar();

require_once __DIR__."/include/header.php";

?>

<div class="row mt-3 justify-content-center">
    <div class="col-lg-11 col-12">

        <div class="card">
            <div class="card-body">
                
                <h3 class="card-title">Pokemons</h3>
                
                <table style="border:2px solid black;">
                    <tr style="border:2px solid black;">
                        <th style="border:1px solid black;width: 12vh;text-align: center;">ID</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">Sprite</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">Nome</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">LVL</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">Tipos</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">HP</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">ATTACK</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">DEFENSE</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">SPECIAL ATTACK</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">SPECIAL DEFENSE</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">SPEED</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">Alterar</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">VerM</th>
                        <th style="border:1px solid black;width: 12vh;text-align: center;">DELETE</th>
                    </tr>

                    <?php foreach($pks as $pk): ?>
                        
                        <tr>
                            <td style="width: 12vh;border:1px solid black;text-align: center;"><?= $pk->getId() ?></td>
                            <td style="width: 12vh;border:1px solid black;text-align: center;"><img src="<?= $pk->getSprite() ?>" style="width:20vh;" alt="Imagem Insana"></td>
                            <td style="width: 12vh;border:1px solid black;text-align: center;"><?= $pk->getNome() ?></td>
                            <td style="width: 12vh;border:1px solid black;text-align: center;"><?= $pk->getLvl() ?></td>
                            <td style="width: 12vh;border:1px solid black;text-align: center;"><?= $pk->getTipoString() ?></td>
                            <?php foreach($pk->getStat() as $stat): ?>
                                <td style="width: 12vh;border:1px solid black;text-align: center;"><?= $stat ?></td>
                            <?php endforeach; ?>
                            <td style="border:1px solid black;text-align: center;"><button style="background-color: rgba(0, 255, 72, 1);border-radius:7px;" class="btn btn-success"><a href="pokeUpdate.php?id=<?= $pk->getId()  ?>" style="color:black;">ALTERAR</a></button></td>
                            <td style="border:1px solid black;text-align: center;"><button style="background-color: #fcbc41;border-radius:7px;" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#detalhes<?= $pk->getId() ?>" class="verMbutton"><p style="color:black;margin:0px;" class="textoB">Ver Mais</p></button></td>
                            <td style="border:1px solid black;text-align: center;"><button style="background-color: rgb(215, 0, 0);border-radius:7px;" class="btn btn-danger DELETEbutton"><a href="pokeDelete.php?id=<?= $pk->getId()  ?>" style="color:black;">DELETE</a></button></td>
                        </tr>
                        
                    <?php endforeach; ?>

                </table>
            </div>  

        </div>

    </div>
</div>

<?php foreach($pks as $pk) : 

    print $pk->stringModal();

endforeach; ?>



<?php
require_once __DIR__."/include/footer.php";
?>


