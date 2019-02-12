
<?php

include_once './ModelArray.php';
session_start();

$cadena = $_GET["valores"];
$_SESSION['cadena'] = $cadena;
$array_cadena = (explode(",", $cadena));
if (count($array_cadena) != 40) {
    $_SESSION['estado'] = false;
    header("location:index.php");
} else {
        $_SESSION['estado'] = true;
    $modelArray = new ModelArray();
    $array = $modelArray->ordenar_arreglo($array_cadena);
//almacenamos datos en sesión
//arreglo bidimiensional
    $array_aux = $modelArray->ininiciar_arreglo_aux($array);
    $_SESSION['array_aux'] = $array_aux;
//valor de n
    $N = $modelArray->obtener_N($array);
    $_SESSION['N'] = $N;
//valor mínimo
    $min = $modelArray->obtener_min($array);
    $_SESSION['min'] = $min;
//valos máximo
    $max = $modelArray->obtener_max($array);
    $_SESSION['max'] = $max;
//valor del rango
    $rango = $modelArray->obtener_rango($max, $min);
    $_SESSION['rango'] = $rango;
//valor de la clase
    $clase = $modelArray->obtener_clase($N);
    $_SESSION['clase'] = $clase;
//anchura de la clase
    $ancho = $modelArray->obtener_anchura_clase($rango, $clase);
    $_SESSION['ancho'] = $ancho;


    /* _____________________________________________________ */
//Tabla de inferencia
//obtenemos las clases
    $clases = $modelArray->obtener_clases($min, $max, $clase, $ancho);
    $_SESSION['clases'] = $clases;
//calculamos frecuencia absoluta
    $fa = $modelArray->obtener_frecuencia_absoluta($clase, $array, $clases);
    $_SESSION['fa'] = $fa;
//calculamos frecuencia absoluta acumulada
    $faA = $modelArray->obtener_frecuencia_absoluta_acumulada($clase, $fa);
    $_SESSION['faA'] = $faA;
//calculamos frecuencia relativa
    $fr = $modelArray->obtener_frecuencia_relativa($clase, $N, $fa);
    $_SESSION['fr'] = $fr;
//calculamos frecuencia relativa acumulada
    $frA = $modelArray->obtener_frecuencia_relativa_acumulada($clase, $fr);
    $_SESSION['frA'] = $frA;
//calculamos fi
    $fi = $modelArray->obtener_fi($clase, $clases);
    $_SESSION['fi'] = $fi;
//calculamos fa x fi
    $faxfi = $modelArray->obtener_faxfi($clase, $fa, $fi);
    $_SESSION['faxfi'] = $faxfi;
//calculamos fa x log(fi)
    $faxlogfi = $modelArray->obtener_faxlog_fi($clase, $fa, $fi);
    $_SESSION['faxlogfi'] = $faxlogfi;
//calculamos fa / fi
    $fadivfi = $modelArray->obtener_fadivfi($clase, $fa, $fi);
    $_SESSION['fadivfi'] = $fadivfi;
//calculamos (fi^2)xfa
    $ficuadradoxfa = $modelArray->obtener_ficuadradoxfa($clase, $fa, $fi);
    $_SESSION['ficuadradoxfa'] = $ficuadradoxfa;

    /* _____________________________________________________ */
//Medidas de centralización
//obtenemos media aritmetica datos agrupados
    $media_aritmetica_da = $modelArray->obtener_media_aritmetica_da($clase, $faxfi, $N);
    $_SESSION['media_aritmetica_da'] = $media_aritmetica_da;
//obtenemos media aritmetica datos no agrupados
    $media_aritmetica_dna = $modelArray->obtener_media_aritmetica_dna($array_aux, $N);
    $_SESSION['media_aritmetica_dna'] = $media_aritmetica_dna;
//obtenemos media geométrica datos agrupadaos
    $media_geometrica_da = $modelArray->obtener_media_geometrica_da($clase, $faxlogfi, $N);
    $_SESSION['media_geometrica_da'] = $media_geometrica_da;
//obtenemos media geométrica datos no agrupadaos
    $media_geometrica_dna = $modelArray->obtener_media_geometrica_dna($array_aux, $N);
    $_SESSION['media_geometrica_dna'] = $media_geometrica_dna;
//obtenemos media armónica datos agrupadaos
    $media_armonica_da = $modelArray->obtener_media_armonica_da($clase, $fadivfi, $N);
    $_SESSION['media_armonica_da'] = $media_armonica_da;
//obtenemos media armónica datos no agrupadaos
    $media_armonica_dna = $modelArray->obtener_media_armonica_dna($array_aux, $N);
    $_SESSION['media_armonica_dna'] = $media_armonica_dna;
//obtenemos media cuadrática datos agrupadaos
    $media_cuadratica_da = $modelArray->obtener_media_cuadratica_da($clase, $ficuadradoxfa, $N);
    $_SESSION['media_cuadratica_da'] = $media_cuadratica_da;
//obtenemos media cuadrática datos no agrupadaos
    $media_cuadratica_dna = $modelArray->obtener_media_cuadratica_dna($array_aux, $N);
    $_SESSION['media_cuadratica_dna'] = $media_cuadratica_dna;
//calculamos faxabs(fi-x)
    $faxabsfimenosfa = $modelArray->obtener_faxabsfimenosfa($clase, $fa, $fi, $media_aritmetica_da);
    $_SESSION['faxabsfimenosfa'] = $faxabsfimenosfa;
//obtenemos desviación media datos agrupadaos
    $desviacion_media_da = $modelArray->obtener_desviacion_media_da($clase, $faxabsfimenosfa, $N);
    $_SESSION['desviacion_media_da'] = $desviacion_media_da;
//obtenemos desviación media datos no agrupadaos
    $obtener_desviacion_dna = array();
    $desviacion_media_dna = $modelArray->obtener_desviacion_media_dna($array_aux, $media_aritmetica_da, $N);
    $_SESSION['desviacion_media_dna'] = $desviacion_media_dna;
//obtenemos mediana datos agrupadaos
    $mediana_da = $modelArray->obtener_mediana_da($array_aux, $clases, $fa, $faA, $N);
    $_SESSION['mediana_da'] = $mediana_da;
//obtenemos mediana datos no agrupadaos
    $mediana_dna = $modelArray->obtener_mediana_dna($array_aux, $N);
    $_SESSION['mediana_dna'] = $mediana_dna;
//obtenemos moda datos agrupados
    $moda_da = $modelArray->obtener_moda_da($fa, $clases);
    $_SESSION['moda_da'] = $moda_da;
//obtenemos moda datos no agrupados
    $moda_dna = $modelArray->obtener_moda_dna($array_cadena);
    $_SESSION['moda_dna'] = $moda_dna;
//obtenemos datos de pastel
    $obtener_pastel = $modelArray->obtener_pastel($fa, $N);
    $_SESSION['obtener_pastel'] = $obtener_pastel;
///////////////////////////////////////////////////////////
    $_SESSION['array'] = $array;
//redirección al index.php
    header("location:index.php");
}
