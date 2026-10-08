<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            
        </div>
        <h4 class="page-title">Medico</h4>
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
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                </div>
            </div>


            <form action="model/medico.php" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Persona</label>
                            <select name="perid" class="form-control select2" required>
                                <?php
                                $myrow = $obj->sql("SELECT * FROM persona WHERE persona.PerId NOT IN (SELECT PerId FROM medico)");
                                foreach ($myrow as $row) {
                                    //breaking point
                                    ?>
                                    <option value="<?php echo $row["PerId"]; ?>"><?php echo $row["PerNombre"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Especialidad</label>
                            <select name="espid" class="form-control select2" required>
                                <?php
                                $myrow = $obj->fetch_record("especialidad");
                                foreach ($myrow as $row) {
                                    //breaking point
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
                            <label for="">Descripcion</label>
                            <textarea name="descripcion" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>


                <div class="form-group text-right m-b-0">
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">
                        Registrar
                    </button>
                    <a href="medico.php" class="btn btn-secondary">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->