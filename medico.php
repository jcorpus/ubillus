<?php
include 'include/header.php';
include 'model/medico.php';

if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;
	$where = array("MedId"=>$id,);
	$row = $obj->select_record("medico",$where);

	if($_GET["a"]=="create"){
		include 'vista/medico/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/medico/frmRegistrar.php';
	}
} else {
	include 'vista/medico/index.php';
}

include  'include/footer.php';
?>



