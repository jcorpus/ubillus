<?php
include 'model/cita.php';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from unlockdesizn.com/html/health-and-beauty/be-medical/demo/page-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Jun 2018 03:07:16 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- css file -->

<link rel="stylesheet" href="demo/css/bootstrap.min.css">
<link rel="stylesheet" href="demo/css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="demo/css/responsive.css">
<!-- Title -->
<title>Consultorio Medico - Tres Marias</title>
<!-- Favicon -->
<link href="demo/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="demo/images/favicon.ico" sizes="128x128" rel="shortcut icon" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
<link rel="stylesheet" href="demo/css/jquery.steps.css">
<style>
	/* #wizard>.content{display:block;min-height:35em;overflow-y: auto;position:relative} */
	.wizard .content {
    min-height: 100px;
	}
	.wizard .content > .body {
		width: 100%;
		height: auto;
		padding: 15px;
		position: relative;
	}
	select + .select2-container {
		width: 100% !important;
	}
	select + .select2-medico-container {
		width: 100% !important;
	}
	select + .select2-servicio-container {
		width: 100% !important;
	}
</style>

<link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

</head>
<body>
<div class="wrapper">
	<div id="preloader" class="preloader">
		<div id="pre" class="preloader_container"><div class="preloader_disabler btn btn-default">Desactivar animacion de carga</div></div>
	</div>
  	<div class="header-top">
  		<div class="container">
  			<div class="row">  				
  				<div class="col-md-4 pull-right">
  					<div class="welcm-ht text-right ulockd-mrgn1215">
						<ul class="list-inline">
							
							<li>
								<a href="#" data-toggle="modal" data-target=".bs-example-modal-md" data-whatever="@mdo"><i class="fa fa-user text-thm2"></i> Admin</a>
		        				<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
		        				    <div class="modal-dialog modal-md" role="document">
			        				    <div class="modal-content">
			        				        <div class="modal-header">
				        				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        				        <!-- <h4 class="modal-title text-center">Login</h4> -->
			        				        </div>
			        				        <div class="modal-body">
				        				      	<div class="row">
				        				      		<div class="col-sm-12 col-md-8 col-md-offset-2 text-center">
				        						        <form class="ulockd-login-form" id="login">
				        						        	<h3><span class="flaticon-lock"></span> Login</h3>
				        						        	<p>Ingresar usuario y clave para entrar:</p>
				        						            <div class="form-group">
				            								    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
				            								</div>
				            								<div class="form-group">
				            								    <input type="password" class="form-control" name="clave" id="clave" placeholder="Clave">
				            								</div>
				        						            <button type="submit" name="submitExterno" class="btn btn-default ulockd-btn-thm2" style="background-color:#3481BB;border:none;">Ingresar</button>
				        						        </form>
				        				      		</div>
				        				      	</div>	
			        				        </div>
			        				        <!-- modal footer start here-->
			        				    </div>
		        				    </div>
		        				</div>
							</li>
							
							
						</ul>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
	<!-- Header Middle -->
	<div class="header-middle">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-lg-5">
  					<div class="welcm-ht">
						<a href="index.php" class="ulockd-main-logo"><img src="img/logotresmarias.png" style="height: 60px" alt="header-logo2.png"></a>
  					</div>
				</div>
				<div class="col-md-9 col-lg-7 ulockd-pad390">
					<ul class="list-inline tac-smd ulockd-mrgn60">
						<li>
							<div class="ulockd-ohour-info tac-smd mb30-xxsd">
								<div class="ulockd-icon pull-left fn-smd text-thm2"><span class="fa fa-clock-o"></span></div>
								<div class="ulockd-info">
									<p class="ulockd-addrss"><strong>Official Schedule</strong> <br> 9:00AM-5:00PM</p>
								</div>
							</div>
						</li>
						<li>
							<div class="ulockd-ohour-info tac-smd mb30-xxsd">
								<div class="ulockd-icon pull-left fn-smd text-thm2"><span class="fa fa-envelope"></span></div>
								<div class="ulockd-info">
									<p class="ulockd-addrss"><strong>Mail Us</strong> <br> demo@webmail.com</p>
								</div>
							</div>
						</li>
						<li>
							<div class="ulockd-ohour-info tac-smd mb30-xxsd">
								<div class="ulockd-icon pull-left fn-smd text-thm2"><span class="fa fa-phone"></span></div>
								<div class="ulockd-info">
									<p class="ulockd-addrss"><strong>Call Us For Details</strong> <br> +61 9875 5968 54</p>
								</div>
							</div>
						</li>
						<li>
							<div class="ulockd-ohour-info tac-smd mb30-xxsd">
								<div class="ulockd-icon pull-left fn-smd text-thm2"><span class="fa fa-map-signs"></span></div>
								<div class="ulockd-info">
									<p class="ulockd-addrss"><strong>Suite 300 Houston</strong> <br> Texas - 77042 USA</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Header Styles -->
	<header class="header-nav">
		<div class="main-header-nav navbar-scrolltofixed">
			<div class="container">
			    <nav class="navbar navbar-default bootsnav menu-style1">
			        <div class="container ulockd-pdng0">
			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			            </div>
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse pad330-md" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-left" data-in="fadeIn">
			                                                    
			                    <li class="dropdown">
			                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cita</a>
			                        <ul class="dropdown-menu">
										<li><a href="index.php">Inicio</a></li>
					                    <li><a href="page-appointment.php">Cita Online</a></li>
			                        </ul>
			                    </li>
			                </ul>
							
			            </div><!-- /.navbar-collapse -->
			        </div>
			    </nav>
			</div>
		</div>		
	</header>

	<!-- Home Design Inner Pages -->
	<div class="ulockd-inner-home">
		<div class="container">
			<div class="row">
				<div class="inner-conraimer-details">
					<div class="col-md-12">
						<h1 class="text-uppercase">CITA</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Home Design Inner Pages -->
	<div class="ulockd-inner-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ulockd-icd-layer">
						<ul class="list-inline ulockd-icd-sub-menu">
							<li><a href="#"> INICIO </a></li>
							<li><a href="#"> > </a></li>
							<li> <a href="#"> CITA </a> </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


<div class="container">
	<div class="row">
		<div class="col-md-2">
			<a href="img/01.jpg" data-lightbox="roadtrip">
				<img class="img-thumbnail" src="img/01.jpg" alt="">
			</a>
		</div>
		<div class="col-md-2">
			<a href="img/02.jpg" data-lightbox="roadtrip">
				<img class="img-thumbnail" src="img/02.jpg" alt="">
			</a>
		</div>
		<div class="col-md-2">
			<a href="img/03.jpg" data-lightbox="roadtrip">
				<img class="img-thumbnail" src="img/03.jpg" alt="">
			</a>
		</div>
		<div class="col-md-2">
			<a href="img/04.jpg" data-lightbox="roadtrip">
				<img class="img-thumbnail" src="img/04.jpg" alt="">
			</a>
		</div>
		<div class="col-md-2">
			<a href="img/05.jpg" data-lightbox="roadtrip">
				<img class="img-thumbnail" src="img/05.jpg" alt="">
			</a>
		</div>
		<div class="col-md-2">
			<a href="img/06.jpg" data-lightbox="roadtrip">
				<img class="img-thumbnail" src="img/06.jpg" alt="">
			</a>
		</div>

	</div>
</div>




	<!-- Our About -->
	<section class="ulockd-about-one inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Appointment Form Starts -->
                    
                        <div class="messages"></div>
                        <div class="row">
                            <div class="col-md-12">
					        	<h2>HACER UNA CITA</h2>
					        	<p>Llenar los siguientes formularios para continuar con su registro.</p>
                               
                            </div>
                            
								<form action="#" id="frmCitaExt">
									<div class="text-left content">
										<h3>Persona</h3>
										<section>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="">Nombre</label>
														<input type="text" name="nombre" id="nombre" class="form-control" >
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Apellido Paterno</label>
														<input type="text" name="apepat" id="apepat" class="form-control">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Apellido Materno</label>
														<input type="text" name="apemat" id="apemat" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label>Tipo Documento</label>
													<select name="tipodoc" id="tipodoc" class="form-control select2">
														<option>Seleccionar Tipo</option>
														<?php
														$myrow = $obj->fetch_record("tipodocumento");
														foreach ($myrow as $row) {
															//breaking point
															?>
															<option value="<?php echo $row["TipoDocId"]; ?>"><?php echo $row["TipoDocNombre"]; ?></option>
															<?php
														}
														?>
													</select>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Documento</label>
														<input type="text" name="documento" id="documento" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Fecha de Nacimiento</label>
														<input type="text" name="fecnacimiento" id="fecnacimiento" class="form-control datepicker">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Sexo</label>
														<select name="sexo" id="sexo" class="form-control">
															<option value="M">Masculino</option>
															<option value="F">Femenino</option>
															<option value="O">Otros</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Estado Civil</label>
														<select name="estadocivil" id="estadocivil" class="form-control">
															<option value="S">Soltero</option>
															<option value="C">Casado</option>
															<option value="V">Viudo</option>
															<option value="D">Divorciado</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Direccion</label>
														<input type="text" name="direccion" id="direccion" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Telefono</label>
														<input type="text" name="telefono" id="telefono" class="form-control">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Correo</label>
														<input type="text" name="correo" id="correo" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="">Alergia de Medicamentos</label>
														<textarea name="alergiamedicamento" id="alergiamedicamento" cols="30" rows="10" class="form-control"></textarea>
													</div>
												</div>
											</div>



											
										</section>
										<h3>Cita</h3>
										<section>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="">Especialidad</label>
														<select name="idespecialidad" id="idespecialidad" class="form-control select2">
															<option>Seleccionar Servicio</option>
															<?php
															$myrow = $obj-> fetch_record("especialidad");
															foreach ($myrow as $row) :
																?>
																<option value="<?php echo $row["EspId"]; ?>"><?php echo $row["EspNombre"]; ?></option>
															<?php
															endforeach;
															?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="">Servicio</label>
														<select name="idservicio" id="idservicio" class="form-control select2-servicio">
															
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="">Medico</label>
														<select name="iddoctor" id="iddoctor" class="form-control select2-medico">
															
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="">Asunto</label>
														<textarea name="asunto" id="asunto" cols="30" rows="10" class="form-control"></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
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



										</section>
									</div>
								</form>
							
                             
                             
                             
                             
                             
                        </div>
                    
				</div>
			</div>
		</div>
	</section>

	<!-- Our Partner -->
	<section class="unlock-divider ulockd-bgthm">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-divider-thumb text-center bgc-white"><img src="demo/images/partners/1.png" alt="1.png"></div></div>
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-divider-thumb text-center bgc-white"><img src="demo/images/partners/2.png" alt="2.png"></div></div>
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-divider-thumb text-center bgc-white"><img src="demo/images/partners/3.png" alt="3.png"></div></div>
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-divider-thumb text-center bgc-white"><img src="demo/images/partners/4.png" alt="4.png"></div></div>
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-divider-thumb text-center bgc-white"><img src="demo/images/partners/5.png" alt="5.png"></div></div>
				<div class="col-xs-6 col-sm-4 col-md-2"><div class="ulockd-divider-thumb text-center bgc-white"><img src="demo/images/partners/6.png" alt="6.png"></div></div>
			</div>
		</div>
	</section>

	<!-- Our Footer -->
	<section class="ulockd-footer ulockd-pdng0">
		<div class="container footer-padding">
			<div class="row">
				<div class="col-xxs-12 col-xs-6 col-sm-4 col-md-4">
					<div class="logo-widget tac-xxsd">
						<img src="demo/images/footer-logo.png" alt="footer-logo.png">
					</div>
				</div>
				<div class="col-xxs-12 col-xs-6 col-sm-4 col-md-4">
					<div class="font-icon-social text-center">
						<ul class="list-inline footer-font-icon">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-feed"></i></a></li>
							<li><a href="#"><i class="fa fa-google"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="payment-card tac-xsd">
						<img class="pull-right fn-xsd" src="demo/images/resource/payment.png" alt="payment.png">
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-3">
					<div class="widget-about">
						<h3>About Us</h3>
						<p>Regardless of whether you need to stay in your own house, are searching for help with a more established relative, looking for exhortation on paying for development, we can help you.</p>
						<p>Doloribus, placeat, minima. Harum voluptatibus quae tempora est, cupiditate culpa, molestiae, illo beatae reiciendis, nisi sit dolores.</p>					
					</div>
				</div>
				<div class="col-xxs-12 col-xs-6 col-sm-6 col-md-3">
					<div class="link-widget">						
						<h3>Important Link</h3>
						<ul class="list-style-square">
							<li><a href="#"> About Licences</a></li>
							<li><a href="#"> Carrers</a></li>
							<li><a href="#"> Community & Forum</a></li>
							<li><a href="#"> Help & Conditions</a></li>
							<li><a href="#"> Privacy Policy</a></li>
							<li><a href="#"> Terms & Conditions</a></li>
						</ul>
					</div>
				</div>
			</div>
			<hr>
		</div>
		<div class="ulockd-copy-right">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="color-white">Hekim's Copyright© 2018. <a href="https://goo.gl/8HdP67" target="_blank">UnlockDesign</a> All right reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

<a class="scrollToHome" href="#"><i class="fa fa-home"></i></a>
</div>
<!-- Wrapper End -->
<script type="text/javascript" src="demo/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="demo/js/bootstrap.min.js"></script>
<script type="text/javascript" src="demo/js/bootsnav.js"></script>
<script type="text/javascript" src="demo/js/parallax.js"></script>
<script type="text/javascript" src="demo/js/scrollto.js"></script>
<script type="text/javascript" src="demo/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="demo/js/jquery.counterup.js"></script>
<script type="text/javascript" src="demo/js/gallery.js"></script>
<script type="text/javascript" src="demo/js/wow.min.js"></script>
<script type="text/javascript" src="demo/js/slider.js"></script>
<script type="text/javascript" src="demo/js/video-player.js"></script>
<script type="text/javascript" src="demo/js/jquery.barfiller.js"></script>
<!-- Custom script for all pages --> <script type="text/javascript" src="demo/js/timepicker.js"></script>
<script type="text/javascript" src="demo/js/tweetie.js"></script>
<!-- <script type="text/javascript" src="demo/js/color-switcher.js"></script> -->
<script type="text/javascript" src="demo/js/script.js"></script>
<!-- ===================================== LIBRERIAS AGREGADAS ============================================ -->
<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="app/externo/lightbox.min.js"></script>
<!-- ==================================================================================================================================== -->
<!-- Mirrored from unlockdesizn.com/html/health-and-beauty/be-medical/demo/page-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Jun 2018 03:07:19 GMT -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script>
	var myFormWizard = $("#frmCitaExt");
	// myFormWizard.validate({
	// 	rules:{
	// 		nombre: "required",
	// 		apepat: "required",
	// 		apemat: "required",
	// 		numdoc: "required",
	// 		fecnacimiento: "required",
	// 		sexo: "required",
	// 		estadocivil: "required",
	// 		direccion: "required",
	// 		telefono: "required",
	// 		correo: "required"
	// 	},
	// 	messages:{
	// 		nombre: {
	// 			required: "Please enter a username",
	// 			minlength: "Your username must consist of at least 2 characters"
	// 		}
	// 	}
	// });

	myFormWizard.children("div").steps({
		headerTag: "h3",
		bodyTag: "section",
		transitionEffect: "slideLeft",
		autoFocus: true,
		labels:{
			finish: "Terminar",
			next: "Siguiente",
			previous: "Anterior"
		},
		onStepChanging: function (event, currentIndex, newIndex)
		{
			myFormWizard.validate().settings.ignore = ":disabled,:hidden";
			return myFormWizard.valid();
		},
		onFinishing: function (event, currentIndex)
		{
			myFormWizard.validate().settings.ignore = ":disabled";
			return myFormWizard.valid();
		},
		onFinished: function (event, currentIndex)
		{
			alert("Submitted!");
		}
	});

	jQuery('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
		format: "yyyy-mm-dd",
        clearBtn: true
	});
	jQuery('.timepicker').timepicker({
        minuteStep : 30,
        // defaultTIme : false,
        icons: {
            up: 'mdi mdi-chevron-up',
            down: 'mdi mdi-chevron-down'
        }
	});
	$(".select2").select2();
	
</script>
<script src="app/externo/cita.js"></script>
<script src="app/login.js"></script>
</body>
</html>