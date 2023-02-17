<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\User;
use App\Outlet;
use App\TreatmentCategory;
use App\Treatment;
use App\OutletSchedule;
use App\State;
use App\Country;
use App\Admin;
use Log;
use validator;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return \View('superAdmin.profile');

    }
    public function updateProfile(Request $request)
    {
        //dd("her3e");
        $data=[ 'password' => 'required|confirmed|min:6'];
        $validator = \Validator::make($request->all(),$data);

        if ($validator->fails()) {
            return redirect()->back()->with('error','confirmed password mismatch,Passwords must be at least 6 characters long')->withInput();
        }
        else
        {
            
            $add=Admin::first();
            $add->name=$request->name;
            $add->email=$request->email;
            $add->password=\Hash::make($request->password);
            $add->save();
            return redirect()->back()->with('success','profile updated');

        }
      

    }
    
    
    public function getState(Request $request)
     {
         $state=State::where('country_id',$request->id)->select('id','name')->get();
         return json_encode($state);
     } 
    public function index()
    {
        return view('superAdmin.home');
    }
    public function viewFranchise(Request $request)
    {
        $franchise=User::where('id',$request->id)->first();
        $country=Country::get();
        $state=State::where('country_id',$franchise->country)->select('id','name')->get();
        return \View('superAdmin.viewFranchiseModel')->with(compact('franchise','country','state'))->render();

    }

    public function viewFranchiseeList(Request $request)
    {
        if (request()->ajax()) {

           $franchisList=User::where('designation','=','franchise')
           ->leftJoin('countries', 'users.country', '=', 'countries.id')
           ->select(
               'users.*',
               'countries.name as c_name'
       )->get();
            return Datatables::of($franchisList)

                ->addColumn('action', function ($row) {
                   $html = '<a data-href="#" href="'.route('admin.editFranchise', [$row->id]).'"><i class="fa fa-edit font-20px"></i>' . ''.  '</a>';
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
        
        return \View('superAdmin.viewFranchiseeList');
    }

    public function addFranchisee(Request $request)
    {
        $country=Country::get();
        return \View('superAdmin.addFranchiseeForm')->with(compact('country'));
    }
    public function editFranchise(Request $request)
    {
        $franchise=User::where('id',$request->id)->first();
        $country=Country::get();
        $state=State::where('country_id',$franchise->country)->select('id','name')->get();
        return \View('superAdmin.editFranchiseeForm')->with(compact('franchise','country','state'));
    }

    public function store(Request $request)
    {
       
        $data=['franchise_id'=>'required'];
        $validator = \Validator::make($request->all(),$data);

        if ($validator->fails()) {
            return redirect()->back()->with('error','required Fields are missing');
        }
        else
        {
            $checkDuplicate=User::where('email',$request->email)->where('designation','=','franchasie')->first();
            if($checkDuplicate)
            {
                //duplicate found
                return redirect()->back()->with('error','Another user with same email id exists');
            }else
            {
                try{
                    $password=$this->getpassword(10);
                    $create_new=new User();
                    $create_new->franchise_id=$request->franchise_id;
                    $create_new->pic_name=$request->pic_name;
                    $create_new->company_name=$request->company_name;
                    $create_new->company_registration_no=$request->company_registration_no;
                    $create_new->registered_address=$request->registered_address;
                    $create_new->city=$request->city;
                    $create_new->state=$request->state;
                    $create_new->zip_code=$request->zip_code;
                    $create_new->country=$request->country;
                    $create_new->mobile_number=$request->mobile_number;
                    $create_new->remarks=$request->remarks;
                    $create_new->email=$request->email;
                    $create_new->password=\Hash::make($password);
                    $create_new->name=$request->pic_name;
                    if(isset($request->status))
                    {
                        $create_new->active=$request->status;
                    }
                    $create_new->designation='franchise';
                    $create_new->save();
                    //send mail for password will be here
                    return redirect()->route('admin.viewFranchiseeList')->with('success','Franchise Added Successfully.'.$password);
                }catch(\Exception $e)
                {
                    $message=$e->getMessage();
                    return redirect()->back()->with('error','Something went wrong');
                }
               
                
            }
        }

    }
    public function updateFranchise(Request $request)
    {
      
        $data=['franchise_id'=>'required'];
        $validator = \Validator::make($request->all(),$data);

        if ($validator->fails()) {
            return redirect()->back()->with('error','required Fields are missing');
        }
        else
        {
            $create_new=User::where('id',$request->f_id)->where('designation','=','franchise')->first();
            if($create_new)
            {
                try{
                   
                 
                    $create_new->pic_name=$request->pic_name;
                    $create_new->company_name=$request->company_name;
                    $create_new->company_registration_no=$request->company_registration_no;
                    $create_new->registered_address=$request->registered_address;
                    $create_new->city=$request->city;
                    $create_new->state=$request->state;
                    $create_new->zip_code=$request->zip_code;
                    $create_new->country=$request->country;
                    $create_new->mobile_number=$request->mobile_number;
                    $create_new->remarks=$request->remarks;
                   // if()
                    $create_new->email=$request->email;
                   
                    $create_new->name=$request->pic_name;
                    if(isset($request->status))
                    {
                        $create_new->active=$request->status;
                    }
                   
                    $create_new->save();
                    //send mail for password will be here
                    return redirect()->route('admin.viewFranchiseeList')->with('success','Franchise updated Successfully.');
                }catch(\Exception $e)
                {
                    $message=$e->getMessage();
                    
                    return redirect()->back()->with('error','Something went wrong');
                }
               
            }else
            {
                
                return redirect()->back()->with('error','something went wrong');
                
            }
        }

    }

    public function blockUnblock(Request $request)
    {
        $user=User::where('id',$request->id)->where('designation','=','franchise')->first();
        if($user)
        {
            if($user->active=='1')
            {
                 $user->active='0';
                 $user->save();
                 return redirect()->back()->with('success','User Blocked Successfully.');
            }
            else
            {
                   $user->active='1';
                   $user->save();
                  return redirect()->back()->with('success','User unBlocked Successfully.');
            } 
        }
        else
        {
            return redirect()->back()->with('error','something went wrong try again');
        }

    }


    /* outlet related functions */

    
    public function outletBlockUnblock(Request $request)
    {
        $Outlet=Outlet::where('id',$request->id)->first();
        if($Outlet)
        {
            if($Outlet->status=='1')
            {
                 $Outlet->status='0';
                 $Outlet->save();
                 return redirect()->back()->with('success','Outlet Blocked Successfully.');
            }
            else
            {
                   $Outlet->status='1';
                   $Outlet->save();
                  return redirect()->back()->with('success','Outlet unBlocked Successfully.');
            } 
        }
        else
        {
            return redirect()->back()->with('error','something went wrong try again');
        }

    }
    public function viewOutletList(Request $request)
    {
        if (request()->ajax()) 
        {
           $outlets=Outlet::get();
            return Datatables::of($outlets)
            
                ->addColumn('action', function ($row) {
                    // $html = '<div class="btn-group">
                    //         <button type="button" class="btn btn-info dropdown-toggle btn-xs" 
                    //             data-toggle="dropdown" aria-expanded="false">' .'action'.
                    //     '<span class="caret"></span><span class="sr-only">Toggle Dropdown
                    //             </span>
                    //         </button>
                    //         <ul class="dropdown-menu dropdown-menu-right" role="menu">';
                    // $html .= '<li><a href="#" data-href="#" class="btn-modal" data-container=".view_modal"><i class="fa fa-eye" aria-hidden="true"></i>' .'View'. '</a></li>';
                    $html = '<a data-href="#" href="'.route('admin.editOutlet', [$row->id]).'"><i class="fa fa-edit font-20px"></i>' . ''.  '</a>';
                    $html .= '<a  href="#" class="btn-modal test" data-container=".view_modal"  data-href="'.route('admin.viewOutlet', [$row->id]).'"><i class="fa fa-eye font-20px"></i>' . ''.  '</a>';
                    if($row->status=='1')
                    {
                        
                        $html .= ' <a data-href="#" href="'.route('admin.outletBlockUnblock', [$row->id]).'" class="btn-modal" data-container=".view_modal"><i class="fa fa-ban font-20px" aria-hidden="true"></i>' .''.'</a>';
                    }
                    else
                    {
                        $html .= ' <a data-href="#" href="'.route('admin.outletBlockUnblock', [$row->id]).'" class="btn-modal" data-container=".view_modal"><i class="fa fa-unlocak font-20px" aria-hidden="true"></i>' .''.'</a>';
 
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
        return \View('superAdmin.outlets.outletList');
    }

    
    public function viewOutlet(Request $request)
    {
        $outlet_info=Outlet::where('id','=',$request->id)->first();
        $outlet_schedule_info=OutletSchedule::where('outlet_id','=',$outlet_info->id)->get();
        $franchisList=User::where('designation','=','franchise')->get();
        $start_time=array('08:00','09:00','10.00','11.00','12.00','01.00','02.00','03.00','04.00','05.00','06.00','07.00');
        $end_time=array('05.00','06.00','07.00','08:00','09:00','10.00','11.00','12.00');
        $country=Country::get();
        $state=State::where('country_id',$outlet_info->country)->select('id','name')->get();
        return \View('superAdmin.outlets.viewOutletModel')->with(compact('country','state','franchisList','outlet_info','outlet_schedule_info','start_time','end_time'))->render();
    }

    public function addOutlet(Request $request)
    {
        $country=Country::get();
        $franchisList=User::where('designation','=','franchise')->get();
        $start_time=array('08:00','09:00','10.00','11.00','12.00','01.00','02.00','03.00','04.00','05.00','06.00','07.00');
        $end_time=array('05.00','06.00','07.00','08:00','09:00','10.00','11.00','12.00');

        return \View('superAdmin.outlets.addOutletForm')->with(compact('franchisList','country','start_time','end_time'));
    }

    public function storeOutlet(Request $request)
    {
     // dd($request->all());
        try
        {
            $add=new Outlet();
            $add->franchise_id=$request->frnachise_id;
            $add->outlet_name=$request->outlet_name;
            $add->outlet_pic=$request->outlet_pic;
            $add->outlet_address=$request->outlet_address;
            $add->outlet_id=$request->outlet_id;
            $add->outlet_registration_no=$request->outlet_registration_no;
            
            $add->city=$request->city;
            $add->state=$request->state;
            $add->country=$request->country;
            $add->post_code=$request->zip_code;
            $add->lattitude=$request->latitude;
            $add->logitude=$request->longitude;
            $add->email=$request->email;
            $add->phone_number=$request->mobile_number;
            $add->added_by=\Auth::user()->id;
            //$data=$request
           //dd($request->days);
            // $json_data=json_encode($request->days);
            // $add->schedules=$json_data;
            $add->save();
            if(isset($request->days))
            {

               foreach($request->days as $eachDay)
               {
                    $add_schedule=new OutletSchedule();
                    $add_schedule->outlet_id=$add->outlet_id;
                    $add_schedule->day=$eachDay['day'];
                    $add_schedule->start_time=$eachDay['start_time'];
                    $add_schedule->start_time_format=$eachDay['start_time_format'];
                    $add_schedule->end_time=$eachDay['end_time'];
                    $add_schedule->end_time_format=$eachDay['end_time_formate'];
                    $add_schedule->save();
                    
                    
               }
                
            }
         
            
            return redirect()->back()->with('success','outlet  added successfully.');

        }catch(\Exception $e)
        {
           // dd($e->getmessage());
            return redirect()->back()->with('error','something went wrong.');
        }
    }

    public function editOutlet(Request $request)
    {
        $outlet_info=Outlet::where('id','=',$request->id)->first();
        $outlet_schedule_info=OutletSchedule::where('outlet_id','=',$outlet_info->id)->get();
        $franchisList=User::where('designation','=','franchise')->get();
        $start_time=array('08:00','09:00','10.00','11.00','12.00','01.00','02.00','03.00','04.00','05.00','06.00','07.00');
        $end_time=array('05.00','06.00','07.00','08:00','09:00','10.00','11.00','12.00');

        //$schedule=json_decode($outlet_info->schedules);
        //dd($schedule->day['1']);
        $country=Country::get();
        $state=State::where('country_id',$outlet_info->country)->select('id','name')->get();
        return \View('superAdmin.outlets.editOutletForm')->with(compact('country','state','franchisList','outlet_info','outlet_schedule_info','start_time','end_time'));
    }
    public function updateOutlet(Request $request)
    {
        $add=Outlet::where('id','=',$request->outlet_id)->first();
        try
        {
            //dd($request->frnachise_id);
            $add->franchise_id=$request->frnachise_id;
            $add->outlet_name=$request->outlet_name;
            $add->outlet_pic=$request->outlet_pic;
            $add->outlet_address=$request->outlet_address;
            $add->outlet_id=$request->outlet_id;
            $add->outlet_registration_no=$request->outlet_registration_no;
            
            $add->city=$request->city;
            $add->state=$request->state;
            $add->country=$request->country;
            $add->post_code=$request->zip_code;
            $add->lattitude=$request->latitude;
            $add->logitude=$request->longitude;
            $add->email=$request->email;
            $add->phone_number=$request->mobile_number;
            
            //$data=$request
           //dd($request->days);
            // $json_data=json_encode($request->days);
            // $add->schedules=$json_data;
            $add->save();
            if(isset($request->days))
            {

               foreach($request->days as $eachDay)
               {
                    $add_schedule=OutletSchedule::where('outlet_id',$request->outlet_id)->where('day',$eachDay['day'])->first();
                    $add_schedule->outlet_id=$add->outlet_id;
                    //$add_schedule->day=$eachDay['day'];
                    $add_schedule->start_time=$eachDay['start_time'];
                    $add_schedule->start_time_format=$eachDay['start_time_format'];
                    $add_schedule->end_time=$eachDay['end_time'];
                    $add_schedule->end_time_format=$eachDay['end_time_formate'];
                    $add_schedule->save();
                    
                    
               }
                
            }
         
            
            return redirect()->back()->with('success','outlet  updated successfully.');

        }catch(\Exception $e)
        {
            dd($e->getmessage().$e->getline());
            return redirect()->back()->with('error','something went wrong.');
        }
    }




    /**treatment add and category related function */
    public function treatmentCategoryBlockUnblock(Request $request)
    {
        $TreatmentCategory=TreatmentCategory::where('id',$request->id)->first();
        if($TreatmentCategory)
        {
            if($TreatmentCategory->status=='1')
            {
                 $TreatmentCategory->status='0';
                 $TreatmentCategory->save();
                 return redirect()->back()->with('success','category Blocked Successfully.');
            }
            else
            {
                   $TreatmentCategory->status='1';
                   $TreatmentCategory->save();
                  return redirect()->back()->with('success','category unBlocked Successfully.');
            } 
        }
        else
        {
            return redirect()->back()->with('error','something went wrong try again');
        }

    }
    public function viewTreatmentCategoryList(Request $request)
    {
        if (request()->ajax()) 
        {
           $TreatmentCategory=TreatmentCategory::get();
            return Datatables::of($TreatmentCategory)

                ->addColumn('action', function ($row) {
   
                    $html = '<a href="#" id="cat_edit" class="cat_edit" data-href="'.route('admin.editCategory', [$row->id]).'"><i class="fa fa-edit font-20px"></i>' . ''.  '</a>';
                    if($row->status=='1')
                    {
                        
                        $html .= ' <a data-href="#" href="'.route('admin.treatmentCategoryBlockUnblock', [$row->id]).'" class="btn-modal" data-container=".view_modal"><i class="fa fa-ban font-20px" aria-hidden="true"></i>' .''.'</a>';
                    }
                    else
                    {
                        $html .= ' <a data-href="#" href="'.route('admin.treatmentCategoryBlockUnblock', [$row->id]).'" class="btn-modal" data-container=".view_modal"><i class="fa fa-unlock font-20px" aria-hidden="true"></i>' .''.'</a>';
 
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
        return \View('superAdmin.treatments.treatmentCategoryList');
    }

    public function addCategory(Request $request)
    {
        return view('superAdmin.treatments.addCatModel')->render();
    }
    public function storCategory(Request $request)
    {
        $checkCat=TreatmentCategory::where('cat_name',$request->cat_name)->first();
        if($checkCat)
        {
            return redirect()->back()->with('error','Category name already exists');
        }
        else
        {
            $add=new TreatmentCategory();
            $add->cat_name=$request->cat_name;
            $add->slag=$request->slag;
            $add->added_by=\Auth::user()->id;
            $add->save();
            //return 1;
            return redirect()->back()->with('success','Category added successfully');
        }
    }
    public function editCategory($id)
    {
        $Cat_iinfo=TreatmentCategory::where('id',$id)->first();
        return view('superAdmin.treatments.editCatModel')->with(compact('Cat_iinfo'))->render();
    }
   
    public function updateCategory(Request $request)
    {
        $checkCat=TreatmentCategory::where('id',$request->id)->first();
        if($checkCat)
        {
          
            $checkCat->cat_name=$request->cat_name;
            $checkCat->slag=$request->slag;
            $checkCat->save();
            return redirect()->back()->with('success','Category updated successfully');
           
        }
        else
        {
            return redirect()->back()->with('error','Category name already exists');
        }
    }

    // public function blockUnblocCategory(Request $request)
    // {
    //      $merchantCheck=User::where('id',$request->id)->where('type','merchant')->first();
    //     if($merchantCheck)
    //     {
    //         if($merchantCheck->active==1)
    //         {
    //              $merchantCheck->active=0;
    //              $merchantCheck->save();
    //              return redirect()->back()->with('success','Merchant Blocked Successfully.');
    //         }
    //         else
    //         {
    //                $merchantCheck->active=1;
    //                $merchantCheck->save();
    //               return redirect()->back()->with('success','Merchant unBlocked Successfully.');
    //         } 
    //     }
    //     else
    //     {
    //         return redirect()->back()->with('error','something went wrong try again');
    //     }

    // }


    /**Treatment product related routes */
    public function treatmentBlockUnblock(Request $request)
    {
        $Treatment=Treatment::where('id',$request->id)->first();
        if($Treatment)
        {
            if($Treatment->status=='1')
            {
                 $Treatment->status='0';
                 $Treatment->save();
                 return redirect()->back()->with('success','Treatment Blocked Successfully.');
            }
            else
            {
                   $Treatment->status='1';
                   $Treatment->save();
                  return redirect()->back()->with('success','Treatment unBlocked Successfully.');
            } 
        }
        else
        {
            return redirect()->back()->with('error','something went wrong try again');
        }

    }
    
    public function viewTreatmentProduct($id)
    {
        $category=TreatmentCategory::where('status','1')->get();
        $outlets=Outlet::get();
        $franchisList=User::where('designation','=','franchise')->get();
        $Treatments=Treatment::where('id',$id)->first();
        if(!empty($Treatments->outlet_ids))
        {
            $oulet_list=json_decode($Treatments->outlet_ids);
        }
        return view('superAdmin.treatments.viewTreatmentProductModel')->with(compact('category','outlets','franchisList','oulet_list','Treatments'))->render();
    }
    public function viewTreatmentProductList(Request $request)
    {
        if (request()->ajax()) 
        {
           $Treatments=Treatment::get();
            return Datatables::of($Treatments)

                ->addColumn('action', function ($row) {
                    // $html = '<div class="btn-group">
                    //         <button type="button" class="btn btn-info dropdown-toggle btn-xs" 
                    //             data-toggle="dropdown" aria-expanded="false">' .'action'.
                    //     '<span class="caret"></span><span class="sr-only">Toggle Dropdown
                    //             </span>
                    //         </button>
                    //         <ul class="dropdown-menu dropdown-menu-right" role="menu">';
                    // $html .= '<li><a href="#" data-href="#" class="btn-modal" data-container=".view_modal"><i class="fa fa-eye" aria-hidden="true"></i>' .'View'. '</a></li>';
                   // $html = '<a data-href="#" id="cat_edit" href="'.route('admin.editTreatmentProduct', [$row->id]).'" class="cat_edit"><i class="fa fa-edit"></i>' . 'edit'.  '</a> <a href="#" data-href="'.route('admin.editFranchise', [$row->id]).'" class="btn-modal" data-container=".view_modal"><i class="fa fa-eye" aria-hidden="true"></i>' .'Block'.'</a>';
                    $html = '<a data-href="#" id="cat_edit" href="'.route('admin.editTreatmentProduct', [$row->id]).'"><i class="fa fa-edit font-20px"></i>' . ''.  '</a>';
                    $html .= '<a  href="#" class="btn-modal test" data-container=".view_modal"  data-href="'.route('admin.viewTreatmentProduct', [$row->id]).'"><i class="fa fa-eye font-20px"></i>' . ''.  '</a>';

                    if($row->status=='1')
                    {
                        
                        $html .= ' <a data-href="#" href="'.route('admin.treatmentBlockUnblock', [$row->id]).'" class="btn-modal" data-container=".view_modal"><i class="fa fa-ban font-20px" aria-hidden="true"></i>' .''.'</a>';
                    }
                    else
                    {
                        $html .= ' <a data-href="#" href="'.route('admin.treatmentBlockUnblock', [$row->id]).'" class="btn-modal" data-container=".view_modal"><i class="fa fa-unlocak font-20px" aria-hidden="true"></i>' .''.'</a>';
 
                    }
                    return $html;
                })
                //  ->editColumn('offer_img', function($row) {
                //     $url=asset($row->offer_img); 
                //     return '<img src='.$url.' alt="Smiley face" height="42" width="42">';
                // })

               //->removeColumn('id')
                ->rawColumns(['action'])
                ->make(true);
        }
        return \View('superAdmin.treatments.treatmentsList');
    }

    public function addTreatmentProduct(Request $request)
    {
        $category=TreatmentCategory::where('status','1')->get();
        $outlets=Outlet::get();
        $franchisList=User::where('designation','=','franchise')->get();
        return view('superAdmin.treatments.addTreatmentProduct')->with(compact('category','outlets','franchisList'))->render();
    }

    public function StoreTreatmentProduct(Request $request)
    {
        $treatments=Treatment::where('treatment_code',$request->tcode)->where('treatment_cat_id',$request->treatment_cat)->first();
        if($treatments)
        {
            return redirect()->back()->with('error','Prodcut alreday exist.');
        }
        else
        {
            try
            {
                $add=new Treatment();
                $add->treatment_code=$request->tcode;
                $add->treatment_cat_id=$request->treatment_cat;
                $add->franchise_id=$request->frnachise_id;
                $add->treatment_name=$request->tname;
                $add->treatment_price=$request->tprice;
                
                if(isset($request->a_unit))
                {
                    $add->available_unit=$request->a_unit;
                    
                }
                if(isset($request->comment))
                {
                    $add->description=$request->comment;
                    
                }
                if(isset($request->status))
                {
                    $add->status=$request->status;
                }
                if(isset($request->view_permission))
                {
                    $add->view_all=$request->view_permission;
                }
                if(isset($request->outlet_list))
                {
                    $outlets=json_encode($request->outlet_list);
                    $add->outlet_ids=$outlets;
                }
                $add->added_by=\Auth::user()->id;
                $add->save();
                return redirect()->back()->with('success','Prodcut added successfully.');

            }catch(\Exception $e)
            {
                return redirect()->back()->with('error','something went wrong.');
            }
        
        }
    
    
    }

    public function editTreatmentProduct($id)
    {
        $category=TreatmentCategory::where('status','1')->get();
        $outlets=Outlet::get();
        $franchisList=User::where('designation','=','franchise')->get();
        $Treatments=Treatment::where('id',$id)->first();
        if(!empty($Treatments->outlet_ids))
        {
            $oulet_list=json_decode($Treatments->outlet_ids);
        }
        return view('superAdmin.treatments.editTreatmentProduct')->with(compact('category','outlets','franchisList','oulet_list','Treatments'));
    }
    public function updateTreatmentProduct(Request $request)
    {
        $add=Treatment::where('id',$request->t_id)->first();

        if($add)
        {
           // $treatments_code=Treatment::where('treatment_code',$request->tcode)->where('treatment_cat_id',$request->treatment_cat)->first();
            try
            {
                
                // $add->treatment_code=$request->tcode;
                $add->treatment_cat_id=$request->treatment_cat;
                $add->franchise_id=$request->frnachise_id;
                $add->treatment_name=$request->tname;
                $add->treatment_price=$request->tprice;
                if(isset($request->comment))
                {
                    $add->description=$request->comment;
                    
                }
                if(isset($request->a_unit))
                {
                    $add->available_unit=$request->a_unit;
                    
                }
                if(isset($request->status))
                {
                    $add->status=$request->status;
                }
                if(isset($request->view_permission))
                {
                    $add->view_all=$request->view_permission;
                }
                if(isset($request->outlet_list))
                {
                    $outlets=json_encode($request->outlet_list);
                    $add->outlet_ids=$outlets;
                }
               
                $add->save();
                return redirect()->route('admin.viewTreatmentProductList')->with('success','Prodcut updated successfully.');

            }catch(\Exception $e)
            {
                return redirect()->back()->with('error','something went wrong.');
            }
            
        }
        else
        {
            return redirect()->back()->with('error','Prodcut id mismatch.');   
        
        }
    
    
    }
  
}
