<?php
include 'include/header.php';
include 'model/enfermedad.php';

if(isset($_GET["a"])){

    if (!empty($_GET["id"])) $id = $_GET["id"];
    else $id = null;
    $where = array("EnfId"=>$id,);
    $row = $obj->select_record("enfermedad",$where);

    if($_GET["a"]=="create"){
        include 'vista/enfermedad/frmRegistrar.php';
    }
    if ($_GET["a"] == "edit"){
        include 'vista/enfermedad/frmRegistrar.php';
    }
} else {
    include 'vista/enfermedad/index.php';
}

include  'include/footer.php';
?>

<script>
    $(document).ready(function() {
        $(".btn-agregar").on("click", function() {
            var c_codigo = $(this).closest('tr').children()[0].textContent;
            var c_nombre = $(this).closest('tr').children()[1].textContent;
            var c_descripcion = $(this).closest('tr').children()[2].textContent;

            if($("#tabla-tipoenfermedades .copy_"+c_codigo).length == 0)
            {
                var filaDinamica = '<tr class="copy_'+c_codigo+'">' +
                        '<td> <input type="hidden" name="tipoenfermedad[]" value="'+ c_codigo +'">'+ c_codigo +'</td>' +
                        '<td>'+ c_nombre +'</td>' +
                        '<td>'+ c_descripcion +'</td>' +
                        '<td> <button type="button" class="btn btn-danger btn-eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar </button> </td>' +
                    '</tr>';

                $("#tabla-tipoenfermedades").append(filaDinamica);
            }
        });
        $("body").on("click",".btn-eliminar", function() {
            $(this).parent().parent().remove();
        });

    });
</script>
