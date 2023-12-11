<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiveChanges extends Model
{
    use HasFactory;

    protected $table = 'hiveChanges';
    protected $fillable = ['idBikubeEndringer', 'bikube_idBikube', 'super', 'hiveStrength', 'created_at', 'updated_at'];
}
