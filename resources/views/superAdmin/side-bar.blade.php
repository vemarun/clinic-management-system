
		<!-- Sidebar -->
		<nav id="sidebar" class="proclinic-bg1">
			<div class="sidebar-header">
				<a href="index.php"><img src="{{asset('template_asset/images/logo-clm.png')}}" class="logo" alt="logo"></a>
			</div>
			<ul class="list-unstyled components">	
			<li class="active">
				<a href="{{route('admin.viewFranchiseeList')}}">
					<span class="ti-dashboard"></span> Dashboard
				</a>
				
			</li>
			<li class="#">
				<a href="{{route('admin.viewFranchiseeList')}}">
					<span class="ti-user"></span> Franchisor
				</a>
				
			</li>	
			
			<li>
				<a href="{{route('admin.viewOutletList')}}">
					<span class="ti-layout-media-overlay-alt-2"></span> Outlet
				</a>
			</li>	
			
			
				
				<li>
					<a href="#nav-pages" data-toggle="collapse" aria-expanded="false">
						<span class="ti-file"></span> Product Management
					</a>
					<ul class="collapse list-unstyled" id="nav-pages">
						<li>
							<a href="{{route('admin.viewTreatmentProductList')}}">Add Product </a>
						</li>
						<li>
							<a href="{{route('admin.viewTreatmentCategoryList')}}">Add Category</a>
					</ul>
				</li> 
			</ul>
	
		</nav>
		