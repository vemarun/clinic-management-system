@extends('superAdmin.layout')

@section('body-content')
<div class="container-fluid home">
				<div class="row"> 
							<!-- <div class="col-md-2"></div>
							@if(Session::has('error'))
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

									@endif
						<div class="col-md-2"></div> -->
					</div>
			<!-- /Breadcrumb -->
			<!-- Main Content -->
			   <div class="row">
					<div class="col-md-12">
					<h3 class="block-title">Franchisor</h3>
					</div>
				</div>
	            <div class="row">
					<!-- Widget Item -->
					<div class="col-md-12  mt-4">
					<a href="{{route('admin.addFranchisee')}}" class="btn btn-primary btn-lg float-right">ADD FRANCHISE</a>
					</div>
				</div>
			


				<div class="row frach-table">
					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="table-responsive">
								<table class="table table-bordered table-striped example" style="width: 100%;" id="franchise_list">
									<thead>
										<tr>
											<th>ID</th>
											<th>Country</th>
											<th>PIC Name</th>
											<th>Company Name</th>
											<th>Email</th>
											<th>Time/Date</th>
											<th>Status</th>
											<th>Action</th>
											<!-- <th><i class="fa fa-pencil" aria-hidden="true"></i></th> -->
										</tr>
									</thead>
									<!-- <tbody>
									<tr>
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
									<td>1</td>
									</tr>
										
									</tbody> -->
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
            $('#franchise_list').DataTable({
				dom: '<"row" <"col"l><"col"B><"col"f>rt<"col"i><"col"p> >',
        buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
        ],
                processing: true,
                serverSide: true,
				bSort: true,
                ajax: "{{ route('admin.viewFranchiseeList') }}",
                columns:[
                    { data: 'id' },
					{ data: 'c_name'},
                    { data: 'pic_name'},
                    {data:'company_name'},
                    {data:'email'},
                    {data:'created_at'},
					{data:'active'},
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