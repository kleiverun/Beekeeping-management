<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apiary extends Model
{
    use HasFactory;
    protected $table = 'apiary';
    protected $fillable = ['navn', 'users_id', 'adress', 'created_at', 'updated_at'];
}
