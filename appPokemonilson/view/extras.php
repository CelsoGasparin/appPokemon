<?php

require_once __DIR__."/include/header.php";

$titulo = "Funções Extras";
?>


<div class="row mt-3 justify-content-center">
    <div class="col-lg-10 col-12">

        <div class="card">
            <div class="card-body">
                <form class="CadProd" method="POST">
                    <h1 class="card-title mb-3"><?= $titulo ?></h1>

                    <div class="row">
                        <div class="col-6">
                            <h2>Preenchimento Automático</h2>
                                <label for="Auto">Desligado :</label>
                                <input type="radio" name="Auto" value="1" >
                                <label style="margin-left:6vh;" for="Auto">Ligado :</label>
                                <input type="radio" name="Auto" value="2" >
                                

                        </div>
                    </div>
                </form>
            </div>


        </div>



    </div>
</div>

<script>

    let auto = document.getElementsByName('Auto');

    auto.forEach(element=>{

        if(localStorage.getItem('auto')==element.value){
            element.checked = true;
        }

        element.addEventListener('click',()=>{
            if(element.checked)
                localStorage.setItem('auto',element.value); 
        });
    });

</script>


<?php
require_once __DIR__."/include/footer.php";
?>