<?php
include('model.php');
$nofact=$_REQUEST['nofact'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <title>TICKET</title>
</head>
<body>
        <div class="container tamaño text-center">
            <br>
            <?php
            $obj=new OperacionesBd;//aqui se va a cambiar el no de venta dependiendo la tabla
            $sql="SELECT*FROM ventas WHERE  no_compra='$nofact'";
            $mostraruser=$obj->mostrardatos($sql);
            foreach ($mostraruser as $columna) {
                $nomc=$columna['cliente'];
                $hfactual=$columna['fecha_hora'];
                
            echo"<h2><b>¡GRACIAS POR TU COMPRA ".$nomc."!</b></h2>";
            echo"<br>";
            echo"<h9><b>¡Tu compra fue realizada ".$hfactual."!</b></h9>";
        }
        ?>
            <?php
            ?>
        <p class="text-start">Los detalles de tu compra son:</p>
        <table class="table">
    <thead>
      <tr>
        <th scope="col" class="">Componentes</th>
        <th scope="col" class="">Cantidad</th>
        <th scope="col" class="">Subtotal</th>
      </tr>
    </thead>
    <tbody>
        <?php
  $obj=new OperacionesBd;//aqui se va a cambiar el no de compra dependiendo la tabla
  $sql="SELECT*FROM ventas v inner join componentes c on v.id_componente=c.id_componente where no_compra='$nofact'";
    $datos=$obj->mostrardatos($sql);
   foreach ($datos as $columna) {
      ?>
  <tr>
        <td><?php echo $columna['componente']; ?></td>
        <td><?php echo $columna['cantidad']; ?></td>
        <td><?php echo $columna['subtotal']; ?></td>
  </tr>
   <?php } ?>
   
   </tbody>
  </table>
  <br>
</div>
<br>
<div class="container tamaño text-center">
    <br>
  <h3>TU PAGO</h3>
  <br>
<?php
            $obj=new OperacionesBd;//aqui se va a cambiar el no de compra dependiendo la tabla
            $sql="SELECT sum(subtotal) from ventas where no_compra=$nofact";
            $mostrar=$obj->mostrardatos($sql);
            foreach ($mostrar as $columna) {
              echo"<p class=''id='total' data-subt='" .$columna['sum(subtotal)']."'>Total que pagaste:<b> $" .$columna['sum(subtotal)']." pesos</b></p>";
            
              $obj=new OperacionesBd;//aqui se va a cambiar el no de compra dependiendo la tabla
            $sql="SELECT cambio from pagos_fisicos where no_compra=$nofact";
            $mostraruser=$obj->mostrardatos($sql);
            foreach ($mostraruser as $columna) {
                $pago=$columna['cambio'];
              echo"<p class=''id='total'>Tu cambio corresponde a:<b> $" .$pago." pesos</b></p>";
  }
  }
  
            ?>
        
  </div>
<script>
    window.print();
</script>
</body>
</html>