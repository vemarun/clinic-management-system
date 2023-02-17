<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header"> 
	<h4 class="modal-title">Edit Category</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      
    </div>

    <div class="modal-body">
    <div class="row">
				<div class="col-md-12">
				<!-- <h6 class="cate mt-4">Edit Category</h6> -->
                <form class="form-horizontal add-franc" method="post"  action="{{route('admin.updateCategory')}}">
                    @csrf
					<input type="hidden" name="id" value="{{$Cat_iinfo->id}}">
						<div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input type="name" class="form-control" name="cat_name" id="cat_name" value="{{$Cat_iinfo->cat_name}}" onkeypress="return IsAlphaNumeric(event)" required>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Slug</label>
							<input type="text" class="form-control" name="slag" id="slag" value="{{$Cat_iinfo->slag}}" onkeypress="return IsAlphaNumeric(event)">
							<small id="emailHelp" class="form-text text-muted">The "slug" is the URL-friendly version of the name.It usually all in lowercase and contains only letters,numbers and hyphens.</small>
						</div>
										
					
			
					<div class="row">
							<!-- Widget Item -->
							<div class="col-md-12 text-right mt-4">
							<button type="submit" class="btn btn-primary btn-lg ">UPDATE CATEGORY</button>
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
