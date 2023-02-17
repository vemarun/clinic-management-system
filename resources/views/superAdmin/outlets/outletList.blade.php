@extends('superAdmin.layout')

@section('body-content')
	<!-- Main Content -->
	<div class="container-fluid home">
				<div class="row"> 
							<div class="col-md-2"></div>
							<!-- @if(Session::has('error'))
										<div class="col-md-8 alert alert-danger">
											<a class="close" data-dismiss="alert">×</a>
											<strong>Heads Up!</strong> {!!Session::get('error')!!}
										</div>

									@endif
									@if(Session::has('success'))
										<div class="col-md-8 alert alert-success">
											<a class="close" data-dismiss="alert">×</a>
											<strong>Heads Up!</strong> {!!Session::get('success')!!}
										</div>

									@endif -->
						<div class="col-md-2"></div>
					</div>
			<!-- /Breadcrumb -->
			<div class="row">
					<div class="col-md-12">
					<h3 class="block-title">List of Outlet</h3>
					</div>
				</div>
	            <div class="row">
					<!-- Widget Item -->
					<div class="col-md-12 text-right mt-4">
					<a href="{{route('admin.addOutlet')}}" class="btn btn-primary btn-lg float-right">ADD NEW OUTLET</a>
					</div>
				</div>
			


				<div class="row frach-table">
					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="table-responsive">
								<table class="table table-bordered table-striped example" style="width:100%;" id="outlet_list">
									<thead>
                                    <tr>
											<th>Date/Time</th>
											<th>Franchise ID</th>
											<th>Outlet ID</th>
											<th>PIC Name</th>
											<th>Outlet Name</th>
											<th>Email</th>
											<th>Phone/Mobile No</th>
											<th>Status</th>
											<th>action</th>
										
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
				</div>
            </div>
			<div class="modal fade view_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
@endsection
@section('body-scripts')
    <script>
        //Purchase table
        $(document).ready(function() {
            $('#outlet_list').DataTable({
				dom: '<"row" <"col"l><"col"B><"col"f>rt<"col"i><"col"p> >',
        buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
        ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.viewOutletList') }}",
                columns:[
                    { data: 'created_at'},
					{ data: 'franchise_id'},
                    { data: 'outlet_id'},
                    {data:'outlet_pic'},
					{data:'outlet_name'},
                    {data:'email'},
                    {data:'phone_number'},
					{data:'status'},
					{data:'action'}
                   
                ]

            });
        } );
		$(document).on('click', 'a.test', function() {
			  // alert("here");
				$( "div.view_modal" ).load( $(this).data('href'), function() {
					$('div.view_modal').modal('show');
				});
			});
    </script>
@endsection