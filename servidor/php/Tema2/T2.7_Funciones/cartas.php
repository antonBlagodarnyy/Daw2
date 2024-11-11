<?php
function imprimirCartas($cartas)
{
    foreach ($cartas as $k => $v) {
        imprimirCarta($v);
    }
}
function imprimirCarta($carta)
{
    switch ($carta) {
        case 1:
            echo "<img  width= 100px src=\"cartas/c1.svg\">";
            break;
        case 2:
            echo "<img width= 100px src=\"cartas/c2.svg\">";
            break;
        case 3:
            echo "<img width= 100px src=\"cartas/c3.svg\">";
            break;
        case 4:
            echo "<img width= 100px src=\"cartas/c4.svg\">";
            break;
        case 5:
            echo "<img width= 100px src=\"cartas/c5.svg\">";
            break;
        case 6:
            echo "<img width= 100px src=\"cartas/c6.svg\">";
            break;
        case 7:
            echo "<img width= 100px src=\"cartas/c7.svg\">";
            break;
        case 8:
            echo "<img width= 100px src=\"cartas/c8.svg\">";
            break;
        case 9:
            echo "<img width= 100px src=\"cartas/c9.svg\">";
            break;
        case 10:
            echo "<img width= 100px src=\"cartas/c10.svg\">";
            break;
        default:
            echo "error en switch
                            valor:  " . $carta;
    }
}

function generarBaraja($veces) :array{
    $cartas = [];
    
    for ($i = 0; $i < $veces; $i++)
    array_push($cartas, rand(1, 10));

    return $cartas;
}