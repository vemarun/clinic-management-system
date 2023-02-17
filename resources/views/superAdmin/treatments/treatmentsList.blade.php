@extends('superAdmin.layout')

@section('body-content')
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
			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container-fluid home">
			
			<div class="row">
				<div class="col-md-12">
				<h3 class="block-title"> Product Management Listing</h3>
				</div>
			</div>
			
			
	            <div class="row">
					<!-- Widget Item -->
				
					<div class="col-md-12 text-right mt-4">
					<a href="{{route('admin.addTreatmentProduct')}}" class="btn btn-primary btn-lg float-right">ADD PRODUCT</a>
					</div>
				</div>
			


				<div class="row frach-table product">
					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="table-responsive">
								<table class="table table-bordered table-striped" style="width:100%;" id="treatment_product_list">
									<thead>
										<tr>
											<th>Treatment Code</th>
											<th>Treatment Category</th>
											<th>Treatment Name</th>
											<th>Treatment Price</th>
											<th>Status</th>
											<th>Action</th>
										
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
            $('#treatment_product_list').DataTable({
				dom: '<"row" <"col"l><"col"B><"col"f>rt<"col"i><"col"p> >',
        buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
        ],
                processing: true,
				serverSide: true,
				autoWidth: true,
                ajax: "{{ route('admin.viewTreatmentProductList') }}",
                columns:[
                    { data: 'treatment_code' },
					{ data: 'treatment_cat_id'},
                    { data: 'treatment_name'},
                    {data:'treatment_price'},
					{data:'status'},
					{data:'action'},
                   
                ]

            });
        } );
	// Popup edit form open.
	$(document).on('click', 'a.test', function() {
		$( "div.view_modal" ).load( $(this).data('href'), function() {
			$('div.view_modal').modal('show');
		});
    });
	// 	// Popup edit form open.
	// 	$(document).on('click', 'a.cat_edit', function() {
	// 	$( "div.view_modal" ).load( $(this).data('href'), function() {
	// 		$('div.view_modal').modal('show');
	// 	});
    // });
	
    </script>
@endsection