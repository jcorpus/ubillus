<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            <a href="reporte_antecedentes.php" class="btn btn-info"><i class="fa fa-arrow-left mr-3"></i>Regresar</a>
        </div>
        <h4 class="page-title">Antecedente</h4>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- =================================== Formularios de Registro =================================== -->
<div class="row">
    <div class="card-box table-responsive">
        <!-- <p class="text-muted font-14 m-b-30">
            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
        </p> -->
        <?php
            if (!empty($_GET["id"])) $id = $_GET["id"];
            else $id = null;

            $row = $obj->sql_row("SELECT pac.PacId, per.PerNombre, per.PerApepat, per.PerApemat, per.PerFecNac, per.PerDoc, 
            per.PerSexo, per.PerEstadoCivil, per.PerDireccion, per.PerTelefono, pac.PacAlergiaMedicamento, 
            pac.PacAnteFam, pac.PacAntePer, pac.PacAnteNoPato, pac.PacTipSangre
            FROM paciente pac
            INNER JOIN persona per
            ON pac.PerId = per.PerId
            WHERE pac.PacId = ".$id);
            ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" value="<?php echo $row["PerNombre"]; ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input type="text" value="<?php echo $row["PerApepat"]." ".$row["PerApemat"]; ?>" class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Documento</label>
                    <input type="text" value="<?php echo $row["PerDoc"]; ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Fecha de Nacimiento</label>
                    <input type="text" value="<?php echo $row["PerFecNac"]; ?>" class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Sexo</label>
                    <input type="text" value="<?php
                        if($row["PerSexo"]=="M")
                            echo "MASCULINO";
                        if($row["PerSexo"]=="F")
                            echo "FEMENINO";
                        else
                            echo "";
                        ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Estado Civil</label>
                    <input type="text" value="<?php
                        if($row["PerEstadoCivil"]=="S")
                            echo "SOLTERO";
                        if($row["PerEstadoCivil"]=="C")
                            echo "CASADO";
                        if($row["PerEstadoCivil"]=="V")
                            echo "VIUDO";
                        if($row["PerEstadoCivil"]=="D")
                            echo "DIVORCIADO";
                        else
                            echo "";
                        ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Direccion</label>
                    <input type="text" value="<?php echo $row["PerDireccion"]; ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="text" value="<?php echo $row["PerTelefono"]; ?>" class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Antecedentes Personales</label>
                    <textarea cols="30" rows="10" class="form-control" readonly><?php echo $row["PacAntePer"]; ?></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Antecedentes Familiares</label>
                    <textarea cols="30" rows="10" class="form-control" readonly><?php echo $row["PacAnteFam"]; ?></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Antecedentes Patologicos</label>
                    <textarea cols="30" rows="10" class="form-control" readonly><?php echo $row["PacAnteNoPato"]; ?></textarea>
                </div>
            </div>
        </div>
        
        <div class="filtrar">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>Asunto de Cita</th>
                        <th>Diagnostico</th>
                        <th>Peso</th>
                        <th>Pres. Art</th>
                        <th>Temperatura</th>
                        <th>Fecha Consulta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $myrow = $obj->sql("SELECT cit.CitaAsunto, con.ConsAnamnesis, con.ConsDescripcion, con.ConsFecReg, 
                                            diag.DiagDescripcion, rec.RecMedTratamiento, his.HisCliPeso, 
                                            his.HisCliPresionArterial, his.HisCliTemperatura, his.HisCliHora 
                                            FROM consulta con -- CITA
                                            INNER JOIN cita cit -- CONSULTA
                                            ON con.CitaId = cit.CitaId
                                            INNER JOIN diagnostico diag -- DIAGNOSTICO
                                            ON diag.ConsId = con.ConsId
                                            INNER JOIN recetamedica rec -- RECETA MEDICA
                                            ON rec.DiagId = diag.DiagId
                                            INNER JOIN historiaclinica his -- HISTORIA CLINICA
                                            ON his.CitaId = cit.CitaId  -- FALTA DETALLE DIAGNOSTICO Y ENFERMEDAD
                                            INNER JOIN paciente pac
                                            ON cit.PacId = pac.PacId
                                            WHERE pac.PacId = ".$_GET["id"]);
                    foreach ($myrow as $row) {
                        ?>
                        <tr>
                            <td><b><?php echo $row["CitaAsunto"]; ?></b></td>
                            <td><b><?php echo $row["DiagDescripcion"]; ?></b></td>
                            <td><b><?php echo $row["HisCliPeso"]; ?></b></td>
                            <td><b><?php echo $row["HisCliPresionArterial"]; ?></b></td>
                            <td><b><?php echo $row["HisCliTemperatura"].' °'; ?></b></td>
                            <td><b><?php echo $row["ConsFecReg"]; ?></b></td>
                            
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->