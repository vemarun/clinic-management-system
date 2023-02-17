<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Customer;

class PatientController extends Controller
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
         //dd($request->all());
         $query = Customer::leftjoin('appointments','Customer.id', '=', 'appointments.customer_id');


           

        //     if (!empty($request->input('location_id')) && ($request->input('location_id')!='all')) {
               
        //          $location_id = $request->input('location_id');
        //          $query->where('add_redeem_point_line_dtl.store_location_id','=',$location_id);

        //     }
        //       if (!empty($request->input('user_id')) && ($request->input('user_id')!='all')) {
               
        //         $added_by = $request->input('user_id');

        //          $query->where('add_redeem_point_line_dtl.added_by_id','=',$added_by);
        //     }
        //      if (!empty(request()->start_date) && !empty(request()->end_date)) {
        //         $start = request()->start_date;
        //         $end =  request()->end_date;
               
        //         $query->where('add_redeem_point_line_dtl.created_at', '>=', $start)
        //               ->where('add_redeem_point_line_dtl.created_at', '<=', $end);
        //     }
        //    // return $CustomerPointEarnLineDetail
        //      $CustomerPointEarnLineDetail = $query->select('add_redeem_point_line_dtl.*','customers.first_name','customers.last_name','customers.mobile_number','customers.email','multiple_stores.business_name')->get();

         
         return \View('clinic.patient.patientViewForm')->with(compact(''));

    }
}
