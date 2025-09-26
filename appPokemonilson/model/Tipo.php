<?php

class Tipo{
    private ?int $id;
    private ?string $nome;
    private ?array $attack;
    private ?array $defense;

    public function __construct($id,$nome,$attack,$defense){
        $this->id = $id;
        $this->nome = $nome;
        $tattack = $attack!=null ? explode('-',$attack) : [1];
        for($i=1;$i < count($tattack);$i+=2){ 
            $this->attack[$tattack[$i-1]] = $tattack[$i];
        }
        $tdefense = $defense!=null ? explode('-',$defense) : [1];
        for($i=1;$i < count($tdefense);$i+=2){ 
            $this->defense[$tdefense[$i-1]] = $tdefense[$i];
        }
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of attack
     */
    public function getAttack(): array
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     */
    public function setAttack(array $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get the value of defense
     */
    public function getDefense(): array
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     */
    public function setDefense(array $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }
}