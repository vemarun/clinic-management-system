<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Therapist;
use View;
use App\Country;
use App\User;
use App\State;
use App\Appointment;
use App\Customer;
use App\Outlet;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
           $today=date('Y-m-d');
           $appointments=Appointment::where('created_at','=',$today)->get();
            return Datatables::of($appointments)

                ->addColumn('action', function ($row) {
                   $html = '<a data-href="#" href="'.route('franchise.editTherapistForm', [$row->id]).'"><i class="fa fa-edit font-20px"></i>' . ''.  '</a>';
                    $html .= '<a  href="#" class="btn-modal test" data-container=".view_modal"  data-href="'.route('admin.viewFranchise', [$row->id]).'"><i class="fa fa-eye font-20px"></i>' . ''.  '</a>';
                    if($row->active=='1')
                    {
                        
                        $html .= ' <a data-href="#" href="'.route('admin.blockUnblock', [$row->id]).'" class="btn-modal" data-container=".view_modal"><i class="fa fa-ban font-20px" aria-hidden="true"></i>' .''.'</a>';
                    }
                    else
                    {
                        $html .= ' <a data-href="#" href="'.route('admin.blockUnblock', [$row->id]).'" class="btn-modal" data-container=".view_modal"><i class="fa fa-unlock-alt font-20px" aria-hidden="true"></i>' .''.'</a>';
 
                    }
                    
                  
                    return $html;
                })
                //  ->editColumn('offer_img', function($row) {
                //     $url=asset($row->offer_img); 
                //     return '<img src='.$url.' alt="Smiley face" height="42" width="42">';
                // })

                // //->removeColumn('id')
                ->rawColumns(['action'])
                ->make(true);
        }
        $today=date('Y-m-d');
       // dd($today);
        $todayAppointment=Appointment::where('appointment_date','=',$today)->get();
        $upcommingAppointments=Appointment::where('appointment_date','>',$today)->get();
        $pastAppointment=Appointment::where('appointment_date','<',$today)->get();
        // $ap=Appointment::get();
        // dd($todayAppointment);
        
        return \View('clinic.appointment.viewAppointmentList')->with(compact('todayAppointment','upcommingAppointments','pastAppointment'));
    }

    public function showForm(Request $request)
    {
        
        $franchise_id=\Auth::user()->id;
        $country=Country::get();
        $therapist=Therapist::where('franchise_id',$franchise_id)->select('id','name')->get();
        $outlets=Outlet::where('franchise_id',$franchise_id)->select('id','outlet_name')->get();
        return \View('clinic.appointment.addAppointmentForm')->with(compact('country','therapist','outlets'));
    }
    public function store(Request $request)
    {
        $data=[ 'mobile_number' => 'required'];
        $validator = \Validator::make($request->all(),$data);

        if ($validator->fails()) {
            return redirect()->back()->with('error','required fields are missing')->withInput();
        }
        else{
               //crreate new appointment
                DB::beginTransaction();
                try {
                    $flag='0';
                    $checkUser=Customer::where('mobile_number',$request->mobile_number)->first();
                    if($checkUser)
                    {
                        //customer already exist
                        $flag=1;
                        
                    }
                    else
                    {
                        //first create customer
                        $addPatient=new Customer();
                        $addPatient->customer_code=$request->cid;
                        $addPatient->outlet_id=$request->outlet_id;
                        $addPatient->email=$request->email;
                        $addPatient->ic_or_passport=$request->ic_or_passport;
                        $addPatient->first_name=$request->fname;
                        $addPatient->last_name=$request->lname;
                        $addPatient->mobile_number=$request->mobile_number;
                        $addPatient->save();
                    }
                 
                        //create Appointment
                        $add_new_appointment = new Appointment();
                        if($flag=='1')
                        {
                            $add_new_appointment->customer_id=$checkUser->id;
                        }
                        else
                        {
                            $add_new_appointment->customer_id=$addPatient->id;
                        }
                        $add_new_appointment->customer_code=$addPatient->cid;
                        $add_new_appointment->appointment_id=$addPatient->bid;
                        $add_new_appointment->customer_name=$request->fname.$request->lname;
                        $add_new_appointment->ic_or_passport=$request->ic_or_passport;
                        $add_new_appointment->prefered_physician_id=$request->prefer_therapist_id;

                        $add_new_appointment->mobile_number=$request->mobile_number;
                        $add_new_appointment->appointment_date=date('Y-m-d',strtotime($request->allotment_date));
                        $add_new_appointment->appointment_time=$request->atime;
                        $add_new_appointment->appointment_booking_method=$request->appointment_type;
                        $add_new_appointment->deposit_amount=$request->bdeposit;
                        $add_new_appointment->remarks=$request->comment;
                        $add_new_appointment->outlet_id=$request->outlet_id;
                        
                        $add_new_appointment->treatment_fee=$request->tfee;
                        
                        $add_new_appointment->save();
                   
                         DB::commit();
                         return redirect()->route('franchise.viewAppointmentList')->with('success','Appointment booked Successfully');

                    //all good
                    } catch (\Exception $e) {
                        DB::rollback();
                        dd($e->getmessage().$e->getline());
                        return redirect()->back()->with('error',$e->getmessage().$e->getline())->withInput();

                        // something went wrong
                    }

            
            
        }
    }
    public function edit(Request $request)
    {
        $appointment=Appointment::where('id',$request->id)->first();
        $franchise_id=\Auth::user()->id;
        $country=Country::get();
        $therapist=Therapist::where('franchise_id',$franchise_id)->select('id','name')->get();
        $outlets=Outlet::where('franchise_id',$franchise_id)->select('id','outlet_name')->get();
        return \View('clinic.appointment.editAppointmentForm')->with(compact('country','therapist','outlets','appointment'));
    }

    public function update(Request $request)
    {

        $data=[ 'appointment_id' => 'required'];
        $validator = \Validator::make($request->all(),$data);

        if ($validator->fails()) {
            return redirect()->back()->with('error','required fields are missing')->withInput();
        }
        else{
               //crreate new appointment
                DB::beginTransaction();
                try {
                    $appointment=Appointment::where('id',$request->appointment_id)->first();
                   
                   
                    if($appointment)
                    {
                        $checkUser_info=Customer::where('id',$appointment->customer_id)->first();
                        $checkUser_info->customer_code=$request->cid;
                        $checkUser_info->outlet_id=$request->outlet_id;
                        // $checkUser_info->email=$request->email;
                        $checkUser_info->ic_or_passport=$request->ic_or_passport;
                        $checkUser_info->first_name=$request->fname;
                        $checkUser_info->last_name=$request->lname;
                        $checkUser_info->mobile_number=$request->mobile_number;
                        $checkUser_info->save();

                        //create Appointment
                        // $appointment->customer_code=$addPatient->cid;
                        // $appointment->appointment_id=$addPatient->bid;
                        $appointment->customer_first_name=$request->fname;
                        $appointment->customer_last_name=$request->lname;
                        $appointment->ic_or_passport=$request->ic_or_passport;
                        $appointment->prefered_physician_id=$request->prefer_therapist_id;

                        $appointment->mobile_number=$request->mobile_number;
                        $appointment->appointment_date=date('Y-m-d',strtotime($request->allotment_date));
                        $appointment->appointment_time=$request->atime;
                        $appointment->appointment_booking_method=$request->appointment_type;
                        $appointment->deposit_amount=$request->bdeposit;
                        $appointment->remarks=$request->comment;
                        $appointment->outlet_id=$request->outlet_id;
                        
                        $appointment->treatment_fee=$request->tfee;
                        
                        $appointment->save();
                        
                    }
                    else
                    {
                        //appointment id not found
                        return redirect()->back()->with('error','required fields are missing')->withInput();
                    }
                 
                        
                   
                         DB::commit();
                         return redirect()->route('franchise.viewAppointmentList')->with('success','Appointment updated Successfully');

                    //all good
                    } catch (\Exception $e) {
                        DB::rollback();
                        dd($e->getmessage().$e->getline());
                        return redirect()->back()->with('error',$e->getmessage().$e->getline())->withInput();

                        // something went wrong
                    }

            
            
        }

    }
    public function getCustomerOrBookingId(Request $request)
    {
        $getOutletCode=Outlet::where('id',$request->outlet_id)->first();
        $customerId=$this->generateSequnece(6,'customer',$getOutletCode->outlet_id);
        $bookingId=$this->generateSequnece(6,'booking',$getOutletCode->outlet_id);
        $output = response()->json(['success'=> 1 , 'customerId' => $customerId,'bookingId'=>$bookingId]);
        //dd($output);
        return $output;
    }

}
