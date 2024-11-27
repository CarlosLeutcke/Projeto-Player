<?php

class Player {
    private string $nickname;
    private int $nivel;
    private Inventario $inventario;
    private bool $entrouNoJogo = false;
    private int $novoespaco = 0;

    public function __construct(string $nickname) {
        $this->setNickname($nickname);
        $this->nivel = 1; 
        $this->inventario = new Inventario();
    }

    public function getNickname(): string {
        return $this->nickname;
    }

    public function setNickname(string $nickname): void {
        if (!empty($nickname)) {
            $this->nickname = $nickname;
        } else {
            $this->nickname = "Nome Inválido, O nickname não pode ser vazio";
        }
    }

    public function coletarItem(Item $item): void {
        $itens = $this->inventario->getItens();
        $espacoOcupado = 0;
        foreach ($itens as $itemvariavel) {
            $espacoOcupado += $itemvariavel->getTamanho();
        }
        $capacidadeMaxima = $this->inventario->getCapacidadeMaxima();
        $espacoDisponivel = $capacidadeMaxima - $espacoOcupado;
        if ($item->getTamanho() > $espacoDisponivel) {
            echo "<h4>Impossível carregar o item '{$item->getName()}'. Não há espaço suficiente no inventário!<br></h4>";
        } else {
            $this->inventario->adicionar($item); 
            echo "<h4>";
            echo "O jogador {$this->nickname} está coletando um item:<br>";
            echo "Item '{$item->getName()}' adicionado ao inventário!<br>";
            echo "</h4>";
        }
        echo "<hr>";
    }

    public function soltarItem(string $nomeItem): void {
        echo "<h3>O Jogador {$this->getNickname()} está soltando um item</h3>";
        $this->inventario->removerItem($nomeItem);
        echo "</h3><hr>";
    }

    public function subirNivel(): void {
        $this->mostrarInventario();
        $this->nivel++;
        $this->novoespaco = $this->nivel * 3;
        echo "<h4>";
        echo "O Jogador {$this->getNickname()} está subindo de nível!!!!!<br>";
        echo "{$this->nickname} subiu para o nível {$this->nivel}!<br>";
        echo "A capacidade do inventário aumentou em {$this->novoespaco}.<br>";
        $this->atualizarCapacidadeInventario();
    }

    private function atualizarCapacidadeInventario(): void {
        $novaCapacidade = 20 + $this->novoespaco;
        $this->inventario->setCapacidadeMaxima($novaCapacidade);
        echo "Capacidade máxima do inventário atualizada para {$this->inventario->getCapacidadeMaxima()}<br><hr>";
        $this->mostrarInventario(); 
        echo "</h4>";
    }

    public function mostrarStatus(): void {
        if (!$this->entrouNoJogo) {
            echo "<h2>";
            echo "O Jogador {$this->nickname} entrou no jogo no nível {$this->nivel}<br>";
            echo "Capacidade máxima do inventário: {$this->inventario->getCapacidadeMaxima()}";
            $this->entrouNoJogo = true  ; 
        }
    }

    public function mostrarInventario(): void {
        $itens = $this->inventario->getItens();
        $capacidadeMaxima = $this->inventario->getCapacidadeMaxima();
        $espacoOcupado = 0;
        foreach ($itens as $item) {
            $espacoOcupado += $item->getTamanho(); 
        }
        
        echo "<br><b>Inventário do {$this->getNickname()}:</b><br>";
        echo "<b>Itens no inventário: ({$espacoOcupado}/{$capacidadeMaxima})</b><br>";

        if ($espacoOcupado == $capacidadeMaxima) {
        
            echo "<b>O inventário está cheio!</b><br>";
        }
    
        if (empty($itens)) {
            echo "<b>O inventário está vazio.</b><br>";
        } else {
            foreach ($itens as $item) {
                echo "<b>- {$item->getName()} - ({$item->getTamanho()}) - ({$item->getClasse()})</b><br>";
            }
            echo "</h2><hr>";
        }
    }
}

?>