<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header"> 
    <h4 class="modal-title float-center">Franchise  View</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
    </div>

    <div class="modal-body">

    <div class="row">
					<!-- Widget Item -->
					<div class="col-md-12 text-right mt-4">
					
					<input type="hidden" value="{{$franchise->id}}" name="f_id" />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">Franchise ID </label></div>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="franchise_id" placeholder="Franchise ID" value="{{$franchise->franchise_id}}" readonly>
                                        </div>
                                    </div>
                                </div>
								

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">PIC Name </label></div>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="pic_name" placeholder="PIC Name" value="{{$franchise->pic_name}}" readonly>
                                        </div>
                                    </div>
                                </div>
								
								 <div class="form-group">
									  <div class="row">
											<div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label">Company Name </label></div>
													<div class="col-lg-8">
														<input type="text" class="form-control" name="company_name" placeholder="Company Name" value="{{$franchise->company_name}}" readonly>
													</div>
												</div>
											</div>
									
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<label class="control-label">Company Ragistration No </label></div>
													<div class="col-lg-8">
														<input type="text" class="form-control" name="company_registration_no" placeholder="Company Ragistration No" value="{{$franchise->company_registration_no}}" readonly>
													</div>
												</div>
											</div>
									 </div>
                                </div>
								
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">Registered Address </label></div>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="registered_address" placeholder="PIC Name" value="{{$franchise->registered_address}}" readonly>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group">
									  <div class="row">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<label class="control-label">Country </label></div>
													<div class="col-lg-8">
														<select class="form-control" name="country" id="country" readonly>
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
														<label class="control-label">State </label></div>
													<div class="col-lg-8">
														<select class="form-control" name="state" id="state" readonly>
														
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
														<label class="control-label">City </label></div>
													<div class="col-lg-8">
														<input type="text" class="form-control" name="city" placeholder="City" value="{{$franchise->city}}" readonly>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label">Postcode </label></div>
													<div class="col-lg-8">
														<input type="text" name="zip_code" class="form-control" placeholder="Postcode" value="{{$franchise->zip_code}}" readonly>
													</div>
												</div>
											</div>
									
											
									 </div>
                                </div>
								
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">Mobile Number </label></div>
                                        <div class="col-lg-10">
                                            <input type="number" name="mobile_number" class="form-control" placeholder="Mobile Number" value="{{$franchise->mobile_number}}" readonly>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">Email </label></div>
                                        <div class="col-lg-10">
                                            <input type="Email" name="email" class="form-control" placeholder="Email" value="{{$franchise->email}}" readonly>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">Status </label></div>
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
                                            <label class="control-label">Remarks </label></div>
                                       <div class="col-lg-10">										
												<textarea class="form-control" name="remarks" rows="3" id="comment" readonly>{{$franchise->remarks}}</textarea>
                                        </div>	
                                    </div>
                                </div>						
					
				</div>
	        
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
 

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
