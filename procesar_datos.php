<?php

include_once './ModelArray.php';
session_start();
$array = $_SESSION['array'];
$array_aux = $_SESSION['array_aux'];
$N = $_SESSION['N'];
$clases = $_SESSION['clases'];
$fa = $_SESSION['fa'];
$faA = $_SESSION['faA'];

$modelArray = new ModelArray();
//cuartil
echo "<h4>Cuartil</h4>";
echo "<div class='table-responsive'>";
echo "<table class='table table-hover'>";
echo "<thead>";
echo "<tr>";
echo "<th>Solicitado</th>";
echo "<th>Datos Agrupados</th>";
echo "<th>Datos No Agrupados</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
echo "<tr>";
echo "<td>" . $_POST["cuartil"] . "</td>";
$cuartil_dna = $modelArray->cuantil_obtener_posicicion_da(4, $N, $_POST["cuartil"]);
echo "<td>" . $array[$cuartil_dna - 1] . "</td>";
$cuartil_da = $modelArray->cuantil_obtener_da(4, $array_aux, $clases, $fa, $faA, $N, $_POST["cuartil"]);
echo "<td>" . $cuartil_da . "</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "</div>";
//decil
echo "<h4>Decil</h4>";
echo "<div class='table-responsive'>";
echo "<table class='table table-hover'>";
echo "<thead>";
echo "<tr>";
echo "<th>Solicitado</th>";
echo "<th>Datos Agrupados</th>";
echo "<th>Datos No Agrupados</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
echo "<tr>";
echo "<td>" . $_POST["decil"] . "</td>";
$decil_dna = $modelArray->cuantil_obtener_posicicion_da(10, $N, $_POST["decil"]);
echo "<td>" . $array[$decil_dna - 1] . "</td>";
$decil_da = $modelArray->cuantil_obtener_da(10, $array_aux, $clases, $fa, $faA, $N, $_POST["decil"]);
echo "<td>" . $decil_da . "</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "</div>";
//percentil
echo "<h4>Percentil</h4>";
echo "<div class='table-responsive'>";
echo "<table class='table table-hover'>";
echo "<thead>";
echo "<tr>";
echo "<th>Solicitado</th>";
echo "<th>Datos Agrupados</th>";
echo "<th>Datos No Agrupados</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
echo "<tr>";
echo "<td>" . $_POST["percentil"] . "</td>";
$percentil_dna = $modelArray->cuantil_obtener_posicicion_da(100, $N, $_POST["percentil"]);
if ($percentil_dna == 0) {
    echo "<td>" . $array[$percentil_dna] . "</td>";
} else {
    echo "<td>" . $array[$percentil_dna - 1] . "</td>";
}
$percentil_da = $modelArray->cuantil_obtener_da(100, $array_aux, $clases, $fa, $faA, $N, $_POST["percentil"]);
echo "<td>" . $percentil_da . "</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "</div>";

