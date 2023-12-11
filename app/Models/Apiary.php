<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apiary extends Model
{
    use HasFactory;

    protected $table = 'apiaries';
    public $timestamps = true;

    protected $fillable = ['name', 'address', 'longitude', 'latitude', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hives()
    {
        return $this->hasMany(Hive::class);
    }
}
