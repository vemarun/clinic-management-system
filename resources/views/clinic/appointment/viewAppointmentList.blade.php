@extends('clinic.clinicMaster')

@section('body-content')    
    <!-- /Breadcrumb -->
    <!-- Main Content -->
    <div class="container-fluid home">
	
    <div class="row no-margin-padding mt-5">
        <div class="col-md-12">
            <h3 class="block-title">Appointment List</h3>
        </div>
     </div>
     
     <div class="row mt-3">
        <div class="col-md-12">
             <a href="{{route('franchise.addAppointmentForm')}}" class="btn btn-primary btn-lg float-right">ADD APPOINTMENT</button></a>
        </div>
     </div>


<div class="row frach-table appoint-tab">
<div class="col-md-12">
<ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
<a href="#tab1" class="nav-link  active" data-toggle="tab">Today</a>
</li>
<li class="nav-item">
<a href="#tab2" class="nav-link" data-toggle="tab">Upcoming</a>
</li>
<li class="nav-item">
<a href="#tab3" class="nav-link" data-toggle="tab">Past App</a>
</li>
</ul>

<div class="tab-content">
<div id="tab1" class="tab-pane show active">
<div class="row frach-table">
            <!-- Widget Item -->
            <div class="col-md-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered gray" id="example">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>App Time</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile No.</th>
                                    <th>Booking Method</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($todayAppointment as $eachAppointment)
                                <tr>
                                    <td>{{$eachAppointment->appointment_id}}</td>
                                    <td>{{$eachAppointment->appointment_time}}</td>
                                    <td>{{$eachAppointment->customer_first_name}}</td>
                                    <td>{{$eachAppointment->customer_last_name}}</td>
                                    <td>{{$eachAppointment->mobile_number}}</td>
                                    <td>{{$eachAppointment->appointment_booking_method}}</td>
                                    <td><a  href="{{ route('franchise.editAppointmentForm', ['id' => $eachAppointment->id]) }}" ><i class="fa fa-edit font-20px"></i></a> <i class="fa fa-trash-o" aria-hidden="true"></i></td>										
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<div id="tab2" class="tab-pane">
<div class="row frach-table">
            <!-- Widget Item -->
            <div class="col-md-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered gray" id="example">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>App Time</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile No.</th>
                                    <th>Booking Method</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($upcommingAppointments as $eachAppointment)
                                <tr>
                                    <td>{{$eachAppointment->appointment_id}}</td>
                                    <td>{{$eachAppointment->appointment_time}}</td>
                                    <td>{{$eachAppointment->customer_first_name}}</td>
                                    <td>{{$eachAppointment->customer_last_name}}</td>
                                    <td>{{$eachAppointment->mobile_number}}</td>
                                    <td>{{$eachAppointment->appointment_booking_method}}</td>
                                    <td><a  href="{{ route('franchise.editAppointmentForm', ['id' => $eachAppointment->id]) }}" ><i class="fa fa-edit font-20px"></i></a> <i class="fa fa-trash-o" aria-hidden="true"></i></td>										
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<div id="tab3" class="tab-pane">
   <div class="row frach-table">
            <!-- Widget Item -->
            <div class="col-md-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered gray" id="example">
                            <thead>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>App Time</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile No.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pastAppointment as $eachAppointment)
                                <tr>
                                    <td>{{$eachAppointment->appointment_id}}</td>
                                    <td>{{$eachAppointment->appointment_time}}</td>
                                    <td>{{$eachAppointment->customer_first_name}}</td>
                                    <td>{{$eachAppointment->customer_last_name}}</td>
                                    <td>{{$eachAppointment->mobile_number}}</td>
                                    <td>{{$eachAppointment->appointment_booking_method}}</td>
                                    <td><a  href="{{ route('franchise.editAppointmentForm', ['id' => $eachAppointment->id]) }}" ><i class="fa fa-edit font-20px"></i></a> <i class="fa fa-trash-o" aria-hidden="true"></i></td>										
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

</div>		
                
</div>
    
</div>
@endsection

@section('body-scripts')
    <script>

    </script>
@endsection