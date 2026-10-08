<?php
include 'include/header.php';
include 'model/servicio.php';
?>

<?php 
if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;
	$where = array("ServId"=>$id,);
	$row = $obj->select_record("servicio",$where);

	if($_GET["a"]=="create"){
		include 'vista/servicio/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/servicio/frmRegistrar.php';
	}
} else {
	include 'vista/servicio/index.php';
}

include  'include/footer.php';
?>




