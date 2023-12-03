<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hive extends Model
{
    use HasFactory;
    protected $table = 'hives';
    protected $fillable = ['apiary_id',  'users_id', 'super', 'hiveDescription', 'hiveStrength', 'created_at', 'updated_at'];
}
