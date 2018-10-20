<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class teacherController extends Controller
{
    public function addTeacher()
    {
    	return view('institute.addteacher');
    }
}
