<?php
require_once('./class/Item.php');
require_once('./class/Inventario.php');
require_once('./class/Player.php');
require_once('./class/Ataque.php');
require_once('./class/Defesa.php');
require_once('./class/Magia.php');

function inicializarJogador(Player $player, array $itens) {
    $player->mostrarStatus();
    $player->mostrarInventario();
    
    foreach ($itens as $item) {
        $player->coletarItem($item);
    }
    
    $player->subirNivel();
    $player->mostrarInventario();
    
    return $player;
}

function soltarEExibirInventario(Player $player, string $itemNome) {
    $player->soltarItem($itemNome);
    $player->mostrarInventario();
}

$player1 = new Player("Carlos");
$player2 = new Player("José");

$itensPlayer1 = [
    new Ataque("Espada Longa"), 
    new Ataque("Espada Curta"),
    new Defesa("Escudo de Viking"),
    new Magia("Feitiço de Relâmpago"),
    new Magia("Feitiço de Relâmpago"), // Repetido intencionalmente
    new Defesa("Escudo de Ferro"),
    new Defesa("Escudo de Viking")
];

$itensPlayer2 = [
    new Magia("Feitiço de Relâmpago"),
    new Ataque("Espada de Madeira"),
    new Defesa("Escudo de Viking"),
    new Defesa("Escudo de Madeira")
];

$player1 = inicializarJogador($player1, $itensPlayer1);
soltarEExibirInventario($player1, "Espada Longa");

echo "<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";

$player2 = inicializarJogador($player2, $itensPlayer2);
soltarEExibirInventario($player2, "Escudo de Viking");
?>
