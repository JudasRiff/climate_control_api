<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'lokalen';

    protected $primaryKey = 'lokaalNaam';

    public $incrementing = false;

    public $timestamps = FALSE;
}
