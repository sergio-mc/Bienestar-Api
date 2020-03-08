<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\restriction;
use App\apps;
use App\app_usages;
use DateTime;


//Controller to manage all user functionality from the app
class CSVController extends Controller
{
    public function parseCSV(Request $request)
    {
        $csv = array_map('str_getcsv' ,file('/Applications/MAMP/htdocs/BienestarApi/Bienestar-Api/storage/app/usage.csv'));
        $countCSV = count($csv);
        $email = $request->email;
        $user = User::where('email',$email)->first();
        
        for ($i=1; $i < $countCSV ; $i++) { 
    
            $openDate = new DateTime ($csv[$i][0]);
            $application = $csv[$i][1];
            $openLocation = $csv[$i][3] . "," . $csv[$i][4];
    
            $i++;
    
            $closeDate =  new DateTime ($csv[$i][0]);
            
            $timeUsed = $closeDate->getTimestamp() - $openDate->getTimestamp();
    
            $application = apps::where('name',$application)->first();
            
            if (isset($application)) {
                
                $newUsage = new app_usages();
                $newUsage->day = $openDate;
                $newUsage->usageTime = $timeUsed;
                $newUsage->location = $openLocation;
                $newUsage->user_id = $user->id;
                $newUsage->apps_id = $application->id;
                $newUsage->save();
            }               
            
    
        }
        return response()->json(["Success" => "Se ha añadido el uso de todas las aplicaciones"]);
        
    }

    
}


