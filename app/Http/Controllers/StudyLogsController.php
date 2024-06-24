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
use App\Models\programming_languages;
use Carbon\Carbon;
use App\Models\User;

class StudyLogsController extends Controller
{
   

    public function toggle(Request $request)
    {
        $user = Auth::user();
        $languageId = $request->input('language');

        $activeLog = UserLanguages::where('user_id', $user->id)
                                  ->whereNull('end_time')
                                  ->first();

        if ($activeLog) {
            // Stop the active log
            $activeLog->end_time = now();
            $activeLog->save();

            $message = '学習の記録が表示されました';
        } else {
            // Start a new log
            $studyLog = new UserLanguages();
            $studyLog->user_id = $user->id;
            $studyLog->programming_language_id = $languageId;
            $studyLog->start_time = now();
            $studyLog->save();

            $message = '学習の記録が始まりました';
        }

        return redirect()->back()->with('message', $message);
    }

    public function index()
    {
        $user = Auth::user();
        $activeLog = UserLanguages::where('user_id', $user->id)
                                  ->whereNull('end_time')
                                  ->first();

        return view('study_logs.index', compact('activeLog'));
    }


    public function getStudyTimes()
    {
        $user = Auth::user();
        $studyLogs = UserLanguages::where('user_id', $user->id)
                                  ->whereNotNull('start_time')
                                  ->whereNotNull('end_time')
                                  ->get();
        $data = [];
        foreach ($studyLogs as $log) {
            $startTime = Carbon::parse($log->start_time);
            $endTime = Carbon::parse($log->end_time);
            $duration =$endTime->diffInMinutes($startTime);

            $languageName = $log->programmingLanguage->name;
            if(!isset($data[$languageName])){
                $data[$languageName] = 0;
            }
            $data[$languageName] += $duration;
        }
        return response()->json($data);
                               

    }


    public function getDailyStudyData(Request $request)
            {
                $startDate = Carbon::parse($request->input('start_date'));
                $endDate = Carbon::parse($request->input('end_date'));

                // ユーザーごとの、指定された期間の日別学習時間を集計する例
                $user = Auth::user();
                $dailyStudyData = UserLanguages::where('user_id', $user->id)
                    ->whereBetween('start_time', [$startDate, $endDate])
                    ->whereNotNull('start_time')
                    ->whereNotNull('end_time')
                    ->get()
                    ->groupBy(function($date) {
                        return Carbon::parse($date->start_time)->format('Y-m-d');
                    })
                    ->map(function($dayStudy) {
                        return $dayStudy->sum(function($item) {
                            return $item->end_time->diffInMinutes($item->start_time); // start_timeとend_timeの差を分単位で計算
                        });
                    });


                return response()->json($dailyStudyData);
            }
   

       
    }


