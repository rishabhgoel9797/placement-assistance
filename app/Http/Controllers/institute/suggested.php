<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class suggested extends Controller
{
    //
    public function index() {
        return view('institute.suggested');
    }
}
