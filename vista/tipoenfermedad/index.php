<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            <a href="?a=create" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-square pr-3"></i>Nuevo registro</a>
        </div>
        <h4 class="page-title">Tipo Enfermedad</h4>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- =================================== Formularios de Registro =================================== -->
<div class="row">
    <div class="card-box table-responsive mt-3">

        <table class="table table-bordered datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Tipo de Enfermedad</th>
                <th>Descripcion</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $myrow = $obj -> sql("SELECT * FROM tipoenfermedad");
                            foreach ($myrow as $row) {
            ?>
            <tr>
                <td><?php echo $row["EnfTipId"]; ?></td>
                <td><?php echo $row["EnfTipNombre"]; ?></td>
                <td><?php echo $row["EnfTipDescripcion"]; ?></td>
                <td>
                    <a href="?a=edit&id=<?php echo $row["EnfTipId"]; ?>" class="btn btn-info btn-sm">Modificar</a>
                </td>
            </tr>
            <?php
                            }
            ?>
            </tbody>
        </table>
    </div>

</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->