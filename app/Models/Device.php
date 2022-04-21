<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Device extends Model
{
    use HasFactory;

    protected $primaryKey = 'apparaatNaam';

    public $incrementing = false;

    public $timestamps = FALSE;

    static public function addDevice($device_name, $school, $lokaal, $max_people, $max_temp)
    {
        $new_device = DB::table('apparaatinlokaal')->where('apparaatNaam', '=', $device_name)->get();
        if($new_device->isEmpty()) {
            DB::table('apparaatinlokaal')->insert(
                ['apparaatNaam' => $device_name, 'schoolNaam' => $school, 'lokaalNaam' => $lokaal]
            );

            $selected_school = DB::table('scholen')->where('schoolNaam', '=', $school)->get();
            if($selected_school->isEmpty()) {
                DB::table('scholen')->insert(
                    ['schoolNaam' => $school]
                );
            }

            $selected_classroom = DB::table('lokalen')->where('lokaalNaam', '=', $lokaal)->get();
            if($selected_classroom->isEmpty()) {
                DB::table('lokalen')->insert(
                    ['lokaalNaam' => $lokaal, 'schoolNaam' => $school, 'maxMensen' => $max_people, 'maximumTemp' => $max_temp]
                );
            }

            echo "Apparaat is toegevoegd";

            header("refresh:5;url=/add_device");
        }
        else {
            echo "Dit apparaat bestaat al";

            header("refresh:5;url=/add_device");
        }
    }
}
