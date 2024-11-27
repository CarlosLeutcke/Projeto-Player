<?php

class Item {
    private string $name;
    private int $tamanho;
    private string $classe;

    public function __construct(string $name, int $tamanho, string $classe) {
        $this->setName($name);
        $this->setTamanho($tamanho);
        $this->setClasse($classe);
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        if (!empty($name)){
            $this->name = $name;
        } else {
            $this->name = "Insert a Name";
        }
    }

    public function getTamanho(): int {
        return $this->tamanho;
    }

    public function setTamanho(int $tamanho): void {
        if ($tamanho > 0) {
            $this->tamanho = $tamanho;
        } else {
            echo "Informe um tamanho maior que 0.<br>";
            $this->tamanho = 1; 
        }
    }

    public function getClasse(): string {
        return $this->classe;
    }

    public function setClasse(string $classe): void {
        if (!empty($classe)){
            $this->classe = $classe;
        } else {
            $this->classe = "Informe uma Classe entre Ataque, Defesa e Magia";
        }
    }
}
?>
