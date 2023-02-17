@extends('superAdmin.layout')

@section('body-content')
<div class="container-fluid home">
				<div class="row">
					<div class="col-md-12">
					<h3 class="block-title"> Admin Profile</h3>
					</div>
				</div>
                <div class="row"> 
							<div class="col-md-2"></div>
							@if(Session::has('error'))
										<div class="col-md-8 alert alert-danger">
											<a class="close" data-dismiss="alert">×</a>
											<strong>Heads Up!</strong> {!!Session::get('error')!!}
										</div>

									@endif
									@if(Session::has('success'))
										<div class="col-md-8 alert alert-success">
											<a class="close" data-dismiss="alert">×</a>
											<strong>Heads Up!</strong> {!!Session::get('success')!!}
										</div>

									@endif
						<div class="col-md-2"></div>
					</div>
	            <div class="row">
					<!-- Widget Item -->
					<div class="col-md-12 text-right mt-4">
					
					<form class="form-horizontal add-franc" method="post"  action="{{route('admin.updateProfile')}}">
                    @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">Name </label></div>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{Auth::user()->name}}" onkeypress="return IsAlphaNumeric(event);" required>
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">Email </label></div>
                                        <div class="col-lg-10">
                                            <input type="Email" name="email" class="form-control" placeholder="Email" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">Password  </label></div>
                                        <div class="col-lg-10">
                                            <input type="text" name="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label">Confirm Password  </label></div>
                                        <div class="col-lg-10">
                                            <input type="text" name="password_confirmation" class="form-control" placeholder="Password">
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

@endsection