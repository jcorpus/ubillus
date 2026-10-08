<?php
include 'include/header.php';
include 'model/tipopaciente.php';

if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;
	$where = array("MedId"=>$id,);
	$row = $obj->select_record("tipopaciente",$where);

	if($_GET["a"]=="create"){
		include 'vista/tipopaciente/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/tipopaciente/frmRegistrar.php';
	}
} else {
	include 'vista/tipopaciente/index.php';
}

include  'include/footer.php';
?>
