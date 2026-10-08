<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            
        </div>
        <h4 class="page-title">Consulta</h4>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- =================================== Formularios de Registro =================================== -->
<div class="row">
    <div class="card-box table-responsive">
        <!-- <p class="text-muted font-14 m-b-30">
            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
        </p> -->

        <table class="table table-bordered datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Persona</th>
                <th>Documento</th>
                <th>Telefono</th>
                <th>Fecha de Nacimiento</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $myrow = $obj -> sql("select pac.PacId, per.PerId, per.PerNombre, per.PerApepat, per.PerApemat, 
                                    per.PerDoc, per.PerFecNac, per.PerTelefono 
                                    from paciente pac
                                    inner join persona per
                                    on per.PerId = pac.PerId");
                            foreach ($myrow as $row) {
            ?>
            <tr>
                <td><?php echo $row["PacId"]; ?></td>
                <td><?php echo $row["PerNombre"].' '.$row["PerApepat"].' '.$row["PerApemat"]; ?></td>
                <td><?php echo $row["PerDoc"]; ?></td>
                <td><?php echo $row["PerTelefono"]; ?></td>
                <td><?php echo $row["PerFecNac"]; ?></td>
                <td>
                    <a href="?antecedente=1&id=<?php echo $row["PacId"]; ?>" class="btn btn-info">Antecedentes</a>
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