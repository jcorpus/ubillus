<?php
include 'include/header.php';
include 'model/tipodocumento.php';

if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;
	$where = array("TipoDocId"=>$id,);
	$row = $obj->select_record("tipodocumento",$where);

	if($_GET["a"]=="create"){
		include 'vista/tipodocumento/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/tipodocumento/frmRegistrar.php';
	}
} else {
	include 'vista/tipodocumento/index.php';
}

include  'include/footer.php';
?>

