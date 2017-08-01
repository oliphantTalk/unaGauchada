<?php
    $dic = [1=>'neutro',2=>'neutro',3=>'bueno',4=>'bueno',5=>'genial',6=>'genial',7=>'genial',8=>'MB',9=>'MB',10=>'MB'];
    if(in_array(3, array_keys($dic))){
        echo 'hola';
        $dic[1]='pesimo';
        echo $dic[1];
    }
    $dic2 = ['neutro' => [1, 5], 'bueno' => [6, 10], 'genial' => [11, 16]];
    print_r($dic2);
    $diccionario = [];
    foreach ($dic2 as $key => $value){

        $min = $value[0];
        $max = $value[1];
        echo $min.''.$max.''.$key;

        for($i = $min; $i <= $max; $i++){
            echo $i;
            $diccionario[$i] = $key;

        }
    };
    print_r($diccionario);