<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiveChanges extends Model
{
    use HasFactory;

    protected $table = 'hiveChanges';
    protected $fillable = ['hive_id', 'apiary_id', 'queen_id', 'hiveDescription', 'super', 'hiveStrength', 'created_at', 'updated_at'];


    public function hive()
    {
        return $this->belongsTo(Hive::class, 'hive_id');
    }

}
