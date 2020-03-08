<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\restriction;
use App\apps;


//Controller to manage all user functionality from the app
class RestrictionsController extends Controller
{

    public function createRestriction(Request $request)
    {
        $response = array('code' => 400, 'error_msg' => []);
        $restriction = new restriction();
        $app = apps::where('name',$request->name)->first();
        if (isset($app)) {    
            $email = $request->email;
            $user = User::where('email',$email)->first();
            if (isset($user)) {
                $fromTime = $request->fromTime;
                $toTime = $request->toTime;
                if (isset($fromTime) && isset($toTime)) {
                    
                    $restriction->fromTime = $fromTime;
                    $restriction->toTime = $toTime;
                    $restriction->user_id = $user;
                    $restriction->apps_id = $app;
                    $restriction->save();
                    return response()->json(["Success" => "Se ha añadido la restriction"]);
                }else{
                    if (!$request->fromTime) return response()->json(["Error" => "fromTime is required"]);
                    if (!$request->toTime) return response()->json(["Error" => "toTime is required"]);
                }
            }else{
                return response()->json(["Error" => "El usuario no existe"]);
            }
        }else{
            return response()->json(["Error" => "La aplicacion no existe"]);
        }
    }
   

    
}