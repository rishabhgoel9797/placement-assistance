<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class studentController extends Controller
{
    public function index()
    {
    	return view('institute.addstudent',['user'=>Auth::user()]);
    }
}
