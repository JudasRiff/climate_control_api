<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\School;
use App\Models\Classroom;

class DeviceController extends Controller
{
    public function addDevice(Request $request) 
    {
        $device_name = $request->input('device_name');
        $school = $request->input('school');
        $lokaal = $request->input('lokaal');
        $max_people = $request->input('max_people');
        $max_temp = $request->input('max_temp');

        Device::addDevice($device_name, $school, $lokaal, $max_people, $max_temp);

        //$items = Item::all();
        
        //return view('items', ['items' => $items]);
    }
}
