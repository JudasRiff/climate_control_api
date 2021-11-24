<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index(){
        $schools = School::get()->toJson(JSON_PRETTY_PRINT);
        return response($schools, 200);
    }

    public function show($id=null){
        $school = School::where('schoolNaam', $id)->first();
        //You can also use
        /*
        $school = school::find($id);*/
        if($school){
         $school = $school->toJson(JSON_PRETTY_PRINT);
         return response($school, 200);
        }
        else{
            return response()->json([
                "message" => "school not found",
              ], 404);
        }
    }
}
