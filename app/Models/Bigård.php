<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bigård extends Model
{
    use HasFactory;
    protected $table = 'bigård';
    protected $fillable = ['navn', 'users_id', 'adress', 'created_at', 'updated_at'];
}
