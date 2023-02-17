@extends('clinic.clinicMaster')

@section('body-content')   

			<!-- /Breadcrumb -->
			<!-- Main Content -->
		<div class="container-fluid home">
			
					<!-- Page Title -->
			<div class="row no-margin-padding mt-5">
				<div class="col-md-12">
					<h3 class="block-title">Search Patient</h3>
				</div>
			</div>
			<!-- /Page Title -->
		
        <div class="gray mt-5">		
			<div class="row">
				<div class="col-md-12">
					<h3 class="block-title">Search Patient:</h3>
				</div>
									
			</div>
			<div class="row mt-3">	
				<div class="col-md-3">		
					<div class="form-group">
						<label>Name <span class="required">*</span></label>
						<input type="text" name="name" class="form-control" id="name">
					</div>
				</div>
				
				<div class="col-md-3">		
					<div class="form-group">
						<label>Ic/Passport</label>
						<input type="text" name="passport" class="form-control" id="passport">
					</div>
				</div>
				
				<div class="col-md-3">		
					<div class="form-group">
						<label>Mobile No <span class="required">*</span></label>
						<input type="number" name="phone" class="form-control" id="phone">
					</div>
				</div>
				
				<div class="col-md-2">		
					<div class="form-group">
						<label>Date of Birth</label>
						<input type="date" name="date" class="form-control" id="date">
					</div>
				</div>
				<div class="col-md-1 patient_btn">		
						<label></label>
                     <button type="submit" class="btn btn-primary">GO</button>
				</div>
			</div>		
		</div>	
		
		
		       <div class="row frach-table">
					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="table-responsive">
								<table class="table table-bordered gray" id="example">
									<thead>
										<tr>
											<th>ID</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Mobile No.</th>
											<th>Last Appoinment Date</th>
											<th>Action</th>

										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><i class="fa fa-plus-circle" aria-hidden="true"></i> <i class="fa fa-eye" aria-hidden="true"></i> </td>											
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			
        </div>
	
	
@endsection

@section('body-scripts')
    <script>

    </script>
@endsection