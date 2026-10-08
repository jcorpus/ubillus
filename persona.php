<?php
include 'include/header.php';
include 'model/persona.php';
?>

<?php 
if(isset($_GET["a"])){

	if (!empty($_GET["id"])) $id = $_GET["id"];
	else $id = null;

	if ($id){
		$where = array("PerId"=>$id);
		$row = $obj->select_record("persona",$where);
	} else {
		$row = array();
	}

	if($_GET["a"]=="create"){
		include 'vista/persona/frmRegistrar.php';
	}
	if ($_GET["a"] == "edit"){
		include 'vista/persona/frmRegistrar.php';
	}
} else {
	include 'vista/persona/index.php';
}

include  'include/footer.php';
?>
