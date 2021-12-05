<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

class ResultController extends Controller
{
    public function index(){
        $results = Result::get()->toJson(JSON_PRETTY_PRINT);
        return response($results, 200);
    }

    public function show($devicenaam=null){
        $results = Result::where('apparaatNaam', $devicenaam)->first();
        //You can also use
        /*
        $school = school::find($id);*/
        if($results){
         $results = $results->toJson(JSON_PRETTY_PRINT);
         return response($results, 200);
        }
        else{
            return response()->json([
                "message" => "No results found",
              ], 404);
        }
    }

    public function updateResult(Request $request, $id) {
        $temp = $request->input('temperatuur');
        $resultset = Result::raw("UPDATE gebruikers SET voorkeurTemperatuur = $temp 
        WHERE gebruikersnaam = '$id'");

        var_dump($resultset);

        return response()->json([
            "message" => "records updated successfully"
        ], 200);
    }
}
