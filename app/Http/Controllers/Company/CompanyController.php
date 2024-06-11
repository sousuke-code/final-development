<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {

        return view('company.profile');
    }

    function edit($id)
    {
        // dd($id)
        // $company = Company::find($id);
        return view('company.edit');
    }

}
