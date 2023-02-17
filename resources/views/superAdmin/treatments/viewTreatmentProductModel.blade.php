<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header"> 
    <h4 class="modal-title float-center">Product  View</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
    </div>

    <div class="modal-body">
    <form class="form-horizontal add-franc" method="post"  action="{{route('admin.updateTreatmentProduct')}}">
                    @csrf
                   <input type="hidden" value="{{$Treatments->id}}" name="t_id"/>
                    <div class="form-group mt-5">                              
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label">Franchise ID:</label></div>
						<div class="col-lg-10">
                        <select class="form-control" name="frnachise_id" readonly>
															<option value="">Franchise ID</option>
															@foreach($franchisList as $eachFranchise)
															@if($Treatments->franchise_id==$eachFranchise->id)
															
															<option value="{{$eachFranchise->id}}" selected>{{$eachFranchise->name}}</option>
															@else
															<option value="{{$eachFranchise->id}}">{{$eachFranchise->name}}</option>
															@endif
															@endforeach
												

						</select>
						</div>
					</div>
                 
                  </div>                                    
				<div class="form-group mt-5">
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label">Treatment Category:</label></div>
						<div class="col-lg-10">
						<select class="form-control" name="treatment_cat" readonly>
                        <option value="-1">Select Category</option>
                        @foreach($category as $eachCategory)
						@if($Treatments->treatment_cat_id==$eachCategory->id)
									<option value="{{$eachCategory->id}}" selected>{{$eachCategory->cat_name}}</option>
						@else
								<option value="{{$eachCategory->id}}">{{$eachCategory->cat_name}}</option>
						@endif				
					    @endforeach
							</select>
						</div>
					</div>
                  </div>
				  
				  <div class="form-group">
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label">Treatment Code:</label></div>
						<div class="col-lg-10">
                              <input type="text" name="tcode" readonly value="{{$Treatments->treatment_code}}" class="form-control" placeholder="Treatment Code"  required>
						</div>
					</div>
                  </div>
				  
				  <div class="form-group">
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label">Treatment Name:</label></div>
						<div class="col-lg-10">
                              <input type="text" name="tname" readonly value="{{$Treatments->treatment_name}}" class="form-control" placeholder="Treatment Name"  required>
						</div>
					</div>
                  </div>
				  
				   <div class="form-group">
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label">Treatment Price:</label></div>
						<div class="col-lg-10">
                              <input type="text" name="tprice" readonly value="{{$Treatments->treatment_price}}" class="form-control" placeholder="Treatment Price"  required>
						</div>
					</div>
                  </div>
				  
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label">Treatment Description </label></div>
					   <div class="col-lg-10">										
								<textarea class="form-control" rows="3" readonly name="comment" id="comment">{{$Treatments->description}}</textarea>
						</div>	
					</div>
				</div> 
				
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
					@if($Treatments->status==1)
                    <div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" class="custom-control-input" id="customRadio1" name="status" value="1" checked>
												  <label class="custom-control-label" for="customRadio1">Active</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" class="custom-control-input" id="customRadio2" name="status" value="0">
												  <label class="custom-control-label" for="customRadio2">Inactive</label>
					</div>
				    @else
					<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" class="custom-control-input" id="customRadio1" name="status" value="1">
												  <label class="custom-control-label" for="customRadio1">Active</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" class="custom-control-input" id="customRadio2" name="status" value="0" checked>
												  <label class="custom-control-label" for="customRadio2">Inactive</label>
					</div>
					@endif							  
					</div> 
				</div> 
				  
            </div>
			
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
					@if($Treatments->view_all=='1')
						<div class="text-left">
							<div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input" id="view_permission" name="view_permission" value="1" checked>

								<label class="custom-control-label" for="view_permission">To allow to view at all outlet</label>
							</div>
						</div>
						<div class="text-left">
							<div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" id="view_permission1" name="view_permission" value="2">

								<label class="custom-control-label" for="view_permission1">To allow to be view at selected outlet</label>
							</div>
						</div>
					@else
					<div class="text-left">
							<div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input" id="view_permission" name="view_permission" value="1" >

								<label class="custom-control-label" for="view_permission">To allow to view at all outlet</label>
							</div>
						</div>
						<div class="text-left">
							<div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" id="view_permission1" name="view_permission" value="2" checked>

								<label class="custom-control-label" for="view_permission1">To allow to be view at selected outlet</label>
							</div>
						</div>
					@endif		
						<div class="form-group col-md-6">
							<label for="outlet_list">Select outlet</label>
							<select class="form-control test" id="outlet_list" name="outlet_list[]" multiple="multiple">
                             @foreach($outlets as $eachOulet)
							   @if(in_array($eachOulet->id,$oulet_list))
                               <option value="{{$eachOulet->id}}" selected>{{$eachOulet->outlet_pic}}</option>
							   @else
							   <option value="{{$eachOulet->id}}" >{{$eachOulet->outlet_pic}}</option>
							   @endif
                             @endforeach

							</select>
						</div>
					</div> 
				</div> 
				  
            </div>

          </form>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
