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
					<h3 class="block-title"> edit Outlet</h3>
					</div>
				</div>
                <div class="row">
					<!-- Widget Item -->
					<div class="col-md-12 text-right mt-4">			
					<form class="form-horizontal add-franc" method="post"  action="{{route('admin.updateOutlet')}}">
                    @csrf
					<input type="hidden" value="$outlet_info->id" name="outlet_id"/>
						 <div class="form-group">
									  <div class="row">
											<div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label col-form-label">Franchise ID:</label></div>
													<div class="col-lg-8">
													<select class="form-control" name="frnachise_id">
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
														<label class="control-label col-form-label">Outlet ID:</label></div>
													<div class="col-lg-8">
														<input type="text" name="outlet_id" onkeypress="return IsAlphaNumeric(event)" class="form-control" placeholder="Outlet ID" value="{{$outlet_info->outlet_id}}" readonly>
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
														<label class="control-label col-form-label">Outlet Name:</label></div>
													<div class="col-lg-8">
														<input type="text" name="outlet_name"  onkeypress="return IsAlphaNumeric(event)" class="form-control" placeholder="Outlet Name" value="{{$outlet_info->outlet_name}}">
													</div>
												</div>
											</div>
									
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<label class="control-label col-form-label">Outle Ragistration No:</label></div>
													<div class="col-lg-8">
														<input type="text" name="outlet_registration_no"  onkeypress="return IsAlphaNumeric(event);" class="form-control" placeholder="Outle Ragistration No" value="{{$outlet_info->outlet_registration_no}}">
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
														<label class="control-label col-form-label">Email:</label></div>
													<div class="col-lg-8">
														<input type="email" name="email" class="form-control" placeholder="Email" value="{{$outlet_info->email}}" >
													</div>
												</div>
											</div>
									
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<label class="control-label col-form-label">Mobile/Phone Number:</label></div>
													<div class="col-lg-8">
														<input type="text" name="mobile_number" class="form-control" placeholder="Mobile/Phone Number" value="{{$outlet_info->phone_number}}" onkeypress="return isNumberKey(event)">
													</div>
												</div>
											</div>
									 </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label col-form-label"> Outlet PIC:</label></div>
                                        <div class="col-lg-10">
                                            <input type="text" name="outlet_pic" class="form-control" placeholder="Outlet PIC" onkeypress="return IsAlphaNumeric(event)" value="{{$outlet_info->outlet_pic}}">
                                        </div>
                                    </div>
                                </div>
								

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label col-form-label">Outlet Address:</label></div>
                                        <div class="col-lg-10">
                                            <input type="text" name="outlet_address" class="form-control" onkeypress="return IsAlphaNumeric(event)"  placeholder="Outlet Address" value="{{$outlet_info->outlet_address}}">
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
														<label class="control-label col-form-label">State </label></div>
													<div class="col-lg-8">
														<select class="form-control" name="state" id="state">
														
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
														<label class="control-label col-form-label">City </label></div>
													<div class="col-lg-8">
														<input type="text" class="form-control" name="city" onkeypress="return IsAlphaNumeric(event)" placeholder="City" value="">
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label col-form-label">Postcode </label></div>
													<div class="col-lg-8">
														<input type="text" name="zip_code" class="form-control" onkeypress="return isNumberKey(event)" placeholder="Postcode" value="">
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
														<label class="control-label col-form-label">Latitude: </label></div>
													<div class="col-lg-8">
														<input type="text" name="latitude" onkeypress="return isFloatNumber(event)" class="form-control" placeholder="Latitude" value="{{$outlet_info->lattitude}}">
													</div>
												</div>
											</div>
									    <div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label col-form-label">Longitude: </label></div>
													<div class="col-lg-8">
														<input type="text" name="longitude" class="form-control" onkeypress="return isFloatNumber(event)" placeholder="Longitude" value="{{$outlet_info->logitude}}">
													</div>
												</div>
											</div>
											
									 </div>
							    </div>
								
								
								 <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label col-form-label"> Working Hours:</label></div>
                                        <div class="col-lg-10">
										@foreach($outlet_schedule_info as $each_info)
										@if($each_info->day=='monday')
										<div class="row">
												 <div class="col-lg-2">
												 	
													<input type="checkbox" name="days[1][day]" value="monday" class="control-label col-form-label" checked><label>Monday</label>
												</div>
												 <div class="col-lg-2">
													<label class="control-label col-form-label">Start Time</label>
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
													<select class="form-control time_st" name="days[1][start_time_format]">
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
													<label class="control-label col-form-label">End Time</label>
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
													<select class="form-control time_st" name="days[1][end_time_formate]">
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
													<label class="control-label col-form-label">Start Time</label>
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
													<select class="form-control time_st" name="days[2][start_time_format]">
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
													<label class="control-label col-form-label">End Time</label>
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
													<select class="form-control time_st" name="days[2][end_time_formate]">
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
													<label class="control-label col-form-label"><label>Start Time</label>
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
													<select class="form-control time_st" name="days[3][start_time_format]">
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
													<label class="control-label col-form-label">End Time</label>
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
													<select class="form-control time_st" name="days[3][end_time_formate]">
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
													<label class="control-label col-form-label"><label>Start Time</label>
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
													<select class="form-control time_st" name="days[4][start_time_format]">
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
													<label class="control-label col-form-label">End Time</label>
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
													<select class="form-control time_st" name="days[4][end_time_formate]">
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
												 	
													<input type="checkbox" name="days[5][day]" value="friday" class="control-label col-form-label" checked><label>Friday</label>
												</div>
												 <div class="col-lg-2">
													<label class="control-label col-form-label"><label>Start Time</label>
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
													<select class="form-control time_st" name="days[5][start_time_format]">
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
													<label class="control-label col-form-label">End Time</label>
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
													<select class="form-control time_st" name="days[5][end_time_formate]">
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
													<label class="control-label col-form-label"><label>Start Time</label>
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
													<select class="form-control time_st" name="days[6][start_time_format]">
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
													<label class="control-label col-form-label ">End Time</label>
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
													<select class="form-control time_st" name="days[6][end_time_formate]">
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
												 	
													<input type="checkbox" name="days[7][day]" value="sunday" class="control-label col-form-label" checked><label>sunday</label>
												</div>
												 <div class="col-lg-2">
													<label class="control-label col-form-label"><label>Start Time</label>
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
													<select class="form-control time_st" name="days[7][start_time_format]">
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
													<label class="control-label col-form-label">End Time</label>
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
													<select class="form-control time_st" name="days[7][end_time_formate]">
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
                               
								
							    <div class="form-group add-btn">
                                    <div class="row">
                                        <div class="col-lg-5">
											 <button type="submit" class="btn btn-primary btn-lg">ADD</button>
											 <a href="{{ URL::previous() }}" class="btn btn-secondary btn-lg">CENCEL</a>											
										</div>
                                    </div>
                                </div>	
								
								
								
                            </form>				
				</div>
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