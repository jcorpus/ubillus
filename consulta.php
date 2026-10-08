<?php
include 'include/header.php';
include 'model/consulta.php';
?>

<?php 
if(isset($_GET["registrar"])){
    include 'vista/consulta/frmRegistrar.php';
} else {
    include 'vista/consulta/listar.php';
}

?>
<?php include  'include/footer.php'; ?>