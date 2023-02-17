<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header"> 
    <h4 class="modal-title float-center">Outlet  View</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
    </div>

    <div class="modal-body">

    <div class="row">
					<!-- Widget Item -->
					<div class="col-md-12 text-right mt-4">			
					<form class="form-horizontal add-franc model-outlet-Form" method="post"  action="#">
                    @csrf
					<input type="hidden" value="$outlet_info->id" name="outlet_id"/>
						 <div class="form-group">
									  <div class="row">
											<div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label">Franchise ID:</label></div>
													<div class="col-lg-8">
													<select class="form-control" name="frnachise_id" readonly>
															<option value="">Franchise ID</option>
															@foreach($franchisList as $eachFranchise)
															@if($outlet_info->franchise_id==$eachFranchise->id)
															<option value="{{$eachFranchise->id}}" selected>{{$eachFranchise->name}}</option>
															@else
															<option value="{{$eachFranchise->id}}" >{{$eachFranchise->name}}</option>
															@endif
															@endforeach
													</select>
													</div>
												</div>
											</div>
									
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<label class="control-label">Outlet ID:</label></div>
													<div class="col-lg-8">
														<input type="text" name="outlet_id" onkeypress="return IsAlphaNumeric(event);" class="form-control" placeholder="Outlet ID" value="{{$outlet_info->outlet_id}}" readonly>
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
														<label class="control-label">Outlet Name:</label></div>
													<div class="col-lg-8">
														<input type="text" name="outlet_name"  onkeypress="return IsAlphaNumeric(event);" class="form-control" placeholder="Outlet Name" value="{{$outlet_info->outlet_name}}" readonly>
													</div>
												</div>
											</div>
									
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<label class="control-label">Outle Ragistration No:</label></div>
													<div class="col-lg-8">
														<input type="text" name="outlet_registration_no"  onkeypress="return IsAlphaNumeric(event);" class="form-control" placeholder="Outle Ragistration No" value="{{$outlet_info->outlet_registration_no}}" readonly>
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
														<label class="control-label">Email:</label></div>
													<div class="col-lg-8">
														<input type="email" name="email" class="form-control" placeholder="Email" value="{{$outlet_info->email}}" readonly>
													</div>
												</div>
											</div>
									
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<label class="control-label">Mobile/Phone Number:</label></div>
													<div class="col-lg-8">
														<input type="number" name="mobile_number" class="form-control" placeholder="Mobile/Phone Number" value="{{$outlet_info->phone_number}}" readonly>
													</div>
												</div>
											</div>
									 </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label"> Outlet PIC:</label></div>
                                        <div class="col-lg-10">
                                            <input type="text" name="outlet_pic" class="form-control" placeholder="Outlet PIC" value="{{$outlet_info->outlet_pic}}" readonly>
                                        </div>
                                    </div>
                                </div>
								

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">Outlet Address:</label></div>
                                        <div class="col-lg-10">
                                            <input type="text" name="outlet_address" class="form-control"  placeholder="Outlet Address" value="{{$outlet_info->outlet_address}}" readonly>
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
																@if($outlet_info->country==$eachCountry->id)

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
																@if($outlet_info->state==$eachState->id)

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
														<input type="text" class="form-control" name="city" placeholder="City" value="{{$outlet_info->city}}" readonly>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label">Postcode </label></div>
													<div class="col-lg-8">
														<input type="text" name="zip_code" class="form-control" placeholder="Postcode" value="{{$outlet_info->post_code}}" readonly>
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
														<label class="control-label">Latitude: </label></div>
													<div class="col-lg-8">
														<input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{$outlet_info->lattitude}}" readonly>
													</div>
												</div>
											</div>
									    <div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label">Longitude: </label></div>
													<div class="col-lg-8">
														<input type="text" name="longitude" class="form-control" placeholder="Longitude" value="{{$outlet_info->logitude}}" readonly>
													</div>
												</div>
											</div>
											
									 </div>
							    </div>
								
								
								 <div class="form-group">
                                    <div class="row">
                                    <div class="col-lg-2">
                                    <label class="control-label"> Working Hours:</label></div>
                                    </div>
                                    </div>
                                    <div class="row">
                                       
                                            
                                        <div class="col-lg-12">
										@foreach($outlet_schedule_info as $each_info)
										@if($each_info->day=='monday')
										<div class="row">
												 <div class="col-lg-2">
												 	
													<input type="checkbox" name="days[1][day]" value="monday" class="control-label" checked><label>Monday</label>
												</div>
												 <div class="col-lg-2">
													<label class="control-label">Start Time</label>
												</div>
												<div class="col-lg-2">
														<select class="form-control" name="days[1][start_time]">
														@foreach($start_time as $each_time)
																@if($each_info->start_time==$each_time)
																<option value="{{$each_time}}" selected>{{$each_time}}</option>
																@else
																<option value="{{$each_time}}" >{{$each_time}}</option>
																@endif
														@endforeach		
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[1][start_time_format]">
													   @if($each_info->end_time_format=='AM')
																 
														    	 <option value="AM" selected>AM</option>
																 <option value="PM" >PM</option>
															@else
															     <option value="AM" >AM</option>
																 <option value="PM" selected>PM</option>
															@endif
													</select>
												</div>
												
											 <div class="col-lg-2">
													<label class="control-label">End Time</label>
												</div>	
												
													<div class="col-lg-2">
														<select class="form-control" name="days[1][end_time]">
														@foreach($end_time as $each_end_time)
																@if($each_info->end_time==$each_end_time)
																<option value="{{$each_end_time}}" selected>{{$each_end_time}}</option>
																@else
																<option value="{{$each_end_time}}" >{{$each_end_time}}</option>
																@endif
														@endforeach	
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[1][end_time_formate]">
													        @if($each_info->end_time_format=='PM')
																 <option value="PM" selected>PM</option>
														    	 <option value="AM">AM</option>
															@else
																 <option value="PM" >PM</option>
														         <option value="AM" selected>AM</option>
															@endif
													    
													</select>
												</div>
											</div>
										
										@elseif($each_info->day=='tuseday')
										<div class="row">
												 <div class="col-lg-2">
												 	
													<input type="checkbox" name="days[2][day]" value="tuesday" class="control-label" checked><label>Tuesday</label>
												</div>
												 <div class="col-lg-2">
													<label class="control-label">Start Time</label>
												</div>
												<div class="col-lg-2">
														<select class="form-control" name="days[2][start_time]">
														@foreach($start_time as $each_time)
																@if($each_info->start_time==$each_time)
																<option value="{{$each_time}}" selected>{{$each_time}}</option>
																@else
																<option value="{{$each_time}}" >{{$each_time}}</option>
																@endif
														@endforeach		
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[2][start_time_format]">
													   @if($each_info->end_time_format=='AM')
																 
														    	 <option value="AM" selected>AM</option>
																 <option value="PM" >PM</option>
															@else
															     <option value="AM" >AM</option>
																 <option value="PM" selected>PM</option>
															@endif
													</select>
												</div>
												
											 <div class="col-lg-2">
													<label class="control-label">End Time</label>
												</div>	
												
													<div class="col-lg-2">
														<select class="form-control" name="days[2][end_time]">
														@foreach($end_time as $each_end_time)
																@if($each_info->end_time==$each_end_time)
																<option value="{{$each_end_time}}" selected>{{$each_end_time}}</option>
																@else
																<option value="{{$each_end_time}}" >{{$each_end_time}}</option>
																@endif
														@endforeach	
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[2][end_time_formate]">
													        @if($each_info->end_time_format=='PM')
																 <option value="PM" selected>PM</option>
														    	 <option value="AM">AM</option>
															@else
																 <option value="PM" >PM</option>
														         <option value="AM" selected>AM</option>
															@endif
													    
													</select>
												</div>
											</div>
										</div>	
										
										@elseif($each_info->day=='wednesday')
										<div class="row">
												 <div class="col-lg-2">
												 	
													<input type="checkbox" name="days[3][day]" value="wednesday" class="control-label" checked><label>Wednesday</label>
												</div>
												 <div class="col-lg-2">
													<label class="control-label"><label>Start Time</label>
												</div>
												<div class="col-lg-2">
														<select class="form-control" name="days[3][start_time]">
														@foreach($start_time as $each_time)
																@if($each_info->start_time==$each_time)
																<option value="{{$each_time}}" selected>{{$each_time}}</option>
																@else
																<option value="{{$each_time}}" >{{$each_time}}</option>
																@endif
														@endforeach		
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[3][start_time_format]">
													   @if($each_info->end_time_format=='AM')
																 
														    	 <option value="AM" selected>AM</option>
																 <option value="PM" >PM</option>
															@else
															     <option value="AM" >AM</option>
																 <option value="PM" selected>PM</option>
															@endif
													</select>
												</div>
												
											 <div class="col-lg-2">
													<label class="control-label">End Time</label>
												</div>	
												
													<div class="col-lg-2">
														<select class="form-control" name="days[3][end_time]">
														@foreach($end_time as $each_end_time)
																@if($each_info->end_time==$each_end_time)
																<option value="{{$each_end_time}}" selected>{{$each_end_time}}</option>
																@else
																<option value="{{$each_end_time}}" >{{$each_end_time}}</option>
																@endif
														@endforeach	
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[3][end_time_formate]">
													        @if($each_info->end_time_format=='PM')
																 <option value="PM" selected>PM</option>
														    	 <option value="AM">AM</option>
															@else
																 <option value="PM" >PM</option>
														         <option value="AM" selected>AM</option>
															@endif
													    
													</select>
												</div>
											</div>
										
										@elseif($each_info->day=='thursday')
										<div class="row">
												 <div class="col-lg-2">
												 	
													<input type="checkbox" name="days[4][day]" value="thursday" class="control-label" checked><label>Thursday</label>
												</div>
												 <div class="col-lg-2">
													<label class="control-label"><label>Start Time</label>
												</div>
												<div class="col-lg-2">
														<select class="form-control" name="days[4][start_time]">
														@foreach($start_time as $each_time)
																@if($each_info->start_time==$each_time)
																<option value="{{$each_time}}" selected>{{$each_time}}</option>
																@else
																<option value="{{$each_time}}" >{{$each_time}}</option>
																@endif
														@endforeach		
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[4][start_time_format]">
													   @if($each_info->end_time_format=='AM')
																 
														    	 <option value="AM" selected>AM</option>
																 <option value="PM" >PM</option>
															@else
															     <option value="AM" >AM</option>
																 <option value="PM" selected>PM</option>
															@endif
													</select>
												</div>
												
											 <div class="col-lg-2">
													<label class="control-label">End Time</label>
												</div>	
												
													<div class="col-lg-2">
														<select class="form-control" name="days[4][end_time]">
														@foreach($end_time as $each_end_time)
																@if($each_info->end_time==$each_end_time)
																<option value="{{$each_end_time}}" selected>{{$each_end_time}}</option>
																@else
																<option value="{{$each_end_time}}" >{{$each_end_time}}</option>
																@endif
														@endforeach	
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[4][end_time_formate]">
													        @if($each_info->end_time_format=='PM')
																 <option value="PM" selected>PM</option>
														    	 <option value="AM">AM</option>
															@else
																 <option value="PM" >PM</option>
														         <option value="AM" selected>AM</option>
															@endif
													    
													</select>
												</div>
											</div>
										
										@elseif($each_info->day=='friday')
										<div class="row">
												 <div class="col-lg-2">
												 	
													<input type="checkbox" name="days[5][day]" value="friday" class="control-label" checked><label>Friday</label>
												</div>
												 <div class="col-lg-2">
													<label class="control-label"><label>Start Time</label>
												</div>
												<div class="col-lg-2">
														<select class="form-control" name="days[5][start_time]">
														@foreach($start_time as $each_time)
																@if($each_info->start_time==$each_time)
																<option value="{{$each_time}}" selected>{{$each_time}}</option>
																@else
																<option value="{{$each_time}}" >{{$each_time}}</option>
																@endif
														@endforeach		
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[5][start_time_format]">
													   @if($each_info->end_time_format=='AM')
																 
														    	 <option value="AM" selected>AM</option>
																 <option value="PM" >PM</option>
															@else
															     <option value="AM" >AM</option>
																 <option value="PM" selected>PM</option>
															@endif
													</select>
												</div>
												
											 <div class="col-lg-2">
													<label class="control-label">End Time</label>
												</div>	
												
													<div class="col-lg-2">
														<select class="form-control" name="days[5][end_time]">
														@foreach($end_time as $each_end_time)
																@if($each_info->end_time==$each_end_time)
																<option value="{{$each_end_time}}" selected>{{$each_end_time}}</option>
																@else
																<option value="{{$each_end_time}}" >{{$each_end_time}}</option>
																@endif
														@endforeach	
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[5][end_time_formate]">
													        @if($each_info->end_time_format=='PM')
																 <option value="PM" selected>PM</option>
														    	 <option value="AM">AM</option>
															@else
																 <option value="PM" >PM</option>
														         <option value="AM" selected>AM</option>
															@endif
													    
													</select>
												</div>
											</div>
										
										@elseif($each_info->day=='Saturday')
										<div class="row">
												 <div class="col-lg-2">
												 	
													<input type="checkbox" name="days[6][day]" value="Saturday" class="control-label" checked><label>Saturday</label>
												</div>
												 <div class="col-lg-2">
													<label class="control-label"><label>Start Time</label>
												</div>
												<div class="col-lg-2">
														<select class="form-control" name="days[6][start_time]">
														@foreach($start_time as $each_time)
																@if($each_info->start_time==$each_time)
																<option value="{{$each_time}}" selected>{{$each_time}}</option>
																@else
																<option value="{{$each_time}}" >{{$each_time}}</option>
																@endif
														@endforeach		
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[6][start_time_format]">
													   @if($each_info->end_time_format=='AM')
																 
														    	 <option value="AM" selected>AM</option>
																 <option value="PM" >PM</option>
															@else
															     <option value="AM" >AM</option>
																 <option value="PM" selected>PM</option>
															@endif
													</select>
												</div>
												
											 <div class="col-lg-2">
													<label class="control-label">End Time</label>
												</div>	
												
													<div class="col-lg-2">
														<select class="form-control" name="days[6][end_time]">
														@foreach($end_time as $each_end_time)
																@if($each_info->end_time==$each_end_time)
																<option value="{{$each_end_time}}" selected>{{$each_end_time}}</option>
																@else
																<option value="{{$each_end_time}}" >{{$each_end_time}}</option>
																@endif
														@endforeach	
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[6][end_time_formate]">
													        @if($each_info->end_time_format=='PM')
																 <option value="PM" selected>PM</option>
														    	 <option value="AM">AM</option>
															@else
																 <option value="PM" >PM</option>
														         <option value="AM" selected>AM</option>
															@endif
													    
													</select>
												</div>
											</div>
																		
									@elseif($each_info->day=='sunday')
										<div class="row">
												 <div class="col-lg-2">
												 	
													<input type="checkbox" name="days[7][day]" value="sunday" class="control-label" checked><label>sunday</label>
												</div>
												 <div class="col-lg-2">
													<label class="control-label"><label>Start Time</label>
												</div>
												<div class="col-lg-2">
														<select class="form-control" name="days[7][start_time]">
														@foreach($start_time as $each_time)
																@if($each_info->start_time==$each_time)
																<option value="{{$each_time}}" selected>{{$each_time}}</option>
																@else
																<option value="{{$each_time}}" >{{$each_time}}</option>
																@endif
														@endforeach		
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[7][start_time_format]">
													   @if($each_info->end_time_format=='AM')
																 
														    	 <option value="AM" selected>AM</option>
																 <option value="PM" >PM</option>
															@else
															     <option value="AM" >AM</option>
																 <option value="PM" selected>PM</option>
															@endif
													</select>
												</div>
												
											 <div class="col-lg-2">
													<label class="control-label">End Time</label>
												</div>	
												
													<div class="col-lg-2">
														<select class="form-control" name="days[7][end_time]">
														@foreach($end_time as $each_end_time)
																@if($each_info->end_time==$each_end_time)
																<option value="{{$each_end_time}}" selected>{{$each_end_time}}</option>
																@else
																<option value="{{$each_end_time}}" >{{$each_end_time}}</option>
																@endif
														@endforeach	
														</select>
												</div>
												
												<div class="col-lg-1">
													<select class="form-control" name="days[7][end_time_formate]">
													        @if($each_info->end_time_format=='PM')
																 <option value="PM" selected>PM</option>
														    	 <option value="AM">AM</option>
															@else
																 <option value="PM" >PM</option>
														         <option value="AM" selected>AM</option>
															@endif
													    
													</select>
												</div>
											</div>
										
										@endif
										@endforeach
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
