<?php
include 'include/header.php';
include 'model/usuario.php';

if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;
	$where = array("UsuId"=>$id,);
	$row = $obj->select_record("usuario",$where);

	if($_GET["a"]=="create"){
		include 'vista/usuario/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/usuario/frmEditar.php';
	}
} else {
	include 'vista/usuario/index.php';
}

include  'include/footer.php';
?>

