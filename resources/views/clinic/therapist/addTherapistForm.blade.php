@extends('clinic.clinicMaster')

@section('body-content')
    <!-- /Breadcrumb -->
    <!-- Main Content -->
    <div class="container-fluid home">
	
			<div class="row no-margin-padding mt-5">
				<div class="col-md-12">
					<h3 class="block-title">Add Therapist</h3>
				</div>
             </div>
            <div class="bodr p-4 mt-5">
            <div class="row">
				<div class="col-md-12">
				<form class="form-horizontal add-franc" method="post"  action="{{route('franchise.PostAddTherapistForm')}}">
                    @csrf
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> Therapist ID:</label></div>
							<div class="col-lg-8">
								<input type="text" name="tid" class="form-control" placeholder="Therapist ID">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> Name:</label></div>
							<div class="col-lg-8">
								<input type="text" name="name" class="form-control" placeholder="Name">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> Email:</label></div>
							<div class="col-lg-8">
								<input type="email" name="email" class="form-control" placeholder="Email">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> I/C Passport:</label></div>
							<div class="col-lg-8">
								<input type="text" name="ic_or_passport" class="form-control" placeholder="I/C Passport">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-5">
							<div class="row">
								<div class="col-lg-5"><label class="control-label"> Gender:</label></div>
								<div class="col-lg-7">				
									  <div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" id="customRadio1" name="gender" value="male">
										<label class="custom-control-label" for="customRadio1">Male</label>
									  </div>
									  <div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" id="customRadio2" name="gender" value="female">
										<label class="custom-control-label" for="customRadio2">Female</label>
									  </div> 						
								</div> 
							</div> 
							</div>
						
							<div class="col-lg-5">						
								<div class="row">
									<div class="col-lg-4"><label for="allot-date">Allotment Date</label></div>
									<div class="col-lg-8">				
										  <input type="date" name="allotment_date" placeholder="Allotment Date" class="form-control" id="allotment_date"> 						
									</div> 
								</div> 
							</div>					
                       </div>						
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label"> Mobile No.:</label></div>
							<div class="col-lg-8">
								<input type="number" name="mobile_number" class="form-control" placeholder="Mobile No.">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label">Emergency Mobile No.:</label></div>
							<div class="col-lg-8">
								<input type="number" name="e_mobile_number" class="form-control" placeholder="Emergency Mobile No.">
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label">Address:</label></div>
							<div class="col-lg-8">
								<input type="text" name="address" class="form-control" placeholder="Address">
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
														<select class="form-control" name="country" id="country">
														<option value="-1">Select Country</option>
																@foreach($country as $eachCountry)

														       <option value="{{$eachCountry->id}}">{{$eachCountry->name}}</option>
															   @endforeach
														       
														</select>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-2">
														<label class="control-label">State </label></div>
													<div class="col-lg-8">
														<select class="form-control" name="state" id="state">
														   
                                                       
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
														<input type="text" class="form-control" name="city" placeholder="City" value="">
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													 <div class="col-lg-4">
														<label class="control-label">Postcode </label></div>
													<div class="col-lg-8">
														<input type="text" name="zip_code" class="form-control" placeholder="Postcode" value="">
													</div>
												</div>
											</div>
									
											
									 </div>
                                </div>
								
					
					<div class="form-group">
							<div class="row">
								<div class="col-lg-2">
									<label class="control-label">FRID or QR Code:</label></div>
								<div class="col-lg-8">							
									<button type="button" class="btn-secondary btn-lg">GENERATE QR CODE</button>
								</div>
							</div>
					</div>	
	
					<div class="row">
						<div class="col-lg-12">    
						<button type="submit" class="btn btn-primary btn-lg">ADD</button>
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
                url: '{{route('state')}}',
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