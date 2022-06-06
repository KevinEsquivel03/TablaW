function buscar_ahora(buscar) {
    var parametros = {"buscar":buscar};
    $.ajax({
    data:parametros,
    type: 'GET',
    url: "../php/buscador.php",
    success: function(data) {
    document.getElementById("datos_buscador").innerHTML = data;
    buscar_ahoraa(buscar);
    }
    });
    }


    function buscar_ahoraa(buscar) {
        var parametros = {"buscar":buscar};
        $.ajax({
        data:parametros,
        type: 'GET',
        url: "../php/contador.php",
        success: function(data) {
        document.getElementById("datos_contador").innerHTML = data;
        }
        });
        }
