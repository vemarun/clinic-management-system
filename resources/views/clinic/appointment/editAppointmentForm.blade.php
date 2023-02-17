@extends('clinic.clinicMaster')

@section('body-content')
     <!-- /Breadcrumb -->
    <!-- Main Content -->
    <div class="container-fluid home">
	
			<div class="row no-margin-padding mt-5">
				<div class="col-md-12">
					<h3 class="block-title">Edit Appointment</h3>
				</div>
             </div>
            <div class="bodr p-4 mt-5">
            <div class="row">
				<div class="col-md-12">
				<form class="form-horizontal add-franc" method="post"  action="{{route('franchise.updateAppointmentForm')}}">
                    @csrf
					<input type="hidden" value="{{$appointment->id}}" name="appointment_id"/>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> Outlet:</label></div>
							<div class="col-lg-10">
							<select class="form-control outlet" name="outlet_id" id="outlet_id">
							<option value="">Outlet ID</option>
							@foreach($outlets as $eachOutlet)
							@if($appointment->outlet_id==$eachOutlet->id)
							<option value="{{$eachOutlet->id}}" selected>{{$eachOutlet->outlet_name}}</option>
							@else
							<option value="{{$eachOutlet->id}}">{{$eachOutlet->outlet_name}}</option>
							@endif
							@endforeach
							
							</select>
							</div>
						</div>
					</div>	
				<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-4"><label class="control-label"> Customer ID:</label></div>
								<div class="col-lg-8">				
									 	<input type="text" name="cid" id="cid" class="form-control" placeholder="Customer ID" value="{{$appointment->customer_code}}" readonly> 						
								</div> 
							</div> 
							</div>
						
							<div class="col-lg-6">						
								<div class="row">
									<div class="col-lg-3"><label for="allot-date">Booking ID:</label></div>
									<div class="col-lg-9">				
										  <input type="text" name="bid" id="bid" placeholder="Booking ID" class="form-control" value="{{$appointment->appointment_id}}" readonly> 						
									</div> 
								</div> 
							</div>					
                       </div>						
					</div>
				
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> First Name:</label></div>
							<div class="col-lg-10">
								<input type="text" name="fname" class="form-control" placeholder="First Name" value="{{$appointment->customer_first_name}}">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> Last Name:</label></div>
							<div class="col-lg-10">
								<input type="text" name="lname" class="form-control" placeholder="Last Name" value="{{$appointment->customer_last_name}}">
							</div>
						</div>
					</div>
				
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> I/C Passport:</label></div>
							<div class="col-lg-10">
								<input type="text" name="ic_or_passport" class="form-control" placeholder="I/C Passport" value="{{$appointment->ic_or_passport}}">
							</div>
						</div>
					</div>
					
										
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> Mobile No.:</label></div>
							<div class="col-lg-10">
								<input type="text" name="mobile_number" class="form-control" placeholder="Mobile No." value="{{$appointment->mobile_number}}">
							</div>
						</div>
					</div>
										
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> Email:</label></div>
							<div class="col-lg-10">
								<input type="email" name="email" class="form-control" placeholder="Email" >
							</div>
						</div>
					</div>
					
				
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-4"><label class="control-label"> Booking Deposit:</label></div>
								<div class="col-lg-8">				
									 	<input type="number" name="bdeposit" class="form-control" placeholder="Booking Deposit" value="{{$appointment->deposit_amount}}"> 						
								</div> 
							</div> 
							</div>
						
							<div class="col-lg-6">						
								<div class="row">
									<div class="col-lg-3"><label for="allot-date">Treatment Fee:</label></div>
									<div class="col-lg-9">				
										  <input type="number" name="tfee" placeholder="Treatment Fee" class="form-control" value="{{$appointment->treatment_fee}}"> 						
									</div> 
								</div> 
							</div>					
                       </div>						
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> Status:</label></div>
							<div class="col-lg-10">
							<select class="form-control">
							<option value="1" selected>Active</option>
							<option value="0">Inactive</option>
							</select>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> Preferred Therapist:</label></div>
							<div class="col-lg-10">
							<select class="form-control" name="prefer_therapist_id">
							<option value="" selected disabled>Preferred Therapist</option>
							@foreach($therapist as $eachTherapist)
							@if($appointment->prefered_physician_id==$eachTherapist->id)
							<option value="{{$eachTherapist->id}}" selected>{{$eachTherapist->name}}</option>
							@else
							<option value="{{$eachTherapist->id}}">{{$eachTherapist->name}}</option>
							@endif
							@endforeach
							</select>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-4"><label for="allot-date">Allotment Date:</label></div>
									<div class="col-lg-8">				
										<input type="date" placeholder="Allotment Date" class="form-control" id="allot-date" name="allotment_date" value="{{$appointment->appointment_date}}"> 						
								</div>  
							</div> 
							</div>
						
							<div class="col-lg-6">						
								<div class="row">
									<div class="col-lg-4"><label for="allot-date">Appointment Time:</label></div>
									<div class="col-lg-8">				
										  <input type="time" name="atime" placeholder="Appointment Time" class="form-control" value="{{$appointment->appointment_time}}"> 						
									</div> 
								</div> 
							</div>					
                       </div>						
					</div>
					
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2">
									<label class="control-label">Appointment Type:</label></div>
								<div class="col-lg-8">
									<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" class="custom-control-input" id="defaultGroupExample1" value="phone_call" name="appointment_type" checked>
								  <label class="custom-control-label" for="defaultGroupExample1">Call In</label>
								</div>

								<!-- Group of default radios - option 2 -->
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" class="custom-control-input" id="defaultGroupExample2" value="walkin" name="appointment_type" >
								  <label class="custom-control-label" for="defaultGroupExample2">Walk In</label>
								</div>

								<!-- Group of default radios - option 3 -->
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" class="custom-control-input" id="defaultGroupExample3" value="app" name="appointment_type">
								  <label class="custom-control-label" for="defaultGroupExample3">App</label>
								</div>	
								</div>
							</div>
						</div>					
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2">
									<label class="control-label">Reason of App:</label></div>
								<div class="col-lg-8">
									<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios1">
								  <label class="custom-control-label" for="defaultGroupExample4">Follow UP</label>
								</div>

								<!-- Group of default radios - option 2 -->
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" class="custom-control-input" id="defaultGroupExample5" name="groupOfDefaultRadios1" checked>
								  <label class="custom-control-label" for="defaultGroupExample5">First Timer</label>
								</div>
	
								</div>
							</div>
						</div>
						
						
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label">Remark: </label></div>
					   <div class="col-lg-10">										
								<textarea class="form-control" rows="3" id="comment" name="comment">{{$appointment->remarks}}</textarea>
						</div>	
					</div>
				</div>	
	
					<div class="row">
						<div class="col-lg-12">
						<button type="submit" class="btn btn-primary btn-lg">Update</button>
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
       $('.outlet').change(function() {
		var outlet_id=$(this).val();
            $.ajax({
                url: '{{route('franchise.getids')}}',
                type: 'GET',
                data: { outlet_id: outlet_id },
                success: function(response)
                {
					//var stateOptions;
					//var obj = jQuery.parseJSON(response);
					// $('#state').empty();
					// $.each(obj, function(key,value) {
					// 	stateOptions+="<option value='"+value.id+"'>"+value.name+ "</option>";
					// }); 
                  //  alert(response.customerId);
				  $('#cid').val(response.customerId);
				  $('#bid').val(response.bookingId);
                }
            });
       });
    }); 
    </script>
@endsection