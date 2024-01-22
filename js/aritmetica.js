$(document).on('keyup', '#c5', function() {
    let cant = parseInt($(this).val());
    let val = $('#c6').val();
    if (cant == 'null') {
        console.log('nulo');
    } else {
        const total = document.getElementById('c6');

        let tval = (cant * 0.2) + cant;
        total.value = tval;
    }
});
$(document).on('keyup', '#cantidadprod', function() {
    let cant = parseInt($(this).val());
    let val = $('#id_producto').data('prec');

    if (cant == 'null') {
        console.log('nulo');
    } else {
        const total = document.getElementById('sub');

        let tval = cant * val;
        total.value = tval;
    }
});
$(document).on('keyup','#numcompra',function(e){
    let action ='numero_compra';
    let ncom=$(this).val();
    $.ajax({
    url:'acces.php',
    type: 'POST',
    data:{action:action,ncom:ncom},
    success:function(respuesta){
        $('#datos_tabla').html(respuesta);
    }    
    });
})
$(document).on('keyup','#numcompra',function(e){
    let action ='total_compra';
    let ncom=$(this).val();
    $.ajax({
    url:'acces.php',
    type: 'POST',
    data:{action:action,ncom:ncom},
    success:function(respuesta){
        $('#total').html(respuesta);
    }    
    });
});

$(document).on('click', '#generar_factura', function(e) {
    e.preventDefault();
    window.open('ver_facts.php?nofact='+$('#numcompra').val());
});
$(document).on('keyup', '#pago', function() {
    let cant = parseInt($(this).val());
    let val = $('#total1').data('subt');
    if (cant == 'null') {
        console.log('nulo');
    } else {
        const total = document.getElementById('cambio');
        let tval = cant - val;
        total.value = tval;
    }
});
/*$(document).on('click', '#icon1', function(e) {
  //e.preventDefault();
  $('.contenedor_submenu3').load('URL #contenedor_submenu3');
    
});*/
