@extends('superAdmin.layout')

@section('body-content')

            <!-- /Breadcrumb -->
            <!-- <div class="row no-margin-padding">
				<div class="col-md-6">
					<h3 class="block-title">Franchise</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item active">add Franchise</li>
					</ol>
				</div>
			</div> -->
			<!-- Main Content -->
			<div class="container-fluid home">
				<div class="row">
					<div class="col-md-12">
					<h3 class="block-title"> Edit Franchise</h3>
					</div>
				</div>
	            <div class="row">
					<!-- Widget Item -->
					<div class="col-md-12 text-right mt-4">
					
					<form class="form-horizontal add-franc" method="post"  action="{{route('admin.updateFranchise')}}">
                    @csrf
					<input type="hidden" value="{{$franchise->id}}" name="f_id" />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label col-form-label">Franchise ID </label></div>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="franchise_id" placeholder="Franchise ID" value="{{$franchise->franchise_id}}" readonly>
                                        </div>
                                    </div>
                                </div>
								

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label col-form-label">PIC Name </label></div>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="pic_name" placeholder="PIC Name" value="{{$franchise->pic_name}}" onkeypress="return IsAlphaNumeric(event);">
                                        </div>
                                    </div>
                                </div>
								
								 <div class="form-group">
									  <div class="row">
											<div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label col-form-label">Company Name </label></div>
													<div class="col-lg-8">
														<input type="text" class="form-control" name="company_name" placeholder="Company Name" value="{{$franchise->company_name}}" onkeypress="return IsAlphaNumeric(event);">
													</div>
												</div>
											</div>
									
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<label class="control-label col-form-label">Company Ragistration No </label></div>
													<div class="col-lg-8">
														<input type="text" class="form-control" name="company_registration_no" placeholder="Company Ragistration No" value="{{$franchise->company_registration_no}}" onkeypress="return IsAlphaNumeric(event);">
													</div>
												</div>
											</div>
									 </div>
                                </div>
								
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label col-form-label">Registered Address </label></div>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="registered_address" placeholder="PIC Name" value="{{$franchise->registered_address}}" onkeypress="return IsAlphaNumeric(event);">
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group">
									  <div class="row">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<label class="control-label col-form-label">Country </label></div>
													<div class="col-lg-8">
														<select class="form-control" name="country" id="country">
														<option value="-1">Select Country</option>
																@foreach($country as $eachCountry)
																@if($franchise->country==$eachCountry->id)

														       <option value="{{$eachCountry->id}}" selected>{{$eachCountry->name}}</option>
															   
															   @else
															   <option value="{{$eachCountry->id}}">{{$eachCountry->name}}</option>

															   @endif
															   @endforeach
														       
														</select>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<label class="control-label col-form-label">State </label></div>
													<div class="col-lg-8">
														<select class="form-control" name="state" id="state">
														
														@foreach($state as $eachState)
																@if($franchise->state==$eachState->id)

														       <option value="{{$eachState->id}}" selected>{{$eachState->name}}</option>
															   
															   @else
															   <option value="{{$eachState->id}}">{{$eachState->name}}</option>

															   @endif
															   @endforeach
                                                       
                                                  		</select>
													</div>
												</div>
											</div>
									 </div>
                                </div>
								<div class="form-group">
									  <div class="row">
											<div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label col-form-label">City </label></div>
													<div class="col-lg-8">
														<input type="text" class="form-control" name="city" placeholder="City" value="{{$franchise->city}}" onkeypress="return IsAlphaNumeric(event);">
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label col-form-label">Postcode </label></div>
													<div class="col-lg-8">
														<input type="text" name="zip_code" class="form-control" placeholder="Postcode" value="{{$franchise->zip_code}}" onkeypress="return IsAlphaNumeric(event);">
													</div>
												</div>
											</div>
									
											
									 </div>
                                </div>
								
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label col-form-label">Mobile Number </label></div>
                                        <div class="col-lg-10">
                                            <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number" value="{{$franchise->mobile_number}}" onkeypress="return isNumberKey(event);" >
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label col-form-label">Email </label></div>
                                        <div class="col-lg-10">
                                            <input type="Email" name="email" class="form-control" placeholder="Email" value="{{$franchise->email}}">
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label col-form-label">Status </label></div>
                                        <div class="col-lg-10">
											@if($franchise->active=='1')
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
												  <input type="radio" class="custom-control-input" id="customRadio1" name="status" value="1" checked>
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
                                        <div class="col-lg-2">
                                            <label class="control-label col-form-label">Remarks </label></div>
                                       <div class="col-lg-10">										
												<textarea class="form-control" name="remarks" rows="3" id="comment" onkeypress="return IsAlphaNumeric(event);">{{$franchise->remarks}}</textarea>
                                        </div>	
                                    </div>
                                </div>								

                                <div class="form-group add-btn">
                                    <div class="row">
                                        <div class="col-lg-6">
											 <button type="submit" class="btn btn-primary btn-lg">Update</button>
											  <a href="{{ URL::previous() }}" class="btn btn-secondary btn-lg">CENCEL</a>											
										</div>
                                    </div>
                                </div>
                     </form>
					
				</div>
			</div>
        </div>
	@endsection
	@section('body-scripts')
	<script>
	
	 $(function(){
       $('#country').change(function() {
		var id=$(this).val();
            $.ajax({
                url: '{{route('admin.state')}}',
                type: 'GET',
                data: { id: id },
                success: function(response)
                {
					var stateOptions;
					var obj = jQuery.parseJSON(response);
					$('#state').empty();
					$.each(obj, function(key,value) {
						stateOptions+="<option value='"+value.id+"'>"+value.name+ "</option>";
					}); 
                    
                  $('#state').append(stateOptions);
                }
            });
       });
    }); 
	
	</script>
	@endsection