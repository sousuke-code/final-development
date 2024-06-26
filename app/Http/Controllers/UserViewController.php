<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Portfolios;
use Carbon\Carbon;
use App\Models\UserLanguages;

class UserViewController extends Controller
{
    public function show($id)
    {
         $user_id = $id;
         $user = User::findOrFail($id);
         $portfolios = Portfolios::where('user_id', $user_id)->get();

         return view('profile-user', ['portfolios' => $portfolios, 'user' => $user]);
    }

    public function getStudyTimes($userId)
    {
        $user = User::find($userId);
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

    


}
