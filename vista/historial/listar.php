<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
            </div>
        </div>
        <h4 class="page-title">Starter</h4>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- =================================== Formularios de Registro =================================== -->
<div class="row">
    <div class="card-box table-responsive">
        <h4 class="m-t-0 header-title">Historial</h4>
        <!-- <p class="text-muted font-14 m-b-30">
            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
        </p> -->

        <table class="table table-bordered datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Asunto</th>
                <th>Paciente</th>
                <th>Fecha Atencion</th>
                <th>Hora</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $myrow = $obj -> sql("select cit.CitaId, cit.CitaAsunto, per.PerNombre, per.PerApepat, per.PerApemat, progmed.DetProgMedFecha, progmed.DetProgMedHora, serv.ServNombre from cita cit
                            inner join paciente pac
                            on cit.PacId = pac.PacId
                            inner join servicio serv
                            on cit.ServId = serv.ServId 
                            inner join programacionmedico progmed
                            on cit.DetProgMedId = progmed.DetProgMedId
                            inner join persona per
                            on pac.PerId = per.PerId
                            inner join programacion prog
                            on prog.ProgId = progmed.ProgId");
                            foreach ($myrow as $row) {
            ?>
            <tr>
                <td><?php echo $row["CitaId"]; ?></td>
                <td><?php echo $row["CitaAsunto"]; ?></td>
                <td><?php echo $row["PerNombre"].' '.$row["PerApepat"].' '.$row["PerApemat"]; ?></td>
                <td><?php echo $row["DetProgMedFecha"]; ?></td>
                <td><?php echo $row["DetProgMedHora"]; ?></td>
                <td>
                    <a href="?registrar=1&id=<?php echo $row["CitaId"]; ?>" class="btn btn-info">Mostrar</a>
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