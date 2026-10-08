<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Consultorio Médico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Plugin -->
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- End Plugin -->

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugins css-->
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
    <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="assets/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>
</head>

<body>

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <!--<a href="index.html" class="logo">-->
                <!--<span class="logo-small"><i class="mdi mdi-radar"></i></span>-->
                <!--<span class="logo-large"><i class="mdi mdi-radar"></i> Adminto</span>-->
                <!--</a>-->
                <!-- Image Logo -->
                <a href="index.html" class="logo">
                    <img src="img/logotresmarias.png" alt="" height="26" class="logo-small">
                    <img src="img/logotresmarias.png" alt="" height="40" class="logo-large">
                </a>
            </div>
            <!-- End Logo container-->

            <div class="menu-extras topbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">

                    <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                    <li class="hide-phone">
                        <!-- <form class="app-search">
                            <input type="text" placeholder="Search..."
                                   class="form-control">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form> -->
                    </li>
                    <li>
                        <!-- Notification -->
                        <!-- <div class="notification-box">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a href="javascript:void(0);" class="right-bar-toggle">
                                        <i class="mdi mdi-bell-outline noti-icon"></i>
                                    </a>
                                    <div class="noti-dot">
                                        <span class="dot"></span>
                                        <span class="pulse"></span>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                        <!-- End Notification bar -->
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <!-- <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> -->
                            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d3/User_Circle.png" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                            <!-- item-->
                            <a href="logout.php" class="dropdown-item notify-item">
                                <i class="ti-power-off m-r-5"></i> Logout
                            </a>

                        </div>
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <!-- <li class="has-submenu">
                        <a href="index.php"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                    </li> -->
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-texture"></i><span> Registro </span> </a>
                        <ul class="submenu">
                            <li><a href="persona.php"> Registrar Persona </a></li>
                            <li><a href="medico.php"> Registrar Medico </a></li>
                            <li><a href="paciente.php"> Registrar Paciente</a></li>
                            <li><a href="cita.php"> Registrar Cita</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-texture"></i><span> Atencion </span> </a>
                        <ul class="submenu">
                            <li><a href="consulta.php"> Registrar Consulta </a></li>
                            <!-- <li><a href="historial.php"> Registrar Historial </a></li> -->
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-texture"></i><span> Medico </span> </a>
                        <ul class="submenu">
                            <li><a href="programacion.php"> Registrar Programacion </a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-texture"></i><span> Configuracion </span> </a>
                        <ul class="submenu">
                            <li><a href="tipodocumento.php"> Registrar Tipo de Documento </a></li>
                            <li><a href="enfermedad.php"> Registrar Enfermedad</a></li>
                            <li><a href="tipoenfermedad.php"> Registrar Tipo de Enfermedad</a></li>
                            <li><a href="especialidad.php"> Registrar Especialidad</a></li>
                            <li><a href="servicio.php"> Registrar Servicio</a></li>
                            <li><a href="usuario.php"> Registrar Usuario</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-texture"></i><span> Reporte </span> </a>
                        <ul class="submenu">
                            <li><a href="reporte_antecedentes.php"> Reporte Antecedentes </a></li>
                            <!-- <li><a href="tipopaciente.php"> Reporte Consultas </a></li> -->
                        </ul>
                    </li>
                    <!-- <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-texture"></i><span> Forms </span> </a>
                        <ul class="submenu">
                            <li><a href="form-elements.html">General Elements</a></li>
                            <li><a href="form-advanced.html">Advanced Form</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-fileupload.html">Form Uploads</a></li>
                            <li><a href="form-wysiwig.html">Wysiwig Editors</a></li>
                            <li><a href="form-xeditable.html">X-editable</a></li>
                        </ul>
                    </li> -->
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->


<div class="wrapper">
    <div class="container-fluid">
