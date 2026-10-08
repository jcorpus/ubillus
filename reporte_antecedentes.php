<?php
include 'include/header.php';
include 'model/cita.php';
?>

<?php 
if(isset($_GET["antecedente"])){
	include 'vista/antecedente/detalle_antecedente.php';
} else {
	include 'vista/antecedente/index.php';
}
?>

<?php include  'include/footer.php'; ?>