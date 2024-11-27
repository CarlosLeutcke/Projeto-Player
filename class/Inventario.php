<?php

class Inventario {
    private int $capacidadeMaxima;
    private array $itens;

    public function __construct() {
        $this->capacidadeMaxima = 20; 
        $this->itens = [];
    }

    public function getCapacidadeMaxima(): int {
        return $this->capacidadeMaxima;
    }

    public function setCapacidadeMaxima(int $novaCapacidade): void {
        $this->capacidadeMaxima = $novaCapacidade;
    }

    public function getItens(): array {
        return $this->itens;
    }

    public function capacidadeLivre(): int {
        $ocupado = 0;
        foreach ($this->itens as $item) {
            $ocupado += $item->getTamanho();
        }
        return $this->capacidadeMaxima - $ocupado;
    }

    public function adicionar(Item $item): void {
        if ($item->getTamanho() <= $this->capacidadeLivre()) {
            $this->itens[] = $item;
        }
    }

    public function removerItem(string $nomeItem): void {
        foreach ($this->itens as $index => $item) {
            if ($item->getName() == $nomeItem) {
                unset($this->itens[$index]);
                echo "<h4>Item '{$nomeItem}' foi removido do inventário.</h4>";
                return;
            }
        }
        echo "Item '{$nomeItem}' não encontrado no inventário.<br>";
    }
}

?>