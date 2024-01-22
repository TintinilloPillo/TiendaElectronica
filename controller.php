<?php
//manejar idusuario,idopcion e idcontenedor
include 'model.php';
$obj = new OperacionesBd;

$idopcion=$_GET['idopcion'];
switch ($idopcion){//para manejar las opciones de cada icono
    case 1:
    case 2:
    case 3:
        $obj->menu();
        break;
    case 4:
    case 5://a partir de aqui mandaremos a llamar los formularios
    case 6:
    case 7:
    case 8:
    case 9:
    case 10:
    case 11:
    case 12:
    case 13:
    case 14:
    case 15:
    case 16:
    case 17:
    case 18:
    case 19:
    case 20:
        $obj->vistas();
        break;

}
?>