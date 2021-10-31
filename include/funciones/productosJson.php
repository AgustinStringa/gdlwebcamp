<?php 

    function productosJson(&$boletos, &$camisas = 0, &$etiquetas = 0){
        $dias = array(0 => "un_dia", 1 => "pase_completo", 2 => "pase_dos_dias");


        //Se usa el array total_boletos para cambiar el nombre de las llaves
        $total_boletos = array_combine($dias, $boletos);
        // echo "<pre>";
        // var_dump($total_boletos);
        // echo "</pre>";
        //se crea el array json para luego aplicarle el metodo json_encode y generar un json
        //una vez hecho, se puede guardar el json en la base de datos
        $json = array();


        foreach($total_boletos as $key => $value):
            if((int) $value > 0 ):
                $json[$key] = (int) $value;
            endif;  
        endforeach;

        //agregando camisas y etiquetas al JSON

        $camisas = (int) $camisas;
        $etiquetas = (int) $etiquetas;

         if($camisas > 0){
             $json['camisas'] = $camisas;
         }

         if($etiquetas > 0){
             $json['etiquetas'] = $etiquetas;
         }


        
        return json_encode($json);
    }


    function eventosJson(&$eventos){

        $eventos_json = array();

        foreach($eventos as $evento){
            $eventos_json['eventos'][] = $evento;
        }

        return json_encode($eventos_json);
    }

?>