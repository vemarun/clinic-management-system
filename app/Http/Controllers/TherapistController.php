<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Therapist;
use View;
use App\Country;
use App\User;
use App\State;

class TherapistController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {

           $therapist=Therapist::get();
            return Datatables::of($therapist)

                ->addColumn('action', function ($row) {
                   $html = '<a data-href="#" href="'.route('franchise.editTherapistForm', [$row->therapist_id]).'"><i class="fa fa-edit font-20px"></i>' . ''.  '</a>';
                    $html .= '<a  href="#" class="btn-modal test" data-container=".view_modal"  data-href="'.route('admin.viewFranchise', [$row->therapist_id]).'"><i class="fa fa-eye font-20px"></i>' . ''.  '</a>';
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
        
        return \View('clinic.therapist.viewTherapistList');
    }

    public function showForm(Request $request)
    {
        $country=Country::get();
        return \View('clinic.therapist.addTherapistForm')->with(compact('country'));
    }
    public function store(Request $request)
    {
        $data=[ 'tid' => 'required'];
        $validator = \Validator::make($request->all(),$data);

        if ($validator->fails()) {
            return redirect()->back()->with('error','required fields are missing')->withInput();
        }
        else{
            //crreate new record
            
            $check=User::where('email','=',$request->email)->first();
            if($check)
            {
                return redirect()->back()->with('error','email id alreday taken')->withInput();
 
            }
            else
            {
                
                DB::beginTransaction();
                try {
                    $createUser=new User();
                    $createUser->name=$request->name;
                    $createUser->username=$request->name.$createUser->id;
                    $createUser->email=$request->email;
                    $password='12345';
                    $createUser->password=\Hash::make($password);
                    $createUser->designation='doctor';
                    $createUser->franchise_parent_id=\Auth::user()->id;
                    $createUser->save();
                        //send password by email
                        //update therapist table
                        $add_new_therapist = new Therapist();
                        $add_new_therapist->therapist_id=$createUser->id;
                        $add_new_therapist->franchise_id=$createUser->franchise_parent_id;
                        $add_new_therapist->email=$request->email;
                        $add_new_therapist->name=$request->name;
                        $add_new_therapist->ic_or_passport=$request->ic_or_passport;
                        $add_new_therapist->gender=$request->gender;

                        $add_new_therapist->mobile_number=$request->mobile_number;
                        $add_new_therapist->emergency_phone_number=$request->e_mobile_number;
                        $add_new_therapist->address=$request->address;
                        $add_new_therapist->city=$request->city;
                        $add_new_therapist->state=$request->state;
                        $add_new_therapist->post_code=$request->zip_code;
                        $add_new_therapist->country=$request->country;
                        $add_new_therapist->allotment_date=date('Y-m-d',strtotime($request->allotment_date));
                        
                        $add_new_therapist->save();
                   
                         DB::commit();
                         return redirect()->route('franchise.viewTherapistList')->with('success','Doctor Added Successfully');

                    // all good
                    } catch (\Exception $e) {
                        DB::rollback();
                        dd($e->getmessage().$e->getline());
                        return redirect()->back()->with('error','email id alreday taken')->withInput();

                        // something went wrong
                    }

            }
            
        }
    }
    public function edit(Request $request)
    {
        $country=Country::get();
        $doctorInfo=Therapist::where('therapist_id',$request->id)->first();
        $state=State::where('country_id',$doctorInfo->country)->select('id','name')->get();
        return \View('clinic.therapist.editTherapistForm')->with(compact('doctorInfo','country','state'));
    }
    public function update(Request $request)
    {
    }

}
