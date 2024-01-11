<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queen extends Model
{
    use HasFactory;
    protected $table = 'queens';
    protected $fillable = ['hive_id', 'queenDate', 'queenDescription', 'queenBreed', 'user_id',  'created_at', 'updated_at', ];
}
