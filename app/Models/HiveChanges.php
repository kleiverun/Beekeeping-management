<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiveChanges extends Model
{
    use HasFactory;
    protected $table = 'bikube_endringer';
    protected $fillable = ['idBikubeEndringer', 'bikube_idBikube', 'antallSkattekasser', 'estimertStyrke', 'created_at', 'updated_at'];
}
