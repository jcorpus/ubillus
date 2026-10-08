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
    
    <div class="col-md-4">
        <div class="card-box">
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                </div>
            </div>

            <h4 class="header-title m-t-0 m-b-30">Cita</h4>
            <form action="model/historial.php" method="post">
            <?php
            if (!empty($_GET["id"])) $id = $_GET["id"];
            else $id = null;
            $row = $obj->sql_record("select cit.CitaId, cit.CitaAsunto, per.PerNombre, per.PerApepat, per.PerApemat, progmed.DetProgMedFecha, progmed.DetProgMedHora, serv.ServNombre from cita cit
            inner join paciente pac
            on cit.PacId = pac.PacId
            inner join servicio serv
            on cit.ServId = serv.ServId 
            inner join programacionmedico progmed
            on cit.DetProgMedId = progmed.DetProgMedId
            inner join persona per
            on pac.PerId = per.PerId
            inner join programacion prog
            on prog.ProgId = progmed.ProgId WHERE cit.CitaId=".$id);
            ?>
                <input type="hidden" name="idcita" id="" value="<?php echo $_GET["id"]?>">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Paciente</label>
                            <input type="text" name="nombre" value="<?php echo $row["PerNombre"].' '.$row["PerApepat"].' '.$row["PerApemat"]; ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Servicio</label>
                            <input type="text" name="nombre" value="<?php echo $row["ServNombre"];?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Asunto</label>
                            <textarea name="" id="" class="form-control" readonly><?php echo $row["CitaAsunto"];?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Fecha</label>
                            <input type="text" name="" id="" value="<?php echo $row["DetProgMedFecha"]; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Hora</label>
                            <input type="text" name="" id="" value="<?php echo $row["DetProgMedHora"]; ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Peso</label>
                            <input type="text" name="peso" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Presion Arterial</label>
                            <input type="text" name="presionarterial" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Temperatura</label>
                            <input type="text" name="temperatura" id="" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="form-group text-right m-b-0">
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">
                        Registrar
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light m-l-5">
                        Cancelar
                    </button>
                </div>
            </form>
                <!-- <div class="form-group text-right m-b-0">
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">
                        Registrar
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light m-l-5">
                        Cancelar
                    </button>
                </div> -->
        </div>
    </div>
    
</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->