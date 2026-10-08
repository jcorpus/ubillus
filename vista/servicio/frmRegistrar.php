<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            
        </div>
        <h4 class="page-title">Servicio</h4>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- =================================== Formularios de Registro =================================== -->
<div class="row">
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-6">
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


            <form action="model/servicio.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row">
                    <div class="col-12 col-sm-5">
                        <div class="form-group">
                            <label> Especialidad </label>
                            <select name="especialidad" id="idespecialidad" class="form-control select2">
                                <?php
                                $myrow2 = $obj->fetch_record("especialidad");
                                foreach ($myrow2 as $row2) {
                                    //breaking point
                                    ?>
                                    <option value="<?php echo $row2["EspId"]; ?>"><?php echo $row2["EspNombre"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-5">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" value="<?php echo $row["ServNombre"]; ?>" class="form-control onlyLetter" required>
                        </div>
                    </div>
                    <div class="col-12 col-sm-2">
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="text" name="precio" value="<?php echo $row["ServPrecio"]; ?>" class="form-control onlyNum" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea name="descripcion" rows="10" class="form-control"><?php echo $row["ServDescripcion"]; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right m-b-0">
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">
                        Registrar
                    </button>
                    <a href="servicio.php" class="btn btn-secondary">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->
