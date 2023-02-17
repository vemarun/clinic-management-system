<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\State;
use App\Country;
use App\Sequence;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getState(Request $request)
    {
        $state=State::where('country_id',$request->id)->select('id','name')->get();
        return json_encode($state);
    } 
    public function getPassword($length=6)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return $this->generate_string($permitted_chars,$length);

    }
    
 
    public function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
    
        return $random_string;
    }

    public function generateSequnece($length,$type,$outlet_code)
    {
        $sequence = Sequence::where('type',$type)->first();
        $current_sequence_no=$sequence->current_sequence_no;
        $current_date=date('Y-m-d');
        $year=date('y');
        $month=date('m');
        $day=date('d');
        $token_base_formate='M'.$outlet_code.$month.$year;
        $token ='000000';

        $codelength = str_pad($current_sequence_no + 1, 6, 0, STR_PAD_LEFT);
        // Biomatic code update
        $token =$token_base_formate.'-'.$codelength;
        return  $token;        

    }



}
