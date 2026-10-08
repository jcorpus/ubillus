<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
            
        </div>
        <h4 class="page-title">Paciente</h4>
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
            

            <form action="model/paciente.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php
                if(!empty($row)){
                    // echo "No esta vacia";
                    ?>
                    <input type="hidden" name="perid" value="<?php echo $row["PerId"]; ?>">
                    <?php
                } else {
                    // echo "Esta vacia";
                
                ?>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Persona</label>
                            <select name="perid" class="form-control select2" required>
                                <?php
                                $myrow2 = $obj->sql("SELECT * FROM persona WHERE persona.PerId NOT IN (SELECT PerId FROM paciente)");
                                foreach ($myrow2 as $row2) {
                                    //breaking point
                                    ?>
                                    <option value="<?php echo $row2["PerId"]; ?>"><?php echo $row2["PerNombre"]. ' ' . $row2["PerApepat"]. ' ' . $row2["PerApemat"]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <?php 
                }
                ?>


                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Ocupacion</label>
                            <input type="text" name="ocupacion" value="<?php echo $row["PacOcupacion"] ?? ''; ?>" id="" class="form-control onlyLetter">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Tipo de Sangre</label>
                            <select name="tiposangre" id="" class="form-control" required>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Num. de Hijos</label>
                            <input type="text" name="numhijos" value="<?php echo $row["PacNumHijos"] ?? ''; ?>" id="" class="form-control onlyNum" maxlength="2">
                        </div>
                    </div>
                </div>
                    <!-- =========================================================================================================== -->
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea name="descripcionapoderado" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Antecedentes Personales</label>
                            <textarea name="antper" id="" rows="5" class="form-control"><?php echo $row["PacAntePer"] ?? ''; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Antecedentes Familiares</label>
                            <textarea name="antfam" id="" rows="5" class="form-control"><?php echo $row["PacAnteFam"] ?? ''; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Antecedentes Patologicos</label>
                            <textarea name="antpat" id="" rows="5" class="form-control"><?php echo $row["PacAnteNoPato"] ?? ''; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Alergia a Medicamentos</label>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="radio">
                                            <input id="radio1" name="customRadio" type="radio">
                                            <label for="radio1">
                                                Si
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="radio">
                                            <input id="radio2" name="customRadio" type="radio">
                                            <label for="radio2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Especifique</label>
                            <textarea name="alergiamedicamento" id="" cols="30" rows="5" class="form-control" style="resize:none"><?php echo $row["PacAlergiaMedicamento"] ?? ''; ?></textarea>
                            <!-- <input type="text" name="" id="" aria-describedby="emailHelp" class="form-control"> -->
                            <small id="emailHelp" class="form-text text-muted">Separe cada medicamento con una coma (Ej: Medicamento 1, Medicamento 2...).</small>
                        </div>
                    </div>
                    
                </div>
                

                <div class="form-group text-right m-b-0">
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">
                        Registrar
                    </button>
                    <a href="paciente.php" class="btn btn-secondary">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- =================================== Fin de Formularios de Registro ===================================