<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelArray {

    function ordenar_arreglo($array) {
        for ($i = 1; $i < count($array); $i++) {
            for ($j = 0; $j < count($array) - $i; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $k = $array[$j + 1];
                    $array[$j + 1] = $array[$j];
                    $array[$j] = $k;
                }
            }
        }
        return $array;
    }

    function ininiciar_arreglo_aux($array) {
        $array_aux = array();
        $cont = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 8; $j++) {
                $array_aux[$i][$j] = $array[$cont++];
            }
        }
        return $array_aux;
    }

    function obtener_N($array) {
        return count($array);
    }

    function obtener_min($array) {
        return $array[0];
    }

    function obtener_max($array) {
        return $array[39];
    }

    function obtener_rango($max, $min) {
        return $max - $min;
    }

    function obtener_clase($N) {
        $temp = sqrt($N);
        return round($temp);
    }

    function obtener_anchura_clase($R, $K) {
        $temp = $R / $K;
        return round($temp);
    }

    function obtener_clases($min, $max, $clase, $ancho) {
        $clases = array();
        for ($i = 0; $i < $clase; $i++) {
            $clases[$i][0] = $min;
            $min += $ancho - 1;
            $clases[$i][1] = $min;
            $min++;
        }
        //agregar +1 o -1 para que cuadren los valores
        if ($clases[$clase - 1][1] < $max) {
            $clases[$clase - 1][1] = $max;
        }
        //igualamos a null la posición 6
        $clases[$clase][0] = null;
        $clases[$clase][1] = null;
        return $clases;
    }

    function obtener_frecuencia_absoluta($clase, $array, $clases) {
        $fa = array();
        //iniciamos el arreglo en ceros
        for ($i = 0; $i < count($clases); $i++) {
            $fa[$i] = 0;
        }
        for ($i = 0; $i <= count($clases); $i++) {
            for ($j = 0; $j < count($array); $j++) {
                if ($array[$j] >= $clases[$i][0] and $array[$j] <= $clases[$i][1]) {
                    $fa[$i] ++;
                }
                if ($array[$j] > $clases[$i][1]) {
                    break;
                }
            }
        }
        //sumatoria de elementos
        $acumulador = 0;
        for ($i = 0; $i < count($clases); $i++) {
            $acumulador += $fa[$i];
        }
        $fa[$clase] = $acumulador;
        return $fa;
    }

    function obtener_frecuencia_absoluta_acumulada($clase, $fa) {
        $faA = array();
        $aux = 0;
        for ($i = 0; $i < count($fa); $i++) {
            $aux += $fa[$i];
            $faA[$i] = $aux;
        }
        $faA[$clase] = "-";
        return $faA;
    }

    function obtener_frecuencia_relativa($clase, $N, $fa) {
        $fr = array();
        //obtenemos los valores de fr con decimales
        for ($i = 0; $i < $clase; $i++) {
            $fr[$i] = $fa[$i] * 100 / $N;
        }
        //separamos los que no son enteros
        $aux = array();
        for ($i = 0; $i < $clase; $i++) {
            if (!is_int($fr[$i])) {
                array_push($aux, $fr[$i]);
            }
        }
        //creamos un array de índices
        $aux2 = array();
        for ($i = 0; $i < $clase; $i++) {
            if (!is_int($fr[$i])) {
                array_push($aux2, $i);
            }
        }
        //ordenamos el arreglo y el arreglo auxiliar
        for ($i = 1; $i < count($aux); $i++) {
            for ($j = 0; $j < count($aux) - $i; $j++) {
                if ($aux[$j] > $aux[$j + 1]) {
                    $k = $aux[$j + 1];
                    $aux[$j + 1] = $aux[$j];
                    $aux[$j] = $k;
                    $k2 = $aux2[$j + 1];
                    $aux2[$j + 1] = $aux2[$j];
                    $aux2[$j] = $k2;
                }
            }
        }
        //convertimos los valores en enteros
        $mitad = count($aux) / 2;
        for ($i = 0; $i < $mitad; $i++) {
            $num = $aux2[$i];
            $fr[$num] = $fr[$num] + 0.5;
        }
        for ($i = $mitad; $i < count($aux); $i++) {
            $num = $aux2[$i];
            $fr[$num] = $fr[$num] - 0.5;
        }
        //obtenemos la suma
        $acum = 0;
        for ($i = 0; $i < count($fr); $i++) {
            $acum += $fr[$i];
        }
        $fr[$clase] = $acum;

        return $fr;
    }

    function obtener_frecuencia_relativa_acumulada($clase, $fr) {
        $frA = array();
        $aux = 0;
        for ($i = 0; $i < count($fr); $i++) {
            $aux += $fr[$i];
            $frA[$i] = $aux;
        }
        $frA[$clase] = "-";
        return $frA;
    }

    function obtener_fi($clase, $clases) {
        $fi = array();
        for ($i = 0; $i < count($clases); $i++) {
            $fi[$i] = ($clases[$i][0] + $clases[$i][1]) / 2;
        }
        $fi[$clase] = "-";
        return $fi;
    }

    function obtener_faxfi($clase, $fa, $fi) {
        $faxfi = array();
        for ($i = 0; $i < $clase; $i++) {
            $faxfi[$i] = $fa[$i] * $fi[$i];
        }
        //obtenemos la suma
        $acum = 0;
        for ($i = 0; $i < count($faxfi); $i++) {
            $acum += $faxfi[$i];
        }
        $faxfi[$clase] = $acum;
        return $faxfi;
    }

    function obtener_media_aritmetica_da($clase, $faxfi, $N) {
        $aux = $faxfi[$clase] / $N;
        return round($aux, 2);
    }

    function obtener_media_aritmetica_dna($array_aux, $N) {
        $acum = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 8; $j++) {
                $acum += $array_aux[$i][$j];
            }
        }
        $acum /= $N;
        return round($acum, 2);
    }

//    function obtener_media_aritmetica_dna($array_aux, $N) {
//        $acum = 0;
//        for ($i = 0; $i < 5; $i++) {
//            for ($j = 0; $j < 8; $j++) {
//                $acum += $array_aux[$i][$j];
//            }
//        }
//        $acum2 = $acum / $N;
//        return "Sumatoria= " . $acum . " | Resultado= " . round($acum2, 2);
//    }

    function obtener_faxlog_fi($clase, $fa, $fi) {
        $faxlogfi = array();
        for ($i = 0; $i < $clase; $i++) {
            $aux = $fa[$i] * log10($fi[$i]);
            $faxlogfi[$i] = round($aux, 2);
        }
        //obtenemos la suma
        $acum = 0;
        for ($i = 0; $i < count($faxlogfi); $i++) {
            $acum += $faxlogfi[$i];
        }
        $faxlogfi[$clase] = $acum;
        return $faxlogfi;
    }

    function obtener_media_geometrica_da($clase, $faxlogfi, $N) {
        $aux = $faxlogfi[$clase] / $N;
        $aux = round($aux, 2);
        $aux = pow(10, $aux);
        return round($aux, 2);
    }

    function obtener_media_geometrica_dna($array_aux, $N) {
        $acum = 1;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 8; $j++) {
                $acum *= $array_aux[$i][$j];
            }
        }
        $acum = pow($acum, (1 / $N));
        return round($acum, 2);
    }

//    function obtener_media_geometrica_dna($array_aux, $N) {
//        $acum = 1;
//        for ($i = 0; $i < 5; $i++) {
//            for ($j = 0; $j < 8; $j++) {
//                $acum *= $array_aux[$i][$j];
//            }
//        }
//        $acum = round($acum, 2);
//        $acum2 = pow($acum, (1 / $N));
//        return "Sumatoria= " . $acum . " | Resultado= " . round($acum2, 2);
//    }

    function obtener_fadivfi($clase, $fa, $fi) {
        $fadivfi = array();
        for ($i = 0; $i < $clase; $i++) {
            $aux = $fa[$i] / $fi[$i];
            $fadivfi[$i] = round($aux, 2);
        }
        //obtenemos la suma
        $acum = 0;
        for ($i = 0; $i < count($fadivfi); $i++) {
            $acum += $fadivfi[$i];
        }
        $fadivfi[$clase] = $acum;
        return $fadivfi;
    }

    function obtener_media_armonica_da($clase, $fadivfi, $N) {
        $aux = $N / $fadivfi[$clase];
        return round($aux, 2);
    }

    function obtener_media_armonica_dna($array_aux, $N) {
        $acum = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 8; $j++) {
                $acum += 1 / $array_aux[$i][$j];
            }
        }
        $acum = round($acum, 2);
        $acum = $N / $acum;
        return round($acum, 2);
    }

//    function obtener_media_armonica_dna($array_aux, $N) {
//        $acum = 0;
//        for ($i = 0; $i < 5; $i++) {
//            for ($j = 0; $j < 8; $j++) {
//                $acum += 1 / $array_aux[$i][$j];
//            }
//        }
//        $acum = round($acum, 2);
//        $acum2 = $N / $acum;
//        return "Sumatoria= " . $acum . " | Resultado= " . round($acum2, 2);
//    }

    function obtener_ficuadradoxfa($clase, $fa, $fi) {
        $ficuadradoxfa = array();
        for ($i = 0; $i < $clase; $i++) {
            $aux = pow($fi[$i], 2) * $fa[$i];
            $ficuadradoxfa[$i] = round($aux, 2);
        }
        //obtenemos la suma
        $acum = 0;
        for ($i = 0; $i < count($ficuadradoxfa); $i++) {
            $acum += $ficuadradoxfa[$i];
        }
        $ficuadradoxfa[$clase] = $acum;
        return $ficuadradoxfa;
    }

    function obtener_media_cuadratica_da($clase, $ficuadradoxfa, $N) {
        $aux = sqrt(($ficuadradoxfa[$clase]) / $N);
        return round($aux, 2);
    }

    function obtener_media_cuadratica_dna($array_aux, $N) {
        $acum = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 8; $j++) {
                $acum += pow($array_aux[$i][$j], 2);
            }
        }
        $acum = sqrt($acum / $N);
        return round($acum, 2);
    }

//    function obtener_media_cuadratica_dna($array_aux, $N) {
//        $acum = 0;
//        for ($i = 0; $i < 5; $i++) {
//            for ($j = 0; $j < 8; $j++) {
//                $acum += pow($array_aux[$i][$j], 2);
//            }
//        }
//        $acum2 = sqrt($acum / $N);
//        return "Sumatoria= " . $acum . " | Resultado= " . round($acum2, 2);
//    }

    function obtener_faxabsfimenosfa($clase, $fa, $fi, $x) {
        $faxabsfimenosfa = array();
        for ($i = 0; $i < $clase; $i++) {
            $aux = $fa[$i] * (abs($fi[$i] - $x));
            $faxabsfimenosfa[$i] = round($aux, 2);
        }
        //obtenemos la suma
        $acum = 0;
        for ($i = 0; $i < count($faxabsfimenosfa); $i++) {
            $acum += $faxabsfimenosfa[$i];
        }
        $faxabsfimenosfa[$clase] = $acum;
        return $faxabsfimenosfa;
    }

    function obtener_desviacion_media_da($clase, $faxabsfimenosfa, $N) {
        $aux = $faxabsfimenosfa[$clase] / $N;
        return round($aux, 2);
    }

    function obtener_desviacion_media_dna($array_aux, $x, $N) {
        $acum = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 8; $j++) {
                $acum += abs($array_aux[$i][$j] - $x);
            }
        }
        $acum = round($acum, 2);
        $acum /= $N;
        return round($acum, 2);
    }

//    function obtener_desviacion_media_dna($array_aux, $x, $N) {
//        $acum = 0;
//        for ($i = 0; $i < 5; $i++) {
//            for ($j = 0; $j < 8; $j++) {
//                $acum += abs($array_aux[$i][$j] - $x);
//            }
//        }
//        $acum = round($acum, 2);
//        $acum2 = $acum / $N;
//        return "Sumatoria= " . $acum . " | Resultado= " . round($acum2, 2);
//    }

    function obtener_mediana_da($array_aux, $clases, $fa, $faA, $N) {
        $temp = $N / 2;
        $cont = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 8; $j++) {
                $cont++;
                if ($cont == $temp) {
                    $valor = $array_aux[$i][$j];
                    break;
                }
            }
        }

        for ($i = 0; $i < count($clases); $i++) {
            if ($valor >= $clases[$i][0] and $valor <= $clases[$i][1]) {
                $fila = $i;
            }
        }
        $L = $clases[$fila][0];
        $FA = $faA[$fila - 1];
        $f = $fa[$fila];
        $i = $clases[$fila][1] - $clases[$fila][0];
        $resp = $L + (($temp - $FA) / $f) * $i;
        return round($resp, 2);
    }

    function obtener_mediana_dna($array_aux, $N) {
        $temp = $N / 2;
        $cont = 0;
        $valor = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 8; $j++) {
                $cont++;
                if ($cont == $temp || $cont == $temp + 1) {
                    $valor += $array_aux[$i][$j];
                }
            }
        }
        return $valor / 2;
    }

    function obtener_moda_da($fa, $clases) {
        $mayor = 1;
        $indices = array();
        $resultados = array();
        $aux = "";
        //obtenemos el valor de fa mayor 
        for ($i = 0; $i < count($fa) - 1; $i++) {
            if ($fa[$i] > $mayor) {
                $mayor = $fa[$i];
            }
        }
        //verificamos si ha varios fa con el mismo valor y guardamos en un
        // arreglo las posiciones
        for ($j = 0; $j < count($fa); $j++) {
            if ($fa[$j] == $mayor) {
                array_push($indices, $j);
            }
        }
        //
        for ($j = 0; $j < count($indices); $j++) {
            $resultados[$j] = round((($clases[$indices[$j]][0] + $clases[$indices[$j]][1]) / 2), 2);
        }
        //concatenando al resultado
        for ($j = 0; $j < count($resultados); $j++) {
            $aux = $aux . $resultados[$j]."<br>";
        }
        if (count($indices) == 1) {
            $aux = $aux . "Unimodal<br>";
        }
        if (count($indices) == 2) {
            $aux = $aux . "Bimodal<br>";
        }
        if (count($indices) >= 3) {
            $aux = $aux . "Multimodal<br>";
        }
        return $aux;
    }

    function obtener_moda_dna($array_cadena) {
        $temp = "";
        $mayor = 1;
        $contador = 0;
        asort($array_cadena);
        $aux = array_count_values($array_cadena);
        foreach ($aux as $key) {
            if ($key > $mayor) {
                $mayor = $key;
            }
        }
        foreach ($aux as $key => $value) {
            if ($value == $mayor) {
                $temp = $temp . $key . " aparece " . $value . " veces <br>";
                $contador++;
            }
        }
        if ($contador == 1) {
            $temp = $temp . "Unimodal";
        }
        if ($contador == 2) {
            $temp = $temp . "Bimodal";
        }
        if ($contador >= 3) {
            $temp = $temp . "Multimodal";
        }
        return $temp;
    }

    function obtener_pastel($fa, $N) {
        $arreglo = array();
        for ($i = 0; $i < count($fa) - 1; $i++) {
            $x = $fa[$i] * 360 / $N;
            $arreglo[$i] = $x;
        }
        return $arreglo;
    }

    ///////////////////////////////////////////
    //cuantiles
    function cuantil_obtener_posicicion_da($cuantil, $N, $num) {
        return round(40 / $cuantil * $num);
    }

    function cuantil_obtener_da($cuantil, $array_aux, $clases, $fa, $faA, $N, $num) {
        $temp = round($N / $cuantil * $num);
        if ($temp == 40) {
            $temp--;
        }
        $cont = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 8; $j++) {
                if ($cont == $temp) {
                    $valor = $array_aux[$i][$j];
                    break;
                }
                $cont++;
            }
        }

        for ($i = 0; $i < count($clases); $i++) {
            if ($valor >= $clases[$i][0] and $valor <= $clases[$i][1]) {
                $fila = $i;
            }
        }
        $L = $clases[$fila][0];
        if ($fila - 1 >= 0) {
            $FA = $faA[$fila - 1];
        } else {
            $FA = 0;
        }
        $f = $fa[$fila];
        $i = $clases[$fila][1] - $clases[$fila][0];
        $resp = $L + (($temp - $FA) / $f) * $i;
        return round($resp, 2);
    }

}
