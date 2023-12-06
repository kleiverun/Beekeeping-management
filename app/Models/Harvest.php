<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    use HasFactory;
    protected $table = 'harvests';
    protected $fillable = [
        'hiveID',
        'harvestWeight',
        'supersHarvested',
    ];

    public function hive()
    {
        return $this->belongsTo(Hive::class);
    }
}
