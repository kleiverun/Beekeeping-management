<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hive extends Model
{
    use HasFactory;

    protected $table = 'hives';
    protected $fillable = ['apiary_id', 'queenId', 'users_id', 'super', 'hiveDescription', 'hiveStrength', 'created_at', 'updated_at'];




    public function harvests()
    {
        return $this->hasMany(Harvest::class, 'hiveID');
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
