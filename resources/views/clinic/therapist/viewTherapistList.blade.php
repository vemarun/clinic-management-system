@extends('clinic.clinicMaster')

@section('body-content')

    <!-- /Breadcrumb -->
    <!-- Main Content -->
    <div class="container-fluid home">
	
				<div class="row no-margin-padding mt-5">
				<div class="col-md-12">
					<h3 class="block-title">Therapist List</h3>
				</div>
             </div>
			 
			 <div class="row mt-3">
				<div class="col-md-12">
					 <a href="{{route('franchise.addTherapistForm')}}" class="btn btn-primary btn-lg float-right">ADD THERAPIST</button></a>
				</div>
             </div>

       <div class="row frach-table">
					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="table-responsive">
								<table class="table table-bordered gray" style="width:100%" id="therapist_list">
									<thead>
										<tr>
                                            <th>Therapist ID</th>
											<th>Name</th>
											<th>Email</th>
											<th>Mobile No.</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										
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
        //Purchase table
        $(document).ready(function() {
            $('#therapist_list').DataTable({
				dom: '<"row" <"col"l><"col"B><"col"f>rt<"col"i><"col"p> >',
        buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
        ],
                processing: true,
                serverSide: true,
				bSort: true,
                ajax: "{{ route('franchise.viewTherapistList') }}",
                columns:[
                    { data: 'id' },
					{ data: 'name'},
                    { data: 'email'},
                    {data:'mobile_number'},
                    {data:'action'},
                ]

            });
        } );
		// $(document).on('click', 'a.test', function() {
		// 	  // alert("here");
		// 		$( "div.view_modal" ).load( $(this).data('href'), function() {
		// 			$('div.view_modal').modal('show');
		// 		});
		// 	});
    </script>
@endsection