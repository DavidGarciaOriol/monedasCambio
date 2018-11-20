<?php

function dameErCambioSimplified($euros, $centimos){
    
    $quantities = [500, 200, 100, 50, 20, 10, 5, 2, 1, 50, 20, 10, 5, 2, 1]; // Billetes + Monedas
    $msg = ""; // Salida

    for ($i = 0; $i < count($quantities); $i++){ // Bucle principal. Recorre los billetes para ser divisores de la vuelta.

        if ($i === 9) $euros = round($centimos); // Cambiará el contador a céntimos cuando sea necesario.

        if($quantities[$i] <= $euros){ // Comprobará que deba o no tener en cuenta el billete procedente.

            $quantity = floor($euros/$quantities[$i]); // Cantidad del billete al que apunta el bucle.
            
            $euros = ($euros%$quantities[$i]); // Cantidad que se calculará en la siguiente vuelta del bucle.

            /* Genera el mensaje final que será la salida de la función.
            Tiene en cuenta la posición y el billete que se empleará,
            así como el cambio de billetes a moneda, y a céntimos. */

            if ($i < 7){

                if($quantity <= 1) $msg .= "{$quantity} billete de {$quantities[$i]} €.<br>";
                else $msg .= "{$quantity} billetes de {$quantities[$i]} €.<br>";

            } else if ($i >= 7 && $i < 9){

                if($quantity <= 1)$msg .= "{$quantity} moneda de {$quantities[$i]} €.<br>";
                else $msg .= "{$quantity} monedas de {$quantities[$i]} €.<br>";

            } else if ($i >= 9){

                if($quantity <= 1) $msg .= "{$quantity} moneda de {$quantities[$i]} cént.<br>";
                else $msg .= "{$quantity} monedas de {$quantities[$i]} cént.<br>";

            }
        }
    } return $msg;
}