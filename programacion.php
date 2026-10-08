<?php
include 'include/header.php';
include 'model/programacion.php';

if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;
	$where = array("ProgId"=>$id,);
	$row = $obj->select_record("programacion",$where);

	if($_GET["a"]=="create"){
		include 'vista/programacion/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/programacion/frmRegistrar.php';
	}
} else {
	include 'vista/programacion/index.php';
}

include  'include/footer.php';
?>
