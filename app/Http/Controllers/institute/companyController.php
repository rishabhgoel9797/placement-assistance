<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class companyController extends Controller
{
    public function addCompany()
    {
        return view('institute.addcompany');
    }
}
