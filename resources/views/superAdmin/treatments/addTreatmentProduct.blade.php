@extends('superAdmin.layout')

@section('body-content')
			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container-fluid home">
			
			<div class="row">
				<div class="col-md-12">
				<h3 class="block-title"> Add New Product</h3>
				</div>
			</div>
            <form class="form-horizontal add-franc" method="post"  action="{{route('admin.PostAddTreatmentProduct')}}">
                    @csrf
                   
                    <div class="form-group mt-5">                              
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label col-form-label">Franchise ID:</label></div>
						<div class="col-lg-10">
                        <select class="form-control" name="frnachise_id">
															<option value="">Franchise ID</option>
															@foreach($franchisList as $eachFranchise)
															<option value="{{$eachFranchise->id}}">{{$eachFranchise->name}}</option>
															@endforeach
												

						</select>
						</div>
					</div>
                 
                  </div>                                    
				<div class="form-group mt-5">
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label col-form-label">Treatment Category:</label></div>
						<div class="col-lg-10">
						<select class="form-control" name="treatment_cat" required>
                        <option value="-1">Select Category</option>
                        @foreach($category as $eachCategory)
									<option value="{{$eachCategory->id}}">{{$eachCategory->cat_name}}</option>
					    @endforeach
							</select>
						</div>
					</div>
                  </div>
				  
				  <div class="form-group">
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label col-form-label">Treatment Code:</label></div>
						<div class="col-lg-10">
                              <input type="text" name="tcode" class="form-control" placeholder="Treatment Code" onkeypress="return IsAlphaNumeric(event);"  required>
						</div>
					</div>
                  </div>
				  
				  <div class="form-group">
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label col-form-label">Treatment Name:</label></div>
						<div class="col-lg-10">
                              <input type="text" name="tname" class="form-control" onkeypress="return IsAlphaNumeric(event);" placeholder="Treatment Name"  required>
						</div>
					</div>
                  </div>
                 <div class="form-group">
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label  col-form-label">Available Unit:</label></div>
						<div class="col-lg-10">
                              <input type="text" name="a_unit" onkeypress="return isNumberKey(event);" class="form-control" placeholder="Available Unit" >
						</div>
					</div>
                  </div>
				  
				   <div class="form-group">
					<div class="row">
						 <div class="col-lg-2">
								<label class="control-label col-form-label">Treatment Price:</label></div>
						<div class="col-lg-10">
                              <input type="text" name="tprice" onkeypress="return isFloatNumber(event);" class="form-control" placeholder="Treatment Price"  required>
						</div>
					</div>
                  </div>
				  
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label col-form-label">Treatment Description </label></div>
					   <div class="col-lg-10">										
								<textarea class="form-control" rows="3" onkeypress="return IsAlphaNumeric(event);" name="comment" id="comment"></textarea>
						</div>	
					</div>
				</div> 
				
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
                    <div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" class="custom-control-input" id="customRadio1" name="status" value="1">
												  <label class="custom-control-label" for="customRadio1">Active</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" class="custom-control-input" id="customRadio2" name="status" value="0">
												  <label class="custom-control-label" for="customRadio2">Inactive</label>
					</div>
											  
					</div> 
				</div> 
				  
            </div>
			
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
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
						
						<div class="form-group col-md-6">
							<label for="outlet_list">Select outlet</label>
							<select class="form-control test" id="outlet_list" name="outlet_list[]" multiple="multiple">
                             @foreach($outlets as $eachOulet)
                               <option value="{{$eachOulet->id}}">{{$eachOulet->outlet_pic}}</option>
                             @endforeach

							</select>
						</div>
					</div> 
				</div> 
				  
            </div>
			
			<div class="form-group add-btn">
				<div class="row">
				<div class="col-lg-2"></div>
					<div class="col-lg-5 co-xs-12 col-12">
						 <button type="submit" class="btn btn-primary btn-lg">SAVE</button>
						  <button type="submit" class="btn btn-secondary btn-lg">CENCEL</button>
					</div>
					
				</div>
			</div>

          </form>

@endsection