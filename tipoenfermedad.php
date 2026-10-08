<?php
include 'include/header.php';
include 'model/tipoenfermedad.php';


if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;
	$where = array("EnfTipId"=>$id,);
	$row = $obj->select_record("tipoenfermedad",$where);

	if($_GET["a"]=="create"){
		include 'vista/tipoenfermedad/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/tipoenfermedad/frmRegistrar.php';
	}
} else {
	include 'vista/tipoenfermedad/index.php';
}

include  'include/footer.php';
?>


