<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            <a href="?a=create" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus-square pr-3"></i>Nuevo registro</a>
        </div>
        <h4 class="page-title">Usuario</h4>
    </div>
</div>
<!-- end page title end breadcrumb -->
<!-- =================================== Formularios de Registro =================================== -->
<div class="row">
    <div class="card-box table-responsive mt-3">

        <table class="table table-bordered datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $myrow = $obj -> sql("SELECT * FROM usuario");
                            foreach ($myrow as $row) {
            ?>
            <tr>
                <td><?php echo $row["UsuId"]; ?></td>
                <td><?php echo $row["UsuNombre"]; ?></td>
                <td><?php echo $row["UsuClave"]; ?></td>
                <td>
                    <a href="?a=edit&id=<?php echo $row["UsuId"]; ?>" class="btn btn-info btn-sm">Modificar</a>
                    
                    <?php
                    if($row["UsuEstado"]=="ACTIVO"){
                        ?>
                    <a href="model/usuario.php?edit_inactivo=1&id=<?php echo $row["UsuId"]; ?>" class="btn btn-sm btn-danger">Desactivar</a>    
                        <?php
                    } else {
                        ?>
                    <a href="model/usuario.php?edit_activo=1&id=<?php echo $row["UsuId"]; ?>" class="btn btn-sm btn-success">Activar</a>    
                        <?php
                    }
                    ?>
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