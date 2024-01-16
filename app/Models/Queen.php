<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queen extends Model
{
    use HasFactory;
    protected $table = 'queens';
    protected $fillable = ['hive_id', 'queenMother', 'queenDate', 'queenDescription', 'queenBreed', 'user_id',  'created_at', 'updated_at', ];


    public function hive()
    {
        return $this->hasOne(Hive::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
