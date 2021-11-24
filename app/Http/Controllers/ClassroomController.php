<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index(){
        $classrooms = Classroom::get()->toJson(JSON_PRETTY_PRINT);
        return response($classrooms, 200);
    }

    public function show($schoolnaam=null, $klasnaam=null){
        $schoolnaam = urldecode($schoolnaam);
        $classroom = Classroom::where("lokaalNaam", $klasnaam)->where("schoolNaam", $schoolnaam)->first();
        //You can also use
        /*
        $school = school::find($id);*/
        if($classroom){
         $classroom = $classroom->toJson(JSON_PRETTY_PRINT);
         return response($classroom, 200);
        }
        else{
            return response()->json([
                "message" => "classroom not found",
              ], 404);
        }
    }
}
