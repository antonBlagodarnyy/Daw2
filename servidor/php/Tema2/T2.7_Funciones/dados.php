<?php
function mostrarTirada($dados)
{
    foreach ($dados as $k => $v) {
        mostrarDado($v);
    }
}

function mostrarDado($dado)
{
    switch ($dado) {
        case 1:
            echo "<img src=\"dados/1.svg\">";
            break;
        case 2:
            echo "<img src=\"dados/2.svg\">";
            break;
        case 3:
            echo "<img src=\"dados/3.svg\">";
            break;
        case 4:
            echo "<img src=\"dados/4.svg\">";
            break;
        case 5:
            echo "<img src=\"dados/5.svg\">";
            break;
        case 6:
            echo "<img src=\"dados/6.svg\">";
            break;
        default:
            echo "error en switch
                               valor:  $dado";
    }
}

function generarTirada($veces): array {

$tirada = [];

    for ($i = 0; $i < $veces; $i++)
    array_push($tirada, rand(1, 6));

    return $tirada;
    
}
