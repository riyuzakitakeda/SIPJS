<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>SIPJS APP</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="keywords" />
	<meta content="Fina Ruzika" name="author" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="assets/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
	<link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	
	<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
	<link href="assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
	<link href="assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
	<link href="assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
	<link href="assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
    <link href="assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
    <link href="assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
    <link href="assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-with-light-sidebar">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top bg-white">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="./" class="navbar-brand"><span class="navbar-logo"><i class="fa fa-book text-primary"></i></span>&nbsp;<b>SIPJS</b> APP</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				<!-- begin navbar-collapse -->
                <div class="collapse navbar-collapse pull-left" id="top-navbar">
                    <ul class="nav navbar-nav">
						<li><a href="javascript:;" data-click="sidebar-minify"><i class="ion-navicon-round m-r-5 f-s-20 pull-left text-inverse"></i></a></li>
					</ul>
                </div>
				<!-- end navbar-collapse -->	
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<span class="user-image online"><img src="assets/img/visitor.png" alt="" /></span>
							<span class="hidden-xs"><span class="text-warning">Welcome , </span>to Sistem Informasi Pengajuan Judul Skripsi</span> <span class="text-warning"><i class="fa fa-caret-down"></i></span>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="javascript:;" data-toggle="modal" data-target="#Login"><i class="ion-ios-locked"></i> &nbsp;Log in</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation <i class="fa fa-paper-plane m-l-5"></i></li>
					<li><a href="./"><i class="ion-ios-pulse bg-purple"></i><span>Dashboard</span> <span class="badge bg-warning pull-right">HOME</span></a></li>
					<li><a href="index.php?page=cari-judul-skripsi"><i class="ion-ios-browsers-outline bg-success"></i><span>Cari Judul Skripsi</span></a></li>
					<li><a href="javascript:;" data-toggle="modal" data-target="#Login"><i class="ion-ios-unlocked-outline bg-info"></i><span>Log in</span></a></li>
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn grey" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		<!-- begin #content -->
		<div id="content" class="content">
			<?php
				$page = (isset($_GET['page']))? $_GET['page'] : "main";
				switch ($page) {
					case 'login': include "restric/login.php"; break;
					case 'cari-judul-skripsi': include "pages/publik/cari-judul-skripsi.php"; break;
					
					default : include 'pages/publik/home.php';	
				}
			?>
			
			<!-- modal master-->
			<div id="Login" class="modal fade">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header bg-silver">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="ion-ios-unlocked text-danger fa-lg"></i> &nbsp;Login</h4>
						</div>
						 <div class="col-sm-12">
							<div class="modal-body">
								<div class="login-header m-b-20">
								</div>
								<div class="login-content">
									<form action="index.php?page=login&op=in" method="POST" class="margin-top-0">
										<div class="form-group m-b-15 has-feedback">
											<input type="text" name="id_user" class="form-control" placeholder="Username" required /><span class="fa fa-user form-control-feedback"></span>
										</div>
										<div class="form-group m-b-15 has-feedback">
											<input type="password" name="password" maxlength="255" class="form-control" placeholder="Password" required /><span class="fa fa-lock form-control-feedback"></span>
										</div>
										<div class="checkbox m-b-15">
											<label>
												<h5><input type="checkbox"/><span class="label text-primary">Remember Me</span></h5>
											</label>
										</div>
										<div class="login-buttons">
											<button type="submit" class="btn btn-danger btn-block"><i class="fa fa-key"></i> &nbsp;Login</button>
										</div>
										<hr />
										<p class="text-center">
											&copy; 2024 SIPJS
										</p>
									</form>
								</div>
							</div>
						</div>
						<div class="modal-footer no-margin-top">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end #content -->
		<!-- begin #footer -->
		<div id="footer" class="footer">
		    &copy; 2024 <a href="./">SIPJS</a> Version 1.0 - All Rights Reserved
		</div>
		<!-- end #footer -->
        <!-- begin theme-panel -->
       
        <!-- end theme-panel -->
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="assets/plugins/flot/jquery.flot.min.js"></script>
	<script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
	<script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="assets/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
	<script src="assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/js/table-manage-responsive.demo.min.js"></script>
	
	<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
	<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<script src="assets/plugins/masked-input/masked-input.min.js"></script>
	<script src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="assets/plugins/password-indicator/js/password-indicator.js"></script>
	<script src="assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
	<script src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
	<script src="assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
    <script src="assets/plugins/bootstrap-daterangepicker/moment.js"></script>
    <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="assets/plugins/select2/dist/js/select2.min.js"></script>
    <script src="assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/plugins/bootstrap-show-password/bootstrap-show-password.js"></script>
    <script src="assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
    <script src="assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
    <script src="assets/plugins/clipboard/clipboard.min.js"></script>
	<script src="assets/js/form-plugins.demo.min.js"></script>
	<script src="assets/js/dashboard.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageResponsive.init();
			FormPlugins.init();
		});
	</script>
</body>
</html>