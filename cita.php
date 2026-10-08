<?php
include 'include/header.php';
include 'model/cita.php';

if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;
	$where = array("CitaId"=>$id,);
	$row = $obj->select_record("cita",$where);

	if($_GET["a"]=="create"){
		include 'vista/cita/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/cita/frmRegistrar.php';
	}
} else {
	include 'vista/cita/index.php';
}

include  'include/footer.php';
?>
