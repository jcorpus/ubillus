<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            
        </div>
        <h4 class="page-title">Cita</h4>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- =================================== Formularios de Registro =================================== -->
<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                </div>
            </div>


            <form action="model/cita.php" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Especialidad</label>
                            <!-- id="idespecialidad" -->
                            <select name="idespecialidad" id="idespecialidad" class="form-control select2">
                                <option>Seleccionar Servicio</option>
                                <?php
                                $myrow = $obj-> fetch_record("especialidad");
                                foreach ($myrow as $row) {
                                    ?>
                                    <option value="<?php echo $row["EspId"]; ?>"><?php echo $row["EspNombre"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Servicio</label>
                            <select name="idservicio" id="idservicio" class="form-control select2-servicio">
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Medico</label>
                            <select  name="iddoctor" id="iddoctor" class="form-control select2-medico">
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Paciente</label>
                            <!-- id="idespecialidad" -->
                            <select name="idpaciente" id="idpaciente" class="form-control select2">
                                <?php
                                $myrow = $obj-> sql("SELECT pac.PacId,per.PerNombre,per.PerApepat,per.PerApemat FROM paciente pac
                                                    INNER JOIN persona per
                                                    ON pac.PerId = per.PerId");
                                foreach ($myrow as $row) {
                                    ?>
                                    <option value="<?php echo $row["PacId"]; ?>"><?php echo $row["PerNombre"].' '.$row["PerApepat"].' '.$row["PerApemat"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Asunto</label>
                            <textarea name="asunto" id="asunto" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Fecha</label>
                            <input type="text" name="fechacita" id="fechacita" class="form-control datepicker">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-block" id="buscardisponibilidad">Buscar</button>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="disponibilidadfilas">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group text-right m-b-0">
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">
                        Registrar
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light m-l-5">
                        Cancelar
                    </button>
                </div> -->

            </form>
        </div>
    </div>
</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->
