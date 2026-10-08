<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            <a href="?a=create" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-square pr-3"></i>Nuevo registro</a>
        </div>
        <h4 class="page-title">Paciente</h4>
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
                <th>Ocupacion</th>
                <th>Tipo de Sangre</th>
                <th>Ant. Personales</th>
                <th>Ant. Familiar</th>
                <th>Alergias</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $myrow = $obj -> sql("SELECT pac.PacId, per.PerId, pac.PacOcupacion, pac.PacTipSangre, pac.PacAntePer, pac.PacAnteFam, pac.PacAlergiaMedicamento, per.PerNombre, per.PerApepat, per.PerApemat FROM paciente pac
                                    INNER JOIN persona per
                                    ON pac.PerId = per.PerId");
                            foreach ($myrow as $row) {
            ?>
            <tr>
                <td><?php echo $row["PacId"]; ?></td>
                <td><?php echo $row["PerNombre"].' '.$row["PerApepat"].' '.$row["PerApemat"]; ?></td>
                <td><?php echo $row["PacOcupacion"]; ?></td>
                <td><?php echo $row["PacTipSangre"]; ?></td>
                <td><?php echo $row["PacAntePer"]; ?></td>
                <td><?php echo $row["PacAnteFam"]; ?></td>
                <td><?php echo $row["PacAlergiaMedicamento"]; ?></td>
                <td>
                    <a href="?a=edit&id=<?php echo $row["PacId"]; ?>" class="btn btn-info btn-sm">Modificar</a>
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