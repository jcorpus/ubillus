<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            
        </div>
        <h4 class="page-title">Enfermedad</h4>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- =================================== Formularios de Registro =================================== -->
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card-box">
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                </div>
            </div>


            <!--  Modal content for the above example -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Accion</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $myrow = $obj->fetch_record("tipoenfermedad");
                                foreach ($myrow as $row) {
                                    //breaking point
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row["EnfTipId"]; ?></th>
                                        <td><?php echo $row["EnfTipNombre"]; ?></td>
                                        <td><?php echo $row["EnfTipDescripcion"]; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info waves-effect waves-light btn-agregar">
                                                Seleccionar
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <form action="model/enfermedad.php" method="post">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Causas</label>
                            <textarea name="causa" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Tipo de Enfermedades</button>
                </div>

                <table class="table" id="tabla-tipoenfermedades">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>


                <div class="form-group text-right m-b-0">
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">
                        Registrar
                    </button>
                    <a href="enfermedad.php" class="btn btn-secondary">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- =================================== Fin de Formularios de Registro =================================== -->