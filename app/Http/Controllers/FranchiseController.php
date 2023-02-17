<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use view;

class FranchiseController extends Controller
{
    public function getDashboard()
    {
        return view('clinic.dashboard');
    }
}
