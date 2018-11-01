<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class companyController extends Controller
{
    public function index()
    {
        return view('institute.addcompany',['user'=>Auth::user()]);
    }
}
