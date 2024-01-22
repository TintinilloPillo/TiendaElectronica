<?php
	class OperacionesBd{
		private $servidor="localhost";
		private $usuario="Titin";
		private $bd="tienda_electronica";
		private $password="loki1306";

public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}

public function guardardatos($sql){
$obj=new OperacionesBd;
$conexion=$obj->conexion();


$res=mysqli_query($conexion,$sql);
	if($res){
		echo '
		<br>
		<div class="alert alert-info" role="alert">
		Los datos se han guardado correctamente
	  </div>'  ;
	}else{
		echo "Los datos no se guardaron";
	}
}


public function mostrardatos($sql){
$obj=new OperacionesBd;
$conexion=$obj->conexion();

$resultado=mysqli_query($conexion,$sql);

return mysqli_fetch_all($resultado,MYSQLI_ASSOC);

}
	

public function eliminardatos($sql){
$obj=new OperacionesBd;
$conexion=$obj->conexion();

mysqli_query($conexion,$sql);
echo '
<br>
		<div class="alert alert-info" role="alert">
		Los datos se han eliminado correctamente
	  </div>
';


	}

public function actualizadatos($sql){
$obj=new OperacionesBd;
$conexion=$obj->conexion();

mysqli_query($conexion,$sql);
echo '
<br>
		<div class="alert alert-info" role="alert">
		La contraseña se ha actualizado correctamente
	  </div>
';


}	
public function menu(){
    include 'menu.php';
    //menu_usuario();
    }
public function vistas(){
	include 'vistas.php';
}	
}	

?>