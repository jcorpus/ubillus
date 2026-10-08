<?php
include 'include/header.php';
include 'model/paciente.php';

if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;

	if ($id){
		$where = array("PacId"=>$id);
		$row = $obj->select_record("paciente",$where);
	} else {
		$row = array();
	}

	if($_GET["a"]=="create"){
		include 'vista/paciente/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/paciente/frmRegistrar.php';
	}
} else {
	include 'vista/paciente/index.php';
}

include  'include/footer.php';
?>


