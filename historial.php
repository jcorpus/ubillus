<?php
include 'include/header.php';
include 'model/historial.php';
?>
<?php 
if(isset($_GET["registrar"])){
    include 'vista/historial/frmRegistrar.php';
} else {
    include 'vista/historial/listar.php';
}

?>
<?php include  'include/footer.php'; ?>