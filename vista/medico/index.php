<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            <a href="?a=create" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-square pr-3"></i>Nuevo registro</a>
        </div>
        <h4 class="page-title">Medico</h4>
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
                <th>Persona</th>
                <th>Especialidad</th>
                <th>Descripcion</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $myrow = $obj -> sql("SELECT med.MedId, per.PerNombre, per.PerApepat, per.PerApemat, esp.EspNombre, med.MedDescripcion, med.MedEstado FROM medico med
                                    INNER JOIN persona per
                                    ON med.PerId = per.PerId
                                    INNER JOIN especialidad esp
                                    ON med.EspId = esp.EspId");
                            foreach ($myrow as $row) {
            ?>
            <tr>
                <td><?php echo $row["MedId"]; ?></td>
                <td><?php echo $row["PerNombre"].' '.$row["PerApepat"].' '.$row["PerApemat"]; ?></td>
                <td><?php echo $row["EspNombre"]; ?></td>
                <td><?php echo $row["MedDescripcion"] ?></td>
                <td>

                    <?php
                    if($row["MedEstado"]=="ACTIVO"){
                        ?>
                    <a href="model/medico.php?edit_inactivo=1&id=<?php echo $row["MedId"]; ?>" class="btn btn-sm btn-danger">Desactivar</a>    
                        <?php
                    } else {
                        ?>
                    <a href="model/medico.php?edit_activo=1&id=<?php echo $row["MedId"]; ?>" class="btn btn-sm btn-success">Activar</a>    
                        <?php
                    }
                    ?>

                </td>
            </tr>
            <?php
                            }
            ?>
            </tbody>
        </table>
    </div>

</div>
<!-- =================================== Fin de Formularios de Registro ===================================