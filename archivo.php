<?php
class controladorFormularios{

/*================================
=            Registro            =
================================*/
static public function ctrRegistro(){

	if (isset($_POST["registroUsuario"])){
		$datos=array("usuario"=>$_POST["registroUsuario"],
			"password"=>$_POST["registroPassword"]);
		$respuesta=modeloFormularios::mdlRegistro($datos);
		return $respuesta;
	}
}
/*=====  End of Registro  ======*/

/*=============================================
=            Seleccionar registros            =
=============================================*/
static public function ctrSeleccionarRegistros($dato){
	$respuesta=modeloFormularios::mdlSeleccionarRegistro($dato);
	return $respuesta;
}

/*=====  End of Seleccionar registros  ======*/

/*============================================
=            ingreso                         =
============================================*/
public function ctrIngreso(){
	if (isset($_POST["ingresoUsuario"])){
		if($_POST["ingresoUsuario"]=="" || $_POST["ingresoPassword"]==""){
			echo '<div class="alert alert-danger">No se registro usuario o contraseña</div>';
		}
		else{
			$usuario=$_POST["ingresoUsuario"];
			$respuesta = modeloFormularios::mdlIngreso($usuario);
			if($respuesta  && $respuesta["nombre_usuario"]==$_POST["ingresoUsuario"] && $respuesta["password_usuario"]==$_POST["ingresoPassword"] ){
				echo '<script>
				if(window.history.replaceState){
					window.history.replaceState(null, null,window.location.href);
				}
				window.location="index.php?navegacion=inicio";
				</script>';
			}
			else
			{
				echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
				}

				</script>';
				echo '<div class="alert alert-danger">Error al ingresar al sistema, el usuario o la contraseña no coinciden</div>';
			}
		}
	}
}

/*=====  End of ingreso  ======*/

}
?>