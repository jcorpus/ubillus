<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            <a href="?a=create" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-square pr-3"></i>Nuevo registro</a>
        </div>
        <h4 class="page-title">Cita</h4>
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
                <th>Asunto</th>
                <th>Persona</th>
                <th>Servicio</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $myrow = $obj -> sql("SELECT cit.CitaId, cit.CitaAsunto, per.PerNombre, per.PerApepat, per.PerApemat, serv.ServNombre, progmed.DetProgMedFecha, progmed.DetProgMedHora FROM cita cit
                    INNER JOIN paciente pac
                    ON cit.PacId = pac.PacId
                    INNER JOIN persona per
                    ON pac.PerId = per.PerId
                    INNER JOIN servicio serv
                    ON cit.ServId = serv.ServId
                    INNER JOIN programacionmedico progmed
                    ON cit.DetProgMedId = progmed.DetProgMedId");
                            foreach ($myrow as $row) {
            ?>
            <tr>
                <td><?php echo $row["CitaId"]; ?></td>
                <td><?php echo $row["CitaAsunto"]; ?></td>
                <td><?php echo $row["PerNombre"].' '.$row["PerApepat"].' '.$row["PerApemat"]; ?></td>
                <td><?php echo $row["ServNombre"]; ?></td>
                <td><?php echo $row["DetProgMedFecha"]; ?></td>
                <td><?php echo $row["DetProgMedHora"]; ?></td>
            </tr>
            <?php
                            }
            ?>
            </tbody>
        </table>
    </div>

</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->