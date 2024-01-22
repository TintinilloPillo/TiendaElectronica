<?php
session_start(); 
$idopcion=$_GET['idopcion'];
switch ($idopcion){//para manejar las opciones de cada icono
  case 4:
        form_regis_comp();
        break;
  case 5:
      guardar_comp();
        break;
  case 6:
    filtro_comp();
      break;
  case 7:
    ver_comp();
      break;
  case 8:
    ver_defectuosos();
      break;
  case 9:
    del_defec();
      break;
  case 10:
    actualizar_stock();
      break;   
  case 11:
    form_regis_ventas();
      break;
  case 12:
    compras();
  break;
case 13:
  efectivo();
break;
case 14:
  actualiza_stock();
  break;
case 15:
  no_encontrado();
  break;
case 16:
  solicitud();
  break;
case 17:
  ver_pendientes();
  break;
}
function form_regis_comp(){
    print'
<form class="row g-3 needs-validation" novalidate>
  <h2 class="text-center"><b>Registar Nuevo Componente</b></h2>
    <div class="col-md-3">
      <label for="validationCustom01" class="form-label negrita">Nombre del componente:</label>
      <input type="text" class="form-control" id="c1" value="" required>
    </div>
    <div class="col-md-3">
      <label for="validationCustom02" class="form-label negrita">Cantidad:</label>
      <input type="number" class="form-control" id="c2" value="" min="1"required>
    </div>
    <div class="col-md-3">
      <label for="validationCustom04" class="form-label negrita">Proveedor:</label>
      <select class="form-select" id="c33" required>
        <option selected disabled value="">Seleccione...</option>';
        $obj=new OperacionesBd;
        $sql="SELECT*FROM proveedores";
        $mostrar=$obj->mostrardatos($sql);
        foreach($mostrar as $columna){
          $proveedor=$columna['proveedor'];
          $idproveedor=$columna['id_proveedor'];
          echo'<option id="c3" value="'.$idproveedor.'">'.$proveedor.'</option>';
        }
        print'
      </select>

      </div>
    <div class="col-md-3">
      <label for="validationCustomUsername" class="form-label negrita">¿Se encuentra defectuoso?</label>
      <input type="text" class="form-control" id="c4" required>
      <span id="passwordHelpInline" class="form-text text-dark">
     Respuesta admitida (Si/No).
    </span>
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationCustom03" class="form-label negrita">Costo de Compra:</label>
      <input type="number" class="form-control" id="c5" required>
      <div class="invalid-feedback">
        Porfavor ingrese su correo electrónico.
      </div>
    </div>
    <div class="col-md-3">
        <label for="validationCustom05" class="form-label negrita">Costo de Venta:</label>
        <input type="number" class="form-control " id="c6" required disabled>
      </div>
    
    </div>
    <div class="d-grid gap-2">';
    ?>
      <button type="submit"class="btn btn-dark " onclick="javascript:Guardar(0,5,2,1);return false;">Registrar</button>
      <br>
      <br>
    </div>
    <br>
  </form>
<?php
}
function guardar_comp(){//funcion para todas las operaciones del modulo usuarios
$obj= new OperacionesBd;
$c1=$_POST['c1'];
$c2=$_POST['c2'];
$c3=$_POST['c3'];
$c4=$_POST['c4'];
$c5=$_POST['c5'];
$c6=$_POST['c6'];
//consulta para guardar
$sql="INSERT INTO `componentes` (`componente`, `stock`, `id_proveedor`, `estado`, `costo_compra`, `costo_venta`)  VALUES ('$c1', '$c2', $c3, '$c4', '$c5', '$c6')";
$guardar=$obj->guardardatos($sql);
}

function filtro_comp(){
print'
<br> 
<h2 class="text-center"><b>Componentes en Almacén</b></h2>
<br> 
<div class="text-center">
<a type="button" class="btn btn-outline-primary" href="javascript:buscar(0,7,3)">Ver  Componentes</a>
<a type="button" class="btn btn-outline-danger" href="javascript:buscar(0,8,3)">Ver Componentes Defectuosos</a>
<a type="button" class="btn btn-outline-light" href="javascript:buscar(0,17,3)">Ver Componentes Pendientes</a>
</div>

';
}

function ver_comp(){
  $obj=new OperacionesBd;
  $sql="SELECT*FROM componentes c inner join proveedores p on c.id_proveedor=p.id_proveedor where c.estado='No' or c.estado='no' order by c.id_componente asc ";
    $datos=$obj->mostrardatos($sql);
    
  
    ?>
  <br>
  <br>
  <div class="table-wrapper">
  <table class="table">
    <thead>
      <tr>
        <th scope="col" class="bg-secondary bg-gradient">Código del Componente</th>
        <th scope="col" class="bg-secondary bg-gradient">Nombre del Componente</th>
        <th scope="col" class="bg-secondary bg-gradient">Disponible en Almacén</th>
        <th scope="col" class="bg-secondary bg-gradient">Proveedor</th>
        <th scope="col" class="bg-secondary bg-gradient">Costo de Venta</th>
      </tr>
    </thead>
    <tbody>
      <?php
  
   foreach ($datos as $columna) {
      ?>
  <tr class="bg-light">
        <td scope="row"><?php echo $columna['id_componente']; ?></td>
        <td><?php echo $columna['componente']; ?></td>
        <td><?php echo $columna['stock']; ?></td>
        <td><?php echo $columna['proveedor']; ?></td>
        <td><?php echo $columna['costo_venta']; ?></td>
  </tr>
   
   <?php } ?>
   </tbody>
  </table>
  </div>
  <?php
  }
  function ver_pendientes(){
    $obj=new OperacionesBd;
    $sql="SELECT*FROM solicitud";
      $datos=$obj->mostrardatos($sql);
      
    
      ?>
    <br>
    <br>
    <div class="table-wrapper">
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="bg-secondary bg-gradient">Número de la petición</th>
          <th scope="col" class="bg-secondary bg-gradient">Nombre del Componente</th>
          <th scope="col" class="bg-secondary bg-gradient">Costo de Venta</th>
        </tr>
      </thead>
      <tbody>
        <?php
    
     foreach ($datos as $columna) {
        ?>
    <tr class="bg-light">
          <td scope="row"><?php echo $columna['id_solicitud']; ?></td>
          <td><?php echo $columna['componente']; ?></td>
          <td><?php echo $columna['cantidad']; ?></td>
    </tr>
     
     <?php } ?>
     </tbody>
    </table>
    </div>
    <?php
    }
  function ver_defectuosos(){
    $obj=new OperacionesBd;
    $sql="SELECT*FROM componentes c inner join proveedores p on c.id_proveedor=p.id_proveedor where c.estado='Si' or c.estado='si' order by c.id_componente asc ";
      $datos=$obj->mostrardatos($sql);
      
    
      ?>
    <br>
    <br>
    <div class="table-wrapper">
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="bg-secondary bg-gradient">Código del Componente</th>
          <th scope="col" class="bg-secondary bg-gradient">Nombre del Componente</th>
          <th scope="col" class="bg-secondary bg-gradient">Disponible en Almacén</th>
          <th scope="col" class="bg-secondary bg-gradient">Proveedor</th>
          <th scope="col" class="bg-secondary bg-gradient">Costo de Venta</th>
          <th scope="col" class=""></th>
        </tr>
      </thead>
      <tbody>
        <?php
    
     foreach ($datos as $columna) {
        ?>
    <tr class="bg-light">
          <td scope="row"><?php echo $columna['id_componente']; ?></td>
          <td><?php echo $columna['componente']; ?></td>
          <td><?php echo $columna['stock']; ?></td>
          <td><?php echo $columna['proveedor']; ?></td>
          <td><?php echo $columna['costo_venta']; ?></td>
    </tr>
     
     <?php } ?>
     </tbody>
    </table>
    </div>
    <?php
  $obj=new OperacionesBd;
  $sql="SELECT*FROM componentes where estado='Si' or estado='si'";
  $mostrar=$obj->mostrardatos($sql);
  print'
  <br>
  <h2 class="text-center"><b>Eliminar Componentes Defectuosos</b></h2>
  <br>
  <div class="col-sm-12">
    <select class="form-select">
      <option selected>Seleccione el componente a eliminar</option>';
      
foreach($mostrar as $columna){
  $componente= $columna['componente'];
  $id= $columna['id_componente'];
      echo '<option value="'.$id.'" id="c1">'.$componente.'</option>';
    }
   print'</select>
</div>
<br>';
?>
<div class="d-grid gap-2">
  <button type="button" class="btn btn-danger" onclick="javascript:drop_datos(0,9,2,1); return false;">Eliminar</button>
</div>

<div class="vr"></div>
</div>
<br>
<?php
    }
function del_defec(){
$obj= new OperacionesBd;
$c1=$_POST['c1'];
//consulta para eliminar
$sql="DELETE FROM `componentes`WHERE id_componente='$c1'";
$drop=$obj->eliminardatos($sql);
}
function actualizar_stock(){
  print'
<br>
<h2 class="text-center"><b>Actualizar Stock</b></h2>
<br>
<div class="hstack gap-3">
  <div class="col">
    <label for="validationCustom04" class="form-label negrita">Seleccione el Componente:</label>
      <select class="form-select" id="c11" required>
        <option selected disabled value="">Seleccione...</option>';
        $obj=new OperacionesBd;
        $sql="SELECT*FROM componentes";
        $mostrar=$obj->mostrardatos($sql);
        foreach($mostrar as $columna){
          $componente=$columna['componente'];
          $idcomponente=$columna['id_componente'];
          echo'<option id="c1" value="'.$idcomponente.'">'.$componente.'</option>';
        }
        print'
      </select>
  </div>
<div class="col-md-3">
  <label for="validationCustom02" class="form-label negrita">Cantidad a añadir:</label>
  <input class="form-control" type="number" placeholder="Cantidad del producto" aria-label="" id="c2" min="1">
</div>
</div>
';
?>
<br> 
<br> 
<div class="fluid-container d-grid gap-2">
<br> 
  <button type="button" class="btn btn-dark" onclick=" addstock(0,14,2,1); return false;">Actualizar</button>
</div>

<?php
}
function form_regis_ventas(){
  //mostrar por lista desplegable 
  $obj=new OperacionesBd;
  $sql="SELECT*FROM componentes where stock>=1";
  $mostrar=$obj->mostrardatos($sql);
  foreach($mostrar as $columna){
    $productos= $columna['componente'];
    $idproducto= $columna['id_componente'];
    $existencia=$columna['stock'];
    $pre_producto= $columna['costo_venta'];
  }
  
print'
  <br>
  <h2 class="text-center"><b>VENTA DE COMPONENTES ELECTRÓNICOS</b></h2>
  <br>

  <div>
    <div class="row" id="">
      <div class="col-md-3">
          <label for="validationCustom03" class="form-label negrita">Cliente:</label>
          <input placeholder="Ingrese el nombre del cliente" type="datetime" class="form-control" id="cliente" required
      </div>
      </div>';
      
      $obj=new OperacionesBd;
      $sql = "SELECT max(no_compra) FROM ventas ";
      $columnas =  $obj->mostrardatos($sql);
      foreach($columnas as $columna){
        echo"<input type='hidden' id='nocompra' data= '" .$columna['max(no_compra)']."' >";
      }

       print' 
        <div class="col-md-3">
          <label for="validationCustom03" class="form-label negrita">Numero de venta:</label>
          <input type="number" min="1" class="form-control" id="numcompra"  value="'.$columna['max(no_compra)'].'">
        </div>
       
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label negrita">Componente:</label>
        <select class="form-select" id="c3" required>
          <option selected disabled  value="">Seleccione el componente...</option>';

          foreach($mostrar as $columna){
            $productos=$columna['componente'];
            $id_producto= $columna['id_componente'];
            $existencia=$columna['stock'];
            $pre_producto= $columna['costo_venta'];
            echo '<option  value="'.$id_producto.'"id="id_producto"  data-prec="'.$pre_producto.'">'. "($existencia)".' '.$productos.'</option>';
              }
          print'
        </select> 
      </div>

      <div class="col-md-3">
          <label for="validationCustom03" class="form-label negrita">Cantidad:</label>
          <input type="number"min="1"placeholder="Cantidad de producto" class="form-control" id="cantidadprod" required>
      </div>';
      date_default_timezone_set('America/Mexico_City');
       $fecha_actual=date("y/m/d H:i:s");
        ?>
      <div class="col-md-3">
        <label for="validationCustom03" class="form-label negrita">Tiempo actual:</label>
        <input type="datetime" class="form-control" id="dfactual" value="<?=$fecha_actual?>" required disabled>
      </div>
      <div class="col-md-3">
        <label for="validationCustom03" class="form-label negrita">Subtotal:</label>
        <input type="number"placeholder="Aquí se mostrará el subtotal" class="form-control" id="sub" required disabled><br>
      </div>
    </div>
  </div>
  <br>
  <div class="text-center d-grid gap-2">
    <button type="submit" id="guardar_producto" class="btn btn-dark" value="ventas" onclick=" Guardar_compras(0,12,2,1); return false;" >Agregar</button> 
    <br>
    <hr>
    <b>¿No encontró lo que buscaba? ¡Encárgelo con nosotros!</b>
    <hr>
    <br>
    <a type="submit"class="btn btn-danger" href="javascript:buscar(0,15,3)">Encargar</a>
  </div>
  <br>

</div>
<br>

<div class="container border">

        <div id="total"></div>
        <?php         
        print'
  </div>
</div><br>
</div>
<h4 class="text-center"><b>EFECTIVO:</b></h4><br>
<div class="container text-center">
  <div class="row text-center"><br>
    <div class="row text-center">
      
      <div class="col-md-3">
        <label for="validationCustom03" class="form-label negrita">Pagó:</label>
        <input type="number"min="0" placeholder="Ejemplo: 200" class="form-control" id="pago" required><br>
      </div><br>

      <div class="col-md-4">
        <label for="validationCustom03" class="form-label negrita">Cambio:</label>
        <input type="number"placeholder="Aquí se mostrará el cambio" class="form-control" id="cambio" required disabled><br>
      </div> ';
              ?>
      <div class="d-grid gap-2">
        <button type="button" id="guardar_pf" class="btn btn-success" value="ventas" onclick="efectivo(0,13,2,1); return false;" >Pagar                                                                                                     
        </button>
        <br>
        
        <?php
     print' </div>
    </div>
    <div class="d-grid gap-2"> 
    <hr>
              <button type="button" id="generar_factura" class="btn btn-light" value="ventas" >Generar Ticket</button>
            </div>
    </div> ';
}  
function compras(){
  $obj= new OperacionesBd;
$cliente=$_POST['cliente'];
$numcompra=$_POST['numcompra'];
$c3=$_POST['c3'];
$cantidadprod=$_POST['cantidadprod'];
$dfactual=$_POST['dfactual'];
$sub=$_POST['sub'];
//consulta para guardar
$sql="INSERT INTO `tienda_electronica`.`ventas` (`cliente`, `no_compra`, `id_componente`, `cantidad`, `fecha_hora`, `subtotal`) VALUES ('$cliente', '$numcompra', $c3, '$cantidadprod', '$dfactual', '$sub')";
$guardar=$obj->guardardatos($sql);
}
function efectivo(){
  $obj= new OperacionesBd;
  @$numcompra=$_POST['numcompra'];
  @$pago=$_POST['pago'];
  @$cambio=$_POST['cambio'];
  $sql="INSERT INTO `tienda_electronica`.`pagos_fisicos` (`no_compra`, `pago`, `cambio`) VALUES ('$numcompra', '$pago', '$cambio')";
  $guardar=$obj->guardardatos($sql);
}
function actualiza_stock(){
  $obj= new OperacionesBd;
  $c1=$_POST['c1'];
  $c2=$_POST['c2'];
  $sql="INSERT INTO `tienda_electronica`.`nuevo_stock` (`id_componente`, `cantidad`) VALUES ('$c1', '$c2')";
  $guardar=$obj->guardardatos($sql);
}
function no_encontrado(){
  print'
  <br>
  <h2 class="text-center"><b>Solicitar Componentes</b></h2>
  <br>
  <div class="hstack gap-3">
    <div class="col">
    <label for="validationCustom02" class="form-label negrita">Nombre del Componente:</label>
    <input class="form-control me-auto" type="text" placeholder="Ingrese el nombre del componente solicitado" aria-label="" id="c1">
    </div>
  <div class="col-md-3">
    <label for="validationCustom02" class="form-label negrita">Cantidad a solicitar:</label>
    <input class="form-control me-auto" type="number" placeholder="Cantidad del producto" aria-label="" id="c2" min="1">
  </div>
  </div>
  ';
  ?>
  <br>

  <div class="fluid-container d-grid gap-2">
    <button type="button" class="btn btn-dark" id= "sin"onclick=" sinexistencia(0,16,3,1); return false;">Solicitar</button>
  </div>
  
  <br> 
  <?php
}
function solicitud(){
  $obj= new OperacionesBd;
  $c1=$_POST['c1'];
  $c2=$_POST['c2'];
  $sql="INSERT INTO `tienda_electronica`.`solicitud` (`componente`, `cantidad`) VALUES ('$c1', '$c2')";
  $guardar=$obj->guardardatos($sql);
}

?>               