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
	<!-- themify icons CSS -->
	<link rel="stylesheet" href="{{asset('template_asset/css/themify-icons.css')}}">
	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('template_asset/css/styles.css')}}">
	<link rel="stylesheet" href="{{asset('template_asset/css/red.css')}}" id="style_theme">
	<link rel="stylesheet" href="{{asset('template_asset/css/responsive.css')}}">

	<script src="{{asset('template_asset/js/modernizr.min.js')}}"></script>
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
	<div class="wrapper bg-img">
		<!-- Page Content  -->
		<div id="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-4 col-xs-12 auth-box">
						<div class="proclinic-box-shadow">
						<p><img src="{{asset('template_asset/images/logo-clm.png')}}"></p>
						<!-- 	<h3 class="widget-title">Login</h3> -->
                        <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

								<!-- form-group -->
								<div class="form-group row">
									<div class="col-sm-12">
                                         <input id="email" type="email" placeholder="Email id" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
								</div>
								<!-- /.form-group -->
								<!-- form-group -->
								<div class="form-group row">
									<div class="col-sm-12">
                                    <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
								</div>
								<!-- /.form-group -->
								<!-- Check Box -->		
								<div class="form-check row">
									<div class="col-sm-12 text-left">
										<div class="custom-control custom-checkbox">
											<!-- <input class="custom-control-input" type="checkbox" id="ex-check-2"> -->
                                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">Remember Me</label>
                                           
                
                                        </div>
									</div>
								</div>
								<!-- /Check Box -->	
								<!-- Login Button -->			
								<div class="button-btn-block">
									<button type="submit" class="btn btn-primary">Login</button>
								</div>
								<!-- /Login Button -->	
								<!-- Links -->	
								
								<!-- <div class="auth-footer-text">
									<small>New User,
										<a href="sign-up.html">Sign Up</a> Here</small>
								</div> -->
								<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
								<!-- /Links -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Content  -->
	</div>
	<!-- Jquery Library-->
	<script src="{{asset('template_asset/js/jquery-3.2.1.min.js')}}"></script>
	<!-- Popper Library-->
	<script src="{{asset('template_asset/js/popper.min.js')}}"></script>
	<!-- Bootstrap Library-->
	<script src="{{asset('template_asset/js/bootstrap.min.js')}}"></script>
	<!-- Custom Script-->
	<script src="{{asset('template_asset/js/custom.js')}}"></script>
</body>

</html>