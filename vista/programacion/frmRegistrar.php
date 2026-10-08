<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            
        </div>
        <h4 class="page-title">Programacion</h4>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- =================================== Formularios de Registro =================================== -->
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-7">
        <div class="card-box">
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                </div>
            </div>


            <form action="model/programacion.php" method="post" id="frmProgramacion">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Medico</label>
                            <select name="medid" class="form-control select2" required>
                                <?php
                                $myrow = $obj->sql("SELECT med.MedId, per.PerNombre, per.PerApepat, per.PerApemat FROM medico med
                                INNER JOIN persona per
                                ON med.PerId = per.PerId
                                INNER JOIN especialidad esp
                                ON med.EspId = esp.EspId");
                                foreach ($myrow as $row) {
                                    //breaking point
                                    ?>
                                    <option value="<?php echo $row["MedId"]; ?>"><?php echo $row["PerNombre"].' '.$row["PerApepat"].' '.$row["PerApemat"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row input-daterange" id="date-range">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fecha Inicio</label>
                            <input type="text" name="fecinicio" id="fecinicio" class="form-control datepicker">
                            <div class="invalid-feedback" id="fecinicioError"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fecha Final</label>
                            <input type="text" name="fecfinal" id="fecfinal" class="form-control datepicker">
                            <div class="invalid-feedback" id="fecfinalError"></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Hora Inicio</label>
                            <input type="text" name="horainicio" id="horainicio" class="form-control timepicker">
                            <div class="invalid-feedback" id="horainicioError"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Hora Final</label>
                            <input type="text" name="horafinal" id="horafinal" class="form-control timepicker">
                            <div class="invalid-feedback" id="horafinalError"></div>
                        </div>
                    </div>
                </div>

                <div class="row" id="filaDias">
                    <div class="col-md-3">
                        <div class="for-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="dias[]" value="1" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Lunes</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="dias[]" value="2" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">Martes</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="for-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="dias[]" value="3" class="custom-control-input" id="customCheck3">
                                <label class="custom-control-label" for="customCheck3">Miercoles</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="dias[]"value="4" class="custom-control-input" id="customCheck4">
                                <label class="custom-control-label" for="customCheck4">Jueves</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="for-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="dias[]" value="5" class="custom-control-input" id="customCheck5">
                                <label class="custom-control-label" for="customCheck5">Viernes</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="dias[]" value="6" class="custom-control-input" id="customCheck6">
                                <label class="custom-control-label" for="customCheck6">Sabado</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="dias[]" value="0" class="custom-control-input" id="customCheck7">
                                    <label class="custom-control-label" for="customCheck7">Domingo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <small class="text-danger d-none" id="diasError">Debe seleccionar minimo 2 dias.</small>


                <div class="form-group text-right m-b-0">
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light" onclick="return checkform()">
                        Registrar
                    </button>
                    <a href="programacion.php" class="btn btn-secondary">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->