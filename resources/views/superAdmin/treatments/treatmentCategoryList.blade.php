@extends('superAdmin.layout')

@section('body-content')
<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container-fluid home">
			
			
			
			<div class="row">
				<div class="col-md-12">
				<h3 class="block-title">Categories</h3>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-12">
				<h6 class="cate mt-4">Add New Category</h6>
				<form class="form-horizontal add-franc" method="post"  action="{{route('admin.postddCategory')}}">
                    @csrf
						<div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input type="name" class="form-control" placeholder="Category Name" name="cat_name" id="cat_name" onkeypress="return IsAlphaNumeric(event);" required>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Slug</label>
							<input type="text" class="form-control" name="slag" id="slag" placeholder="Slug"  onkeypress="return IsAlphaNumeric(event);" >
							<small id="emailHelp" class="form-text text-muted">The "slug" is the URL-friendly version of the name.It usually all in lowercase and contains only letters,numbers and hyphens.</small>
						</div>
										
					
			
					<div class="row">
							<!-- Widget Item -->
							<div class="col-md-12 text-right mt-4">
							<button type="submit" class="btn btn-primary btn-lg ">ADD NEW CATEGORY</button>
							</div>
					</div>
                    </form>	
				
				</div>
			   <div class="col-md-12">
			   <div class="row frach-table">
					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="table-responsive">
								<table class="table table-bordered table-striped" style="width:100%;" id="category_list">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Slug</th>
											<th>created_at</th>
											<th>Action</th>
											<!-- <th><i class="fa fa-pencil" aria-hidden="true"></i></th> -->
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
				</div>
				</div>
			</div>
			<div class="modal fade view_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
@endsection
@section('body-scripts')
    <script>
        //Purchase table
        $(document).ready(function() {
            $('#category_list').DataTable({
				dom: '<"row" <"col"l><"col"B><"col"f>rt<"col"i><"col"p> >',
        buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
        ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.viewTreatmentCategoryList') }}",
                columns:[
                    { data: 'id' },
					{ data: 'cat_name'},
                    { data: 'slag'},
                    {data:'created_at'},
					{data:'action'}
                   
                ]

            });
        } );
	// Popup edit form open.
	$(document).on('click', 'a.add_Cat', function() {
		alert("click");
		$( "div.view_modal" ).load( $(this).data('href'), function() {
			$('div.view_modal').modal('show');
		});
    });
		// Popup edit form open.
		$(document).on('click', 'a.cat_edit', function() {
		$( "div.view_modal" ).load( $(this).data('href'), function() {
			$('div.view_modal').modal('show');
		});
    });
	
	

// 	 $('.add-franc').on('submit', function(e) {
//        e.preventDefault(); 
//        var name = $('#cat_name').val();
//        var slug = $('#slag').val();
       
//        $.ajax({
//            type: "POST",
//            url:"{{route('admin.postddCategory')}}",
//            data: {name:name, slug:slug}
//            success: function( msg ) {
//                alert( msg );
//            }
//        });
//    });
    </script>
@endsection