<?php 
    function productos_json(&$boletos, &$camisas = 0, &$etiquetas = 0) /* & = paso por referencia */
    {
       $dias = array(0 => 'un_dia', 1 => 'pase_completo', 2 => 'pase_2dias');  //declarar llaves
       unset($boletos['un_dia']['precio']);
       unset($boletos['completo']['precio']);
       unset($boletos['2dias']['precio']);
       $total_boletos = array_combine($dias, $boletos);  //comnbinacion de arrays
       
    //    $json = array();   //cracion de array para json, simpre debe de ir en array para el encode

        foreach($total_boletos as $key => $values):   //valida la cantidad de oletos
            if((int) $values['cantidad'] > 0):  //convierte valor a int
                $json[$key] = (int) $values['cantidad'];    //agrega a json con Key de boletos
            endif;
        endforeach;


        $camisas = (int) $camisas['cantidad'];   //convierta a int
        if($camisas > 0):
            $json['camisas'] = $camisas;   //agrega a json si es mayor a 0
        endif;


        $etiquetas = (int) $etiquetas['cantidad'];   //convierta a int
        if($etiquetas > 0):
            $json['etiquetas'] = $etiquetas;  //agrega a json si es mayor a 0
        endif;

        return json_encode($json);   //regresa el array de json
    }


    function eventos_json(&$eventos)    
    {
        $eventos_json = array();  

        foreach($eventos as $evento):
            $eventos_json['eventos'][] = $evento;  //se agrega un segundo nivel para que se creo el json en string ya que son varios valores
        endforeach;
        
        return json_encode($eventos_json);

    }



?>