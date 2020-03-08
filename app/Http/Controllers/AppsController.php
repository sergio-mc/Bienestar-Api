<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apps;

class AppsController extends Controller
{
   public function createApp(Request $request)
   {
    $app = new apps;
    $app->name = $request->name;
    $app->picture = $request->picture;
    $app->save();
    return $app;
   }

   public function getApps()
   {
    $apps = apps::all();
    return $apps;
   }

   
}