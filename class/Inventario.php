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
            echo "<h4>Item '{$item->getName()}' adicionado ao inventário!<br></h4>";
        } else {
            echo "<h4>Impossível carregar o item '{$item->getName()}'. Não há espaço suficiente no inventário!<br></h4>";
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

    public function atualizarCapacidade(int $nivel): void {
        $novaCapacidade = 20 + ($nivel * 3);
        $this->setCapacidadeMaxima($novaCapacidade);
        
        echo "Capacidade máxima do inventário atualizada para {$this->capacidadeMaxima}<br><hr>";
    }

    public function mostrarInventario(string $nickname): void {
        $capacidadeMaxima = $this->getCapacidadeMaxima();
        $espacoOcupado = 0;
        foreach ($this->itens as $item) {
            $espacoOcupado += $item->getTamanho();
        }

        echo "<br><b>Inventário do {$nickname}:</b><br>";
        echo "<b>Itens no inventário: ({$espacoOcupado}/{$capacidadeMaxima})</b><br>";

        if ($espacoOcupado == $capacidadeMaxima) {
            echo "<b>O inventário está cheio!</b><br>";
        }

        if (empty($this->itens)) {
            echo "<b>O inventário está vazio.</b><br>";
        } else {
            foreach ($this->itens as $item) {
                echo "<b>- {$item->getName()} - ({$item->getTamanho()}) - ({$item->getClasse()})</b><br>";
            }
            echo "</h2><hr>";
        }
    }
}
?>
