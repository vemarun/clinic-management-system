<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header"> 

      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Add New Category</h4>
    </div>

    <div class="modal-body">
    <div class="row">
				<div class="col-md-12">
				<!-- <h6 class="cate mt-4">Add New Category</h6> -->
                <form class="form-horizontal add-franc" method="post"  action="{{route('admin.postddCategory')}}">
                    @csrf
						<div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input type="name" class="form-control" name="cat_name" id="cat_name">
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Slag</label>
							<input type="text" class="form-control" name="slag" id="slag">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
										
					
			
					<div class="row">
							<!-- Widget Item -->
							<div class="col-md-12 text-right mt-4">
							<button type="submit" class="btn btn-primary btn-lg ">ADD NEW CATEGORY</button>
							</div>
					</div>
                    </form>	
				
				</div>
     </div>           

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
