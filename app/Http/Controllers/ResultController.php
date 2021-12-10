<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\User;

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
        $resultset = User::raw("UPDATE gebruikers SET voorkeurTemperatuur = $temp 
        WHERE gebruikersnaam = '$id'");

        var_dump($resultset);

        return response()->json([
            "message" => "records updated successfully"
        ], 200);
    }

    public function insertResult(Request $request) {
        $content = $request->json()->all();
        //var_dump($request);

        //error_log($content, 0);

        $decoded = json_decode(json_encode($content), true);
        $decoded = $content;
        
        $device =      $decoded['end_device_ids']['dev_eui'];
        $t =           time();
        $time =        date("Y-m-d h:i:s",$t);
        $temperature = $decoded['uplink_message']['decoded_payload']['temperature_1'];
        $humidity =    $decoded['uplink_message']['decoded_payload']['relative_humidity_2'];
        $co2 =         $decoded['uplink_message']['decoded_payload']['analog_in_4'];
        $people =      $decoded['uplink_message']['decoded_payload']['digital_in_3'];

        Result::insert([
            'apparaatNaam' => $device,
            'datumTijd' => $time,
            'Co2' => $co2,
            'luchtvochtigheid' => $humidity,
            'temperatuur' => $temperature,
            'aantalMensen' => $people
        ]);

        return response('Record added', 200);
    }
}
