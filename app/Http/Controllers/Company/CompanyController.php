<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\User;
use App\Models\UserLanguages;
use App\Models\ProgrammingLanguage;
class CompanyController extends Controller
{
    public function index(Request $request)
    {
        return view('company.profile');
    }

    function edit($id)
    {
        // dd($id)
        // $company = Company::find($id);
        return view('company.edit');
    }
    public function search(Request $request)
    {
        $language = $request->input('language');


        $query = User::query();

        if ($language !== 'All') {
            $query->whereHas('userLanguages', function($q) use ($language) {
                $q->where('programming_language', $language);
            });
        }



        $users = $query->get();

        return view('company.search_results', ['users' => $users]);
    }
}

    

