function ajax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}


function seleccionarContnenedor(idopcion) {
    switch (idopcion) {
        case 1:
            contenedor = document.getElementById('contenedor_submenu');
            break;

        case 2:
            contenedor = document.getElementById('contenedor_submenu2');
            break;

        case 3:
            contenedor = document.getElementById('contenedor_submenu3');
            break;
        case 4:
            contenedor = document.getElementById('contenedor_submenu4');
            break;
        case 5:
            contenedor = document.getElementById('contenedor_submenu5');
            break;
        case 6:
            contenedor = document.getElementById('contenedor_submenu2');
            break;


    }
    return contenedor;
}

//este a es para el manejo de las opciones de botones y formularios
function buscar(idusuario, idopcion, idcontenedor) {
    seleccionarContnenedor(idcontenedor);
    objetoajax = ajax();
    objetoajax.open("GET", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4 && objetoajax.status == 200) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.send(null)
}
//este ajax servira para operacioens datos
function Guardar(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "c1=" + $('#c1').val() + "&c2=" + $('#c2').val() + "&c3=" + $('#c33').val() + "&c4=" + $('#c4').val() + "&c5=" + $('#c5').val() + "&c6=" + $('#c6').val()
    console.log(Informacion);
    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
}

function Guardar_compras(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "cliente=" + $('#cliente').val() + "&numcompra=" + $('#numcompra').val() + "&c3=" + $('#c3').val() + "&cantidadprod=" + $('#cantidadprod').val() + "&dfactual=" + $('#dfactual').val()+ "&sub=" + $('#sub').val()
    console.log(Informacion);

    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
}
function efectivo(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "numcompra=" + $('#numcompra').val() + "&pago=" + $('#pago').val() + "&cambio=" + $('#cambio').val()
    console.log(Informacion);

    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
}
function addstock(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "c1=" + $('#c11').val() + "&c2=" + $('#c2').val()
    console.log(Informacion);

    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
    
}
function sinexistencia(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "c1=" + $('#c1').val() + "&c2=" + $('#c2').val()
    console.log(Informacion);

    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
    
}
function drop_datos(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "c1=" + $('#c1').val()
    console.log(Informacion);
    
    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
}
