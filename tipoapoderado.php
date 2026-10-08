<?php
include 'include/header.php';
include 'model/tipoapoderado.php';


if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;
	$where = array("MedId"=>$id,);
	$row = $obj->select_record("tipoapoderado",$where);

	if($_GET["a"]=="create"){
		include 'vista/tipoapoderado/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/tipoapoderado/frmRegistrar.php';
	}
} else {
	include 'vista/tipoapoderado/index.php';
}

include  'include/footer.php';
?>

