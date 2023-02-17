<!-- Sidebar -->
<nav id="sidebar" class="proclinic-bg">
			<div class="sidebar-header">
			<div class="widget-left">
				<span class="ti-user"></span>
				
				<div class="user-admin">
  <button  class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  heyfromjonathan@gmail.com 
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#"><i class="fa fa-user-o fw"></i> My account</a></a>
    <a class="dropdown-item" href="#"><i class="fa fa-question-circle-o fw"></i> Help</a>
    <a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Log out</a></a>
</div>
			</div>
			 <!--<ul class="nav pull-right">
          <li class="dropdown" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
            <div class="dropdown-menu" style="padding:17px;">
              <form class="form" id="formLogin"> 
                <input name="username" id="username" type="text" placeholder="Username"> 
                <input name="password" id="password" type="password" placeholder="Password"><br>
                <button type="button" id="btnLogin" class="btn">Login</button>
              </form>
            </div>
          </li>
        </ul>-->
			</div>
			</div>
			<ul class="list-unstyled components">
				<li>
					<a href="dashboard.php">
						<span class="ti-home"></span> Dashboard
					</a>
				</li>
				
				
						<li>
					<a href="#nav-pages" data-toggle="collapse" aria-expanded="false">
						<span class="ti-layout-media-overlay-alt-2"></span> Financial Reporting
					</a>
					<ul class="collapse list-unstyled" id="nav-pages">
		            <li>
							<a href="financial-report.php">Financial Reporting</a>
						</li>
						<li>
							<a href="customer-report.php">Customer Reporting</a>
						</li>
						<li>
							<a href="therapist-report.php">Therapist Reporting</a>
						</li>
						<li>
							<a href="outlet-report.php">Outlet Reporting</a>
						</li>
					</ul>
				</li>
				
				<li>
					<a href="{{route('franchise.viewTherapistList')}}">
						<span class="ti-trash"></span> Therapist
					</a>

				</li>	
				
				<li>
					<a href="{{route('viewPatientList')}}">
						<span class="ti-wheelchair"></span> Patients
					</a>
				</li>

				<li>
					<a href="{{route('franchise.viewAppointmentList')}}">
						<span class="ti-pencil-alt"></span> Appointments
					</a>

				</li>


				<li>
					<a href="payment-list.php">
						<span class="ti-credit-card"></span> Payments
					</a>
				</li>
				
					<li>
					<a href="user-group.php" >
						<span class="ti-themify-favicon"></span> User Group
					</a>
				</li>
				
				<li>
					<a href="admin-setting.php">
						<span class="ti-settings"></span> Admin Setting
					</a>
				</li>
				
					<li>
					<a href="systems.php">
						<span class="ti-support"></span> Systems
					</a>

				</li>


			</ul>

		</nav>
		<!-- /Sidebar -->