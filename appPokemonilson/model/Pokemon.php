<?php

use BcMath\Number;

require_once __DIR__."/Tipo.php";
require_once __DIR__."/Regiao.php";
require_once __DIR__."/../controller/TipoController.php";

class Pokemon{

    private ?int $id;
    private ?string $nome;
    private ?int $lvl;
    private ?string $sprite;
    private ?int $hp;
    private ?int $attack;
    private ?int $defense;
    private ?int $spAttack;
    private ?int $spDefense;
    private ?int $speed;
    private ?Tipo $tipo1;
    private ?Tipo $tipo2;
    private ?int $ivHp;
    private ?int $ivAttack;
    private ?int $ivDefense;
    private ?int $ivSpAttack;
    private ?int $ivSpDefense;
    private ?int $ivSpeed;
    private ?Regiao $regiao;
    

    public function __construct($id,$nome,$lvl,$spr,$hp,$att,$def,$spAtt,$spDef,$spe,$t1,$t2,$regiao,$ivHp = null,$ivAttack = null,$ivDefense = null,$ivSpAttack = null,$ivSpDefense = null,$ivSpeed = null){
        // $pokeapi = file_get_contents("https://pokeapi.co/api/v2/pokemon/".$this->nome);
        // $this->pokeapi = json_decode($pokeapi,true);
        $this->id          = $id;
        $this->nome        = $nome;
        $this->lvl         = $lvl;
        $this->sprite      = $spr;
        // var_dump([$ivHp,$ivAttack,$ivDefense,$ivSpAttack,$ivSpDefense,$ivSpeed]);
        $this->ivHp        = $ivHp       ===null ? rand(0,31) : $ivHp;
        $this->ivAttack    = $ivAttack   ===null ? rand(0,31) : $ivAttack;
        $this->ivDefense   = $ivDefense  ===null ? rand(0,31) : $ivDefense;
        $this->ivSpAttack  = $ivSpAttack ===null ? rand(0,31) : $ivSpAttack;
        $this->ivSpDefense = $ivSpDefense===null ? rand(0,31) : $ivSpDefense;
        $this->ivSpeed     = $ivSpeed    ===null ? rand(0,31) : $ivSpeed;
        
        // var_dump([$this->ivHp,$this->ivAttack,$this->ivDefense,$this->ivSpAttack,$this->ivSpDefense,$this->ivSpeed]);
        // exit;
        $this->hp          = $hp;
        $this->attack      = $att;
        $this->defense     = $def;
        $this->spAttack    = $spAtt;
        $this->spDefense   = $spDef;
        $this->speed       = $spe;
        $this->tipo1       = $t1;
        $this->tipo2       = $t2;
        $this->regiao      = $regiao;

        

    }
    
    public function getTipoString(){
        return $this->getTipo2()==null ? $this->getTipo1()->getNome() : $this->getTipo1()->getNome()." e ".$this->getTipo2()->getNome();
    }

    public function stringModal(){
        $trueStats = $this->getStat();

        return'<div class="modal fade" id="detalhes'.$this->id.'" tabindex="-1" >
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: rgba(0, 17, 30, 1);">
                <div class="modal-header">
                    <h1 class="texto modal-title fs-5" id="exampleModalLabel">'.$this->nome.' - Detalhes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >

                    <img style="width:100%;background-color:black;" src="'.$this->sprite.'" alt="erroSilva">
                    <h2 class="texto text-center">'.$this->id.' - '.$this->nome.'</h2>
                    <br>
                    <h4 class="texto text-center">Level: '.$this->lvl.'</h4>
                    <h5 class="texto text-center">Região Encontrado: '. $this->regiao->getNome() .'</h5>
                    <button class="text-center tipos"><h2 class="text-center">Tipos: '. $this->getTipoString() .'</h2></button>
                    <button class="texto texto-extra text-center"><h3>Defesas</h3>'. implode('',$this->getActualDefensesTexto()) .'</button>
                    <h3 class="texto text-center">Stats</h3>
                    <br>
                    <p class="texto text-center">Base Hp: '.$this->hp.' | True Hp: '. $trueStats['hp'] .'</p>
                    <br>
                    <p class="texto text-center">Base Attack: '.$this->attack.' | True Attack: '. $trueStats['attack'] .'</p>
                    <br>
                    <p class="texto text-center">Base Defense: '.$this->defense.' | True Defense: '. $trueStats['defense'] .'</p>
                    <br>
                    <p class="texto text-center">Base Special Attack: '. $this->spAttack .' | True Special Attack: '. $trueStats['spAttack'] .'</p>
                    <br>
                    <p class="texto text-center">Base Special Defense: '. $this->spDefense .' | True Special Defense: '. $trueStats['spDefense'] .'</p>
                    <br>
                    <p class="texto text-center">Base Speed: '. $this->speed .' | True Speed: '. $trueStats['speed'] .'</p>
                    <h3 class="texto text-center">IV\'s</h3>
                    <br>
                    <p class="texto text-center">IV Hp: '.$this->ivHp.'</p>
                    <br>
                    <p class="texto text-center">IV Attack: '.$this->ivAttack.'</p>
                    <br>
                    <p class="texto text-center">IV Defense: '.$this->ivDefense.'</p>
                    <br>
                    <p class="texto text-center">IV Special Attack: '. $this->ivSpAttack .'</p>
                    <br>
                    <p class="texto text-center">IV Special Defense: '. $this->ivSpDefense .'</p>
                    <br>
                    <p class="texto text-center">IV Speed: '. $this->ivSpeed .'</p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>';
    }
   
    public function getStat($string = 'all'){
        switch(strtolower($string)){
            case 'hp':
                return ((int)(((2*$this->hp + $this->ivHp)*$this->lvl)/100)) + $this->lvl + 10;
            break;

            case 'all':
                return ['hp'=>((int)(((2*$this->hp + $this->ivHp)*$this->lvl)/100)) + $this->lvl + 10,
                        'attack'=>(int)((int)(((2*$this->attack + $this->ivAttack)*$this->lvl)/100)+5),
                        'defense'=>(int)((int)(((2*$this->defense + $this->ivDefense)*$this->lvl)/100)+5),
                        'spAttack'=>(int)((int)(((2*$this->spAttack + $this->ivSpAttack)*$this->lvl)/100)+5),
                        'spDefense'=>(int)((int)(((2*$this->spDefense + $this->ivSpDefense)*$this->lvl)/100)+5),
                        'speed'=>(int)((int)(((2*$this->speed + $this->ivSpeed)*$this->lvl)/100)+5)];
            break;
            
            default:
                $ivString = 'iv'.ucfirst($string);
                return (int)((int)(((2*$this->$string + $this->$ivString)*$this->lvl)/100)+5);
            break;
        }
    }
   

    /**
     * Get the value of ivSpeed
     */
    public function getIvSpeed(): ?int
    {
        return $this->ivSpeed;
    }

    /**
     * Get the value of ivSpDefense
     */
    public function getIvSpDefense(): ?int
    {
        return $this->ivSpDefense;
    }

    /**
     * Get the value of ivSpAttack
     */
    public function getIvSpAttack(): ?int
    {
        return $this->ivSpAttack;
    }

    /**
     * Get the value of ivDefense
     */
    public function getIvDefense(): ?int
    {
        return $this->ivDefense;
    }

    /**
     * Get the value of ivAttack
     */
    public function getIvAttack(): ?int
    {
        return $this->ivAttack;
    }

    /**
     * Get the value of ivHp
     */
    public function getIvHp(): ?int
    {
        return $this->ivHp;
    }

    public function getActualDefenses(){

        for($i=1; $i <= 18; $i++){ 
            $actualTipo[$i] = 1;
        }
        $tipoDef1 = $this->tipo1->getDefense();
        // print_r($tipoDef1);
        foreach($tipoDef1 as $key => $value){
            $actualTipo[$key] *= $value;
        }
        $tipoDef2 = $this->tipo2 ? $this->tipo2->getDefense() : [];
        
        // print_r($tipoDef2);
        foreach($tipoDef2 as $key => $value){
            $actualTipo[$key] *= $value;
        }
        return $actualTipo;
    }
    public function getActualDefensesTexto(){
        $tipos = TipoController::listar();
        $textos = [];
        foreach($this->getActualDefenses() as $key => $defense){
            if($defense!=1){
                switch($defense){
                    case 0:
                        $textos[$key] = "<p class='text-center'>Tipo ".$tipos[$key]->getNome()." não causa Nenhum Dano no Pokemon ". $this->nome .".</p>";
                    break;
                    case 0.5:
                        $textos[$key] =  "<p class='text-center'>Tipo ".$tipos[$key]->getNome()." causa apenas 1/2 do Dano no Pokemon ". $this->nome .".</p>";
                    break;
                    case 0.25:
                        $textos[$key] = "<p class='text-center'>Tipo ".$tipos[$key]->getNome()." causa apenas 1/4 do Dano no Pokemon ". $this->nome .".</p>";
                    break;
                    default:
                    
                    $textos[$key] = "<p class='text-center'>Tipo ".$tipos[$key]->getNome()." causam um Dano multiplicado por ". $defense ." no Pokemon ". $this->nome .".</p>";
                    
                    break;
                }
            }

        }
        return $textos;
    }

    /**
     * Get the value of tipo1
     */
    public function getTipo1(): ?Tipo
    {
        return $this->tipo1;
    }

    /**
     * Get the value of tipo2
     */
    public function getTipo2(): ?Tipo
    {
        return $this->tipo2;
    }

    /**
     * Get the value of lvl
     */
    public function getLvl(): ?int
    {
        return $this->lvl;
    }

    /**
     * Set the value of lvl
     */
    public function setLvl(int $lvl): self
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get the value of sprite
     */
    public function getSprite()
    {
        return $this->sprite;
    }

    /**
     * Set the value of sprite
     */
    public function setSprite($sprite): self
    {
        $this->sprite = $sprite;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of regiao
     */
    public function getRegiao(): ?Regiao
    {
        return $this->regiao;
    }

    /**
     * Get the value of hp
     */
    public function getHp(): ?int
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     */
    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get the value of attack
     */
    public function getAttack(): ?int
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     */
    public function setAttack(int $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get the value of defense
     */
    public function getDefense(): ?int
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     */
    public function setDefense(int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of spAttack
     */
    public function getSpAttack(): ?int
    {
        return $this->spAttack;
    }

    /**
     * Set the value of spAttack
     */
    public function setSpAttack(int $spAttack): self
    {
        $this->spAttack = $spAttack;

        return $this;
    }

    /**
     * Get the value of spDefense
     */
    public function getSpDefense(): ?int
    {
        return $this->spDefense;
    }

    /**
     * Set the value of spDefense
     */
    public function setSpDefense(int $spDefense): self
    {
        $this->spDefense = $spDefense;

        return $this;
    }

    /**
     * Get the value of speed
     */
    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    /**
     * Set the value of speed
     */
    public function setSpeed(int $speed): self
    {
        $this->speed = $speed;

        return $this;
    }
}