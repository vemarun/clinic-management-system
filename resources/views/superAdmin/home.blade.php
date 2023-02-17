@extends('superAdmin.layout')

@section('body-content')
<!-- Main Content -->
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
<div class="container-fluid home">


<div class="gray mt-5">
		  <div class="border_b">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="widget-title">Franchisor Graph</h3>
                    </div>
                    <div class="col-md-6">
                        <form class="dash">
                            <div class="form-group">

                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Filter</option>
                                    <option>Active</option>
                                    <option>inactive</option>

                                </select>
                            </div>
                        </form>
                    </div>
					
				<div class="col-md-12">
						 <div class="widget-chart text-center">
                               <div id="chart_bar">
							 
							   
							   </div>
                             
                            </div>
					</div>	
					
					
                </div>
            </div>
            </div>
		
			
			
			
			
<div class="row">
    <!-- Widget Item -->
    <div class="col-sm-6">
        <div class="widget-area-2 proclinic-box-shadow">
            <h3 class="widget-title">Product Itenrary</h3>
             <div class="row">
                    <div class="col-md-6">
                       
                    </div>
                    <div class="col-md-6">
                        <form class="dash">
                            <div class="form-group">

                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Filter</option>
                                    <option>Active</option>
                                    <option>inactive</option>

                                </select>
                            </div>
                        </form>
                    </div>
               
         
					<!-- Widget Item -->
					<div class="col-md-12 mt-3">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>2</td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>3</td>
											<td></td>
											<td></td>
										</tr>

									</tbody>
								</table>
							</div>
					</div>
					 </div>
        </div>
    </div>
    <!-- /Widget Item -->
    <!-- Widget Item -->
    <div class="col-md-6">
        <div class="widget-area-2 progress-status proclinic-box-shadow">
            <h3 class="widget-title">Outlet</h3>
            <div class="row">
                    <div class="col-md-6">
                       
                    </div>
                    <div class="col-md-6">
                        <form class="dash">
                            <div class="form-group">

                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Filter</option>
                                    <option>Active</option>
                                    <option>inactive</option>

                                </select>
                            </div>
                        </form>
                    </div>
               
         
					<!-- Widget Item -->
					<div class="col-md-12 mt-3">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>2</td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>3</td>
											<td></td>
											<td></td>
										</tr>

									</tbody>
								</table>
							</div>
					</div>
					 </div>

        </div>
    </div>
    <!-- /Widget Item -->

</div>

</div>
<!-- /Main Content -->
@endsection
