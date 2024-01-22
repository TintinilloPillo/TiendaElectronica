<?php

if($_POST['action'] == 'total_compra'){
    require('model.php');
    $nom=$_POST['ncom'];
$obj=new OperacionesBd;//aqui se va a cambiar el no de compra dependiendo la tabla
$sql="SELECT sum(subtotal) from ventas where no_compra=$nom";
$mostraruser=$obj->mostrardatos($sql);
foreach ($mostraruser as $columna) {
  echo"<p id='total1' data-subt='" .$columna['sum(subtotal)']."'>Total: " .$columna['sum(subtotal)']." </p>";
}
}
?>