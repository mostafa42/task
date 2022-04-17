<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalCenter;
use App\Models\User;

class MedicalCenterController extends Controller
{
    public function gettingAllMedicalCenters (Request $request){
        $medicalCenters = MedicalCenter::all();
        
        return response()->json([
            'data' => $medicalCenters
        ] , 200);
    }

    public function getRelatedDoctors(Request $request , $medicalCenter)
    {
        $dotors = User::where([ 
            [ 'membership' , '=' , 'doctor' ] ,
            [ 'medical_center_name' , '=' , $medicalCenter ]
         ])->get();
        
        return response()->json([
            'data' => $dotors
        ] , 200);

    }
}
