
</div> <!-- end container -->


<!-- Right Sidebar -->
<div class="side-bar right-bar">
    <a href="javascript:void(0);" class="right-bar-toggle">
        <i class="mdi mdi-close-circle-outline"></i>
    </a>
    <h4 class="">Notifications</h4>
    <div class="notification-list nicescroll">
        <ul class="list-group list-no-border user-list">
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="avatar">
                        <img src="assets/images/users/avatar-2.jpg" alt="">
                    </div>
                    <div class="user-desc">
                        <span class="name">Michael Zenaty</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">2 hours ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="icon bg-info">
                        <i class="mdi mdi-account"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">New Signup</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">5 hours ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="icon bg-pink">
                        <i class="mdi mdi-comment"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">New Message received</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">1 day ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item active">
                <a href="#" class="user-list-item">
                    <div class="avatar">
                        <img src="assets/images/users/avatar-3.jpg" alt="">
                    </div>
                    <div class="user-desc">
                        <span class="name">James Anderson</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">2 days ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item active">
                <a href="#" class="user-list-item">
                    <div class="icon bg-warning">
                        <i class="mdi mdi-settings"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">Settings</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">1 day ago</span>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- /Right-bar -->

</div>
<!-- end wrapper -->


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <?php echo date("Y"); ?> - Propiedad de Ubillus
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->



<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>

<!-- Required datatable js -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<!-- Key Tables -->
<script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<!-- Responsive examples -->
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<!-- Selection table -->
<script src="assets/plugins/datatables/dataTables.select.min.js"></script>


<!-- Plugins Js -->
<script src="assets/plugins/switchery/switchery.min.js"></script>
<script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

<script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
<!-- Extra -->
<!-- <script src="app/parientes.js"></script> -->
<script>
    jQuery('#date-range').datepicker({
        toggleActive: true,
        orientation: "top",
        format: "yyyy-mm-dd",
        startDate: '0d',
    });
    // var date = new Date();
    // date.setDate(date.getDate());
    $(".select2").select2();
    jQuery('.datepicker').datepicker({
        orientation: "top",
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd",
        clearBtn: true,
    });
    jQuery('.timepicker').timepicker({
        minuteStep : 30,
        // defaultTIme : false,
        icons: {
            up: 'mdi mdi-chevron-up',
            down: 'mdi mdi-chevron-down'
        }
    });
</script>
<script src="app/cita.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Default Datatable
        $('.datatable').DataTable({
            dom: 'Bflrtip',
            buttons: [
            'copy', 'csv', 'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    title: 'Consultorio Médico',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    customize: function (doc) {
                        doc.defaultStyle.fontSize = 9;
                        doc.defaultStyle.bold = false;

                        if (doc.styles.title) {
                            doc.styles.title.fontSize = 15;
                            doc.styles.title.bold = false;
                            doc.styles.title.color = '#37474f';
                            doc.styles.title.alignment = 'center';
                            doc.styles.title.margin = [0, 0, 0, 10];
                        }

                        doc.styles.tableHeader.fontSize = 9;
                        doc.styles.tableHeader.bold = false;
                        doc.styles.tableHeader.color = '#37474f';
                        doc.styles.tableHeader.fillColor = '#eceff1';

                        doc['footer'] = function (currentPage, pageCount) {
                            return {
                                margin: [40, 0],
                                fontSize: 8,
                                color: '#90a4ae',
                                columns: [
                                    { text: 'Consultorio Médico', alignment: 'left' },
                                    { text: 'Pagina ' + currentPage + ' de ' + pageCount, alignment: 'right' }
                                ]
                            };
                        };
                    }
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    autoPrint: true
                }
            ]
        });
    });
</script>


<script>
$(document).ready(function(){
    function isNotEmpty(){
        var espid = '<?php echo $row["EspId"]; ?>';
        if(espid){
            return true;
        } else {
            return false;
        }
    }
    function actualizar(){
        if(isNotEmpty()){
            var select = $('#idespecialidad');
            select.val('<?php echo $row["EspId"]; ?>').trigger('change.select2');
        }
    };
    actualizar();
});
</script>
<script src="app/validacion/jquery.alphanumeric.js"></script>
<script>
    $('.onlyNum').numeric();
    $('.onlyLetter').alpha();
</script>
<script>
    // Valida los campos obligatorios ("required") al intentar enviar el
    // formulario. Si falta alguno, no se envia el formulario, los campos
    // vacios se marcan en rojo y se muestra una alerta roja explicando
    // que hay que completar los datos.
    $(function () {
        $("form").each(function () {
            var $form = $(this);
            var $required = $form.find("[required]");
            if ($required.length === 0) {
                return;
            }
            var $submitBtns = $form.find('button[type="submit"], input[type="submit"]');
            var $alerta = null;

            function campoVisible($campo) {
                // Con select2 el <select> real queda oculto; el borde rojo
                // debe pintarse sobre el contenedor visible que lo reemplaza.
                var $select2 = $campo.next(".select2, .select2-container");
                return $select2.length ? $select2.find(".select2-selection") : $campo;
            }

            function obtenerAlerta() {
                if (!$alerta) {
                    $alerta = $('<div class="alert alert-danger" role="alert"></div>')
                        .text("Debe completar todos los campos obligatorios para poder registrar.")
                        .hide();
                    $submitBtns.first().closest(".form-group").before($alerta);
                }
                return $alerta;
            }

            function validarCampos(marcarTodos) {
                var valido = true;
                $required.each(function () {
                    var $campo = $(this);
                    var campoValido = this.checkValidity();
                    if (!campoValido) {
                        valido = false;
                    }
                    if (marcarTodos || $campo.data("tocado")) {
                        campoVisible($campo).toggleClass("is-invalid", !campoValido);
                    }
                });
                return valido;
            }

            $required.on("input change keyup blur", function () {
                $(this).data("tocado", true);
                if (validarCampos(false)) {
                    obtenerAlerta().hide();
                }
            });
            // Cubre los cambios disparados por select2 y otros plugins
            $form.on("change", function () {
                if (validarCampos(false)) {
                    obtenerAlerta().hide();
                }
            });
            $form.on("submit", function (e) {
                if (!validarCampos(true)) {
                    e.preventDefault();
                    var $al = obtenerAlerta().show();
                    $al[0].scrollIntoView({ behavior: "smooth", block: "center" });
                } else {
                    obtenerAlerta().hide();
                }
            });
        });
    });

    function checkform(){

        var huboErrores = false;

        function getHour24(time) {
            var hours = parseInt(time.substr(0, 2));
            if(time.indexOf('am') != -1 && hours == 12) {
                time = time.replace('12', '0');
            }
            if(time.indexOf('pm')  != -1 && hours < 12) {
                time = time.replace(hours, (hours + 12));
            }
            return time.replace(/(am|pm)/, '');
        }

        function limpiarError($campo, idError){
            $campo.removeClass('is-invalid');
            $('#' + idError).text('');
        }

        function marcarError($campo, idError, mensaje){
            $campo.addClass('is-invalid');
            $('#' + idError).text(mensaje);
            huboErrores = true;
        }

        var $fecinicio = $("#fecinicio");
        var $fecfinal = $("#fecfinal");
        var $horainicio = $("#horainicio");
        var $horafinal = $("#horafinal");

        var fecinicio = $fecinicio.val();
        var fecfinal = $fecfinal.val();
        var horainicio = $horainicio.val();
        var horafinal = $horafinal.val();

        limpiarError($fecinicio, "fecinicioError");
        limpiarError($fecfinal, "fecfinalError");
        limpiarError($horainicio, "horainicioError");
        limpiarError($horafinal, "horafinalError");
        $("#diasError").addClass("d-none");

        if(fecinicio.length > 0 && fecfinal.length > 0){
            if(fecinicio == fecfinal){
                marcarError($fecinicio, "fecinicioError", "La fecha inicio debe ser menor a la fecha final");
                marcarError($fecfinal, "fecfinalError", "La fecha inicio debe ser menor a la fecha final");
            }
        } else {
            if(!fecinicio){
                marcarError($fecinicio, "fecinicioError", "La fecha no puede estar vacia");
            }
            if(!fecfinal){
                marcarError($fecfinal, "fecfinalError", "La fecha no puede estar vacia");
            }
        }

        if(getHour24(horainicio) >= getHour24(horafinal)){
            marcarError($horainicio, "horainicioError", "La hora inicio debe ser menor a la hora final");
            marcarError($horafinal, "horafinalError", "La hora inicio debe ser menor a la hora final");
        }

        if ($("#frmProgramacion input:checkbox:checked").length <= 2)
        {
            $("#diasError").removeClass("d-none");
            huboErrores = true;
        }

        return !huboErrores;
    }
</script>

</body>
</html>