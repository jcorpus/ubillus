<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            
        </div>
        <h4 class="page-title">Persona</h4>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- =================================== Formularios de Registro =================================== -->
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-7">
        <div class="card-box pt-4">

            <!-- <h4 class="header-title m-t-0 m-b-30">Persona</h4> -->

            <form action="model/persona.php" method="post">
                <input type="hidden" name="id" id="idpersona" value="<?php echo $id; ?>">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input name="nombre" value="<?php echo $row["PerNombre"] ?? ''; ?>" type="text" class="form-control onlyLetter" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input name="apepat" value="<?php echo $row["PerApepat"] ?? ''; ?>" type="text" class="form-control onlyLetter" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input name="apemat" value="<?php echo $row["PerApemat"] ?? ''; ?>" type="text" class="form-control onlyLetter">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Tipo Documento</label>
                            <select name="tipodoc" class="form-control select2">
                                <?php
                                $myrow = $obj->fetch_record("tipodocumento");
                                foreach ($myrow as $row2) {
                                    //breaking point
                                    $seleccionado = (!empty($row) && ($row["TipoDocId"] ?? null) == $row2["TipoDocId"]) ? "selected" : "";
                                    ?>
                                    <option value="<?php echo $row2["TipoDocId"]; ?>" <?php echo $seleccionado; ?>><?php echo $row2["TipoDocNombre"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Documento</label>
                            <input name="documento" value="<?php echo $row["PerDoc"] ?? ''; ?>" type="text" class="form-control onlyNum" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                            <input name="fecnacimiento" value="<?php echo $row["PerFecNac"] ?? ''; ?>" type="text" class="form-control datepicker">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Sexo</label>
                            <select name="sexo" class="form-control">
                                <option value="M" <?php echo (!empty($row) && ($row["PerSexo"] ?? null) == "M") ? "selected" : ""; ?>>Masculino</option>
                                <option value="F" <?php echo (!empty($row) && ($row["PerSexo"] ?? null) == "F") ? "selected" : ""; ?>>Femenino</option>
                                <option value="O" <?php echo (!empty($row) && ($row["PerSexo"] ?? null) == "O") ? "selected" : ""; ?>>Otros</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Estado Civil</label>
                            <select name="estadocivil" id="" class="form-control">
                                <option value="S" <?php echo (!empty($row) && ($row["PerEstadoCivil"] ?? null) == "S") ? "selected" : ""; ?>>Soltero</option>
                                <option value="C" <?php echo (!empty($row) && ($row["PerEstadoCivil"] ?? null) == "C") ? "selected" : ""; ?>>Casado</option>
                                <option value="V" <?php echo (!empty($row) && ($row["PerEstadoCivil"] ?? null) == "V") ? "selected" : ""; ?>>Viudo</option>
                                <option value="D" <?php echo (!empty($row) && ($row["PerEstadoCivil"] ?? null) == "D") ? "selected" : ""; ?>>Divorciado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Direccion</label>
                            <input name="direccion" value="<?php echo $row["PerDireccion"] ?? ''; ?>" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Telefono</label>
                            <input name="telefono" value="<?php echo $row["PerTelefono"] ?? ''; ?>" type="text" class="form-control onlyNum">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Correo - E</label>
                            <input name="email" value="<?php echo $row["PerCorreo"] ?? ''; ?>" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group text-right m-b-0">
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">
                        Registrar
                    </button>
                    <a href="persona.php" class="btn btn-secondary">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->