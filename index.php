<?php
require_once('./class/Item.php');
require_once('./class/Inventario.php');
require_once('./class/Player.php');
require_once('./class/Ataque.php');
require_once('./class/Defesa.php');
require_once('./class/Magia.php');

$player1 = new Player("Carlos");
$player2 = new Player("José");

$itens = [
    new Ataque("Espada Longa"), 
    new Ataque("Espada Curta"),
    new Ataque("Espada de Madeira"),
    new Defesa("Escudo de Ferro"),
    new Defesa("Escudo de Viking"),
    new Defesa("Escudo de Madeira"),
    new Magia("Feitiço de Relâmpago"),
    new Magia("Feitiço de Fogo")
];


$player1->mostrarStatus();
$player1->mostrarInventario();
$player1->coletarItem($itens[0]);
$player1->coletarItem($itens[1]);
$player1->coletarItem($itens[4]);
$player1->coletarItem($itens[6]);
$player1->subirNivel();
$player1->coletarItem($itens[6]);
$player1->coletarItem($itens[3]);
$player1->coletarItem($itens[4]);
$player1->mostrarInventario();
$player1->soltarItem("Espada Longa"); 
$player1->mostrarInventario();

echo "<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>";

$player2->mostrarStatus();
$player2->coletarItem($itens[6]);
$player2->coletarItem($itens[2]);
$player2->coletarItem($itens[4]);
$player2->coletarItem($itens[5]);
$player2->subirNivel();
$player2->soltarItem("Escudo de Viking");  
$player2->mostrarInventario();
?>