<?php
include 'include/header.php';
include 'model/especialidad.php';

if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;
	$where = array("EspId"=>$id,);
	$row = $obj->select_record("especialidad",$where);

	if($_GET["a"]=="create"){
		include 'vista/especialidad/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/especialidad/frmRegistrar.php';
	}
} else {
	include 'vista/especialidad/index.php';
}

include  'include/footer.php';
?>







