<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="script.js"></script>
        <script src="jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="diseño.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Probabilidad y Estadística</title>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron"  >
                <h2>Proyecto</h2>
                <h4>Integrantes: 
                    Oliver Guamán,
                    Michelle Davas,
                    Stifen Lema</h4>
            </div>
        </div>
            <div class="container">
                <div style="background-color:#DDFBFF">
                <form action="controller.php">
                    <input type='text' placeholder='Ejemplo: 45,43,36,34,64,23...' class='form-control' name='valores' required='true'/><br>
                    <div class=boton>
                        <input type="submit" class="btn btn-primary" value="Aceptar" />
                    </div>
                </form>
                <br>    
                <?php
                session_start();
                if (isset($_SESSION['estado'])) {
                    if ($_SESSION['estado'] == false) {
                        echo"<div class= 'alert alert-danger'>";
                        echo "<strong>Error!</strong> Ingrese 40 valores enteros.";
                        echo "</div>";
                    } else {
                        echo"<div class= 'alert alert-success'>";
                        echo "<strong>Correcto!</strong> Datos ingresados con éxito.";
                        echo "</div>";
                        $array_aux = $_SESSION['array_aux'];
                        echo "<h3>Elementos ingresados</h3>";
                        echo "<div class='panel panel-default'>";
                        echo "<div class='panel-body'>";
                        echo "<p class='text-primary'>" . $_SESSION['cadena'] . "<p>";
                        echo "  </div>";
                        echo"</div>";
                        echo "<h3>Elementos ordenados</h3>";
                        echo "<div class='row-md-3'>";
                        echo "<div class='col-md-4'>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-hover'>";
                        echo "<tbody>";
                        for ($i = 0; $i < 5; $i++) {
                            echo "<tr>";
                            $acum = 0;
                            for ($j = 0; $j < 8; $j++) {
                                echo "<td>" . $array_aux[$i][$j] . "</td>";
                            }
                        }
                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                        echo "</div>";
                        //datos obtenidos
                        echo "<div class='col-md-4'>";
                        //valor de N
                        $N = $_SESSION['N'];
                        echo "<strong>N=</strong>" . $N . "<br>";
                        //valor mínimo
                        $min = $_SESSION['min'];
                        echo "<strong>min=</strong>" . $min . "<br>";
                        //valos máximo
                        $max = $_SESSION['max'];
                        echo "<strong>max=</strong>" . $max . "<br>";
                        //valor del rango
                        $rango = $_SESSION['rango'];
                        echo "<strong>R=</strong>" . $rango . "<br>";
                        //valor de la clase
                        $clase = $_SESSION['clase'];
                        echo "<strong> Clase=</strong>" . $clase . "<br>";
//            anchura de la clase
                        $ancho = $_SESSION['ancho'];
                        echo "<strong> Cj=</strong>" . $ancho . "<br>";
                        echo "</div>";
                        echo "</div>";
                        /* _____________________________________________ */
                        $clases = $_SESSION['clases'];
                        $fa = $_SESSION['fa'];
                        $faA = $_SESSION['faA'];
                        $fr = $_SESSION['fr'];
                        $frA = $_SESSION['frA'];
                        $fi = $_SESSION['fi'];
                        $faxfi = $_SESSION['faxfi'];
                        $faxlogfi = $_SESSION['faxlogfi'];
                        $fadivfi = $_SESSION['fadivfi'];
                        $ficuadradoxfa = $_SESSION['ficuadradoxfa'];
                        $faxabsfimenosfa = $_SESSION['faxabsfimenosfa'];

                        echo "<h3>Tabla de inferencia</h3>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Clases</th>";
                        echo "<th>fa</th>";
                        echo "<th>faA</th>";
                        echo "<th>fr</th>";
                        echo "<th>frA</th>";
                        echo "<th>fi</th>";
                        echo "<th>fa x fi</th>";
                        echo "<th>fa x log(fi)</th>";
                        echo "<th>fa / fi</th>";
                        echo "<th>fa x fi^2</th>";
                        echo "<th>fa x |fi-x'|</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        for ($i = 0; $i <= $clase; $i++) {
                            echo "<tr>";
                            echo "<td>" . $clases[$i][0] . "-" . $clases[$i][1] . "</td>";
                            echo "<td>" . $fa[$i] . "</td>";
                            echo "<td>" . $faA[$i] . "</td>";
                            echo "<td>" . $fr[$i] . "</td>";
                            echo "<td>" . $frA[$i] . "</td>";
                            echo "<td>" . $fi[$i] . "</td>";
                            echo "<td>" . $faxfi[$i] . "</td>";
                            echo "<td>" . $faxlogfi[$i] . "</td>";
                            echo "<td>" . $fadivfi[$i] . "</td>";
                            echo "<td>" . $ficuadradoxfa[$i] . "</td>";
                            echo "<td>" . $faxabsfimenosfa[$i] . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                        /* ________________________________________________________________ */
                        $media_aritmetica_da = $_SESSION['media_aritmetica_da'];
                        $media_aritmetica_dna = $_SESSION['media_aritmetica_dna'];
                        $media_geometrica_da = $_SESSION['media_geometrica_da'];
                        $media_geometrica_dna = $_SESSION['media_geometrica_dna'];
                        $media_armonica_da = $_SESSION['media_armonica_da'];
                        $media_armonica_dna = $_SESSION['media_armonica_dna'];
                        $media_cuadratica_da = $_SESSION['media_cuadratica_da'];
                        $media_cuadratica_dna = $_SESSION['media_cuadratica_dna'];
                        $desviacion_media_da = $_SESSION['desviacion_media_da'];
                        $desviacion_media_dna = $_SESSION['desviacion_media_dna'];
                        $mediana_da = $_SESSION['mediana_da'];
                        $mediana_dna = $_SESSION['mediana_dna'];
                        $moda_da = $_SESSION['moda_da'];
                        $moda_dna = $_SESSION['moda_dna'];
                        $obtener_pastel = $_SESSION['obtener_pastel'];

                        echo "<h3>Medidas de centralización</h3>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th></th>";
                        echo "<th>Datos Agrupados</th>";
                        echo "<th>Datos No Agrupados</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td><strong>Media aritmética</strong></td>";
                        echo "<td>" . $media_aritmetica_da . "</td>";
                        echo "<td>" . $media_aritmetica_dna . "</td>";
                        echo "</tr>";
                        echo "<td><strong>Media geométrica</strong></td>";
                        echo "<td>" . $media_geometrica_da . "</td>";
                        echo "<td>" . $media_geometrica_dna . "</td>";
                        echo "</tr>";
                        echo "<td><strong>Media armónica</strong></td>";
                        echo "<td>" . $media_armonica_da . "</td>";
                        echo "<td>" . $media_armonica_dna . "</td>";
                        echo "</tr>";
                        echo "</tr>";
                        echo "<td><strong>Media cuadrática</strong></td>";
                        echo "<td>" . $media_cuadratica_da . "</td>";
                        echo "<td>" . $media_cuadratica_dna . "</td>";
                        echo "</tr>";
                        echo "</tr>";
                        echo "<td><strong>Desviación media</strong></td>";
                        echo "<td>" . $desviacion_media_da . "</td>";
                        echo "<td>" . $desviacion_media_dna . "</td>";
                        echo "</tr>";
                        echo "</tr>";
                        echo "<td><strong>Mediana</strong></td>";
                        echo "<td>" . $mediana_da . "</td>";
                        echo "<td>" . $mediana_dna . "</td>";
                        echo "</tr>";
                        echo "<td><strong>Moda</strong></td>";
                        echo "<td>" . $moda_da . "</td>";
                        echo "<td>" . $moda_dna . "</td>";
                        echo "</tr>";
                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                         echo "</div>";
                        ////////////////////////////////////////////////////////////////////
                        //tablas
                        echo '<br></br>';
                        echo "<div class='container'>";
                        echo "<div class='row'>";
                        //barras fa
                        echo "<div class='col-md-4'>";
                        $val1 = $fa[0];
                        $val2 = $fa[1];
                        $val3 = $fa[2];
                        $val4 = $fa[3];
                        $val5 = $fa[4];
                        $val6 = $fa[5];
                        echo "<div class = 'chart-container' style='height: 500x; width: 100%;'>";
                        echo"<canvas id='myChart' width='60' height='60'></canvas>";
                        echo"</div>";
                        echo"</div>";
                        //barras faA
                        echo "<div class='col-md-4'>";

                        $val1b = $faA[0];
                        $val2b = $faA[1];
                        $val3b = $faA[2];
                        $val4b = $faA[3];
                        $val5b = $faA[4];
                        $val6b = $faA[5];
                        echo "<div class = 'chart-container' style='height: 500x; width: 100%;'>";
                        echo"<canvas id='myChart2' width='100' height='100'></canvas>";
                        echo"</div>";
                        echo"</div>";
                        //pastel fa
                        echo "<div class='col-md-4'>";
                        $val1c = $obtener_pastel[0];
                        $val2c = $obtener_pastel[1];
                        $val3c = $obtener_pastel[2];
                        $val4c = $obtener_pastel[3];
                        $val5c = $obtener_pastel[4];
                        $val6c = $obtener_pastel[5];
                        echo "<div class = 'chart-container' style='height: 500x; width: 100%;'>";
                        echo"<canvas id='myChart3' width='100' height='100'></canvas>";
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";
                    }
                }
                ?>
                <?php
                if (isset($_SESSION['estado'])) {
                    if ($_SESSION['estado'] == true) {
                        ?>
                        <h3>Cuantiles</h3>
                        <form method="post">
                            <!--Cuartil:-->
                            <div class="form-group">
                                <label>Cuartil:</label>
                                <input type="number" class="form-control" id="cuartil" min="1" max="3" value="1"/>  
                            </div>
                            <div class="form-group">
                                <label>Decil:</label>
                                <input type="number" class="form-control" id="decil" min="1" max="9" value="1"/>
                            </div>
                            <div class="form-group">
                                <label>Percentil:</label>
                                <input type="number" class="form-control" id="percentil" min="1" max="99" value="1"/>
                            </div>
                            <input type="button" value="Aceptar" class="btn btn-default" onclick="enviar_datos_ajax();"/>
                            <div id="mostrardatos">
                            </div>
                        </form>
                        <?php
                    }
                }
                ?>
                <br>
                <script>
                    var myChart = document.getElementById('myChart').getContext('2d');
                    // Global Options
                    Chart.defaults.global.defaultFontFamily = 'Lato';
                    Chart.defaults.global.defaultFontSize = 18;
                    Chart.defaults.global.defaultFontColor = '#666';
                    var massPopChart = new Chart(myChart, {
                        type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea4
                        data: {
                            labels: ['Clase-1', 'Clase-2', 'Clase-3', 'Clase-4', 'Clase-5', 'Clase-6'],
                            datasets: [{
                                    label: '',
                                    data: [
<?php echo $val1 ?>,
<?php echo $val2 ?>,
<?php echo $val3 ?>,
<?php echo $val4 ?>,
<?php echo $val5 ?>,
<?php echo $val6 ?>,
                                    ],
                                    //                            backgroundColor:'green',
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(255, 206, 86, 0.6)',
                                        'rgba(75, 192, 192, 0.6)',
                                        'rgba(153, 102, 255, 0.6)',
                                        'rgba(255, 159, 64, 0.6)',
                                        'rgba(255, 99, 132, 0.6)'
                                    ],
                                    borderWidth: 1.5,
                                    borderColor: '#777',
                                    hoverBorderWidth: 3,
                                    hoverBorderColor: '#000'
                                }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'Gráfico de barras Fa',
                                fontSize: 12
                            },
                            legend: {
                                display: false,
                                position: 'right',
                                labels: {
                                    fontColor: '#000'
                                }
                            },
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 0,
                                    bottom: 0,
                                    top: 0
                                }
                            },
                            tooltips: {
                                enabled: true
                            }, scales: {
                                yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }
                                ]
                            }
                        }
                    });
                </script>
                <script>
                    var myChart = document.getElementById('myChart2').getContext('2d');
                    // Global Options
                    Chart.defaults.global.defaultFontFamily = 'Lato';
                    Chart.defaults.global.defaultFontSize = 18;
                    Chart.defaults.global.defaultFontColor = '#777';
                    var massPopChart = new Chart(myChart, {
                        type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea4
                        data: {
                            labels: ['Clase-1', 'Clase-2', 'Clase-3', 'Clase-4', 'Clase-5', 'Clase-6'],
                            datasets: [{
                                    label: '',
                                    data: [
<?php echo $val1b ?>,
<?php echo $val2b ?>,
<?php echo $val3b ?>,
<?php echo $val4b ?>,
<?php echo $val5b ?>,
<?php echo $val6b ?>,
                                    ],
                                    //                            backgroundColor:'green',
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(255, 206, 86, 0.6)',
                                        'rgba(75, 192, 192, 0.6)',
                                        'rgba(153, 102, 255, 0.6)',
                                        'rgba(255, 159, 64, 0.6)',
                                        'rgba(255, 99, 132, 0.6)'
                                    ],
                                    borderWidth: 1.5,
                                    borderColor: '#777',
                                    hoverBorderWidth: 3,
                                    hoverBorderColor: '#000'
                                }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'Gráfico de barras FaA',
                                fontSize: 12
                            },
                            legend: {
                                display: false,
                                position: 'right',
                                labels: {
                                    fontColor: '#000'
                                }
                            },
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 0,
                                    bottom: 0,
                                    top: 0
                                }
                            },
                            tooltips: {
                                enabled: true
                            }, scales: {
                                yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }
                                ]
                            }
                        }
                    });
                </script>
                <script>
                    var myChart = document.getElementById('myChart3').getContext('2d');
                    // Global Options
                    Chart.defaults.global.defaultFontFamily = 'Lato';
                    Chart.defaults.global.defaultFontSize = 18;
                    Chart.defaults.global.defaultFontColor = '#777';
                    var massPopChart = new Chart(myChart, {
                        type: 'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea4
                        data: {
                            labels: ['Clase-1', 'Clase-2', 'Clase-3', 'Clase-4', 'Clase-5', 'Clase-6'],
                            datasets: [{
                                    label: '',
                                    data: [
<?php echo $val1c ?>,
<?php echo $val2c ?>,
<?php echo $val3c ?>,
<?php echo $val4c ?>,
<?php echo $val5c ?>,
<?php echo $val6c ?>,
                                    ],
                                    //                            backgroundColor:'green',
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(255, 206, 86, 0.6)',
                                        'rgba(75, 192, 192, 0.6)',
                                        'rgba(153, 102, 255, 0.6)',
                                        'rgba(255, 159, 64, 0.6)',
                                        'rgba(255, 99, 132, 0.6)'
                                    ],
                                    borderWidth: 1.5,
                                    borderColor: '#777',
                                    hoverBorderWidth: 3,
                                    hoverBorderColor: '#000'
                                }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'Gráfico de Pastel Fa',
                                fontSize: 12
                            },
                            legend: {
                                display: false,
                                position: 'right',
                                labels: {
                                    fontColor: '#000'
                                }
                            },
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 0,
                                    bottom: 0,
                                    top: 0
                                }
                            },
                            tooltips: {
                                enabled: true
                            }
                        }
                    });
                </script>
               
            </div>

    </body>
</html>
