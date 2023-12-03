<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queen extends Model
{
    use HasFactory;
    protected $table = 'queens';
    protected $fillable = ['hiveID', 'queenDate', 'queenDescription', 'queenBreed', 'usersID',  'created_at', 'updated_at'];
}
