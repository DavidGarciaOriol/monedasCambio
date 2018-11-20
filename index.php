<?php

require_once 'functions.php';



    $message = "";

    if(isset($_GET['importe']) && isset($_GET['pagado'])){

        $importe = $_GET['importe'];
        $pagado = $_GET['pagado'];

        if($importe === "" || $pagado === ""){
            // Si no recibo nada de importe && pagado.
            $message = "Err_1: Debe introducir un importe y la cantidad pagada. Los campos no pueden estar vacíos.";

        } else if(!is_numeric($importe) || !is_numeric($pagado)){
            // Si no recibo un número.
            $message = "Err_2: Debes introducir una cantidad numérica (float) de importe y pagado.";

        } else if($importe < 0 || $pagado < 0){
            // Si la cantidad es negativa.
            $message = "Err_3: No se puede introducir una cantidad negativa en importe o pagado.";

        } else if ($importe > $pagado){
            // Si el importe supera lo pagado.
            $message = "Err_4: No se puede devolver cambio. Ha pagado menos que el importe estimado.";

        } else {

            // Cálculo de Cambio y separación Euro - Céntimo.

            $cambioTotal = $pagado - $importe;
            $cambioEuro = floor($cambioTotal);
            $cambioCentimo = (($cambioTotal - $cambioEuro) * 100);

            // Salida de datos por pantalla. Importe, Pagado, y Cambio.

            echo "Importe a Pagar: {$importe} <br>";
            echo "Importe pagado por el cliente: {$pagado} <br> <br> === === === <br> <br> Vuelta: <br>";
            
            $message = dameErCambioSimplified($cambioEuro, $cambioCentimo);
        }

    } else {

       $message = "No se ha introducido ninguna cantidad de importe o pagado.";
    }
    
    echo $message;