<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyLogsController extends Controller
{
    public function index()
    {
        return view('users.studylog');
    }
}
