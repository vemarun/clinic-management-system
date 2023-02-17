<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CLM</title>
	<!-- Fav  Icon Link -->
	<link rel="shortcut icon" type="image/png" href="images/fav.png">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{asset('template_asset/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('template_asset/css/font-awesome.min.css')}}">
	<!-- themify icons CSS -->
	<link rel="stylesheet" href="{{asset('template_asset/css/themify-icons.css')}}">
	<!-- Animations CSS -->
	<link rel="stylesheet" href="{{asset('template_asset/css/animate.css')}}">
	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('template_asset/css/styles.css')}}">
	<link rel="stylesheet" href="{{asset('template_asset/css/red.css')}}" id="style_theme">
	<link rel="stylesheet" href="{{asset('template_asset/css/responsive.css')}}">
	<!-- morris charts -->
	<link rel="stylesheet" href="{{asset('template_asset/charts/css/morris.css')}}">
	<!-- jvectormap -->
	
	<link rel="stylesheet" href="{{asset('template_asset/multi_select/fSelect.css')}}">
	<link rel="stylesheet" href="{{asset('template_asset/css/jquery-jvectormap.css')}}">
	<link rel="stylesheet" href="{{asset('template_asset/css/dataTables.bootstrap.min.css')}}">
   	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="{{asset('template_asset/js/modernizr.min.js')}}"></script>

	    <!-- include sweetalert2 css library -->
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">
</head>

<body>
	<!-- Pre Loader -->
	<div class="loading">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<!--/Pre Loader -->
	<div class="wrapper">
		<!-- Sidebar -->

        @include('superAdmin.side-bar')

		<!-- /Sidebar -->
		<!-- Page Content -->
		<div id="content">
			<!-- Top Navigation -->
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="responsive-logo">
						<a href="index.php"><img src="images/logo-clm.png" class="logo" alt="logo"></a>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<span class="ti-menu" id="sidebarCollapse"></span>
						</li>
						<li class="nav-item">
							<span title="Fullscreen" class="ti-fullscreen fullscreen"></span>
						</li>
						<li class="nav-item">
							<a  data-toggle="modal" data-target=".proclinic-modal-lg">
								<span class="ti-search"></span>
							</a>
							<div class="modal fade proclinic-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lorvens">
									<div class="modal-content proclinic-box-shadow2">
										<div class="modal-header">
											<h5 class="modal-title">Search Patient/Doctor:</h5>
											<span class="ti-close" data-dismiss="modal" aria-label="Close">
											</span>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<input type="text" class="form-control" id="search-term" placeholder="Type text here">
													<button type="button" class="btn btn-lorvens proclinic-bg">
														<span class="ti-location-arrow"></span> Search</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="ti-announcement"></span>
							</a>
							<div class="dropdown-menu proclinic-box-shadow2 notifications animated flipInY">
								<h5>Notifications</h5>
								<a class="dropdown-item" href="#">
									<span class="ti-wheelchair"></span> New Patient Added</a>
								<a class="dropdown-item" href="#">
									<span class="ti-money"></span> Patient payment done</a>
								<a class="dropdown-item" href="#">
									<span class="ti-time"></span>Patient Appointment booked</a>
								<a class="dropdown-item" href="#">
									<span class="ti-wheelchair"></span> New Patient Added</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="ti-user"></span>
							</a>
							<div class="dropdown-menu proclinic-box-shadow2 profile animated flipInY">
								<h5>John Willing</h5>
								<a class="dropdown-item" href="{{route('admin.profile')}}">
									<span class="ti-settings"></span> Settings</a>
								<a class="dropdown-item" href="#">
                                    <span class="ti-help-alt"></span> Help</a>
                              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item">
									<span class="ti-power-off"></span> Logout</button>
                                </form>    
								
							</div>
						</li>
					</ul>
				
				</div>
			</nav>
			<!-- /Top Navigation -->
			<!-- Breadcrumb -->
			<!-- Page Title -->
			<!-- <div class="row no-margin-padding">
				<div class="col-md-6">
					<h3 class="block-title">Franchise</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div> -->
			<!-- /Page Title -->

			<!-- /Breadcrumb -->
            {{-- Part: create main content of the page --}}
            @yield('body-content')

           




		<!--	<div class="nav-help animated fadeIn">
				<h5><span class="ti-comments"></span> Need Help</h5>
				<h6>
					<span class="ti-mobile"></span> +1 1234 567 890</h6>
				<h6>
					<span class="ti-email"></span> email@site.com</h6>
				<p class="copyright-text">Copy rights &copy; 2019</p>
			</div>-->
		
			<!-- /Main Content -->
            </div>
		<!-- /Page Content -->
	</div>
	<!-- Back to Top -->
	<a id="back-to-top" href="#" class="back-to-top">
		<span class="ti-angle-up"></span>
	</a>
	<!-- /Back to Top -->
	
	<!-- Jquery Library-->
	<script src="{{asset('template_asset/js/jquery-3.2.1.min.js')}}"></script>
	<!-- Popper Library-->
	<script src="{{asset('template_asset/js/popper.min.js')}}"></script>
	<!-- Bootstrap Library-->
	<script src="{{asset('template_asset/js/bootstrap.min.js')}}"></script>

	<!-- Custom Script-->

	<!-- Data Script-->
	<script src="{{asset('template_asset/js/jquery.dataTables.js')}}"></script>
	<script src="{{asset('template_asset/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{asset('template_asset/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('template_asset/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('template_asset/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('template_asset/js/buttons.print.min.js')}}"></script> 
	<script src="{{asset('template_asset/js/jszip.min.js')}}"></script>
	<script src="{{asset('template_asset/js/pdfmake.min.js')}}"></script>
	<script src="{{asset('template_asset/js/vfs_fonts.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>
	<script src="{{asset('template_asset/multi_select/fSelect.js')}}"></script>
	<script src="{{asset('template_asset/js/custom.js')}}"></script>

	<script src="{{asset('template_asset/js/chart.min.js')}}"></script>
    <script src="{{asset('template_asset/js/chart.js')}}"></script>
	<script>
		@if(Session::has('success'))
				swal({
					title: "success!",
					text:  "{{ Session::get('success') }}",
					type: "success",
					//timer: 3000,
					showConfirmButton: true
				});
				//toastr.success("{{ Session::get('success') }}");
		@endif


		@if(Session::has('info'))
				toastr.info("{{ Session::get('info') }}");
		@endif


		@if(Session::has('warning'))
				toastr.warning("{{ Session::get('warning') }}");
		@endif


		@if(Session::has('error'))
				swal({
							title: "Error!",
							text:  "{{ Session::get('error') }}",
							type: "error",
							//timer: 3000,
							showConfirmButton: true
						});
				
		@endif


		</script>
	{{-- Part: load scripts --}}
    @yield('body-scripts')
	

</body>

</html>            
			