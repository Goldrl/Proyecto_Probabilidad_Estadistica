function enviar_datos_ajax() {
    var cuartil = document.getElementById("cuartil").value;
    var decil = document.getElementById("decil").value;
    var percentil = document.getElementById("percentil").value;

    if (cuartil < 1) {
        cuartil = 1;
    }
    if (cuartil > 3) {
        cuartil = 3;
    }
    if (decil < 1) {
        decil = 1;
    }
    if (decil > 9) {
        decil = 9;
    }
    if (percentil < 1) {
        percentil = 1;
    }
    if (percentil > 99) {
        percentil = 99;
    }

    var url = "procesar_datos.php";
    $.ajax({
        type: "post",
        url: url,
        data: {cuartil: cuartil, decil: decil, percentil: percentil},
        success: function (datos) {
            $("#mostrardatos").html(datos);
        }
    }
    )
}