<?php

class Player {
    private string $nickname;
    private int $nivel;
    private Inventario $inventario;
    private bool $entrouNoJogo = false;

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
        $this->inventario->adicionar($item);
    }

    public function soltarItem(string $nomeItem): void {
        echo "<h3>O Jogador {$this->getNickname()} está soltando um item</h3>";
        $this->inventario->removerItem($nomeItem);
        echo "</h3><hr>";
    }

    public function subirNivel(): void {
        $this->mostrarInventario();
        $this->nivel++;
        echo "<h4>";
        echo "O Jogador {$this->getNickname()} está subindo de nível!!!!!<br>";
        echo "{$this->nickname} subiu para o nível {$this->nivel}!<br>";
        echo "A capacidade do inventário aumentou.<br>";
        $this->inventario->atualizarCapacidade($this->nivel);
        echo "</h4>";
    }

    public function mostrarStatus(): void {
        if (!$this->entrouNoJogo) {
            echo "<h2>";
            echo "O Jogador {$this->nickname} entrou no jogo no nível {$this->nivel}<br>";
            echo "Capacidade máxima do inventário: {$this->inventario->getCapacidadeMaxima()}";
            $this->entrouNoJogo = true; 
        }
    }

    public function mostrarInventario(): void {
        $this->inventario->mostrarInventario($this->nickname);
    }
}
?>
