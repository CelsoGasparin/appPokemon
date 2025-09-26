<?php
require_once __DIR__."/../../controller/RegiaoController.php";
require_once __DIR__."/../../controller/TipoController.php";



require_once __DIR__."/header.php";
?>

<div class="row mt-2 justify-content-center">
    <div class="col-lg-11 col-12">

        <div class="card">
            <div class="card-body">
                <form class="inPoke" onsubmit="submitButton.disabled = true;" action="" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="card-title mb-2"><?= $titulo ?></h1>
                            
                            <h5>Nome:</h5>
                            <input type="text" style="border-color: <?= isset($erros['nome']) ? 'red': ($nome=="" ? 'black' : '#228B22')?>;" value="<?= $nome ?>" placeholder="Informe o nome do Pokemon" id="nome" name="nome" class="nome w-50">
        
                            <h5 class="mt-2">Level:</h5>
                            <input type="number" style="border-color: <?= isset($erros['lvl']) ? 'red': ($lvl=="" ? 'black' : '#228B22')?>;" value="<?= $lvl ?>" min="1" max="100" name="lvl" id="lvl" class="lvl w-50" placeholder="LEVEL">
                            
                            
                            <h5 class="mt-2">Região:</h5>
                            <select name="regiao" style="border-color: <?= isset($erros['regiao']) ? 'red': ($regiao=="" ? 'black' : '#228B22')?>;" id="regiao">
                                <option value="">--</option>
                                <?php foreach(RegiaoController::listar() as $v): ?>
                                    
                                    <option value="<?= $v->getId() ?>" <?= $v->getId()==$regiao ? 'selected' : null ?>><?= $v->getNome() ?></option>
        
                                <?php endforeach;?>
                            </select>
        
                            
                            <div class="opcional" style="display: block;">
                                <h4>Stats</h4>
                                <h5 class="mt-2">HP:</h5>
                                <input type="number" style="border-color: <?= isset($erros['Hp']) ? 'red': ($hp=="" ? 'black' : '#228B22')?>;" value="<?= $hp ?>" min="1" max="600" name="hp" id="hp" class="hp w-25" placeholder="HP">
                                <h5 class="mt-2">ATTACK:</h5>
                                <input type="number" style="border-color: <?= isset($erros['Attack']) ? 'red': ($attack=="" ? 'black' : '#228B22')?>;" value="<?= $attack ?>" min="1" max="600" name="attack" id="attack" class="attack w-25" placeholder="ATTACK">
                                <h5 class="mt-2">DEFENSE:</h5>
                                <input type="number" style="border-color: <?= isset($erros['Defense']) ? 'red': ($defense=="" ? 'black' : '#228B22')?>;" value="<?= $defense ?>" min="1" max="600" name="defense" id="defense" class="defense w-25" placeholder="DEFENSE">
                                <h5 class="mt-2">SPECIAL ATTACK:</h5>
                                <input type="number" style="border-color: <?= isset($erros['SpAttack']) ? 'red': ($spAttack=="" ? 'black' : '#228B22')?>;" value="<?= $spAttack ?>" min="1" max="600" name="spAttack" id="spAttack" class="spAttack w-25" placeholder="SPECIAL ATTACK">
                                <h5 class="mt-2">SPECIAL DEFENSE:</h5>
                                <input type="number" style="border-color: <?= isset($erros['SpDefense']) ? 'red': ($spDefense=="" ? 'black' : '#228B22')?>;" value="<?= $spDefense ?>" min="1" max="600" name="spDefense" id="spDefense" class="spDefense w-25" placeholder="SPECIAL DEFENSE">
                                <h5 class="mt-2">SPEED:</h5>
                                <input type="number" style="border-color: <?= isset($erros['Speed']) ? 'red': ($speed=="" ? 'black' : '#228B22')?>;" value="<?= $speed ?>" min="1" max="600" name="speed" id="speed" class="speed w-25" placeholder="SPEED">
                                
                                <h5 class="mt-3">SPRITE:</h5>
                                <input type="url" style="border-color: <?= isset($erros['sprite']) ? 'red': ($sprite=="" ? 'black' : '#228B22')?>;" value="<?= $sprite ?>" name="sprite" id="sprite" class="sprite w-50">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="opcional" style="display: block;">
                                <h5>Quantos Tipos seu Pokemon Tem?</h5>
                                <label for="qntTipo">1 :</label>
                                <input type="radio" name="qntTipo" value="1" <?= $tipo2=="" || $tipo2==null ? "checked" : null?>>
                                <label style="margin-left:6vh;" for="qntTipo">2 :</label>
                                <input type="radio" name="qntTipo" value="2" <?= $tipo2=="" || $tipo2==null ? null : "checked"?>>
                                <div class="row">
                                    <div class="col-2">
                                        <h5 class="mt-3">Primeiro Tipo: </h5>
                                        <select name="tipo1" style="border-color: <?= isset($erros['tipo1']) ? 'red': ($tipo1=="" ? 'black' : '#228B22')?>;" id="tipo1">
                                            <option value="">--</option>
                                            <?php foreach(TipoController::listar() as $a) : ?>

                                                <option value="<?= $a->getId() ?>"  <?= $a->getId()==$tipo1 ? 'selected' : null ?>><?= $a->getNome() ?></option>
                                                
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-2" id="tipo2Sel" style="display: <?= $tipo2=="" || $tipo2==null ? "none" : "block"?>;">
                                        <h5 class="mt-3">Segundo Tipo: </h5>
                                        <select name="tipo2" style="border-color: <?= isset($erros['tipo2']) ? 'red': ($tipo2=="" ? 'black' : '#228B22')?>;" id="tipo2">
                                            <option value="">--</option>
                                            <?php foreach(TipoController::listar() as $a) : ?>

                                                <option value="<?= $a->getId() ?>" <?= $a->getId()==$tipo2 ? 'selected' : null ?>><?= $a->getNome() ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            

                            <input type="hidden" name='id' value="<?= $poke ? $poke->getId() : 0 ;?>">
                            <input type="hidden" name='auto' id="auto">
                            <button type="submit" name="submitButton" class="mt-3 Submit Botao-FODA btn btn-warning">Submit</button>

                            <div class="erroMsg">
                                <div style="color: black;background-color:red;border-radius:10px;border-color:black;">
                                    <?=$erroMsg?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </form>
            </div>


        </div>



    </div>
</div>
<script>
    let tipo2 = document.getElementById('tipo2Sel');
    let quantTipo = document.getElementsByName('qntTipo');
    let opts = document.querySelectorAll('.opcional');
    let autoInp = document.getElementById('auto');
    let auto = localStorage.getItem('auto');
    
    opts.forEach(element=>{
        if(auto == 2){
            element.style.display='none';
        }
    });
    autoInp.value = auto;


    quantTipo.forEach(element=>{
        element.addEventListener('click',()=>{
            if(element.checked){
                if(element.value == 1){
                  tipo2.style.display = 'none';
                }else if(element.value == 2){
                    tipo2.style.display = 'block';
                }
            }
        });
    });
    
</script>
<?php
require_once __DIR__."/footer.php";
?>

