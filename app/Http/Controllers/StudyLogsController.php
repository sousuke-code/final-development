<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;


// class StudyLogsController extends Controller
// {
//     public function index()
//     {
//         return view('users.studylog');
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudyLog;
use App\Models\UserLanguages;
use Carbon\Carbon;


class StudyLogsController extends Controller
{
    public function start()
    {
        $studyLog = UserLanguages::create([
            'user_id' => Auth::id(),
            'start_time' => Carbon::now(),
        ]);

        return redirect()->back()->with('message', 'Study session started.');
    }

    public function stop()
    {
        $studyLog = UserLanguages::where('user_id', Auth::id())
                            ->whereNull('end_time')
                            ->latest()
                            ->first();
        
        if ($studyLog) {
            $endTime = Carbon::now();
            $studyLog->update([
                'end_time' => $endTime,
            ]);

            // $elapsedTime = $studyLog->start_time->diffForHumans($studyLog->end_time, true);

            if ($studyLog->start_time && $studyLog->end_time) {
                $elapsedTime = $studyLog->start_time->diffForHumans($endTime, true);
                return redirect()->back()->with('message', "Study session stopped. Duration: $elapsedTime");
            } else {
                return redirect()->back()->with('error', 'Failed to calculate study session duration.');
            }
            
            // return redirect()->back()->with('message', "Study session stopped. Duration: $elapsedTime");
        }

        return redirect()->back()->with('error', 'No active study session found.');
    }

    public function index()
    {
        $studyLogs = UserLanguages::where('user_id', Auth::id())->get();

        return view('users.studylog', compact('studyLogs'));
    }
}