<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            <a href="?a=create" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-square pr-3"></i>Nuevo registro</a>
        </div>
        <h4 class="page-title">Programacion</h4>
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
                <th>Medico</th>
                <th>Fecha</th>
                <th>Hora</th>
                <!--<th>Accion</th>-->
            </tr>
            </thead>
            <tbody>
            <?php
                $myrow = $obj -> sql("SELECT prog.ProgId, prog.ProgFecInicio, prog.ProgFecFinal, prog.ProgHorInicio, prog.ProgHorFinal, per.PerNombre, per.PerApepat, per.PerApemat FROM programacion prog
                    INNER JOIN medico med
                    ON prog.MedId = med.MedId
                    INNER JOIN persona per
                    ON med.PerId = per.PerId");
                            foreach ($myrow as $row) {
            ?>
            <tr>
                <td><?php echo $row["ProgId"]; ?></td>
                <td><?php echo $row["PerNombre"].' '.$row["PerApepat"].' '.$row["PerApemat"]; ?></td>
                <td><?php echo 'Desde '.$row["ProgFecInicio"].' Hasta '.$row["ProgFecFinal"]; ?></td>
                <td><?php echo 'Desde '.$row["ProgHorInicio"].' Hasta '.$row["ProgHorFinal"]; ?></td>
                <!--<td>
                    <a href="?a=edit&id=<?php echo $row["ProgId"]; ?>" class="btn btn-info btn-sm">Modificar</a>
                </td>-->
            </tr>
            <?php
                            }
            ?>
            </tbody>
        </table>
    </div>

</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->