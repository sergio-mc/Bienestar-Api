<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apps;
use App\app_usages;
use DB;

class AppUsages extends Controller
{
    public function getUsage (Request $request)
    {
        $usages = DB::table('app_usages')->select('user_id','apps_id','day', DB::raw("SUM(usageTime) as totalTime"))
                                        ->from('app_usages')
                                        ->where('user_id', $request->user_id)
                                        ->groupBy('user_id','apps_id','day')
                                        ->get();
        return $usages;
    }

    public function getLocation (Request $request)
    {
        $usages = DB::table('app_usages')->select('user_id','apps_id','day','location', DB::raw("SUM(usageTime) as totalTime"))
                                        ->from('app_usages')
                                        ->where('user_id', $request->user_id)
                                        ->groupBy('user_id','apps_id','day','location')
                                        ->get();
        return $usages;
    }

   

   
}
